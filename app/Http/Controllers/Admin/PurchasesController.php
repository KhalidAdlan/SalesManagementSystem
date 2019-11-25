<?php

namespace App\Http\Controllers\Admin;

use App\Purchase;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Product;


class PurchasesController extends Controller
{
    public function index(){
        abort_unless(\Gate::allows('purchase_access'), 403);

        $purchases = Purchase::all();

        return view('admin.purchases.index', compact('purchases'));
    }
    public function create()
    {
        abort_unless(\Gate::allows('purchase_create'), 403);

        $products = Product::all();

        return view('admin.purchases.create', compact('products'));
    }
    public function store(StorePurchaseRequest $request)
    {
        abort_unless(\Gate::allows('purchase_create'), 403);

        $purchase = Purchase::create($request->all());

        return redirect()->route('admin.purchases.index');
    }
    public function edit(Purchase $purchase)
    {
        abort_unless(\Gate::allows('purchase_edit'), 403);

        return view('admin.purchases.edit', compact('purchase'));
    }
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        abort_unless(\Gate::allows('purchase_edit'), 403);

        $purchase->update($request->all());

        return redirect()->route('admin.purchases.index');
    }
    public function show(Purchase $purchase)
    {
        abort_unless(\Gate::allows('purchase_show'), 403);

        return view('admin.purchases.show', compact('purchase'));
    }
    public function destroy(Purchase $purchase)
    {
        abort_unless(\Gate::allows('purchase_delete'), 403);

        $purchase->delete();

        return back();
    }
}
