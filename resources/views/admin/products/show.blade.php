@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.product.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.product.fields.name') }}
                    </th>
                    <td>
                        {{ $product->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.description') }}
                    </th>
                    <td>
                        {!! $product->description !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.price') }}
                    </th>
                    <td>
                        {{ $product->price }} SDG
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.qty') }}
                    </th>
                    @if($product->min_qty >= $product->qty)
                    <td style="background-color:orange">
                        {{ $product->qty }} 
                    </td>
                    @else
                    <td style="background-color:aqua">
                        {{ $product->qty }}
                    </td>
                    @endif
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.min_qty') }}
                    </th>
                    <td>
                        {{ $product->min_qty }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection