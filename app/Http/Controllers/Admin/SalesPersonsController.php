<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SalesPerson;
use App\Http\Requests\StoreSalesPersonRequest;
use App\Http\Requests\UpdateSalesPersonRequest;


class SalesPersonsController extends Controller
{
    public function index(){
        abort_unless(\Gate::allows('sales_person_access'), 403);

        $salesPersons = SalesPerson::all();

        return view('admin.salesPersons.index', compact('salesPersons'));
    }
    public function create()
    {
        abort_unless(\Gate::allows('sales_person_create'), 403);

        $areas = [
            "1" => "Bahri",
            "2" => "Khartoum",
            "3" => "Omdurman",
            
        ];
        $salesPersons = SalesPerson::all();

        return view('admin.salesPersons.create', ['salesPersons' => $salesPersons, 'areas' => $areas]);
    }
    public function store(StoreSalesPersonRequest $request)
    {
        abort_unless(\Gate::allows('sales_person_create'), 403);
        
        $newSalesPerson = [
            "fullName" => $request->all()['fullName'],
            "userName" => $request->all()['userName'],
            "area" => json_encode($request->all()['area']),
            "target" => $request->all()['target'],
            "salary" => $request->all()['salary'],
            "commissionTargetNotReached" => $request->all()['commissionTargetNotReached'],
            "commissionTargetReached" => $request->all()['commissionTargetReached'],
            "commissionTargetExceeded" => $request->all()['commissionTargetExceeded']
        ];
        $salesPerson = SalesPerson::create($newSalesPerson);
       
        // $appUser = [
        //         "username"        => $salesPerson->userName,
       //          "password"        => bcrypt($salesPerson->userName . $salesPerson->id),
       //          "sales_person_id" => $salesPerson->id,
       //          "type"            => "SalesPerson"
       //              ];
      //  AppUser::create($appUser); 


       $salesPersons = SalesPerson::all();


        return redirect()->route('admin.salesPersons.index', compact('salesPersons'));
    }
    public function edit(SalesPerson $salesPerson)
    {
        abort_unless(\Gate::allows('sales_person_edit'), 403);

        $areas = [
            "1" => "Bahri",
            "2" => "Khartoum",
            "3" => "Omdurman",
            
        ];

        return view('admin.salesPersons.edit', ['salesPerson'=> $salesPerson, 'areas' =>$areas]);
    }
    public function update(UpdateSalesPersonRequest $request, SalesPerson $salesPerson)
    {
        abort_unless(\Gate::allows('sales_person_edit'), 403);
        $newSalesPerson = [
            "fullName" => $request->all()['fullName'],
            "userName" => $request->all()['userName'],
            "area" => json_encode($request->all()['area']),
            "target" => $request->all()['target'],
            "salary" => $request->all()['salary'],
            "commissionTargetNotReached" => $request->all()['commissionTargetNotReached'],
            "commissionTargetReached" => $request->all()['commissionTargetReached'],
            "commissionTargetExceeded" => $request->all()['commissionTargetExceeded']
        ];

        $salesPerson->update($newSalesPerson);

        return redirect()->route('admin.salesPersons.index');
    }
    public function show(SalesPerson $salesPerson)
    {
        abort_unless(\Gate::allows('sales_person_show'), 403);

        return view('admin.salesPersons.show', compact('salesPerson'));
    }
    public function destroy(SalesPerson $salesPerson)
    {
        abort_unless(\Gate::allows('sales_person_delete'), 403);

        $salesPerson->delete();

        return back();
    }
}
