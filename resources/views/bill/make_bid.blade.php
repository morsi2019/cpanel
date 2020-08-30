@extends('layouts.main')

@section('content')
    <div class="main-content mx-auto   p-5  text-center mb-5">
    <div class="main-content-table ">

        {!! Form::open() !!}


        <table id="dtHorizontalVerticalExample" class="card-table table-bordered table table-striped table-bordered  bg-light" cellspacing="0"
               >
            <thead class="bg-info">
            <tr>
                <th scope="col" class=""> الصنف</th>
                <th scope="col" class="">وحدة الكمية</th>
                <th scope="col" class="">الكمية</th>
                <th scope="col" class="w-15">وصف المنتج</th>
                <th scope="col" class="">العلامة التجارية</th>
                <th scope="col" class="">صنع في</th>
                <th scope="col" class="">الرقم التسلسلي</th>
                <th scope="col" class="">تاريخ الانتهاء</th>
                <th scope="col" class="">سعر الوحدة</th>
                <th scope="col" class="">صورة</th>


            </tr>
            </thead>
            <tbody class="order-table-body">
            <tr>
                <td class="bg-light" >صنف 1</td>
                <td class="bg-light">كرتون</td>
                <td class="bg-light">500</td>
              <td >

                    <input class="form-control bid-input " type="text" placeholder="وصف المنتج" name="name[]">
                </td>
                <td>

                    <input class="form-control  bid-input " type="text" placeholder="العلامة التجارية" name="name[]">
                </td> <td>

                    <input class="form-control bid-input " type="text" placeholder="مكان الصنع" name="name[]">
                </td> <td>

                    <input class="form-control bid-input " type="text" placeholder="الرقم التسلسلي" name="name[]">
                </td> <td>

                    <input class="form-control bid-input " type="date" placeholder="تاريخ الانتهاء" name="name[]">
                </td>
                <td>

                    <input class="form-control bid-input " type="number" placeholder="سعر الوحدة" name="name[]">
                </td>
                <td>

                    <input class="form-control bid-input " type="file" placeholder="سم الصنف" name="name[]">
                </td>


            </tr>
            <tr>
                <td class="bg-light" >صنف 1</td>
                <td class="bg-light">كرتون</td>
                <td class="bg-light">500</td>
                <td >

                    <input class="form-control bid-input " type="text" placeholder="وصف المنتج" name="name[]">
                </td>
                <td>

                    <input class="form-control  bid-input " type="text" placeholder="العلامة التجارية" name="name[]">
                </td> <td>

                    <input class="form-control bid-input " type="text" placeholder="مكان الصنع" name="name[]">
                </td> <td>

                    <input class="form-control bid-input " type="text" placeholder="الرقم التسلسلي" name="name[]">
                </td> <td>

                    <input class="form-control bid-input " type="date" placeholder="تاريخ الانتهاء" name="name[]">
                </td>
                <td>

                    <input class="form-control bid-input " type="number" placeholder="سعر الوحدة" name="name[]">
                </td>
                <td>

                    <input class="form-control bid-input " type="file" placeholder="سم الصنف" name="name[]">
                </td>


            </tr>
            <tr>
                <td class="bg-light" >صنف 1</td>
                <td class="bg-light">كرتون</td>
                <td class="bg-light">500</td>
                <td >

                    <input class="form-control bid-input " type="text" placeholder="وصف المنتج" name="name[]">
                </td>
                <td>

                    <input class="form-control  bid-input " type="text" placeholder="العلامة التجارية" name="name[]">
                </td> <td>

                    <input class="form-control bid-input " type="text" placeholder="مكان الصنع" name="name[]">
                </td> <td>

                    <input class="form-control bid-input " type="text" placeholder="الرقم التسلسلي" name="name[]">
                </td> <td>

                    <input class="form-control bid-input " type="date" placeholder="تاريخ الانتهاء" name="name[]">
                </td>
                <td>

                    <input class="form-control bid-input " type="number" placeholder="سعر الوحدة" name="name[]">
                </td>
                <td>

                    <input class="form-control bid-input " type="file" placeholder="سم الصنف" name="name[]">
                </td>


            </tr>
            <tr>
                <td class="bg-light" rowspan="2" >سياسة الضمان : </td>

                <td rowspan="2" colspan="5">

                    <textarea class="form-control bid-input ">

                    </textarea>
                </td>
                <td class="bg-light" colspan="2" >المبلغ الاجمالي</td>

                <td  colspan="2">

                    <input class="form-control bid-input " type="text" placeholder="المبلغ الاجمالي" name="name[]">
                </td>


            </tr>
            <tr>

                <td class="bg-light" colspan="2" > مدة التسليم </td>

                <td  colspan="2">

                    <input class="form-control bid-input " type="text" placeholder="مدة التسليم " name="name[]">
                </td>


            </tr>
            <tr>
                <td class="bg-light" rowspan="2" >شروط الدفع : </td>

                <td rowspan="2" colspan="5">

                    <textarea class="form-control bid-input ">

                    </textarea>
                </td>
                <td class="bg-light" colspan="2" >صلاحية العرض</td>

                <td  colspan="2">

                    <input class="form-control bid-input " type="text" placeholder="صلاحية العرضج" name="name[]">
                </td>


            </tr>
            <tr>

                <td class="bg-light" colspan="2" >اقل مبلغ يلغي العرض</td>

                <td  colspan="2">

                    <input class="form-control bid-input " type="text" placeholder="اقل مبلغ يلغي العرض" name="name[]">
                </td>


            </tr>
            <tr>
                <td class="bg-light"  >سياسة الشحن</td>

                <td  colspan="5">

                   <textarea class="form-control bid-input ">

                    </textarea>
                </td>


                <td  rowspan="3" colspan="4">
                    <div class="">
                    <div class="row mr-md-5 justify-content-center ">

                        <input class=" m-2 " type="checkbox">
                        <label>اوافق على شروط الطلب</label>


                    </div>
                    <div class="row mr-md-5 justify-content-center ">
                        <button class="btn btn-primary  m-5 col-md-4 p-2" type="submit">حفظ</button>


                    </div>
                    </div>
                </td>


            </tr>
            <tr>
                <td class="bg-light" rowspan="2"  >شروط الاسترجاع</td>

                <td rowspan="2" colspan="5" rowspan="2">
                    <textarea class="form-control bid-input ">

                    </textarea>


                </td>



            </tr>


            </tbody>
        </table>
        {!! Form::close() !!}

    </div>

    </div>
@endsection
