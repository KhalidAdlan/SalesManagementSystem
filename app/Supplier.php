<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'tel_1',
        'tel_2',
        'website',
        'email',
        'address_line_1',
        'address_line_2',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];
}
