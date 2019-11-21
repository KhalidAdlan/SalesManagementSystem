<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesPerson extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fullName',
        'userName',
        'area',
        'target',
        'salary',
        'commissionTargetNotReached',
        'commissionTargetReached',
        'commissionTargetExceeded',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function areaCollection()
    {
       $areas = json_decode($this->area);
       $areaCollection = collect($areas);

       return $areaCollection;
    }

    public function area()
    {
        $areas = json_decode($this->area);
        $areasList = [];

        foreach($areas as $area)
        {
            switch ($area){
                case "1":
                    array_push($areasList, "Bahri");
                break;
                case "2":
                    array_push($areasList, "Khartoum");
                break;
                case "3":
                    array_push($areasList, "Omdurman");
                break;

            }
        }

        return $areasList;
    }
}
