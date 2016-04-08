$(document).ready(function() {
    
    $('a.dialog-window').click(function() {

        //lấy giá trị thuộc tính href - chính là phần tử "#dialog-box"
        var dialogBox = $(this).attr('href');

        //cho hiện hộp đăng nhập trong 300ms
        $(dialogBox).fadeIn("slow");

        // thêm phần tử id="over" vào cuối thẻ body
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
        
        return false;
    });

    // khi click đóng hộp thoại
    $(document).on('click', "a.close, #over", function() { 
        $('#over, .dialog, .dialog-shopping-card').fadeOut(300 , function() {
            $('#over').remove();  
             // $('#email_login, #password_login, #name_register, #email_register, #password_register, #password_confirmation_register').val('');
        }); 
        return false;
    });
	
});


