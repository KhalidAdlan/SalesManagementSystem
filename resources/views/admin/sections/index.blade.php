@extends('layouts.admin')
@section('content')
@can('section_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.sections.create") }}">
            {{ trans('global.add') }} {{ trans('global.section.title_singular') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-list-tab" data-toggle="pill" href="#pills-list" role="tab" aria-controls="pills-list" aria-selected="true">{{ trans('global.section.title_singular') }} {{ trans('global.list') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-tree-tab" data-toggle="pill" href="#pills-tree" role="tab" aria-controls="pills-tree" aria-selected="false">{{ trans('global.tree') }}</a>
            </li>
        </ul>

    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('global.section.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('global.section.fields.description') }}
                                </th>
                                <th>
                                    {{ trans('global.section.fields.parent') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sections as $key => $section)
                            <tr data-entry-id="{{ $section->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $section->name ?? '' }}
                                </td>
                                <td>
                                    {{ $section->description ?? '' }}
                                </td>
                                <td>
                                    @if($section->hasParent())
                                      {{ $section->parent()->name}}
                                    @endif
                                      
                                </td>

                                <td>
                                    @can('section_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sections.show', $section->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                    @endcan
                                    @can('section_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sections.edit', $section->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                    @endcan
                                    @can('section_delete')
                                    <form action="{{ route('admin.sections.destroy', $section->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                    @endcan
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-tree" role="tabpanel" aria-labelledby="pills-tree-tab">
          <div class="card-body">
          <div class="col-md-12">
	  					<h3>{{ trans('global.section.title')}} {{ trans('global.tree')}}</h3>
				        <ul id="tree1">
				            @foreach(\App\Section::all()->where('parent_id','=','-1') as $section)
				                <li>
				                    <a> {{ $section->name }} </a><span class="m-2 badge badge-dark">{{$section->children()->count()}}</span><a href="{{ route('admin.sections.show', $section->id) }}"><i class="fa fa-eye p-2" aria-hidden="true"></i></a>
				                    @if($section->hasChildren())
				                        @include('admin.sections.child',['childs' => $section->children])
				                    @endif
				                </li>
				            @endforeach
				        </ul>
	  	  </div>
        </div>
        </div>
    </div>
    

</div>
@section('scripts')
@parent

<style>
    .tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative
}
.tree ul ul {
    margin-left:.5em
}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0 1em;
    line-height:2em;
    color:#369;
    font-weight:700;
    position:relative
}
.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:-1px;
    position:absolute;
    top:1em;
    left:0
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
}
.tree li a {
    text-decoration: none;
    color:#369;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
}
</style>
<script>
    $.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        /* initialize each of the top levels */
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this);
            branch.prepend("");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        /* fire event from the dynamically added icon */
        tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        /* fire event to open branch if the li contains an anchor instead of text */
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        /* fire event to open branch if the li contains a button instead of text */
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});
/* Initialization of treeviews */
$('#tree1').treed();
    </script>
<script>
    $(function() {
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.sections.massDestroy') }}",
            className: 'btn-danger',
            action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function(entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected') }}')

                    return
                }

                if (confirm('{{ trans('global.areYouSure') }}')) {
                    $.ajax({
                            headers: {
                                'x-csrf-token': _token
                            },
                            method: 'POST',
                            url: config.url,
                            data: {
                                ids: ids,
                                _method: 'DELETE'
                            }
                        })
                        .done(function() {
                            location.reload()
                        })
                }
            }
        }
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('section_delete')
        dtButtons.push(deleteButton)
        @endcan

        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
    })
</script>


@endsection
@endsection