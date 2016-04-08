@extends('layouts.master')

@section('login-dialog')

<!-- start div login-box -->
<div id="dialog-login-box" class="dialog">
    <p class="dialog_title"> Đăng nhập</p> <br /><br />
    <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
    <form method="post" id="form-login" class="login-content" action="{{ url('/auth/login') }}" role="form" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="email">
        <span>Email:</span>
        <input id="email" name="email" value="admin@gmail.com" type="email" autocomplete="on" placeholder="example@gmail.com">
        </label><br/>
        <label class="password">
        <span>Mật khẩu:</span>
        <input id="password" name="password" value="123456" type="password" placeholder="Mật khẩu">
        </label>

        <button class="button submit-button" type="submit">Đăng nhập</button>
        <p> 
        <a class="forgot" href="#">Quên mật khẩu?</a>
        </p><br /><br /> 

    </form>
</div> <!-- end div login-box -->

<script type="text/javascript">
	$(document).ready(function(){
		 var dialogBox = $(this).attr('href');

        //cho hiện hộp đăng nhập trong 300ms
        $(dialogBox).fadeIn("slow");

        // thêm phần tử id="over" vào cuối thẻ body
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
	});
</script>

@stop