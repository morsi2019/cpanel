@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        عرض دولة
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
                            {{ $country->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الإســم
                        </th>
                        <td>
                            {{ $country->country_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            كود الدولة
                        </th>
                        <td>
                            {{ $country->country_code }}
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