@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">تسجيل مستخدم جديد</div>

                <div class="card-body">
                    <form action="{{ action('Admin\UsersController@store') }}" method="POST" >
                        @csrf

                        <div class='form-row' >

                            <div class="col {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name"> إسم المستخدم *</label>
                                    <input type="text" id="name" name="name" class="form-control" value="" required>
                                    @if($errors->has('name'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('users') }}
                                        </em>
                                    @endif
                            </div>

                           
                        </div>


                        <div class='form-row' >

                            <div class="col {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email"> البريد الإلكتروني *</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label for="phone"> رقم الهاتف *</label>
                                <input id="phone" name="phone" type="text" class="form-control" required >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class='form-row' >

                            <div class="col {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password"> كلمة المرور *</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col {{ $errors->has('password-confirm') ? 'has-error' : '' }}">
                                <label for="password-confirm"> تأكيد كلمة المرور *</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class='form-row' >

                            <div class="col {{ $errors->has('address') ? 'has-error' : '' }}">
                                <label for="address"> العنوان *</label>
                                <textarea id="address"  class="form-control" name="address" row='2' required></textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <br/><br/>

                        
                       <div>
						<input class="btn btn-danger" type="submit" value="حــفظ">
						</div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection


<script src="{{asset('js/jquery.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
