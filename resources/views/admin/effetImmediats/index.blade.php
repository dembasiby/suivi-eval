@extends('layouts.admin')
@section('content')
@can('effet_immediat_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.effet-immediats.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.effetImmediat.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.effetImmediat.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-EffetImmediat">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.effetImmediat.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.effetImmediat.fields.code_effet_immediat') }}
                        </th>
                        <th>
                            {{ trans('cruds.effetImmediat.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.effetImmediat.fields.effet_intermediaire') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($effetImmediats as $key => $effetImmediat)
                        <tr data-entry-id="{{ $effetImmediat->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $effetImmediat->id ?? '' }}
                            </td>
                            <td>
                                {{ $effetImmediat->code_effet_immediat ?? '' }}
                            </td>
                            <td>
                                {{ $effetImmediat->description ?? '' }}
                            </td>
                            <td>
                                {{ $effetImmediat->effet_intermediaire->description ?? '' }}
                            </td>
                            <td>
                                @can('effet_immediat_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.effet-immediats.show', $effetImmediat->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('effet_immediat_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.effet-immediats.edit', $effetImmediat->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('effet_immediat_delete')
                                    <form action="{{ route('admin.effet-immediats.destroy', $effetImmediat->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('effet_immediat_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.effet-immediats.massDestroy') }}",
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
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-EffetImmediat:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection