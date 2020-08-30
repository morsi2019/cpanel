@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        تعديل دولة
    </div>

    <div class="card-body">
        <form action="{{ route("admin.itemCategories.update", [$itemCategory->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">إسم الصــنف*</label>
                <input type="text" id="item_cat_name" name="item_cat_name" class="form-control" value="{{ old('itemCategory', isset($itemCategory) ? $itemCategory->item_cat_name : '') }}" required>
                @if($errors->has('item_cat_name'))
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