<!doctype html>
<html lang="ar" dir="rtl" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/order.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <title> لوحــة التحكم </title>
</head>
<body >

<header class=>
    <div class="row h-100 ">
        <div class="logo col-lg-2 h-100 py-3 ">
            <div class="container ">
                <img src="images/WhatsApp%20Image%202020-06-21%20at%206.43.39%20PM.png" alt="logo" class="img-fluid" >
            </div>
        </div>
        <div class="upper-menu col-lg-10 col-12 py-3 py-lg-0 ">
            <div class="container-fluid row h-100 justify-content-between align-items-center">

                <div class=" col text-right">
                    <img src="images/humburgermenu.svg" class="hamburger-icon  d-inline-block d-lg-none"/>

                    <h3 class="text-muted  mr-4 d-none d-md-inline">حسابي</h3>
                </div>
                <div class=" col d-flex justify-content-end  align-items-center text-left">
                    <a href="" class=""><i class="far fa-envelope text-info ml-3 " aria-hidden="true"></i></a>
                    <a href="" class="mr-md-3 mr-2 position-relative" ><i class="far fa-bell text-info"></i><span class="dot">&nbsp;</span></a>


                    @if(Auth::user()->role == 2):    
                        <div class="dropdown">
                            <button class="btn btn-info rounded-pill d-none d-md-inline-flex align-items-center mr-md-5 py-2 mr-3 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                اضافة طلب
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_order_modal">طلب شراء منتجات</a>
                                <a class="dropdown-item" href="#">طلب خدمات</a>
                            </div>
                        </div>
                    @endif        


                </div>
            </div>
        </div>
    </div>
</header>
<!-- Modal -->
<div class="modal fade" id="add_order_modal" role="dialog">
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

                            <input class="form-control order-input " list="items"  placeholder="سم الصنف" name="name[]">
                            <datalist id="items">

                                @foreach($items as $item )
                                    <option value="{{$item->item_name}}" class="form-control" ></option>
                                @endforeach

                            </datalist>
                        </td>
                        <td><input class="form-control order-input" type="text" name="description[]"></td>
                        <td >
                            <select class="form-control order-input" name="unit[]">
                                <option value="piece">قطعة</option>
                                <option value="box">علبة</option>
                                <option value="carton">كرتون</option>
                            </select>
                        </td>
                        <td><input class="form-control order-input" type="text" placeholder="000" name="quantity[]"></td>

                    </tr>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer ">
                <div class="card-footer bg-white ml-auto ">
                    <div class="row">
                        <i class="fas fa-plus btn btn-info  add-row  text-light bg-info p-4 rounded-circle  border-0 "></i>
                        <i class="fa fa-remove btn btn-danger  remove-row d-none mr-2  text-light bg-danger p-4 rounded-circle  border-0 "></i>

                    </div>
                    <div class="row m-2">
                        <div class="col-md-2">المنشاة</div>
                        <div class="col-md-4"><input class="form-control order-input" type="text" name="enterprise"></div>

                        <div class="col-md-2">االهاتف</div>
                        <div class="col-md-4">
                            <input class="form-control order-input" type="text" name="phone"></div>                </div>
                </div>
                <div class="row m-2 ">
                    <div class="col-md-2">الدولة</div>

                    <div class="col-md-2">
                        <select class="form-control order-input" name="country">
                            @foreach($countries as $country )
                            <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                            @endforeach
                        </select>
                      </div>

                    <div class="col-md-2">المدينة </div>
                    <div class="col-md-2"><input class="form-control order-input" type="text" name="city"></div>
                    <div class="col-md-2">الشارع </div>
                    <div class="col-md-2"><input class="form-control order-input" type="text" name="street"></div>
                </div>
                <div class="row ml-auto ">

                    <input class=" m-2 " type="checkbox" name="shareable">
                    <label>اهل تسمح بمشاركة طلبك مع الاخرين</label>


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
</div>
</div>
<main class=" ">

    <div class="row min-vh-100">

        <div id="sidebar" class="col-lg-2 ">

            <div class="">
                <a href="{{url('my_profile')}}" role="button" class="btn  rounded-pill text-light d-flex flex-row align-items-center justify-content-start"><i class="far fa-user align-self-center ml-2 " ></i><span class="align-self-start">حسابي</span></a>
                @if(Auth::user()->role != 3):
                <a href="{{url('offer')}}" role="button" class="btn  rounded-pill text-light d-flex flex-row align-items-center justify-content-start"><i class="far fa-list-alt align-self-center ml-2 " ></i><span class="align-self-start"> العروض </span></a>
                @endif
                @if(Auth::user()->role != 2):
                <a href="{{url('order')}}" role="button" class="btn  rounded-pill text-light d-flex flex-row align-items-center justify-content-start"><i class="far fa-list-alt align-self-center ml-2 " ></i><span class="align-self-start"> الطلبات </span></a>
                @endif

                <a href="{{ url('/logout') }}" role="button" class="btn  rounded-pill text-light d-flex flex-row align-items-center justify-content-start"><i class="fa fa-sign-out align-self-center ml-2" ></i><span class="align-self-start">تسجيل الخروج</span></a>
                
                
            </div>
        </div>
        <div  class="col-lg-10 mt-3">

            <div class="add-icon-parent ">
                <a href="" class="add-icon d-md-none"><i class="fas fa-plus bg-info text-light bg-info p-4 rounded-circle  border-0 "></i> <span >إضافة مشروع</span></a>
            </div>

            <div id="main-content" class="pb-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success text-right">
                       {{ session('success')}}
                    </div>
                @endif
                    @if(session()->has('error'))
                        <div class="alert alert-warning text-center">
                            {{ session('error')}}
                        </div>
                    @endif

                  @yield("content")

                </div>
            </div>


            {{-- <div id="main-content" class="pb-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success text-right">
                        {{ session('success')}}
                    </div>
                @endif
                @yield("content")

            </div> --}}
        </div>
    </div>
            {{-- @yield('content') --}}

        </div>




</main>
<script src="https://kit.fontawesome.com/d8e134e613.js" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/apps.js"></script>
<script src="js/main.js"></script>

</body>
</html>

<script src="js/app.js"></script>

</body>
</html>




