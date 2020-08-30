@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تسجيل جديد</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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
                                <input id="phone" type="phone" class="form-control" required >
                                @error('email')
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
                                <textarea id="address"  class="form-control" name="address" required></textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        

                        <br>
                        <div class="form-row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    تسجيل
                                </button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
