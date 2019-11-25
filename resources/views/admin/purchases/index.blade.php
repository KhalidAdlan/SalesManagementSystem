@extends('layouts.admin')
@section('content')
@can('purchase_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.purchases.create") }}">
                {{ trans('global.add') }} {{ trans('global.purchase.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.purchase.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.purchase.fields.invoice_id') }}
                        </th>
                        <th>
                            {{ trans('global.product.fields.name') }}
                        </th>
                        <th>
                            {{ trans('global.product.fields.qty') }}
                        </th>
                        <th>
                            {{ trans('global.product.fields.cost_price') }}
                        </th>
                        <th>
                            {{ trans('global.purchase.fields.total')}}
                        </th>
                        <th>
                            {{ trans('global.supplier.title_singular')}}
                        </th>
                        <th>
                            {{ trans('global.purchase.fields.created_at') }}
                        </th>
                        
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $key => $purchase)
                        <tr data-entry-id="{{ $purchase->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $purchase->invoice_id ?? '' }}
                            </td>
                            <td>
                                {{ $purchase->product()->name ?? '' }}
                            </td>
                            <td>
                                {{ $purchase->qty}}
                            </td>
                            <td>
                                {{ $purchase->cost_price }} SDG
                            </td>
                            <td>
                                {{ $purchase->cost_price * $purchase->qty }} SDG
                            </td>
                            <td>
                                {{ $purchase->supplier()->name}}
                            </td>
                            <td>
                                {{ $purchase->created_at}}
                            </td>
                            
                            <td>
                                @can('purchase_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.purchases.show', $purchase->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('purchase_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.purchases.edit', $purchase->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('purchase_delete')
                                    <form action="{{ route('admin.purchases.destroy', $purchase->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchases.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('purchase_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection