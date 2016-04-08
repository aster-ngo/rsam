$(document).ready(function() {
    $('a.dialog-window').click(function() {
        console.log("login");
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
            $('#name, #email, #password, #password_confirmation').text = "";
        }); 
        return false;
    });
	
});


