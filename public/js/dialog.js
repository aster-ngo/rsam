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
    });


    $(document).on('a.close, #over', function() { 
        $('#over, .dialog, .dialog-shopping-card').fadeOut(300 , function() {
            $('#over').remove();  
            $('label.error').remove(); 
            $('#name, #email, #password, #password_confirmation').text = "";
        }); 

        return false;
    });
	
});


