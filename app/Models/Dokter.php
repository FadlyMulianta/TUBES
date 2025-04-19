<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class Dokter extends Model
{
    use HasFactory;

    // Nama tabel secara eksplisit (karena default-nya pakai jamak: "dokters")
    protected $table = 'dokter';

    // Mass assignable fields
    protected $fillable = [
        'nama_dokter',
        'harga_konsultasi',
        'tahun_pengalaman',
        'kota',
        'rating',
        'spesialisasi',
        'foto',
        'deskripsi',
        'email_dokter',
        'nohp_dokter',
        'status',
    ];

    // Optional: default value fallback (jika ingin saat instance model dibuat)
    protected $attributes = [
        'deskripsi' => 'dokter',
        'rating' => 0,
        'status' => true,
    ];
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($dokter) {
            if ($dokter->foto) {
                $filePath = public_path('storage/' . $dokter->foto);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                    Log::info("File terhapus: " . $filePath);
                } else {
                    Log::warning("File tidak ditemukan: " . $filePath);
                }
            }
        });
    }
}
