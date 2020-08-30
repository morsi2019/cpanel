<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;

class ProfileController extends Controller
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
        //

        $user=User::with('profile')->findOrFail(Auth::user()->id);
        $profile=[];
        foreach ($user->profile as $key => $value){
            $profile[$value->name]=$value->value;
        }

        return view('profile')->with(['profile'=>$profile]);


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
    public function checkProfileExist($name){
        $user= User::findOrFail(Auth::user()->id)
            ->whereHas('profile', function($q) use ($name) {
                $q->where('name', $name);} )->first();
        return $user;


    }
/*
 * [full-name] => [job] => [country] => [phone] => [b-account] => [pay-pal-account] => [specialty] =>
 * [qualification] => [university] => [categories] => [expert] => [cate-expert] => [current-address] =>
 * */
    public function store(Request $request)
    {
        //


        foreach ($request->input()  as  $key => $name)
        {
           if ($key=='_token'){
               continue;
           }
            if($this->checkProfileExist($key)){
                $profile=new Profile();

                 $profile->where('name',$key)->where('user_id',Auth::user()->id)->update(['value'=>$name]);

            }
            else {
                $profile=new Profile();

                $profile->name=$key;
                $profile->value=$name;
                $profile->user_id=Auth::user()->id;
                $profile->save();
            }
        }
        return redirect()->back() ->with('success' , 'تم تحديث بيانتك الشخصية بنجاح');;

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
