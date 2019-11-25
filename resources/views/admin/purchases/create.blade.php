@extends('layouts.admin')
@section('content')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.purchase.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.purchases.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>{{ trans('global.product.title_singular') }}</th>
                        <th></th>

                        <th>{{ trans('global.product.fields.cost_price') }}</th>

                        <th>{{ trans('global.product.fields.qty') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="product0">
                        <td>
                            <select name="products[]" class="form-control">
                                <option value="-1">-- choose product --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }} (${{ number_format($product->price, 2) }})
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                        <td>
                        <input type="number" name="prices[]" class="form-control price" value="0" /> 

                        </td>
                        <td>
                            <input type="number" name="quantities[]" class="form-control" value="1" />
                        </td>
                    </tr>
                    <tr id="product1"></tr>
                    <tr id="product2"></tr>
                    <tr id="product3"></tr>
                    <tr id="product4"></tr>
                    <tr id="product5"></tr>
                    <tr id="product6"></tr>
                    <tr id="product7"></tr>
                    <tr id="product8"></tr>
                    <tr id="product9"></tr>
                    <tr id="product10"></tr>
                    <tr id="product11"></tr>
                    <tr id="product12"></tr>
                    <tr id="product13"></tr>
                    <tr id="product14"></tr>
                    <tr id="product15"></tr>
                    <tr id="product16"></tr>
                    <tr id="product17"></tr>
                    <tr id="product18"></tr>
                    <tr id="product19"></tr>
                    <tr id="product20"></tr>
                    <tr id="product21"></tr>

                </tbody>
                <hr>
                <input id="sub-total" type="number" value="0" />
            </table>

            <div class="row">
                <div class="col-md-12">
                    <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                    <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                </div>
            </div>
        </div>
            
           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>






<script>
    var total = 0;
    var price = 0;
    var qty = 0;

 $(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('');
    /*  $("#products_table tr").each(function () {
$('td', this).each(function () {
    var p = $(this).find("input.price").val();
    var q = $(this).find("input.qty").val();
    if(p)
    {
       price = p;
    }
    if(q)
    {
        qty = q;
    }
    

   
 });
 total = total + eval(price) * eval(qty);


})
console.log(total);
   */   
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>

@endsection