@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        إضافة صنف جديد
    </div>

    <div class="card-body">
        <form action="{{ action('Admin\ItemCategoriesController@store') }}" method="POST" >
            @csrf
            <div class="form-group {{ $errors->has('item_cat_name') ? 'has-error' : '' }}">
                <label for="country_code">إسم الصنف*</label>
                <input type="text" id="item_cat_name" name="item_cat_name" class="form-control" value="{{ old('item_cat_name', isset($itemCategory) ? $country->item_cat_name : '') }}" required>
                @if($errors->has('country_code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('item_cat_name') }}
                    </em>
                @endif
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="حــفظ">
            </div>
        </form>


    </div>
</div>
@endsection