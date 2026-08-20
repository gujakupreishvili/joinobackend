<?php

declare(strict_types=1);

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

#[Fillable(['company_name', 'email', 'password', 'avatar'])]
#[Hidden(['password', 'remember_token'])]
class Company extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;

    protected function avatarUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->avatar ? asset('storage/' . $this->avatar) : null,
        );
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}