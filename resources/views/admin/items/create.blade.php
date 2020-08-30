@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        إضــافة صنف جديد
    </div>

    <div class="card-body">
        <form action="{{ action('Admin\ItemsController@store') }}" method="POST" >
            @csrf

            <div class="form-group {{ $errors->has('income_category_id') ? 'has-error' : '' }}">
                <label for="itemCategories"> فئة التصنيف </label>
                <select name="item_category_id" id="item_category_id" class="form-control select2">
                    @foreach($itemCategories as $id => $itemCategory)
                        <option value="{{ $id }}">{{ $itemCategory }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_category_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('item_category_id') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">إسم الصنف*</label>
                <input type="text" id="item_name" name="item_name" class="form-control" value="{{ old('item_name', isset($item) ? $item->item_name : '') }}" required>
                @if($errors->has('item_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('item_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    <!-- {{ trans('cruds.user.fields.name_helper') }} -->
                </p>
            </div>
            <div class="form-group {{ $errors->has('item_description') ? 'has-error' : '' }}">
                <label for="item_description">وصف الصنف*</label>
                <input type="text" id="item_description" name="item_description" class="form-control" value="{{ old('item_description', isset($item) ? $item->item_description : '') }}" required>
                @if($errors->has('item_description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('item_description') }}
                    </em>
                @endif
                <p class="helper-block">
                    <!-- {{ trans('cruds.user.fields.email_helper') }} -->
                </p>
            </div>
            <div class="form-group {{ $errors->has('item_issu_date') ? 'has-error' : '' }}">
                <label for="item_issu_date">تاريخ الإنتاج</label>
                <input type="date" id="item_issu_date" name="item_issu_date" class="form-control" value="{{ old('item_issu_date', isset($item) ? $item->item_issu_date : '') }}" data-date-format="yyyy-mm-dd" required>
                @if($errors->has('item_issu_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('item_issu_date') }}
                    </em>
                @endif
               
            </div>

            <div class="form-group {{ $errors->has('item_issu_date') ? 'has-error' : '' }}">
                <label for="item_issu_date">تاريخ الإنتهاء</label>
                <input type="date" id="item_exp_date" name="item_exp_date" class="form-control" value="{{ old('item_exp_date', isset($item) ? $item->item_exp_date : '') }}" data-date-format="yyyy-mm-dd" required>
                @if($errors->has('item_exp_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('item_exp_date') }}
                    </em>
                @endif
               
            </div>

            <!-- <div class="form-group {{ $errors->has('item_country_made') ? 'has-error' : '' }}">
                <label for="item_country_made">بلد الصنع</label>
                
                <select class="form-control" name="item_country_made" id="item_country_made">
                    <option value="">إختر الدولة</option>
                        @foreach ($countries as $key => $country) 
                            <option value="{{$country->id}}">
                                {{$country->country_name}}
                            </option>
                        @endforeach
                </select>
               
            </div> -->
            
            <div>
                <input class="btn btn-danger" type="submit" value="حــفظ">
            </div>
        </form>


    </div>
</div>
@endsection