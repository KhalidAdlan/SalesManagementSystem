<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

use App\Supplier;

class SuppliersController extends Controller
{
    public function index(){
        abort_unless(\Gate::allows('supplier_access'), 403);

        $suppliers = Supplier::all();

        return view('admin.suppliers.index', compact('suppliers'));
    }
    public function create()
    {
        abort_unless(\Gate::allows('supplier_create'), 403);

        return view('admin.suppliers.create');
    }
    public function store(StoreSupplierRequest $request)
    {
        abort_unless(\Gate::allows('supplier_create'), 403);

        $supplier = Supplier::create($request->all());

        return redirect()->route('admin.suppliers.index');
    }
    public function edit(Supplier $supplier)
    {
        abort_unless(\Gate::allows('supplier_edit'), 403);

        return view('admin.suppliers.edit', compact('supplier'));
    }
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        abort_unless(\Gate::allows('supplier_edit'), 403);

        $supplier->update($request->all());

        return redirect()->route('admin.suppliers.index');
    }
    public function show(Supplier $supplier)
    {
        abort_unless(\Gate::allows('supplier_show'), 403);

        return view('admin.suppliers.show', compact('supplier'));
    }
    public function destroy(Supplier $supplier)
    {
        abort_unless(\Gate::allows('supplier_delete'), 403);

        $supplier->delete();

        return back();
    }
}
