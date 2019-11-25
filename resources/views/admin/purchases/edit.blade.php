@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.customer.title_singular') }}
    </div>

    <div class="card-body">
       <form action="{{ route("admin.customers.update", [$customer->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.customer.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($customer) ? $customer->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.customer.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('global.customer.fields.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($customer) ? $customer->phone : '') }}">
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.customer.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('global.customer.fields.address') }}</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($customer) ? $customer->address : '') }}">
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.customer.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.customer.fields.description') }}</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($customer) ? $customer->description : '') }}">
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.customer.fields.name_helper') }}
                </p>
            </div>
            
            
            
           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection