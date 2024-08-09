<?php

declare(strict_types=1);

namespace App\Infrastructure\Database\Models;

use App\Common\Infrastructure\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PlaceModel extends Model
{
    use HasFactory;
    use Notifiable;
    use HasAdvancedFilter;

    protected $table = 'places';

    protected $orderable = [
        'id',
        'name',
        'slug',
        'city',
        'state',
        'created_at',
        'updated_at',
    ];

    protected $filterable = [
        'id',
        'name',
        'slug',
        'city',
        'state',
        'created_at',
        'updated_at',
    ];
    protected $fillable = ['name', 'slug', 'city', 'state'];
}
