@extends('layouts.main')

@section('content')
    <div class="main-content mx-auto  p-5  text-center mb-5">

        {!! Form::open() !!}

        <div class="card card-order text-center" >

            <div class="card-header bg-white">انشاء طلب جديد</div>
            <table class="card-table table-bordered table">
                <thead class="bg-info">
                <tr>
                    <th scope="col" class="w-20">اسم الصنف</th>
                    <th scope="col">الوصف</th>
                    <th scope="col" class="w-15">وحدة الصنف</th>
                    <th scope="col" class="w-10">الكمية</th>
                </tr>
                </thead>
                <tbody class="order-table-body">
                <tr>
                    <td>

                        <input class="form-control order-input " type="text" placeholder="سم الصنف" name="name[]">
                    </td>
                    <td><input class="form-control order-input" type="text" name="description[]"></td>
                    <td ><select class="form-control order-input" name="unit[]">
                            <option value="hiegh">عالي</option>
                            <option value="medium">متوسط</option>
                            <option value="low">منخفض</option>
                        </select></td>
                    <td><input class="form-control order-input" type="text" placeholder="000" name="quantity[]"></td>

                </tr>
                </tbody>
            </table>
            <div class="card-footer bg-white ">
                <div class="row">
                   <i class="fas fa-plus btn btn-info  add-row  text-light bg-info p-4 rounded-circle  border-0 "></i>

                </div>
                <div class="row">
                    <div class="col-md-2">المنشاة</div>
                    <div class="col-md-4"><input class="form-control order-input" type="text" name="enterprise"></div>

                    <div class="col-md-2">االهاتف</div>
                    <div class="col-md-3"><input class="form-control order-input" type="text" name="phone"></div>                
                </div>
            </div>
            <div class="row m-2 ">
                <div class="col-md-2">الدولة</div>
                <div class="col-md-2"><input class="form-control order-input" type="text" name="country"></div>

                <div class="col-md-2">المدينة </div>
                <div class="col-md-2"><input class="form-control order-input" type="text" name="city"></div>
            <div class="col-md-2">الشارع </div>
            <div class="col-md-2"><input class="form-control order-input" type="text" name="street"></div>
        </div>
            <div class="row mr-md-5 ">

                <input class=" m-2 " type="checkbox" name="approved">
                <label>اوافق على شروط الطلب</label>


            </div>
            <div class="row mr-md-5 justify-content-end ">
                <button class="btn btn-primary  m-5 col-md-2" type="submit">حفظ</button>


            </div>
        </div>
        {!! Form::close() !!}

    </div>
@endsection
