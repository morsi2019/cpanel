<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function generateBarcodeNumber() 
    {
        $number = mt_rand(10,100000000 ); // better than rand()

        // call the same function if the barcode exists already
        if ($this->orderIDExist($number)) 
        {
            return $this->generateBarcodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    public function orderIDExist($number) 
    {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Order::wheremain_id($number)->exists();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        $user  = User::find(Auth::user()->id);
        //dd($user);
        return view('orders.order_home', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.add_order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name.*' => 'required|exists:items,item_name',
            'description' => 'required',
            'unit' => 'required',
            'quantity' => 'required|min:1',
            'country'=>'required',
            'enterprise'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'street' => 'required',
            'approved' => 'required',
        ],['name.*.required'=> 'يجب اضافة اسم الصنف',
             'name.*.exists'=> 'يجب اختيار صنف من المقرحات',
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

        $order = new Order();
        $order->user_id=Auth::user()->id;
        $order->main_id=$this->generateBarcodeNumber();
        $order->country=$request->input('country');
        $order->enterprise=$request->input('enterprise');
        $order->city=$request->input('city');
        $order->phone=$request->input('phone');
        $order->street=$request->input('street');
        $order->shareable=$request->has('shareable')?1:0;
        $order->save();

        foreach($request->input('name') as $n => $name)
        {
            if ($name==null){
                return redirect()->back()
                    ->with('success' , 'تم اضافة الطلب بنجاح');
            }

            $item=Item::where('item_name','like',$name)->first();
            $order->items()->attach($item->id, [
                                                'description' => $request->input('description')[$n],
                                                'unit' => $request->input('unit')[$n],
                                                'quantity' => $request->input('quantity')[$n],
                                                                                            ]);

        }

        return redirect()->back()
            ->with('success' , 'تم اضافة الطلب بنجاح');

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
