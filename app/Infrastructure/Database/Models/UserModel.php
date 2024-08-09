<?php

declare(strict_types=1);

namespace App\Infrastructure\Database\Models;

use App\Application\Common\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserModel extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasAdvancedFilter;

    protected $table = 'users';

    protected $orderable = [
        'id',
        'name',
        'email',
        'email_verified_at',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $filterable = [
        'id',
        'name',
        'email',
        'cpf',
        'email_verified_at',
        'roles.title',
    ];
    protected $fillable = [
        'id',
        'name',
        'email',
        'cpf',
        'password',
        'created_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
