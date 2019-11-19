@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.section.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.sections.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.section.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($section) ? $section->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.section.fields.name_helper') }}
                </p>
            </div>
           
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.section.fields.description') }}</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($section) ? $section->description : '') }}">
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.section.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
               <label class="input-group-text" for="inputGroupSelect01">{{ trans('global.section.fields.parent')}}</label>
              </div>
                <select class="custom-select" name="parent_id" id="inputGroupSelect01">
                   <option selected value="-1">Choose...</option>
                   @foreach ($sections as $section)
                   <option value="{{$section->id}}">{{$section->name}}</option>
                   @endforeach
                </select>
               </div>
            </div>

           
            
           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection