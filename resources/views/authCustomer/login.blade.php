@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card" style="margin-bottom: 20px;">
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

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('remember me') }}
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
            <h5 style="color: #ffffff;"> **สำหรับร้านยางที่ต้องการยางราคาส่ง เฉพาะพื้นที่จังหวัดภูเก็ต และพังงา สามารถติดต่อได้ที่ 081-732-3288</h5>
            <h5 style="color: yellow; text-align: center;">( ไม่ต้องสต็อกยางก็มียางขาย ให้เอกการยางสต็อกยางแทนคุณ )</h5>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('/js/jquery.cookie.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jQuery-2.2.0.min.js')}}"></script>

<script>
    $(document).ready(function() {
        var remember = $.cookie('remember');
        if (remember == 'true')
    {
        var customer_name = $.cookie('customer_name');
        var password = $.cookie('password');
        // autofill the fields
        $(#customer_name).val(customer_name);
        $(#password).val(password);
        $(#remember).prop("checked",true);
    }
});
</script>
@endsection
