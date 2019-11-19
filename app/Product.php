<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'price',
        'qty',
        'min_qty',
        'section_id',
        'image',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];


    public function section()
    {
        return belongsTo('App\Section');
    }
}
