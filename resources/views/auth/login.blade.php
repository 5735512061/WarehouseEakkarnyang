@extends('layouts.app')

@section('content')
<center><img src="{{ asset('/image/logo-store.png')}}"></center>
<div class="container" style="font-family: 'Noto Sans Thai', sans-serif !important;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ผู้ดูแลระบบ เข้าสู่ระบบ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="master_name" class="col-sm-4 col-form-label text-md-right">{{ __('ชื่อเข้าใช้งานระบบ') }}</label>

                            <div class="col-md-6">
                                <input id="master_name" type="text" class="form-control{{ $errors->has('master_name') ? ' is-invalid' : '' }}" name="master_name" value="{{ old('master_name') }}" required autofocus>

                                @if ($errors->has('master_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('master_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('จดจำรหัสผ่าน') }}
                                    </label>
                                    <button type="submit" class="btn btn-primary">
                                    {{ __('เข้าสู่ระบบ') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
