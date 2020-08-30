@extends('layouts.main')

@section('content')

<div class="main-content">

    @foreach($orders as  $order)




    <div class="row">
        <div class="container">
            <div class=" col offer">
                <div class=" text-right ">
                    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                    <div class="card-body">
                        <h5 class="card-title">الطلب رقم ({{$order->id}}) </h5>
                        <div class="row">
                        <div class="col-sm-7">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">رقم</th>
                                <th scope="col">السلع</th>
                                <th scope="col">وحدة الكمية</th>
                                <th scope="col">الكمية</th>
                                <th scope="col">جهات الشحن</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($order->items as $item)

                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->item_name}}</td>
                                    <td>{{$item->pivot->unit}}</td>
                                    <td>{{$item->pivot->quantity}}</td>
                                    <td>{{$order->city}}</td>
                                    </tr>

                            @endforeach

                            </tbody>
                            </table>
                            @if($order->shareable==1)
                            <a href="{{url('/order/share/'.$order->id)}}" class="btn btn-primary btn-sm "  id="share-order" disabled="true"  >شارك بالطلب</a>
                            @else
                            <a href="#" class="btn btn-warning btn-sm disabled  " style="cursor: no-drop"  id="share-order" disabled="true"  >غير قابل للمشاركة</a>
                            @endif
                            <a href="/offer/create" class="btn btn-success btn-sm">اضف عرضك</a>
                            <a href="/make_bid" class="btn btn-success btn-sm">اضف عرض سعر</a>
                            <a href="/offer/create" class="btn btn-info btn-sm" data-toggle="modal" data-target="#offer-modal">تفاصيل الطلب </a>

                            <ul style="float:left;">
                            <li>نشر منذ {{$order->updated_at->diffInHours($now)}} ساعات</li>
                            <li>متوسط العروض ()</li>
                            </ul>

                            </div>
                            <div class="col-sm-5">

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Modal -->
<div class="modal fade" id="share-order-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header  ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <div class=" bg-white modal-title m-auto ">
                    انشاء طلب جديد
                </div>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/add_order']) !!}


                <table class="card-table table-bordered table" >
                    <thead class="bg-info">
                    <tr>
                        <th scope="col" class="w-20">اسم الصنف</th>
                        <th scope="col">الوصف</th>
                        <th scope="col" class="w-15">وحدة الكمية</th>
                        <th scope="col" class="w-10">الكمية</th>
                    </tr>
                    </thead>
                    <tbody class="order-table-body">
                    <tr>
                        <td>

                            <input class="form-control order-input " type="text" placeholder="سم الصنف" name="name[]">
                        </td>
                        <td><input class="form-control order-input" type="text" disabled name="description[]"></td>
                        <td >
                            <select class="form-control order-input" name="unit[]">
                                <option value="piece">قطعة</option>
                                <option value="box">علبة</option>
                                <option value="carton">كرتون</option>
                            </select>
                        </td>
                        <td><input class="form-control order-input" type="text" placeholder="000" name="quantity[]"></td>

                    </tr>
                    <tr>
                        <td>

                            <input class="form-control order-input " type="text" placeholder="سم الصنف" name="name[]">
                        </td>
                        <td><input class="form-control order-input" type="text" name="description[]"></td>
                        <td ><select class="form-control order-input" name="unit[]">
                                <option value="piece">قطعة</option>
                                <option value="box">علبة</option>
                                <option value="carton">كرتون</option>
                            </select></td>
                        <td><input class="form-control order-input" type="number" min="0" placeholder="000" name="quantity[]"></td>

                    </tr>
                    <<tr>
                        <td>

                            <input class="form-control order-input " type="text" placeholder="سم الصنف" name="name[]">
                        </td>
                        <td><input class="form-control order-input" type="text" name="description[]"></td>
                        <td ><select class="form-control order-input" name="unit[]">
                                <option value="piece">قطعة</option>
                                <option value="box">علبة</option>
                                <option value="carton">كرتون</option>
                            </select></td>
                        <td><input class="form-control order-input" type="text" placeholder="000" name="quantity[]"></td>

                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer ">
                <div class="card-footer bg-white ml-auto ">
                    <div class="row">
                        <i class="fas fa-plus btn btn-info  add-row  text-light bg-info p-4 rounded-circle  border-0 "></i>

                    </div>
                    <div class="row m-2">
                        <div class="col-md-2">المنشاة</div>
                        <div class="col-md-4"><input class="form-control order-input" type="text" name="enterprise"></div>

                        <div class="col-md-2">االهاتف</div>
                        <div class="col-md-4"><input class="form-control order-input" type="text" name="phone"></div>                </div>
                </div>
                <div class="row m-2 ">
                    <div class="col-md-2">الدولة</div>
                    <div class="col-md-2"><input class="form-control order-input" type="text" name="country"></div>

                    <div class="col-md-2">المدينة </div>
                    <div class="col-md-2"><input class="form-control order-input" type="text" name="city"></div>
                    <div class="col-md-2">الشارع </div>
                    <div class="col-md-2"><input class="form-control order-input" type="text" name="street"></div>
                </div>
                <div class="row ml-auto ">

                    <input class=" m-2 " type="checkbox" name="approved">
                    <label>اوافق على شروط الطلب</label>


                </div>
                <div class="row  m-4 col-md-3 ">
                    <button class="btn btn-primary col-md-12 p-2  " type="submit">حفظ</button>


                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

