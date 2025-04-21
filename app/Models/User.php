<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'id',
        'email',
        'password',
        'nohp',
        'foto',
        'namabelakang',
        'role',
    ];
    // app/Models/User.php

    public function news(): HasMany
    {
        return $this->hasMany(ArticleNews::class);
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            if ($user->foto) {
                $filePath = public_path('storage/' . $user->foto);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                    Log::info("File terhapus: " . $filePath);
                } else {
                    Log::warning("File tidak ditemukan: " . $filePath);
                }
            }
        });
    }

    /**
     * Batasi akses ke Filament hanya untuk role 'admin'
     */
    // public function canAccessFilament(Panel $panel): bool
    // {
    //     return $this->role === 'admin';
    // }

    /**
     * Implementasi metode canAccessPanel untuk FilamentUser
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === 'admin';
    }
}
