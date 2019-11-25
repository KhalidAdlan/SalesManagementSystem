<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'product_id',
        'cost_price',
        'supplier_id',
        'invoice_id',
        'qty',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];


    public function product(){
        return $this->belongsTo('App\Product')->get()[0];
    }

    public function supplier(){
        return $this->belongsTo('App\Supplier')->get()[0];
    }
}
