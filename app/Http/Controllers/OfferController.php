<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
\Illuminate\Support\Collection::macro('recursive', function () {
    return $this->map(function ($value) {
        if (is_array($value)) {
            return collect($value)->recursive();
        }
        if (is_object($value)) {
            return collect($value)->recursive();
        }

        return $value;
    });
});

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {

//        $orders=Order::all()->groupBy([
//            'order_id',
//            function ($item) {
//                return $item['name'];
//            },
//        ], $preserveKeys = true);
        $orders=Order::all()->sortByDesc('created_at')->groupBy('main_id');


        $now=Carbon::now();




        return view("offers.offers")->with(['orders'=>$orders,'now'=>$now]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("offers.new-offer");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'company_name' => 'required|min:7',
            'country'=>'required',
            'city'=>'required',
            'name' => 'required',
            'price' => 'required|min:1',
            'total'=>'required|min:1',
            'shipping'=>'required',
            'description'=>'required|min:15'
        ],[
            'company_name.required'=> 'يجب اضافة اسم الشركة',
            'name.required'=> 'يجب اضافة الإسم',
            'unit.required'=> 'يجب اضافة الوحدة  ',
            'price.required'=> 'يجب اضافة السعر ',
            'total.required'=> 'يجب تحديد الأجمالي',
            'country.required'=> 'يجب اضافة الدولة',
            'shipping.required'=> 'يجب تحديد عنوان الشحن',
            'description.required'=> 'يجب اضافة مميزات العرض',
            'description.min'=> 'مميزات العرض يجب ان تكون اكثر من 15 حرف',
            'city.required'=> 'يجب اضافة المدينة',]);
        Offer::create($request->all());
        return redirect()->back()
            ->with('success' , 'تم اضافة العرض بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
