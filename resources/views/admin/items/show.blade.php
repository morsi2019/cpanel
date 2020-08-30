@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        عرض صنف
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            #
                        </th>
                        <td>
                            {{ $item->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الإســم
                        </th>
                        <td>
                            {{ $item->item_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الوصف
                        </th>
                        <td>
                            {{ $item->item_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            تاريخ الإنتاج
                        </th>
                        <td>
                            {{ $item->item_issu_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            تاريخ الإنتهاء
                        </th>
                        <td>
                            {{ $item->item_exp_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            بلد الصنع
                        </th>
                        <td>
                            {{ $item->item_country_made }}
                        </td>
                    </tr>
                   
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                <!-- {{ trans('global.back_to_list') }} -->
                الرجوع للقائمة
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection