@extends('layouts.admin')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-5 card m-1"><a class="p-4" href="{{route('admin.products.index')}}">{{trans('global.product.title')}}</a><span class="badge badge-light">{{$counts['products']}}</span>
</div>
        <div class="col-md-5 card m-1"><a class="p-4" href="{{route('admin.sections.index')}}">{{trans('global.section.title')}}</a><span class="badge badge-light">{{$counts['sections']}}</span>
</div>

    </div>
    <div class="row">
        <div class="col-md-5 card m-1"><a class="p-4" href="{{route('admin.suppliers.index')}}">{{trans('global.supplier.title')}}</a><span class="badge badge-light">{{$counts['suppliers']}}</span>
</div>
        <div class="col-md-5 card m-1"><a class="p-4" href="{{route('admin.suppliers.index')}}">{{trans('global.purchase.title')}}</a><span class="badge badge-light">{{$counts['purchases']}}</span>
</div>

    </div>
</div>



<style>
    .card {
        padding: 70px;
        font-size: 30px;
        box-shadow: 5px 5px 5px #888888;
    }

    .card:hover {

        background-color: rgba(0, 0, 255, 0.01);

    }

    .card>a {
        color: #333333;

        text-align: center;

    }
</style>

@endsection