@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.supplier.title_singular') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.supplier.fields.name') }}
                    </th>
                    <td>
                        {{ $supplier->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.supplier.fields.description') }}
                    </th>
                    <td>
                        {!! $supplier->description !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.supplier.fields.tel_1') }}
                    </th>
                    <td>
                         {{ $supplier->tel_1 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.supplier.fields.tel_2') }}
                    </th>
                    <td>
                         {{ $supplier->tel_2 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.supplier.fields.email') }}
                    </th>
                    <td>
                         {{ $supplier->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.supplier.fields.website') }}
                    </th>
                    <td>
                         <a href="{{ $supplier->website }}" target="_blank">{{ $supplier->website }}</a>
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.supplier.fields.address_line_1') }}
                    </th>
                    <td>
                         {{ $supplier->address_line_1 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.supplier.fields.address_line_2') }}
                    </th>
                    <td>
                         {{ $supplier->address_line_2 }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection