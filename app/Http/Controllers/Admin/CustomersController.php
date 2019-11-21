<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Customer;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(){
        abort_unless(\Gate::allows('customer_access'), 403);

        $customers = Customer::all();

        return view('admin.customers.index', compact('customers'));
    }
    public function create()
    {
        abort_unless(\Gate::allows('customer_create'), 403);

        return view('admin.customers.create');
    }
    public function store(StoreCustomerRequest $request)
    {
        abort_unless(\Gate::allows('customer_create'), 403);

        $customer = Customer::create($request->all());

        return redirect()->route('admin.customers.index');
    }
    public function edit(Customer $customer)
    {
        abort_unless(\Gate::allows('customer_edit'), 403);

        return view('admin.customers.edit', compact('customer'));
    }
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        abort_unless(\Gate::allows('customer_edit'), 403);

        $customer->update($request->all());

        return redirect()->route('admin.customers.index');
    }
    public function show(Customer $customer)
    {
        abort_unless(\Gate::allows('customer_show'), 403);

        return view('admin.customers.show', compact('customer'));
    }
    public function destroy(Customer $customer)
    {
        abort_unless(\Gate::allows('customer_delete'), 403);

        $customer->delete();

        return back();
    }
}
