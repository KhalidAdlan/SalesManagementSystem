@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.product.title_singular') }}
    </div>

    <div class="card-body">
   
        <form action="{{ route("admin.products.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.product.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($product) ? $product->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.product.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('global.product.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($product) ? $product->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.price_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cost_price') ? 'has-error' : '' }}">
                <label for="cost_price">{{ trans('global.product.fields.cost_price') }}</label>
                <input type="number" id="cost_price" name="cost_price" class="form-control" value="{{ old('cost_price', isset($product) ? $product->cost_price : '') }}" step="0.01">
                @if($errors->has('cost_price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('cost_price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.price_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('qty') ? 'has-error' : '' }}">
                <label for="qty">{{ trans('global.product.fields.qty') }}</label>
                <input type="number" id="qty" name="qty" class="form-control" value="{{ old('qty', isset($product) ? $product->qty : '') }}" step="1">
                @if($errors->has('qty'))
                    <em class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.price_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('min_qty') ? 'has-error' : '' }}">
                <label for="min_qty">{{ trans('global.product.fields.min_qty') }}</label>
                <input type="number" id="min_qty" name="min_qty" class="form-control" value="{{ old('min_qty', isset($product) ? $product->min_qty : '') }}" step="1">
                @if($errors->has('min_qty'))
                    <em class="invalid-feedback">
                        {{ $errors->first('min_qty') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.price_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
               <label class="input-group-text" for="inputGroupSelect01">{{ trans('global.section.title_singular')}}</label>
              </div>
                <select class="custom-select" name="section_id" id="inputGroupSelect01">
                   <option selected value="-1">Choose...</option>
                   @foreach ($sections as $section)
                   <option value="{{$section->id}}">{{$section->name}}</option>
                   @endforeach
                </select>
               </div>
            </div>
            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <label for="file">{{ trans('global.product.fields.image') }}
                @if($errors->has('cover_path'))
                   <span class="text-danger">(Required Field)</span>
                @endif
                </label>
                <input type="file" id="file" name="file" class="form-control" value="">
            </div>

            <hr>
            <h2>About the Supplier</h2>
            <ul class="nav nav-tabs" id="supplierTabs" role="tablist">
              <li class="nav-item" id="existingSupplier-tab" data-toggle="tab" href="#existingSupplier" role="tab" aria-controls="existingSupplier" aria-selected="true">
                 <a class="nav-link active" href="#">Existing Supplier</a>
              </li>
              <li class="nav-item" id="newSupplier-tab" data-toggle="tab" href="#newSupplier" role="tab" aria-controls="newSupplier" aria-selected="false">
                 <a class="nav-link" href="#">New Supplier</a>
              </li>
            </ul>
            <div class="tab-content" id="supplierTabsContent">
              <div class="tab-pane fade show active" id="existingSupplier" role="tabpanel" aria-labelledby="existingSupplier-tab">
              <div class="input-group mb-3">
              <div class="input-group-prepend">
               <label class="input-group-text" for="inputGroupSelect01">{{ trans('global.supplier.title')}}</label>
              </div>
                <select class="custom-select" name="supplier_id" id="inputGroupSelect01">
                   <option selected>Choose...</option>
                   @foreach ($suppliers as $supplier)
                   <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                   @endforeach
                </select>
               </div>
              </div>

              <div class="tab-pane fade" id="newSupplier" role="tabpanel" aria-labelledby="newSupplier-tab">

              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="supplier_name">{{ trans('global.supplier.fields.name') }}*</label>
                <input type="text" id="supplier_name" name="supplier_name" class="form-control" value="">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('supplier_tel_1') ? 'has-error' : '' }}">
                <label for="supplier_tel_1">{{ trans('global.supplier.fields.tel_1') }}*</label>
                <input type="text" id="supplier_tel_1" name="supplier_tel_1" class="form-control" value="">
                @if($errors->has('supplier_tel_1'))
                    <em class="invalid-feedback">
                        {{ $errors->first('supplier_tel_1') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('supplier_tel_2') ? 'has-error' : '' }}">
                <label for="supplier_tel_2">{{ trans('global.supplier.fields.tel_2') }}</label>
                <input type="text" id="supplier_tel_2" name="supplier_tel_2" class="form-control" value="">
                @if($errors->has('supplier_tel_2'))
                    <em class="invalid-feedback">
                        {{ $errors->first('supplier_tel_2') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                <label for="supplier_website">{{ trans('global.supplier.fields.website') }}</label>
                <input type="text" id="supplier_website" name="supplier_website" class="form-control" value="">
                @if($errors->has('supplier_website'))
                    <em class="invalid-feedback">
                        {{ $errors->first('supplier_website') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="supplier_email">{{ trans('global.supplier.fields.email') }}</label>
                <input type="text" id="supplier_email" name="supplier_email" class="form-control" value="">
                @if($errors->has('supplier_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('supplier_email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('supplier_address_line_1') ? 'has-error' : '' }}">
                <label for="supplier_address_line_1">{{ trans('global.supplier.fields.address_line_1') }}</label>
                <input type="text" id="supplier_address_line_1" name="supplier_address_line_1" class="form-control" value="">
                @if($errors->has('supplier_address_line_1'))
                    <em class="invalid-feedback">
                        {{ $errors->first('supplier_address_line_1') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('supplier_address_line_2') ? 'has-error' : '' }}">
                <label for="supplier_address_line_2">{{ trans('global.supplier.fields.address_line_2') }}</label>
                <input type="text" id="supplier_address_line_2" name="supplier_address_line_2" class="form-control" value="">
                @if($errors->has('supplier_address_line_2'))
                    <em class="invalid-feedback">
                        {{ $errors->first('supplier_address_line_2') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('supplier_description') ? 'has-error' : '' }}">
                <label for="supplier_description">{{ trans('global.supplier.fields.description') }}</label>
                <textarea id="supplier_description" name="supplier_description" class="form-control "></textarea>
                @if($errors->has('supplier_description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('supplier_description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.description_helper') }}
                </p>
            </div>

              </div>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>




@endsection