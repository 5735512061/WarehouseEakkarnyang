@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('เข้าสู่ระบบ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('customer.login.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="customer_name" class="col-sm-4 col-form-label text-md-right">{{ __('ชื่อเข้าใช้งานระบบ') }}</label>

                            <div class="col-md-6">
                                <input id="customer_name" type="text" class="form-control{{ $errors->has('customer_name') ? ' is-invalid' : '' }}" name="customer_name" value="{{ old('customer_name') }}" required autofocus>

                                @if ($errors->has('customer_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('customer_name') }}</strong>
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

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('เข้าสู่ระบบ') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('ลืมรหัสผ่าน ?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
