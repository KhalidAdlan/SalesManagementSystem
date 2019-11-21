@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.customer.title_singular') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.customer.fields.name') }}
                    </th>
                    <td>
                        {{ $customer->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.customer.fields.description') }}
                    </th>
                    <td>
                        {!! $customer->description !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.customer.fields.phone') }}
                    </th>
                    <td>
                         {{ $customer->phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.customer.fields.address') }}
                    </th>
                    <td>
                         {{ $customer->address }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.customer.fields.location') }}
                    </th>
                    <td>
                        
                    </td>
                </tr>
               
            </tbody>
        </table>
    </div>
</div>

@endsection