<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\City;
use App\Country;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CitiesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::all();
        
        // $cities = City::with('country')
        //           ->orderBy('id','desc')
        //           ->get();

        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        //abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //$countries = Country::all()->pluck('contry_name', 'id');

        $countries = Country::all();

        return view('admin.cities.create' , compact('countries'));
    }

    public function store(Request $request)
    {
        $citiy = City::create($request->all());

        return redirect()->route('admin.cities.index');
    }

    public function edit($id)
    {
        //abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $city = City::find($id);

        $countries = Country::all();

        // $countries = Country::all()->pluck('country_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        // $city->load('country');

        return view('admin.cities.edit', compact('city' , 'countries'));
    }

    public function update(Request $request, City $city)
    {
        $city->update($request->all());

        return redirect()->route('admin.cities.index');
    }

    public function show($id)
    {
        //abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $city = City::find($id);

        return view('admin.cities.show', compact('city'));
    }

    public function destroy(Country $Country)
    {
        //abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $City->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        City::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
