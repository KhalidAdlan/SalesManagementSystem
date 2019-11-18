<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\Supplier;
use App\Purchase;
use Illuminate\Http\Request;
use Validator;


class ProductsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('product_access'), 403);

        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
    
        abort_unless(\Gate::allows('product_create'), 403);
        $suppliers = Supplier::all();

        return view('admin.products.create', compact('suppliers'));
    }

    public function upload(Request $request)
    {
       // dd($request->all());

        $rules = array(
            'file'  => 'required'
           );
      // dd($request->file);
           $request->validate($rules);

           $fileName = time().'.'.$request->file->extension();  
   
           $request->file->move(public_path('images'), $fileName);

              return '/images/'.$fileName;

      
    }


    public function store(StoreProductRequest $request)
    {
      
        abort_unless(\Gate::allows('product_create'), 403);

       $product = null;
       
        try{
            $output = $this->upload($request);
            //dd($output);
            $newProduct = [
                'name' => $request->all()['name'],
                'description' => $request->all()['description'],
                'qty' => $request->all()['qty'],
                'min_qty' => $request->all()['min_qty'],
                'price' => $request->all()['price'],
                'image' => $output,
     
            ];

            $product = Product::create($newProduct);

        }
        catch(\Exception $e)
        {
            //dd($e);

            $newProduct = [
                'name' => $request->all()['name'],
                'description' => $request->all()['description'],
                'qty' => $request->all()['qty'],
                'min_qty' => $request->all()['min_qty'],
                'price' => $request->all()['price'],
                'image' => null,
     
            ];
           
            $product = Product::create($newProduct);

        }


 
        $newSupplier = [
            'name' => $request->all()['supplier_name'],
            'tel_1' => $request->all()['supplier_tel_1'],
            'tel_2' => $request->all()['supplier_tel_2'],
            'website' => $request->all()['supplier_website'],
            'email' => $request->all()['supplier_email'],
            'address_line_1' => $request->all()['supplier_address_line_1'],
            'address_line_2' => $request->all()['supplier_address_line_2'],
            'description' => $request->all()['supplier_description'],

        ];

        try{
            $supplier = Supplier::find($request->all()['supplier_id']);
            $newPurchase = [
                'cost_price' => $request->all()['cost_price'],
                'qty' => $request->all()['qty'],
                'product_id' => $product->id,
                'supplier_id' => $supplier->id
            ];

            Purchase::create($newPurchase);
            return redirect()->route('admin.products.index');

        }
        catch (\Exception $e)
        {
            $supplier = Supplier::create($newSupplier);
            $newPurchase = [
                'cost_price' => $request->all()['cost_price'],
                'qty' => $request->all()['qty'],
                'product_id' => $product->id,
                'supplier_id' => $supplier->id
            ];

            Purchase::create($newPurchase);
            return redirect()->route('admin.products.index');

        }

       

        
    }

    public function edit(Product $product)
    {
        abort_unless(\Gate::allows('product_edit'), 403);

        return view('admin.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        abort_unless(\Gate::allows('product_edit'), 403);

        $product->update($request->all());

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_unless(\Gate::allows('product_show'), 403);

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_unless(\Gate::allows('product_delete'), 403);

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
