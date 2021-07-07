<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Level;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nip' => '000001',
            'name' => 'Admin',
            'phone_number' => '0818181221',
            'email' => 'admin@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Admin')->first()->id,
        ]);

        User::create([
            'nip' => '000012',
            'name' => 'Amin',
            'phone_number' => '0818181224',
            'email' => 'amin@tu.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'TU')->first()->id,
        ]);

        User::create([
            'nip' => '000002',
            'name' => 'Najib Ibrahim',
            'phone_number' => '0818181222',
            'email' => 'ketuaumum@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Ketua Umum')->first()->id,
        ]);

        User::create([
            'nip' => '000003',
            'name' => 'Heru Agus',
            'phone_number' => '0818181223',
            'email' => 'asistenketum@tsel.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Asisten Ketua Umum')->first()->id,
        ]);

        User::create([
            'nip' => '000004',
            'name' => 'Auliyail Maknun',
            'phone_number' => '0818181223',
            'email' => 'sekretaris@tsel.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Sekretaris')->first()->id,
        ]);

        User::create([
            'nip' => '000005',
            'name' => 'Kepala TU',
            'phone_number' => '0818181224',
            'email' => 'kepalatu@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'TU')->first()->id,
        ]);

        User::create([
            'nip' => '000006',
            'name' => 'Adi Siswoyo',
            'phone_number' => '0818181224',
            'email' => 'kebidiptek@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Kepala Bidang')->first()->id,
            'department_id' => Department::where('name', 'Ilmu Pengetahuan dan Teknologi')->first()->id,
        ]);

        User::create([
            'nip' => '000007',
            'name' => 'Bagas Dany Aradhana',
            'phone_number' => '0818181224',
            'email' => 'kebidinfokom@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Kepala Bidang')->first()->id,
            'department_id' => Department::where('name', 'Informasi dan Komunikasi')->first()->id,
        ]);

        User::create([
            'nip' => '000008',
            'name' => 'Adis Wing Kasenda',
            'phone_number' => '0818181224',
            'email' => 'kedepipteka@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Kepala Departemen')->first()->id,
            'department_id' => Department::where('name', 'Software')->first()->id,
        ]);

        User::create([
            'nip' => '000009',
            'name' => 'Chelvin Reksa Nanda',
            'phone_number' => '0818181224',
            'email' => 'kedeplitbanga@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Kepala Departemen')->first()->id,
            'department_id' => Department::where('name', 'Kastra')->first()->id,
        ]);

        User::create([
            'nip' => '000010',
            'name' => 'Jonathan Purnama',
            'phone_number' => '0818181224',
            'email' => 'kedepiptekb@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Kepala Departemen')->first()->id,
            'department_id' => Department::where('name', 'Hardware')->first()->id,
        ]);

        User::create([
            'nip' => '000011',
            'name' => 'Hanif Faiz',
            'phone_number' => '0818181224',
            'email' => 'kedeplitbangb@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Kepala Departemen')->first()->id,
            'department_id' => Department::where('name', 'Pengkaderan')->first()->id,
        ]);

        User::create([
            'nip' => '000012',
            'name' => 'apria Nurhuda',
            'phone_number' => '0818181224',
            'email' => 'anggotaipteka@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Anggota Departemen')->first()->id,
            'department_id' => Department::where('name', 'Software')->first()->id,
        ]);

        User::create([
            'nip' => '000013',
            'name' => 'Abdul Muin Jazuli',
            'phone_number' => '0818181224',
            'email' => 'anggotalitbanga@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Anggota Departemen')->first()->id,
            'department_id' => Department::where('name', 'Kastra')->first()->id,
        ]);

        User::create([
            'nip' => '000014',
            'name' => 'Adityo Akbar',
            'phone_number' => '0818181224',
            'email' => 'anggotaiptekb@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Anggota Departemen')->first()->id,
            'department_id' => Department::where('name', 'Hardware')->first()->id,
        ]);

        User::create([
            'nip' => '000011',
            'name' => 'Hanif Faiz',
            'phone_number' => '0818181224',
            'email' => 'anggotalitbangb@hmti.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', 'Anggota Departemen')->first()->id,
            'department_id' => Department::where('name', 'Pengkaderan')->first()->id,
        ]);
    }
}
