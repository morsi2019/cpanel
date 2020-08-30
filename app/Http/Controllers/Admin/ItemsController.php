<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Item;
use App\ItemCategory;
use App\Country;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::all();

        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        //abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategories = ItemCategory::all()->pluck('item_cat_name', 'id')->prepend(trans('إختر التصنيف'), '');

        $countries = Country::all();

        return view('admin.items.create' , compact('itemCategories' , 'countries'));
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());

        return redirect()->route('admin.items.index');
    }

    public function edit(Item $item)
    {
        //abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$item = Item::find($id);

        $item_categories = ItemCategory::all()->pluck('item_cat_name', 'id')->prepend(trans('إختر التصنيف'), '');

        $item->load('item_category');

        return view('admin.items.edit', compact('item' , 'item_categories'));
    }

    public function update(Request $request, Item $item)
    {
        $item->update($request->all());

        return redirect()->route('admin.items.index');
    }

    public function show($id)
    {
        //abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item = Item::find($id);

        return view('admin.items.show', compact('item'));
    }

    public function destroy(Item $item)
    {
        //abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Item::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
