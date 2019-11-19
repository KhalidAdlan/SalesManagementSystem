<?php

namespace App\Http\Controllers\Admin;
use App\Supplier;
use App\Product;
use App\Purchase;
use App\Section;

class HomeController
{
    public function index()
    {
        return view('home');
    }


    public function inventory()
    {
        $counts = [
            'suppliers' => Supplier::all()->count(),
            'products' => Product::all()->count(),
            'purchases' => Purchase::all()->count(),
            'sections' => Section::all()->count(),


        ];

        return view('admin.dashboards.inventory', compact('counts'));
    }
}
