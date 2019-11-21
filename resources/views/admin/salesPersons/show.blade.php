@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.salesPerson.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.salesPerson.fields.fullName') }}
                    </th>
                    <td>
                        {{ $salesPerson->fullName }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.salesPerson.fields.userName') }}
                    </th>
                    <td>
                        {{ $salesPerson->userName }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.salesPerson.fields.area') }}
                    </th>
                    <td>
                        @foreach( $salesPerson->area() as $area)
                         <span class="abel label-info label-many"> {{ $area }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                    {{ trans('global.salesPerson.fields.target') }}

                    </th>
                    <td>
                       {{ $salesPerson->target}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection