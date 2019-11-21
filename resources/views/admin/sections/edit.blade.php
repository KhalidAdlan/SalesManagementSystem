@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.section.title_singular') }}
    </div>

    <div class="card-body">
       <form action="{{ route("admin.sections.update", [$section->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($section) ? $section->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.section.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
               <label class="input-group-text" for="inputGroupSelect01">{{ trans('global.section.fields.parent')}}</label>
              </div>
                <select class="custom-select" name="parent_id" id="inputGroupSelect01">
                   <option  value="-1" selected>Choose...</option>
                   @foreach ($sections as $sec)
                      @if($section->parent_id == $sec->id)
                       <option value="{{$sec->id}}" selected>{{$sec->name}}</option>
                      @else
                      <option value="{{$sec->id}}" >{{$sec->name}}</option>
                      @endif

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