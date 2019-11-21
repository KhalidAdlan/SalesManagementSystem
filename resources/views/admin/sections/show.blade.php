@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.section.title_singular') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.section.fields.name') }}
                    </th>
                    <td>
                        {{ $section->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.section.fields.parent') }}
                    </th>
                    <td>
                        @if($section->hasParent())
                          {!! $section->parent()->name !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.section.fields.description') }}
                    </th>
                    <td>
                          {!! $section->description !!}
                        
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.section.fields.childrenNum') }}
                    </th>
                    <td>
                         {{ $section->children()->count() }}
                    </td>
                </tr>
                
               
            </tbody>
        </table>
    </div>
</div>

@endsection