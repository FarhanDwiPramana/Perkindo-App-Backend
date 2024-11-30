<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            'non_konstruksi' => [
            "Akte Perusahaan",
            "Akte Perubahan (jika ada)",
            "SK MENKUMHAM",
            "NPWP Perusahaan",
            "KTP dan NPWP pengurus yang tercantum di Akte",
            "Izin Perusahaan",
            "Foto Direktur",
            "Ijazah, KTP, NPWP penanggung jawab SBU setiap bidang SBU",
        ],
        'sbu_konstruksi' => [
            [
                'title' => "DOKUMEN ADMINISTRASI BADAN USAHA",
                'subMenu' => [
                    "Scan warna Kartu Tanda Anggota Asosiasi yang masih berlaku",
                    "Scan warna Akte Pendirian Perusahaan dan SK MENKUMHAM",
                    "Scan warna Akte Perubahan Perusahaan dan SK MENKUMHAM (KBLI 2020)",
                    "Scan Warna NPWP Perusahaan",
                    "NIB (Nomor Induk Berusaha)",
                    "Contoh stample Perusahaan",
                    "Email, No. Telepon Perusahaan yang aktif",
                    "Website Perusahaan (jika ada)",
                    "Foto PJBU/Direktur",
                ],
            ],   
            [
                'title' => "DOKUMEN PENJUALAN TAHUNAN",
                'subMenu' => [
                    "Scan kontak kerja/SPK/Adendum Kontrak (jika ada)",
                    "Scan Surat Pejanjian KSO (jika ada)",
                    "Scan BAST",
                    "Scan Faktur Pajak",
                    
                ],
            ],
            [
                'title' => "DOKUMEN KEMAMPUAN KEUANGAN",
                'subMenu' => [
                    "Scan KTP dan NPWP pemilik saham",
                    "Neraca keuangan badan usaha",
                    "Laporan KAP (untuk klasifikasi M, B, S)",
                   
                    
                ],
            ],
            [
                'title' => "DOKUMEN TENAGA KERJA KONSTRUKS",
                'subMenu' => [
                    "Scan KTP dan NPWP Pengurus Badan Usaha",
                    "NSSK PJTBU dan PJSKBU",
                    "Scan warna KTP tenaga ahli",
                    "Scan warna NPWP tenaga ahli",
                    "Scan warna Ijazah tenaga ahli",
                    
                ],
            ],
            [
                'title' => "DOKUMEN SNM",
                'subMenu' => [
                    "Sertifikat ISO 9001:2015 (Klasifikasi M, B, S)",
                    "Dokumen SMM (Klasifikasi K, M, B, S)",
                    "Dokumen Rencana Mutu Kontrak (Klasifikasi K, M, B, S)",
                    "Surat pernyataan pemenuhan komitmen penyelenggaraan SMM",
                    
                ],
            ],
            [
                'title' => "DOKUMEN SMAP",
                'subMenu' => [
                    "Sertifikat ISO 37001:2016 (klasifikasi K, M, B, S)",
                    "Dokumen SMAP (Klasifikasi K, M, B, S)",
                    "Surat pernyataan pemenuhan komitmen penyelenggaraan SMAP",
                    
                    
                ],
            ],
            
        ],
        'membership_requirements' => [
            "Surat Pengantar pindah domisili dari PERKINDO sebelumnya",
            "Kartu Tanda Anggota sebelumnya",
            "Akta Pendirian / Akta Perubahan Terakhir ( sesuai KBLI 2020 ) SK Kemenhumham",
            "NPWP Perusahaan",
            "NIB (Berbasis Resiko)",
            "Data PJBU (Penanggung Jawab Badan Usaha) melampirkan E-KTP, NPWP, FOTO dan No. HP",
            "Data Pengurus / Pemegang Saham melampirkan E-KTP dan NPWP",
        ],
        'member_info' => [
            "Kelengkapan Lokasi/Tempat Usaha (Tanda & Alamat KTA SESUAI SK)",
            "Akta Pendirian",
            "NIB (Nomor Induk Berusaha)",
            "Data K/L yang menggangu, sesuai ketentuan di dalam undang-undang",
            "Data Pengurus Terlampir dalam bukti KTP dan NPWP",
            "Rekomendasi/sertifikat Kompetensi",
        ],
        ];

        foreach ($data as $type => $value) {
            Layanan::create([
                'type' => $type,
                'data' => $value,
            ]);
        }
    }
}
