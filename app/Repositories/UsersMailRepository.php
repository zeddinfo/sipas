<?php

namespace App\Repositories;

use App\Models\Mail;
use App\Models\MailTransaction;
use App\Models\MailVersion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersMailRepository
{
    public static function getMailTransactions($mail_type, $user_ids)
    {

        $transactions = MailTransaction::where(function ($query) use ($user_ids) {
            $query->whereIn('user_id', $user_ids)
                ->orWhereIn('target_user_id', $user_ids);
        })
            ->whereHas('mailVersion', function ($query) use ($mail_type) {
                $query->select('mail_id')->whereHas('mail', function ($query) use ($mail_type) {
                    return $query->select('type')->whereNull('archived_at')->where('type', $mail_type);
                });
            });

        return $transactions;
    }

    public static function getMails($mail_type)
    {
        $user = Auth::user();
        $user_ids = $user->getSameUsers()->pluck('id');

        $mails = UsersMailRepository::getMailTransactions($mail_type, $user_ids)
            ->with([
                'mailVersion',
                'mailVersion.mail',
                'mailVersion.mail.attributes',
                'mailVersion.file'
            ])
            ->orderBy('id', 'DESC')->get()->unique('mail_version_id')
            ->map(function ($transaction) {
                $transaction->mail_id = $transaction->mailVersion->mail_id;
                return $transaction;
            })->unique('mail_id');

        $mails = $mails->map(function ($transaction) use ($user_ids) {

            $status_option = [
                'income' => [
                    MailTransaction::TYPE_FORWARD => [
                        'type' => 'forward',
                        'status' => 'Perlu Tanggapan',
                        'color' => 'danger',
                    ],

                    MailTransaction::TYPE_REVISION => [
                        'type' => 'correction',
                        'status' => 'Perlu Dikoreksi',
                        'color' => 'danger',
                        'action' => 'buat-koreksi',
                    ],

                    MailTransaction::TYPE_DISPOSITION => [
                        'type' => 'disposition',
                        'status' => 'Perlu Tanggapan',
                        'color' => 'danger',
                        'action' => '',
                    ],

                    MailTransaction::TYPE_FINISHED => [
                        'type' => 'finished',
                        'status' => 'Menunggu Selesai',
                        'color' => 'success',
                        'action' => '',
                    ],
                ],
                'outcome' => [
                    MailTransaction::TYPE_FORWARD => [
                        'type' => 'forward',
                        'status' => 'Menunggu Tanggapan',
                        'color' => 'success',
                    ],

                    MailTransaction::TYPE_REVISION => [
                        'type' => 'correction',
                        'status' => 'Menunggu dikoreksi',
                        'color' => 'warning',
                    ],

                    MailTransaction::TYPE_DISPOSITION => [
                        'type' => 'disposition',
                        'status' => 'Telah Didisposisikan',
                        'color' => 'success',
                    ],
                    MailTransaction::TYPE_FINISHED => [
                        'type' => 'finished',
                        'status' => 'Menunggu Selesai',
                        'color' => 'success',
                        'action' => '',
                    ],
                ]
            ];

            if (in_array($transaction->user_id, $user_ids->toArray())) {
                $transaction->status = $status_option['outcome'][$transaction->type];
                $transaction->transaction = 'outcome';
            } else {
                $transaction->status = $status_option['income'][$transaction->type];
                $transaction->transaction = 'income';
            }

            $mail = $transaction->mailVersion->mail;
            $mail->transaction_time = $transaction->created_at;
            $mail->transaction_id = $transaction->id;

            $mail->status = $transaction->status;
            $mail->file = $transaction->mailVersion->file;
            $mail->transaction = $transaction->transaction;
            $mail->memo = $transaction->memo?->memo;

            return $mail;
        });

        return $mails;
    }
}
