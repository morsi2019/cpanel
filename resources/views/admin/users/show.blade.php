@extends('layouts.admin')
@section('content')


<div class="card">
    <div class="card-header">
        تفاصيل بيانات المستخدم 
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <!-- <th>
                            رقم المستخدم
                        </th>
                        <td>
                            {{ $user->id }}
                        </td> -->
                   
                        <th>
                            إسم المستخدم
                        </th>
                        <td>
                            {{ $user->name ??'' }}
                        </td>
                  
                        <th>
                            البريد الإلكتروني
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                 
                        <th>
                            رقم الهاتف
                        </th>
                        <td>
                            {{ $user->phone ??'' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                           الدولة
                        </th>
                        <td>
                            {{ $user->country->country_name ??'' }}
                        </td>
                   
                        <th>
                           المدينة
                        </th>
                        <td>
                            {{ $user->city->city_name ??'' }}
                        </td>

                        <th>
                           العنوان
                        </th>
                        <td>
                            {{ $user->address ??'' }}
                        </td>

                    </tr>

                    
                </tbody>
            </table>

          
            <BR/>
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