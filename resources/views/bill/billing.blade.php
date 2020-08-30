@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-sm text-right">
        <ul style="list-style-type: none;padding: 0px;">
            <li>إسم الشركة عربي</li>
            <li>إسم الشركة إنجليزي</li>
        </ul>
    </div>
    <div class="col-sm text-center">شعار شبكة طلب</div>
    <div class="col-sm text-left">
        <ul style="list-style-type: none;padding: 0px;">
            <li>السجل التجاري : </li>
            <li>عنوان الشركة : </li>
        </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-sm text-right">
        <ul style="list-style-type: none;padding: 0px;">
            <li>رقم الهاتف : </li>
            <li>الرقم الضريبي : </li>
            <li>رقم الإيبان البنكي : </li>
        </ul>
    </div>
    <div class="col-sm text-center"><h1 class="table-primary"> فاتورة مبيعات</h1>
       
        <ul style="list-style-type: none;padding: 0px;">
            <li>رقم الفاتورة : </li>
            <li>تاريخ الفاتورة</li>
        </ul>
    </div>
    <div class="col-sm text-left">
        <ul style="list-style-type: none;padding: 0px;">
            <li>العميل : </li>
            <li>عنوان العميل : </li>
            <li>رقم الهاتف : </li>
        </ul>
    </div>
  </div>

  <div class="row">
    <table class="table table-bordered">
      <thead>
        <tr class="table-primary">
          <th scope="col">إسم الصنف</th>
          <th scope="col">الكمية</th>
          <th scope="col">وحدة الكمية</th>
          <th scope="col">وصف الصنف</th>
          <th scope="col">العلامات التجارية</th>
          <th scope="col">الرقم التسلسلي</th>
          <th scope="col">تاريخ الصلاحية</th>
          <th scope="col">سعر الوحدة</th>
          <th scope="col">الضريبة</th>
          <th scope="col">المجموع</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">الصنف</th>
          <td>111</td>
          <td>كرتون</td>
          <td>صنف جديد</td>
          <td>اسم العلامة</td>
          <td>Ex-221455</td>
          <td>2025/01/11</td>
          <td>150</td>
          <td>10%</td>
          <td>18315</td>
        </tr>
        <tr>
          <th scope="row">الصنف</th>
          <td>111</td>
          <td>كرتون</td>
          <td>صنف جديد</td>
          <td>اسم العلامة</td>
          <td>Ex-24158</td>
          <td>2021/01/11</td>
          <td>150</td>
          <td>10%</td>
          <td>18315</td>
        </tr>
        <tr>
          <th scope="row">الصنف</th>
          <td>111</td>
          <td>حبة</td>
          <td>صنف جديد</td>
          <td>اسم العلامة</td>
          <td>Ex-5555</td>
          <td>2022/01/11</td>
          <td>150</td>
          <td>10%</td>
          <td>18315</td>
        </tr>
      </tbody>
    </table>
  </div>


  <div class="row">
    <div class="col-sm-6 text-right">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" >سياسة الضمان</th>
            <td colspan="3">محتوى سياسة الضمان والتي وجب جلب محتواها من ...................</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">شروط الدفع</th>
            <td colspan="3"></td>
            
          </tr>
          <tr>
            <th scope="row">سياسة الشحن</th>
            <td colspan="3"></td>
          </tr>
          <tr>
            <th scope="row">شروط الإسترجاع</th>
            <td colspan="3"></td>
            
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-sm-2 text-right">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">مدة التسليم</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">15 يوم</th>
          </tr>
          <tr>
            <th scope="row">شركة الشحن </th>
          </tr>
          <tr>
            <th scope="row">ارامكس</th>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-sm-4 text-right">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">مجموع الثمن</th>
            <th scope="col">الضريبة</th>
            <th scope="col">تكلفة الشحن</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">15900</th>
            <th scope="row">1590</th>
            <th scope="row">50</th>
          </tr>
          <tr>
            <th scope="row">اجمالي المبلغ </th>
            <th scope="row">المدفوع مقدما </th>
            <th scope="row">المبلغ المتبقى </th>
          </tr>
          <tr>
            <th scope="row">17540</th>
            <th scope="row">1754</th>
            <th scope="row">15786</th>
          </tr>
        </tbody>
      </table>
      
<div class="text-center">
  <i class="fa fa-credit-card mx-3 fa-2x" aria-hidden="true" title="ادفع عبر شبكة طلب"></i>
  <i class="fa fa-money mx-3 fa-2x" aria-hidden="true" title="ادفع للشركة مباشرة"></i>
  <i class="fa fa-download mx-3 fa-2x" aria-hidden="true" title="حمل الفاتورة"></i>
  <i class="fa fa-print mx-3 fa-2x" aria-hidden="true" title="طباعة الفاتورة"></i>
</div>
    </div>
  </div>

  
@endsection

