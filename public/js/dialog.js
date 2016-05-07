$(document).ready(function() {

    $('a.dialog-window').click(function() {
        // console.log("login");
        //lấy giá trị thuộc tính href - chính là phần tử "#dialog-box"
        var dialogBox = $(this).attr('href');

        //cho hiện hộp đăng nhập trong 300ms
        $(dialogBox).fadeIn("slow");

        // thêm phần tử id="over" vào cuối thẻ body
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
        
        return false;
    });

    $('a.reset-password').click(function() {

        $('.dialog').hide();
        // console.log("login");
        //lấy giá trị thuộc tính href - chính là phần tử "#dialog-box"
        var dialogBox = $(this).attr('href');

        //cho hiện hộp đăng nhập trong 300ms
        $(dialogBox).fadeIn("slow");

        // thêm phần tử id="over" vào cuối thẻ body
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
        
        return false;
    });

    $('#send-mail').click(function() {

        $('.dialog').hide();
        

        //cho hiện hộp đăng nhập trong 300ms
        $('#dialog-notify-box').fadeIn("slow");

        // thêm phần tử id="over" vào cuối thẻ body
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
        
        return false;
    });

    // khi click đóng hộp thoại
    // $(document).on('click', "a.close, #over", function() { 

    $('a.close').click(function() {
        
        $('.dialog').hide();  
        $('label.error').remove(); 
        $('#over, .dialog, .dialog-shopping-card').fadeOut(300);

        $('#email_login, #password_login').val(""); //dialog login
        $('#email_register, #name_register, #password_register, #password_confirmation_register').val(""); // dialog register
        $('#email_reset_password').val(""); //dialog reset password

        $('#list-result-png').empty(); // dialog download
        $('#list-result-filename').empty(); // dialog add shopping card 
        $('#select-all-result-png').removeAttr("checked"); // remove check all in download
        $('#select-all-result-filename').removeAttr("checked"); // remove check all in add shopping card
    });


    $(document).on('a.close, #over', function() { 
        $('#over, .dialog, .dialog-shopping-card').fadeOut(300 , function() {
            console.log("over");
            $('#over').remove();  
            $('label.error').remove(); 
        }); 

        return false;
    });
	
});


