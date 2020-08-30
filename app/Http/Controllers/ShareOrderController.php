<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order_id)
    {
        //

        $order=Order::where('main_id','=',$order_id)->get();


        return view('share_order')->with(['orders'=>$order,'order_id'=>$order_id]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$order_id)
    {
        //

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'unit' => 'required',
            'quantity' => 'required|min:1',
            'country'=>'required',
            'enterprise'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'street' => 'required',
            'approved' => 'required',
        ],['name.required'=> 'يجب اضافة اسم الصنف',
            'description.required'=> 'يجب اضافة الوصف',
            'unit.required'=> 'يجب تحديد نوع الكمية',
            'quantity.required'=> 'يجب تحديد الكمية',
            'quantity.min'=> 'جب ان تكون القيمة اكبر من صفر',
            'country.required'=> 'يجب اضافة الدولية',
            'enterprise.required'=> 'يجب تحديد الموسسة',
            'phone.required'=> 'يجب اضافة الهاتف',
            'city.required'=> 'يجب اضافة المدينة',
            'street.required'=> 'يجب تحديد الشارع',
            'approved.required'=> 'يجب ان يتم الموافقة على شروط الطلب',]);

            $added=0;
        foreach($request->input('name') as $n => $name)
        {
            if ($name==null){
                return redirect()->back()
                    ->with('success' , 'تم اضافة الطلب بنجاح');
            }
            if ($request->input('quantity')[$n]>=1){

            $order = new Order();
            $order->country=$request->input('country');
            $order->enterprise=$request->input('enterprise');
            $order->city=$request->input('city');
            $order->phone=$request->input('phone');
            $order->street=$request->input('street');
            $order->order_id=$order_id;

            $order->user_id=Auth::user()->id;

            $order->name=$request->input('name')[$n];
            $order->description=$request->input('description')[$n];
            $order->unit=$request->input('unit')[$n];
            $order->quantity=$request->input('quantity')[$n];
            $order->save();
            $added=1;}

        }
       if ($added==0){
           return redirect()->back()
               ->with('error' , 'يجب اضافة اصناف للطلب للتتم المشاركة');
       }
        return redirect()->back()
            ->with('success' , 'تم اضافة المشاركة بنجاح');
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
