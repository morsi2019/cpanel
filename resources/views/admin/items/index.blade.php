@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.items.create") }}">
                إضافة جديد
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        قائمة الأصناف
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            #
                        </th>

                        <th>
                            فئة التصنيف
                        </th>


                        <th>
                            إسم الصنف
                        </th>
                        <th>
                            الوصف
                        </th>
                        <th>
                            تاريخ الصنع
                        </th>
                        <th>
                            تاريخ انتهاء الصلاحية
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $key => $item)
                        <tr data-entry-id="{{ $item->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $item->id ?? '' }}
                            </td>

                            <td>
                                {{ $item->item_category->item_cat_name ?? '' }}
                            </td>

                            <td>
                                {{ $item->item_name ?? '' }}
                            </td>
                            <td>
                                {{ $item->item_description ?? '' }}
                            </td>
                            <td>
                                {{ $item->item_issu_date ?? '' }}
                            </td>

                            <td>
                                {{ $item->item_exp_date ?? '' }}
                            </td>

                            <td>
                                    <!-- <a class="btn btn-xs btn-primary" href="{{ route('admin.items.show', $item->id) }}">
                                        عرض
                                    </a> -->

                                    <a class="btn btn-xs btn-info" href="{{ route('admin.items.edit', $item->id) }}">
                                        تعديل
                                    </a>

                                    <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="حذف">
                                    </form>

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
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.items.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection