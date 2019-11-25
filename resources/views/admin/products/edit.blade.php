@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.product.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.products.update", [$product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
            <label>{{ trans('global.product.fields.image') }}</label><br>
            <div class="card card-body col-md-2">
            <a href="#p{{$product->id}}" class="" data-toggle="modal">
                                <img src="{{$product->image}}" width="80px">
                            </a>
           </div>
            <div class="modal fade bd-example-modal-lg show" id="p{{$product->id}}" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="dynamic-content">
                                            <img src="{{$product->image}}" class="img-fluid" alt="" />
                                        </div>
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