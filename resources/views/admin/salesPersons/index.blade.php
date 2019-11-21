@extends('layouts.admin')
@section('content')
@can('sales_person_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.salesPersons.create") }}">
                {{ trans('global.add') }} {{ trans('global.salesPerson.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.salesPerson.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.salesPerson.fields.fullName') }}
                        </th>
                        <th>
                            {{ trans('global.salesPerson.fields.userName') }}
                        </th>
                        <th>
                            {{ trans('global.salesPerson.fields.area') }}
                        </th>
                        <th>
                            {{ trans('global.salesPerson.fields.target') }}
                        </th>
                        <th>
                            {{ trans('global.salesPerson.fields.salary') }}
                        </th>
                        <th>
                            {{ trans('global.salesPerson.fields.commission_not_reached') }}
                        </th>
                        <th>
                            {{ trans('global.salesPerson.fields.commission_reached') }}
                        </th>
                        <th>
                            {{ trans('global.salesPerson.fields.commission_exceeded') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salesPersons as $salesPerson)
                        <tr data-entry-id="{{ $salesPerson->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salesPerson->fullName ?? '' }}
                            </td>
                            <td>
                                {{ $salesPerson->userName ?? '' }}
                            </td>
                            <td>
                                @foreach($salesPerson->area() as $area)
                            <span class="badge badge-info"> {{ $area ?? '' }}</span>
                               @endforeach
                            </td>
                            <td>
                                {{ $salesPerson->target ?? '' }}
                            </td>
                            <td>
                                {{ $salesPerson->salary ?? '' }}
                            </td>
                            <td>
                                {{ $salesPerson->commissionTargetNotReached ?? '' }}
                            </td>
                            <td>
                                {{ $salesPerson->commissionTargetReached ?? '' }}
                            </td>
                            <td>
                                {{ $salesPerson->commissionTargetExceeded ?? '' }}
                            </td>
                            
                            <td>
                                @can('sales_person_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.salesPersons.show', $salesPerson->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('sales_person_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.salesPersons.edit', $salesPerson->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('sales_person_delete')
                                    <form action="{{ route('admin.salesPersons.destroy', $salesPerson->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.salesPersons.massDestroy') }}",
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
@can('sales_person_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection