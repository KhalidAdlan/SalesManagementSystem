@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.salesPerson.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.salesPersons.update", [$salesPerson->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('fullName') ? 'has-error' : '' }}">
                <label for="fullName">{{ trans('global.salesPerson.fields.fullName') }}*</label>
                <input type="text" id="fullName" name="fullName" class="form-control" value="{{ old('fullName', isset($salesPerson) ? $salesPerson->fullName : '') }}">
                @if($errors->has('fullName'))
                    <em class="invalid-feedback">
                        {{ $errors->first('fullName') }}
                    </em>
                @endif
                <p class="helper-block">
                </p>
            </div>
            <div class="form-group {{ $errors->has('userName') ? 'has-error' : '' }}">
                <label for="userName">{{ trans('global.salesPerson.fields.userName') }}*</label>
                <input type="name" id="userName" name="userName" class="form-control" value="{{ old('userName', isset($salesPerson) ? $salesPerson->userName : '') }}">
                @if($errors->has('userName'))
                    <em class="invalid-feedback">
                        {{ $errors->first('userName') }}
                    </em>
                @endif
                <p class="helper-block">
                </p>
            </div>
            <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                <label for="area">{{ trans('global.salesPerson.fields.area') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="area[]" id="area" class="form-control select2" multiple="multiple">
                    @foreach($areas as $id => $area)
                        <option value="{{ $id }}" {{ (in_array($id, old('area', [])) || isset($salesPerson) && $salesPerson->areaCollection()->contains($id)) ? 'selected' : '' }}>
                            {{ $area }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('area'))
                    <em class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </em>
                @endif
                <p class="helper-block">
                </p>
            </div>
            <div class="form-group {{ $errors->has('target') ? 'has-error' : '' }}">
                <label for="target">{{ trans('global.salesPerson.fields.target') }}</label>
                <input type="number" id="target" value="{{ old('target', isset($salesPerson) ? $salesPerson->target : '') }}" name="target" class="form-control" step="0.01">
                @if($errors->has('target'))
                    <em class="invalid-feedback">
                        {{ $errors->first('target') }}
                    </em>
                @endif
                <p class="helper-block">
                </p>
            </div>
            <div class="form-group {{ $errors->has('salary') ? 'has-error' : '' }}">
                <label for="salary">{{ trans('global.salesPerson.fields.salary') }}</label>
                <input type="number" value="{{ old('salary', isset($salesPerson) ? $salesPerson->salary : '') }}" id="salary" name="salary" class="form-control" step="0.01">
                @if($errors->has('salary'))
                    <em class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </em>
                @endif
                <p class="helper-block">
                </p>
            </div>
            <div class="form-group {{ $errors->has('commissionTargetNotReached') ? 'has-error' : '' }}">
                <label for="commissionTargetNotReached">{{ trans('global.salesPerson.fields.commission_not_reached') }}</label>
                <input type="number" value="{{ old('commissionTargetNotReached', isset($salesPerson) ? $salesPerson->commissionTargetNotReached : '') }}" id="commissionTargetNotReached" name="commissionTargetNotReached" class="form-control" step="0.01">
                @if($errors->has('commissionTargetNotReached'))
                    <em class="invalid-feedback">
                        {{ $errors->first('commissionTargetNotReached') }}
                    </em>
                @endif
                <p class="helper-block">
                </p>
            </div>
            <div class="form-group {{ $errors->has('commissionTargetReached') ? 'has-error' : '' }}">
                <label for="commissionTargetReached">{{ trans('global.salesPerson.fields.commission_reached') }}</label>
                <input type="number" value="{{ old('commissionTargetReached', isset($salesPerson) ? $salesPerson->commissionTargetReached : '') }}" id="commissionTargetReached" name="commissionTargetReached" class="form-control" step="0.01">
                @if($errors->has('commissionTargetReached'))
                    <em class="invalid-feedback">
                        {{ $errors->first('commissionTargetReached') }}
                    </em>
                @endif
                <p class="helper-block">
                </p>
            </div>
            <div class="form-group {{ $errors->has('commissionTargetExceeded') ? 'has-error' : '' }}">
                <label for="commissionTargetExceeded">{{ trans('global.salesPerson.fields.commission_exceeded') }}</label>
                <input type="number" value="{{ old('commissionTargetExceeded', isset($salesPerson) ? $salesPerson->commissionTargetExceeded : '') }}" id="commissionTargetExceeded" name="commissionTargetExceeded" class="form-control" step="0.01">
                @if($errors->has('commissionTargetExceeded'))
                    <em class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </em>
                @endif
                <p class="helper-block">
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection