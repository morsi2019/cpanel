<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\ItemCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class itemCategoriesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategories = ItemCategory::all();

        return view('admin.itemCategories.index', compact('itemCategories'));
    }

    public function create()
    {
        //abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemCategories.create');
    }

    public function store(Request $request)
    {
        $ItemCategory = ItemCategory::create($request->all());

        return redirect()->route('admin.itemCategories.index');
    }

    public function edit($id)
    {
        //abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategory = ItemCategory::find($id);

        return view('admin.itemCategories.edit', compact('itemCategory'));
    }

    public function update(Request $request, ItemCategory $itemCategory)
    {
        $itemCategory->update($request->all());

        return redirect()->route('admin.itemCategories.index');
    }

    public function show($id)
    {
        //abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategory = ItemCategory::find($id);

        return view('admin.itemCategories.show', compact('itemCategory'));
    }

    public function destroy(ItemCategory $itemCategory)
    {
        //abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategory->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        ItemCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
