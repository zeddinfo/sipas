<?php

namespace Database\Seeders;

use App\Models\MailAttribute;
use Illuminate\Database\Seeder;

class MailAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PERMOHONAN',
            "code" => 'PRMHN',
            "color" => '#1bcfb4',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PEBERITAHUAN',
            "code" => 'PBRTHN',
            "color" => '#ffd500',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'KETERANGAN',
            "code" => 'KTRGN',
            "color" => '#1bcfb4',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'UNDANGAN',
            "code" => 'UNDGN',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'JANJI TEMU',
            "code" => 'JNJTM',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'BALAS JANJI TEMU',
            "code" => 'BLSJNJTM',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'UCAPAN TERIMA KASIH',
            "code" => 'TRMKSH',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'UCAPAN DUKA CITA',
            "code" => 'DKCT',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PERMOHONAN BANTUAN',
            "code" => 'PMHBNT',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PEMBERI BANTUAN',
            "code" => 'PMHIZN',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PEMBERIAN IZIN',
            "code" => 'PMBIZN',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'TUGAS',
            "code" => 'TGS',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PERINTAH KERJA',
            "code" => 'PRTKRJ',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PERJALANAN DINAS',
            "code" => 'PRJDNS',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'BERITA ACARA',
            "code" => 'BA',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'EDARAN',
            "code" => 'EDRN',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'LAPORAN',
            "code" => 'LPRN',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PENGANTAR',
            "code" => 'PGNTR',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'REFERENSI',
            "code" => 'RFNS',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'REKOMENDASI',
            "code" => 'RKMNDS',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PERINGATAN',
            "code" => 'PRGTN',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PANGGILAN',
            "code" => 'PNGLN',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'KUASA',
            "code" => 'KSA',
            "color" => '#c3bdbd',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'UNDANGAN',
            "code" => 'UNDGN',
            "color" => '#c3bdbd',
        ]);

        // Mail Reference
        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Umum',
            "code" => 'UM',
            "color" => '#fe5678',
        ]);

        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Tertutup',
            "code" => 'TRTP',
            "color" => '#ffd500',
        ]);

        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Rahasia',
            "code" => 'RHS',
            "color" => '#1bcfb4',
        ]);

        ///Mail Folder
        MailAttribute::create([
            "type" => "FOLDER",
            "name" => "KEUANGAN",
            "code" => "KNGN",
            "color" => "#1bcfb4",
        ]);

        MailAttribute::create([
            "type" => "FOLDER",
            "name" => "PENGADAAN",
            "code" => "PNGDN",
            "color" => "#1bcfb4",
        ]);

        MailAttribute::create([
            "type" => "FOLDER",
            "name" => "LAPORAN PERJALANAN",
            "code" => "LPPRJ",
            "color" => "#1bcfb4",
        ]);

        MailAttribute::create([
            "type" => "FOLDER",
            "name" => "PEMBANGUNAN",
            "code" => "PMBGN",
            "color" => "#1bcfb4",
        ]);

        MailAttribute::create([
            "type" => "FOLDER",
            "name" => "ASPIRASI",
            "code" => "ASPR",
            "color" => "#1bcfb4",
        ]);

        // Mail Reference
        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Umum',
            "code" => 'UM',
            "color" => '#fe5678',
        ]);

        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Tertutup',
            "code" => 'TRTP',
            "color" => '#ffd500',
        ]);

        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Rahasia',
            "code" => 'RHS',
            "color" => '#1bcfb4',
        ]);

        // Mail Priority
        MailAttribute::create([
            "type" => 'Prioritas',
            'name' => 'Biasa',
            "code" => 'BS',
            "color" => '#1bcfb4',
        ]);

        MailAttribute::create([
            "type" => 'Prioritas',
            'name' => 'Segera',
            "code" => 'SGR',
            "color" => '#ffd500',
        ]);

        MailAttribute::create([
            "type" => 'Prioritas',
            'name' => 'Mendesak',
            "code" => 'MNDSK',
            "color" => '#fe5678',
        ]);
    }
}
