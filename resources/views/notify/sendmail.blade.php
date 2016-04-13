@extends('index')

@section('option')


<div id="dialog-notify-box" class="dialog">
    <p class="dialog_title"> Thông báo</p> <br /><br />
    <a href="{{ url('index.html') }}" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
    <form method="post" id="form-login" class="login-content" role="form" style="height: 40px;">
        <h4>Đã gửi mail thành công.</h4>
    </form>

	<script type="text/javascript">		   
	    setTimeout(function(){
     	 window.location = "{{ url('index.html') }}";
	   	}, 1000);
	</script>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#dialog-notify-box').fadeIn("slow");

        // thêm phần tử id="over" vào cuối thẻ body
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
	});
</script>



@stop
