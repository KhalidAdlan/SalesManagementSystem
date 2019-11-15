@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.supplier.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.suppliers.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.supplier.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($supplier) ? $supplier->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tel_1') ? 'has-error' : '' }}">
                <label for="tel_1">{{ trans('global.supplier.fields.tel_1') }}*</label>
                <input type="text" id="tel_1" name="tel_1" class="form-control" value="{{ old('tel_1', isset($supplier) ? $supplier->tel_1 : '') }}">
                @if($errors->has('tel_1'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tel_1') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tel_2') ? 'has-error' : '' }}">
                <label for="tel_2">{{ trans('global.supplier.fields.tel_2') }}</label>
                <input type="text" id="tel_2" name="tel_2" class="form-control" value="{{ old('tel_2', isset($supplier) ? $supplier->tel_2 : '') }}">
                @if($errors->has('tel_2'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tel_2') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                <label for="website">{{ trans('global.supplier.fields.website') }}</label>
                <input type="text" id="website" name="website" class="form-control" value="{{ old('website', isset($supplier) ? $supplier->website : '') }}">
                @if($errors->has('website'))
                    <em class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.supplier.fields.email') }}</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($supplier) ? $supplier->email : '') }}">
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address_line_1') ? 'has-error' : '' }}">
                <label for="address_line_1">{{ trans('global.supplier.fields.address_line_1') }}</label>
                <input type="text" id="address_line_1" name="address_line_1" class="form-control" value="{{ old('address_line_1', isset($supplier) ? $supplier->address_line_1 : '') }}">
                @if($errors->has('address_line_1'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address_line_1') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address_line_2') ? 'has-error' : '' }}">
                <label for="address_line_2">{{ trans('global.supplier.fields.address_line_2') }}</label>
                <input type="text" id="address_line_2" name="address_line_2" class="form-control" value="{{ old('address_line_2', isset($supplier) ? $supplier->address_line_2 : '') }}">
                @if($errors->has('address_line_2'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address_line_2') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.supplier.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($supplier) ? $supplier->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.supplier.fields.description_helper') }}
                </p>
            </div>
           
            
           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection