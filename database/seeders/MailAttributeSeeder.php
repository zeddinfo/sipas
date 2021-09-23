<?php

namespace Database\Seeders;

use App\Models\MailAttribute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MailAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mail Classification
        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Umum",
            "code" => "000",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Lambang",
            "code" => "001",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Lambang Garuda",
            "code" => "001.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Lambang Bendera Kebangsaan",
            "code" => "001.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Lambang Lagu Kebangsaan",
            "code" => "001.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Lambang Daerah",
            "code" => "001.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Lambang Provinsi",
            "code" => "001.31",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Lambang Kabupaten/Kota",
            "code" => "001.32",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tanda Kehormatan/Penghargaan",
            "code" => "002",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Hari Raya/Besar",
            "code" => "003",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Hari Raya/Besar Nasional 17 Agustus, Hari Pahlawan, Dan Sebagainya",
            "code" => "003.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Hari Raya/Besar Hari Raya Keagamaan",
            "code" => "003.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Hari Raya/Besar Hari Ulang Tahun",
            "code" => "003.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Hari Raya/Besar Hari-Hari Besar Internasional",
            "code" => "003.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Ucapan",
            "code" => "004",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Undangan",
            "code" => "005",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tanda Jabatan",
            "code" => "006",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tanda Jabatan Pamong Praja",
            "code" => "006.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tanda Jabatan Tanda Pengenal",
            "code" => "006.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tanda Jabatan Pejabat Lainnya",
            "code" => "006.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Urusan Dalam",
            "code" => "010",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Gedung Kantor/Termasuk Instalasi Prasarana Fisik Pamong /Kantor Dinas",
            "code" => "011",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Rumah Dinas",
            "code" => "012",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penerangan Listrik/Jasa Listrik",
            "code" => "015",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Telepon/Faximile/Internet",
            "code" => "016",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Keamanan/Ketertiban Kantor",
            "code" => "017",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kebersihan Kantor",
            "code" => "018",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Protokol",
            "code" => "019",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Peralatan",
            "code" => "020",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Alat Tulis",
            "code" => "021",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Mesin Kantor",
            "code" => "022",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perabot Kantor",
            "code" => "023",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Alat Angkutan",
            "code" => "024",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pakaian Dinas",
            "code" => "025",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Inventaris",
            "code" => "028",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kekayaan Daerah",
            "code" => "030",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Sumber Daya Alam",
            "code" => "031",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Asset Daerah",
            "code" => "032",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perpustakaan Dokumentasi / Kearsipan / Sandi",
            "code" => "040",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perpustakaan",
            "code" => "041",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perpustakaan Umum",
            "code" => "041.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perpustakaan Khusus",
            "code" => "041.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perpustakaan Perguruan Tinggi",
            "code" => "041.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perpustakaan Sekolah",
            "code" => "041.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perpustakaan Keliling",
            "code" => "041.5",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Dokumentasi",
            "code" => "042",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kearsipan",
            "code" => "045",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Sandi",
            "code" => "046",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Website",
            "code" => "047",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pengelolaan Data",
            "code" => "048",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Jaringan Komunikasi Data",
            "code" => "049",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perencanaan",
            "code" => "050",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Proyek Bidang Pemerintahan, Klasifikasikan Disini : Proyek Prasaran Fisik   Pemerintahan",
            "code" => "051",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Pengawasan",
            "code" => "057",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Kepegawaian",
            "code" => "058",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Keuangan",
            "code" => "059",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi / Ketatalaksanaan",
            "code" => "060",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi / Ketatalaksanaan Program Kerja",
            "code" => "060.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi Instansi Pemerintah (Struktur Organisasi)",
            "code" => "061",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi Badan Non Pemerintah",
            "code" => "062",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Ketatalaksanaan / Tata Naskah / Sistem",
            "code" => "065",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Stempel Dinas",
            "code" => "066",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pelayanan Umum / Pelayanan Publik / Analisis",
            "code" => "067",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Komputerisasi / Siskomdagri",
            "code" => "068",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Standar Pelayanan Minimal",
            "code" => "069",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penelitian",
            "code" => "070",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Provinsi",
            "code" => "077",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kabupaten/Kota",
            "code" => "078",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kecamatan /Desa",
            "code" => "079",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Konferensi / Rapat / Seminar",
            "code" => "080",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Gubernur",
            "code" => "081",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bupati / Walikota",
            "code" => "082",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Komponen, Eselon Lainnya",
            "code" => "083",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Instansi Lainnya",
            "code" => "084",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perjalanan Dinas",
            "code" => "090",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perjalanan Pegawai Termasuk Pemanggilan Pegawai",
            "code" => "094",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintahan",
            "code" => "100",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Meliputi: Tata Praja, Legislatif, Yudikatif, Hubungan Luar Negeri",
            "code" => "101",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Gdn",
            "code" => "102",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintahan Pusat",
            "code" => "110",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Presiden",
            "code" => "111",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Wakil Presiden",
            "code" => "112",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Susunan Kabinet",
            "code" => "113",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kementerian Dalam Negeri",
            "code" => "114",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi",
            "code" => "120",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Monografi Tambahkan Kode Wilayah",
            "code" => "120.042",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Koordinasi",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pembentukan Pemekaran Wilayah",
            "code" => "125",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pembagian Wilayah",
            "code" => "126",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penyerahan Urusan",
            "code" => "127",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Kabupaten / Kota",
            "code" => "130",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Forum Koordinasi Pemerintah Di Daerah",
            "code" => "134",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Muspida",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Forum Pan (Panitian Anggaran Nasional)",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Forum Koordinasi Lainnya",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kerjasama Antar Kabupaten/Kota",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pembentukan / Pemekaran Wilayah",
            "code" => "135",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pembagian Wilayah",
            "code" => "136",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penyerahan Urusan",
            "code" => "137",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Wilayah Kecamatan",
            "code" => "138",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintahan Desa / Kelurahan",
            "code" => "140",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pamong Desa, Meliputi: Pencalonan, Pemilihan, Meninggal, Pengangkatan,  Pemberhenian.",
            "code" => "141",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penghasilan Pamong Desa",
            "code" => "142",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kekayaan Desa",
            "code" => "143",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Dewan Tingkat Desa, Dewan Marga, Rembug Desa",
            "code" => "144",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Administrasi Desa",
            "code" => "145",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kewilayahan",
            "code" => "146",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pembentukan Desa/Kelurahan",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pemekaran Desa/Kelurahan",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Perubahan Batas Wilayah / Perluasan Desa / Kelurahan",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Perubahan Nama Desa / Kelurahan",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kerjasama Antar Desa / Kelurahan",
            "code" => "120.5",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Lembaga-Lembaga Tingkat Desa",
            "code" => "147",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perangkat Kelurahan",
            "code" => "148",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kepala Kelurahan",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Sekretaris Kelurahan",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Staf Kelurahan",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Dewan Kelurahan",
            "code" => "149",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Rukun Tetangga",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Rukun Warga",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Rukun Kampung",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Legislatif Mpr / Dpr / Dpd",
            "code" => "150",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Dprd Provinsi Tambahkan Kode Wilayah",
            "code" => "160",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Dprd Kabupaten Tambahkan Kode Wilayah",
            "code" => "170",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Hukum",
            "code" => "180",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kontitusi",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Dasar Hukum",
            "code" => "120.11",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Undang-Undang Dasar",
            "code" => "120.12",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Gbhn",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Amnesti, Abolisi Dan Grasi",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Hubungan Luar Negeri",
            "code" => "190",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Politik",
            "code" => "200",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kepartaian",
            "code" => "210",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi Kemasyarakatan",
            "code" => "220",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi Profesi Dan Fungsional",
            "code" => "230",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Ikatan Dokter Indonesia",
            "code" => "231",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Persatuan Guru Republik Indonesia",
            "code" => "232",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Persatuan Sarjana Hukum Indonesia",
            "code" => "233",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Persatuan Advokat Indonesia",
            "code" => "234",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Lembaga Bantuan Hukum Indonesia",
            "code" => "235",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Korps Pegawai Republik Indonesia",
            "code" => "236",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Persatuan Wartawan Indonesia",
            "code" => "237",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Ikatan Cendikiawan Muslim Indonesia",
            "code" => "238",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi Profesi Dan Fungsional Lainnya",
            "code" => "239",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi Pemuda",
            "code" => "240",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Komite Nasional Pemuda Indonesia",
            "code" => "241",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi Mahasiswa",
            "code" => "242",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi Pelajar",
            "code" => "243",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi Buruh, Tani, Nelayan Dan Angkutan",
            "code" => "250",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Organisasi Wanita",
            "code" => "260",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Dharma Wanita",
            "code" => "261",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Persatuan Wanita Indonesia",
            "code" => "262",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemberdayaan Perempuan (Wanita)",
            "code" => "263",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kongres Wanita",
            "code" => "264",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemilihan Umum",
            "code" => "270",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Keamanan / Ketertiban",
            "code" => "300",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pertahanan",
            "code" => "310",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kemiliteran",
            "code" => "320",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Keamanan",
            "code" => "330",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pertahanan Sipil",
            "code" => "340",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kejahatan",
            "code" => "350",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bencana",
            "code" => "360",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Gunung Berapi / Gempa",
            "code" => "361",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Banjir / Tanah Longsor",
            "code" => "362",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Angin Topan",
            "code" => "363",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kebakaran",
            "code" => "364",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pemadam Kebakaran",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kekeringan",
            "code" => "365",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tsunami",
            "code" => "366",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kecelakaan / Sar",
            "code" => "370",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kesejahteraan Rakyat",
            "code" => "400",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Keluarga Miskin",
            "code" => "401",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pnpm Mandiri Pedesaan",
            "code" => "402",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pembangunan Desa",
            "code" => "410",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pembinaan Usaha Gotong Royong",
            "code" => "411",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pungutan",
            "code" => "120.14",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Lembaga Sosial Desa (Lsd)",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kuliah Kerja Nyata (Kkn)",
            "code" => "120.32",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pusat Latihan",
            "code" => "120.33",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kursus-Kursus",
            "code" => "120.34",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kurikulum / Sylabus",
            "code" => "120.35",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Ketrampilan",
            "code" => "120.36",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pramuka",
            "code" => "120.37",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pembinaan Kesejahteraan Keluarga (Pkk)",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Petunjuk / Pembinaan Pelaksanaan",
            "code" => "120.25",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Koperasi Desa",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Koperasi Usaha Desa",
            "code" => "120.32",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pendidikan",
            "code" => "420",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pendidikan Khusus Klasifikasi Disini Pendidikan Putra/I Irja",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Sekolah",
            "code" => "421",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pra Sekolah",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Sekolah Dasar",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Sekolah Menengah",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Sekolah Tinggi",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Sekolah Kejuruan",
            "code" => "120.5",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kegiatan Sekolah, Dies Natalis Lustrum",
            "code" => "120.6",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kegiatan Pelajar",
            "code" => "120.7",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Reuni Darmawisata",
            "code" => "120.71",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pelajar Teladan",
            "code" => "120.72",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Resimen Mahasiswa",
            "code" => "120.73",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Sekolah Pendidikan Luar Biasa",
            "code" => "120.8",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pendidikan Luar Sekolah / Pemberantasan Buta Huruf",
            "code" => "120.9",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Administrasi Sekolah",
            "code" => "422",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Persyaratan Masuk Sekolah, Testing, Ujian, Pendaftaran, Mapras, Perpeloncoan",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Tahun Pelajaran",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Hari Libur",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Uang Sekolah, Klasifikasi Disini Spp",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Beasiswa",
            "code" => "120.5",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Metode Belajar",
            "code" => "423",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kuliah",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Ceramah, Simposium",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Diskusi",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kuliah Lapangan, Widyawisata, Kkn, Studi Tur",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kurikulum",
            "code" => "120.5",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Karya Tulis",
            "code" => "120.6",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Ujian",
            "code" => "120.7",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tenaga Pengajar, Guru, Dosen, Dekan, Rektor, Klasifikasi Disini: Guru Teladan",
            "code" => "424",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Sarana Pendidikan",
            "code" => "425",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Gedung",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Gedung Sekolah",
            "code" => "120.11",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kampus",
            "code" => "120.12",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pusat Kegiatan Mahasiswa",
            "code" => "120.13",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Buku",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Perlengkapan Sekolah",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Keolahragaan",
            "code" => "426",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Cabang Olah Raga",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Sarana",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Gedung Olah Raga",
            "code" => "120.21",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Stadion",
            "code" => "120.22",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Lapangan",
            "code" => "120.23",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kolam Renang",
            "code" => "120.24",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pesta Olah Raga, Klasifikasi Disini: Pon, Porsade, Olimpiade, Dsb",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Koni",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kepramukaan Meliputi: Organisasi Dan Kegiatan Remaja, Klasifikasi Disini: Gelanggang Remaja",
            "code" => "427",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kepramukaan",
            "code" => "428",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pendidikan Kedinasan Untuk Depdagri, Lihat",
            "code" => "890	429",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kebudayaan",
            "code" => "430",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kesenian",
            "code" => "431",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Cabang Kesenian",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Sarana",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Gedung Kesenian",
            "code" => "120.21",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kepurbakalaan",
            "code" => "432",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Sejarah",
            "code" => "433",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bahasa",
            "code" => "434",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Usaha Pertunjukan, Hiburan, Kesenangan",
            "code" => "435",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kesehatan",
            "code" => "440",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pembinaan Kesehatan",
            "code" => "441",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Obat-Obatan",
            "code" => "442",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penyakit Menular",
            "code" => "443",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Gizi",
            "code" => "444",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Rumah Sakit, Balai Kesehatan, Puskesmas, Puskesmas Keliling, Poliklinik",
            "code" => "445",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tenaga Medis",
            "code" => "446",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pengobatan Tadisional",
            "code" => "448",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Agama",
            "code" => "450",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Islam",
            "code" => "451",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Peribadatan",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Sholat",
            "code" => "120.11",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Zakat Fitrah",
            "code" => "120.12",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Puasa",
            "code" => "120.13",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Mtq",
            "code" => "120.14",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Rumah Ibadah",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Tokoh Agama",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pendidikan",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Tinggi",
            "code" => "120.41",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Menengah",
            "code" => "120.42",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Dasar",
            "code" => "120.43",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pondok Pesantren",
            "code" => "120.44",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Gedung Sekolah",
            "code" => "120.45",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Tenaga Pengajar",
            "code" => "120.46",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Buku",
            "code" => "120.47",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Dakwah",
            "code" => "120.48",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Organisasi / Lembaga Pendidikan",
            "code" => "120.49",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Harta Agama Wakaf, Baitulmal, Dsb",
            "code" => "120.5",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Peradilan",
            "code" => "120.6",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Organisasi Keagamaan Bukan Politik Majelis Ulama",
            "code" => "120.7",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Mazhab",
            "code" => "120.8",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Urusan Haji",
            "code" => "456",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Onh",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Manasik",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Sosial",
            "code" => "460",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kesejahteraan Anak / Keluarga",
            "code" => "463",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Anak Putus Sekolah",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Ibu Teladan",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Anak Asuh",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pembinaan Pahlawan",
            "code" => "464",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kesejahteraan Sosial",
            "code" => "465",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Lanjut Usia",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Korban Kekacauan, Pengungsi, Repatriasi",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Sumbangan Sosial",
            "code" => "466",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Korban Bencana",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pencarian Dana Untuk Sumbangan",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Meliputi: Penyelenggaraan Undian, Ketangkasan, Bazar, Dsb",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Panti Asuhan",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Panti Jompo",
            "code" => "120.5",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bimbingan Sosial",
            "code" => "467",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Masyarakat Suku Terasing Meliputi: Bimbingan, Pendidikan, Kesehatan, Pemukiman",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pmi",
            "code" => "468",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Makam",
            "code" => "469",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kependudukan",
            "code" => "470",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pendaftaran Penduduk",
            "code" => "471",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pencatatan Sipil",
            "code" => "472",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kelahiran, Kematian Dan Advokasi",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kelahiran",
            "code" => "120.11",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kematian",
            "code" => "120.12",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Advokasi Kelahiran Dan Kematian",
            "code" => "120.13",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Perkawinan, Peceraian Dan Advokasi",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Informasi Kependudukan",
            "code" => "473",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Teknologi Informasi",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Perangkat Keras",
            "code" => "120.11",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Perangkat Lunak",
            "code" => "120.12",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Jaringan Komunikasi Data",
            "code" => "120.13",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kelembagaan Dan Sumber Daya Informasi",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Media Massa",
            "code" => "480",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penerbitan",
            "code" => "481",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Surat Kabar",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Majalah",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Buku",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Penerjemahan",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Radio",
            "code" => "482",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pers",
            "code" => "485",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kewartawanan",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Wawancara",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Informasi Nasional",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perekonomian",
            "code" => "500",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perdagangan",
            "code" => "510",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pertanian",
            "code" => "520",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kehutanan",
            "code" => "522",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perikanan",
            "code" => "523",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Peternakan",
            "code" => "524",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perkebunan",
            "code" => "525",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perindustrian",
            "code" => "530",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perusahaan Daerah / Bumd/Buld",
            "code" => "539",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pertambangan / Kesamudraan",
            "code" => "540",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Minyak Bumi / Bensin",
            "code" => "541",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Geologi",
            "code" => "546",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Vulkanologi",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pengawasan Gunung Berapi",
            "code" => "120.11",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Sumur Artesis, Air Bawah Tanah",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perhubungan",
            "code" => "550",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perhubungan Darat",
            "code" => "551",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perhubungan Laut",
            "code" => "552",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perhubungan Udara",
            "code" => "553",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pos",
            "code" => "554",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Telekomunikasi",
            "code" => "555",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pariwisata Dan Rekreasi",
            "code" => "556",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tenaga Kerja",
            "code" => "560",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perbankan / Moneter",
            "code" => "580",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kredit",
            "code" => "581",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Investasi",
            "code" => "582",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Agraria",
            "code" => "590",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pengurusan Hak-Hak Tanah",
            "code" => "593",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pekerjaan Umum Dan Ketenagakerjaan",
            "code" => "600",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pengairan",
            "code" => "610",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Irigasi",
            "code" => "611",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Jalan",
            "code" => "620",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Jembatan",
            "code" => "630",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bangunan",
            "code" => "640",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tata Kota",
            "code" => "650",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Ketenagaan",
            "code" => "670",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Listrik",
            "code" => "671",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Plta (Pembangkit  Listrik Tenaga Air)",
            "code" => "120.21",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pltd (Pembangkit Listrik Tenaga Diesel)",
            "code" => "120.22",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pltg P (Pembangkit Listrik Tenaga Gas)",
            "code" => "120.23",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pltm (Pembangkit  Listrik Tenaga Matahari)",
            "code" => "120.24",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pltn (Pembangkit Listrik Tenaga Nuklir)",
            "code" => "120.25",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pltpb (Pembangkit Listrik Tenaga Uap)",
            "code" => "120.26",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Air Minum",
            "code" => "690",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pengawasan",
            "code" => "700",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Urusan Dalam",
            "code" => "701",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Peralatan",
            "code" => "702",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Kekayaan Daerah",
            "code" => "703",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Perpustakaan / Dokumentasi / Kearsipan Sandi",
            "code" => "704",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Perencanaan",
            "code" => "705",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Organisasi / Ketatalaksanaan",
            "code" => "706",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Penelitian",
            "code" => "707",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Konferensi",
            "code" => "708",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Perjalanan Dinas",
            "code" => "709",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Pemerintahan",
            "code" => "710",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Politik",
            "code" => "720",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Pemilihan Umum",
            "code" => "727",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Keamanan/Ketertiban",
            "code" => "730",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Kesejahteraan Rakyat",
            "code" => "740",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Perekonomian",
            "code" => "750",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Pekerjaan Umum",
            "code" => "760",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Kepegawaian",
            "code" => "780",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Pengadaan Pegawai",
            "code" => "781",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Mutasi Pegawai",
            "code" => "782",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Kedudukan Pegawai",
            "code" => "783",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Kesejahteran Pegawai",
            "code" => "784",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Cuti",
            "code" => "785",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Penilaian",
            "code" => "786",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Tata Usaha Kepegawaian",
            "code" => "787",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Pemberhentian Pegawai",
            "code" => "788",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Pendidikan Pegawai",
            "code" => "789",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Keuangan",
            "code" => "790",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Anggaran",
            "code" => "791",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Otorisasi",
            "code" => "792",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Verifikasi",
            "code" => "793",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Pembukuan",
            "code" => "794",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Perbendaharaan",
            "code" => "795",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Pembina Kebendaharaan",
            "code" => "796",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Pendapatan",
            "code" => "797",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bidang Bendaharaan",
            "code" => "799",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kepegawaian",
            "code" => "800",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pengadaan",
            "code" => "810",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Mutasi",
            "code" => "820",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kenaikan Gaji Berkala",
            "code" => "822",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kenaikan Pangkat / Pengangkatan",
            "code" => "823",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemindahan / Pelimpahan / Perbantuan",
            "code" => "824",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Datasering Dan Penempatan Kembali",
            "code" => "825",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penunjukan Tugas Belajar",
            "code" => "826",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Mutasi Dengan Instansi Lain",
            "code" => "828",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kedudukan",
            "code" => "830",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perhitungan Masa Kerja",
            "code" => "831",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penyesuaian Pangkat / Gaji",
            "code" => "832",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penghargaan Ijazah / Penyesuaian",
            "code" => "833",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Jenjang Pangkat / Eselonering",
            "code" => "834",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kesejahteraan Pegawai",
            "code" => "840",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tunjangan",
            "code" => "841",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Jabatan",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kehormatan",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kematian/Uang Duka",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Tunjangan Hari Raya",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Perjalanan Dinas Tetap/Cuti/Pindah",
            "code" => "120.5",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Keluarga",
            "code" => "120.6",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Sandang, Pangan, Papan (Bapertarum)",
            "code" => "120.7",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Dana",
            "code" => "842",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Taspen",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kesehatan",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Asuransi",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perawatan Kesehatan",
            "code" => "843",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Koperasi / Distribusi",
            "code" => "844",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perumahan/Tanah",
            "code" => "845",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bantuan Sosial",
            "code" => "846",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Cuti Meliputi Cuti Tahunan, Cuti Besar, Cuti Sakit, Cuti Hamil, Cuti Naik Haji, Cuti Diluar Tanggungan Negara Dan Cuti Alasan Lain",
            "code" => "850",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penilaian",
            "code" => "860",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penghargaan",
            "code" => "861",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Bintang/Satyalencana",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kenaikan Pangkat Anumerta",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Kenaikan Gaji Istimewa",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Hadiah Berupa Uang",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Pegawai Teladan",
            "code" => "120.5",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Hukuman",
            "code" => "862",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Konduite, Dp3, Disiplin Pegawai",
            "code" => "863",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Ujian Dinas",
            "code" => "864",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penilaian Kehidupan Pegawai Negeri, Meliputi: Petunjuk Pelaksanaan Hidup Sederhana, Penilaian Kekayaan Pribadi",
            "code" => "865",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tata Usaha Kepegawaian",
            "code" => "870",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Formasi",
            "code" => "871",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bezetting/Daftar Urut Kepegawaian",
            "code" => "872",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Registrasi",
            "code" => "873",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Nip",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Karpeg",
            "code" => "120.2",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Legitiminasi/Tanda Pengenal",
            "code" => "120.3",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Daftar Keluarga, Perkawinan, Perceraian, Karis, Karsu",
            "code" => "120.4",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Daftar Riwayat Pekerjaan",
            "code" => "874",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Kewenangan Mutasi Pegawai",
            "code" => "875",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Penggajian",
            "code" => "876",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemerintah Provinsi Skpp",
            "code" => "120.1",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Sumpah/Janji",
            "code" => "877",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Korps Pegawai",
            "code" => "878",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemberhentian Pegawai, Meliputi Atas  Pemberhentian,Permintaan Sendiri, Dengan Hak Pensiun, Karena Meninggal Dunia, Alasan Lain, Dengan Diberi Uang Pesangon, Uang Tnggu Untuk Sementara Waktu Dan Pemberhentian Tidak Dengan  Hormat",
            "code" => "880",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Permintaan Sendiri",
            "code" => "881",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Dengan Hak Pensiun",
            "code" => "882",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Karena Meninggal",
            "code" => "883",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Alasan Lain",
            "code" => "884",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Uang Pesangon",
            "code" => "885",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Uang Tunggu",
            "code" => "886",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Untuk Sementara Waktu",
            "code" => "887",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tidak Dengan Hormat",
            "code" => "888",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pendidikan Pegawai",
            "code" => "890",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perencanaan",
            "code" => "891",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pendidikan _Egular / Kader",
            "code" => "892",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pendidikan Dan Pelatihan / Non Reguler",
            "code" => "893",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pendidikan Luar Negeri",
            "code" => "894",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Metode",
            "code" => "895",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Tenaga Pengajar / Widyaiswara/Narasumber",
            "code" => "896",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Administrasi Pendidikan",
            "code" => "897",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Fasilitas Belajar",
            "code" => "898",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Sarana",
            "code" => "899",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Keuangan",
            "code" => "900",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Anggaran",
            "code" => "910",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Otorisasi / Sko",
            "code" => "920",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Verifikasi",
            "code" => "930",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pembukuan",
            "code" => "940",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Perbendaharaan",
            "code" => "950",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pembinaan Kebendaharaan",
            "code" => "960",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pemeriksaan Kas Dan Hasil Pemeriksaan Kas",
            "code" => "961",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Pendapatan",
            "code" => "970",
            "color" => "#404040"
        ]);

        MailAttribute::create([
            "type" => "Klasifikasi",
            "name" => "Bendaharawan",
            "code" => "990",
            "color" => "#404040"
        ]);

        // Mail Reference
        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Biasa',
            "code" => 'BS',
            "color" => '#1bcfb4',
        ]);

        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Segera/Penting',
            "code" => 'SGR/PTG',
            "color" => '#ffd500',
        ]);

        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Rahasia',
            "code" => 'RHS',
            "color" => '#fe5678',
        ]);
    }
}
