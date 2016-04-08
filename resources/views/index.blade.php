<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Temp </title>
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/dialog.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/jquery.pwstabs.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/pwstabs.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/table.css') }}">

    </head>
    <body>
        
        <div class="header" >
            <h3>Template</h3>



            <div class="option">
                
                    @if (Auth::guest())
                        <!-- <a href="#dialog-profile-box" class="dialog-window button" style="padding: 0px 15px;">Chào mừng DuongND</a>&nbsp;&nbsp; -->
                        <a href="#dialog-logout-box" class="dialog-window button" style="padding: 0px 15px;">Đăng ký</a>&nbsp;&nbsp;
                        <a href="#dialog-login-box" class="dialog-window button">Đăng nhập</a>
                    @else

                        <a href="#dialog-shopping-card-box" class="dialog-window button" style="padding: 0px 15px;">Giỏ hàng</a>&nbsp;&nbsp;
                        <a href="#dialog-profile-box" class="dialog-window button" style="padding: 0px 15px;">Chào mừng {{ Auth::user()->name }}</a>&nbsp;&nbsp;
                        <a href="{{ url('/auth/logout') }}" class="dialog-window button" style="padding: 0px 15px;">Thoát</a>&nbsp;&nbsp;
                        
                    @endif
	            
            </div>


        </div> <!-- end header -->

        <div class="content">
            <div class="tabset0">

                <div data-pws-tab="tab1" data-pws-tab-name="Tab 1" data-pws-tab-icon="fa-refresh fa-spin">
                    <div class="pws_example_mixed_content_block">
                        <div class="pws_example_mixed_content_left" >
                            dasdsdsdLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo metus, sollicitudin in tempus a, tristique ut eros. Aenean sit amet tempus leo, et hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ultrices metus ut aliquam feugiat. Donec eleifend vel ante sit ammpus leo, et hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ulm lectus. Nam a turpis hendrerit odio eleifend varius vel sed elit. Praesestibulum magna at curLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo metus, sollicitudin in tempus a, tris Nulla suscipit ultricies nisl sit amet sodales. Praesent ultricies vestibulum magna at cur hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ultrices metus ut aliquam feugiat. Donec eleifend vel ante sit ammpus leo, et hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ulm lectus. Nam a turpis hendrerit odio eleifend varius vel sed elit. Praesestibulum magna at curLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo metus, sollicitudin in tempus a, tris Nulla suscipit ultricies nisl sit amet sodales. Praesent ultricies vestibulum magna at cur hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ultrices metus ut aliquam feugiat. Donec eleifend vel ante sit ammpus leo, et hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ulm lectus. Nam a turpis hendrerit odio eleifend varius vel sed elit. Praesestibulum magna at curLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo metus, sollicitudin in tempus a, tris Nulla suscipit ultricies nisl sit amet sodales. Praesent ultricies vestibulum magna at cur hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ultrices metus ut aliquam feugiat. Donec eleifend vel ante sit ammpus leo, et hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ulm lectus. Nam a turpis hendrerit odio eleifend varius vel sed elit. Praesestibulum magna at curLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo metus, sollicitudin in tempus a, tris Nulla suscipit ultricies nisl sit amet sodales. Praesent ultricies vestibulum magna at cur hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ultrices metus ut aliquam feugiat. Donec eleifend vel ante sit ammpus leo, et hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ulm lectus. Nam a turpis hendrerit odio eleifend varius vel sed elit. Praesestibulum magna at curLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo metus, sollicitudin in tempus a, tris Nulla suscipit ultricies nisl sit amet sodales. Praesent ultricies vestibulum magna at cur hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ultrices metus ut aliquam feugiat. Donec eleifend vel ante sit ammpus leo, et hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ulm lectus. Nam a turpis hendrerit odio eleifend varius vel sed elit. Praesestibulum magna at curLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo metus, sollicitudin in tempus a, tris Nulla suscipit ultricies nisl sit amet sodales. Praesent ultricies vestibulum magna at cur
                        </div><!-- pws_example_mixed_content_left -->
                        <div class="pws_example_mixed_content_right" >
                            <div>
                            	
                            </div>
                            <div>
                            	
                            </div>
                        </div><!-- pws_example_mixed_content_right -->
                    </div><!-- pws_example_mixed_content_block -->
                </div>
                <div data-pws-tab="tab2" data-pws-tab-name="Tab 2" data-pws-tab-icon="fa-child">
                    
                    <div class="tabsetnested1">
                        <div data-pws-tab="nestedtab1" data-pws-tab-name="Nested Tab 1">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo metus, sollicitudin in tempus a, tristique ut eros. Aenean sit amet tempus leo, et hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ultrices metus ut aliquam feugiat. Donec eleifend vel ante sit amet tristique. Proin vitae interdum lectus. Nam a turpis hendrerit odio eleifend varius vel sed elit. Praesent auctor erat sed aliquet tempus. Etiam porttitor erat eu turpis egestas cursus. Vivamus varius vulputate lacus, vitae dictum libero gravida a. Nunc ac arcu tortor. Nulla suscipit ultricies nisl sit amet sodales. Praesent ultricies vestibulum magna at cursus. Cras venenatis tellus sed justo mattis rhoncus ut ac justo. Etiam ullamcorper massa ac dui suscipit, non pulvinar eros egestas. <br><br>
                            <div class="tabsetnested2">
                                <div data-pws-tab="nestedtab21" data-pws-tab-name="Nested Tab 1">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo metus, sollicitudin in tempus a, tristique ut eros. Aenean sit amet tempus leo, et hendrerit nibh. Vestibulum sollicitudin nisl purus, sit amet fringilla metus consectetur rhoncus. Maecenas ultrices metus ut aliquam feugiat. Donec eleifend vel ante sit amet tristique. Proin vitae interdum lectus. Nam a turpis hendrerit odio eleifend varius vel sed elit. Praesent auctor erat sed aliquet tempus. Etiam porttitor erat eu turpis egestas cursus. Vivamus varius vulputate lacus, vitae dictum libero gravida a. Nunc ac arcu tortor. Nulla suscipit ultricies nisl sit amet sodales. Praesent ultricies vestibulum magna at cursus. Cras venenatis tellus sed justo mattis rhoncus ut ac justo. Etiam ullamcorper massa ac dui suscipit, non pulvinar eros egestas. 
                                </div>
                                <div data-pws-tab="nestedtab22" data-pws-tab-name="Nested Tab 2">
                                    Ut metus turpis, rhoncus ut lacus auctor, lobortis rutrum ex. Phasellus at sodales velit. Proin quis facilisis sem. Maecenas eu posuere tellus, eget accumsan ex. Nulla eget auctor ipsum, at tempus magna. Vestibulum molestie a diam eleifend eleifend. Praesent eleifend in lectus et maximus. Vivamus vitae justo magna. Proin ultrices ex sed turpis pellentesque eleifend. Integer accumsan gravida est a venenatis. Aenean volutpat nunc vitae libero condimentum pharetra. 
                                </div>
                                <div data-pws-tab="nestedtab23" data-pws-tab-name="Nested Tab 3">
                                    Nunc convallis aliquam magna, in lobortis lorem pellentesque quis. Proin a pharetra purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque eros quam, scelerisque id euismod ut, porta nec urna. Etiam consectetur velit elit. Suspendisse varius nisl tortor, vitae viverra est bibendum a. Pellentesque dapibus lorem nec fringilla pharetra. Fusce ac cursus mi. Nam scelerisque ultricies lobortis. Nullam scelerisque lorem diam, sit amet tincidunt lorem viverra vel. Quisque aliquet arcu nec lorem accumsan, id pulvinar urna molestie. 
                                </div>
                            </div>
                        </div>
                        <div data-pws-tab="nestedtab2" data-pws-tab-name="Nested Tab 2">
                            Ut metus turpis, rhoncus ut lacus auctor, lobortis rutrum ex. Phasellus at sodales velit. Proin quis facilisis sem. Maecenas eu posuere tellus, eget accumsan ex. Nulla eget auctor ipsum, at tempus magna. Vestibulum molestie a diam eleifend eleifend. Praesent eleifend in lectus et maximus. Vivamus vitae justo magna. Proin ultrices ex sed turpis pellentesque eleifend. Integer accumsan gravida est a venenatis. Aenean volutpat nunc vitae libero condimentum pharetra. 
                        </div>
                        <div data-pws-tab="nestedtab3" data-pws-tab-name="Nested Tab 3">
                            Nunc convallis aliquam magna, in lobortis lorem pellentesque quis. Proin a pharetra purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque eros quam, scelerisque id euismod ut, porta nec urna. Etiam consectetur velit elit. Suspendisse varius nisl tortor, vitae viverra est bibendum a. Pellentesque dapibus lorem nec fringilla pharetra. Fusce ac cursus mi. Nam scelerisque ultricies lobortis. Nullam scelerisque lorem diam, sit amet tincidunt lorem viverra vel. Quisque aliquet arcu nec lorem accumsan, id pulvinar urna molestie. 
                        </div>
                    </div>
                    
                </div>
            </div><!-- tabset0 -->


        </div><!-- content -->
        <div class="footer">
        	&copy; 2016 - Copy right by DuongND
        </div><!-- footer -->

        <!-- start div login-box -->
        <div id="dialog-login-box" class="dialog">
            <p class="dialog_title"> Đăng nhập</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
            @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <form method="post" id="form-login" class="login-content" action="{{ url('/auth/login') }}" role="form" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label class="email">
                <span>Email:</span>
                <input id="email" name="email" type="email" autocomplete="on" placeholder="example@gmail.com">
                </label><br/>
                <label class="password">
                <span>Mật khẩu:</span>
                <input id="password" name="password" type="password" placeholder="Mật khẩu">
                </label>

                <button class="button submit-button" type="submit">Đăng nhập</button>
                <p> 
                <a class="forgot" href="#">Quên mật khẩu?</a>
                </p><br /><br /> 

            </form>
        </div> <!-- end div login-box -->
               
        </div>
        

        <!-- start div logout-box -->
        <div id="dialog-logout-box" class="dialog">
            <p class="dialog_title"> Đăng ký</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>

            <form method="post" id="form-register" class="login-content" action="{{ url('/auth/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="role" value="1">
                <label class="email">
                <span>Họ tên:</span><input id="name" name="name" type="text" autocomplete="on" placeholder="Họ và tên">
                </label><br />
	            <label class="email">
	            <span>Email:</span><input id="email" name="email" type="email" autocomplete="on" placeholder="example@gmail.com">
	            </label><br />
	            <label class="password">
	            <span>Mật khẩu:</span><input id="password" name="password" type="text" placeholder="Mật khẩu">
	            </label><br />
	            <label class="password">
	            <span>Gõ lại mật khẩu:</span><input id="password_confirmation" name="password_confirmation" type="text" placeholder="Gõ lại mật khẩu">
	            </label><br />
	            <button class="button submit-button" type="submit">Đăng ký</button>
            </form>
        </div><!-- end div logout-box -->

        <!-- start div shopping-card -->
        <div id="dialog-shopping-card-box" class="dialog-shopping-card">
            <p class="dialog_title"> Giỏ hàng</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
            <div class="login-content" style="height: 85%; margin: 0 auto;">
            	<table class="responstable">
				  <tbody>
					  <tr>
					    <th>orderId</th>
					    <th>Thời gian</th>
					    <th>Loại sản phẩm</span></th>
					    <th>Tên sản phẩm</th>
					    <th>Kích thước</th>
					    <th>Đặt hàng</th>
					  </tr>
					  <tr>
					    <td>1111</td>
					    <td>2016-001 00:00</td>
					    <td>MOD04</td>
					    <td>MOD04.2016.278.hdf</td>
					    <td>1Gb</td>
					    <td><input type="checkbox"></td>
					  </tr>
					  <tr>
					    <td>1111</td>
					    <td>2016-001 00:00</td>
					    <td>MOD04</td>
					    <td>MOD04.2016.278.hdf</td>
					    <td>1Gb</td>
					    <td><input type="checkbox" ></td>
					  </tr>
					  <tr>
					    <td>1111</td>
					    <td>2016-001 00:00</td>
					    <td>MOD04</td>
					    <td>MOD04.2016.278.hdf</td>
					    <td>1Gb</td>
					    <td><input type="checkbox"></td>
					  </tr>
					  <tr>
					    <td>1111</td>
					    <td>2016-001 00:00</td>
					    <td>MOD04</td>
					    <td>MOD04.2016.278.hdf</td>
					    <td>1Gb</td>
					    <td><input type="checkbox"></td>
					  </tr>
				  
					</tbody>
				</table>
				<div style="float: right;margin-right: 30px;">
					<button class="" type="button" style="">Tích tất cả</button>
					<button class="" type="button" style="">Bỏ tích tất cả</button>
					<button class="" type="button" style="">Xóa giỏ hàng</button>
				</div>
				<button class="button submit-button" type="button" style="margin-top: 60px;margin-left: 0px;">Đặt hàng</button>
            </div>
        </div><!-- end div shopping-card -->

        <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/dialog.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/jquery.pwstabs.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>

        <script  type="text/javascript">
            jQuery(document).ready(function ($) {
                $('.tabset0').pwstabs();

            });
        </script>
        <script type="text/javascript">

            $("#form-register").validate({
            	rules:{
                    name:{
                        required: true
                    },
            		email:{
            			required: true,
            			email: true
            		},
            		password:{
            			required: true,
            			minlength: 6
            		},
            		password_confirmation:{
                        required: true,
            			equalTo: "#password"
            		}
            	},
            	messages:{
                    name:{
                        required: "Vui lòng nhập họ tên.",
                    },
            		email:{
            			required: "Vui lòng nhập Email.",
            			email: "Email không đúng định dạng."
            		},
            		password:{
            			required: "Vui lòng nhập mật khẩu.",
            			minlength: "Mật khẩu tối thiếu 6 ký tự."
            		},
            		password_confirmation:{
                        required: "Vui lòng nhập mật khẩu.",
            			equalTo: "Mật khẩu xác nhận không đúng."
            		}
            	}
            });
            
            $("#form-login").validate({
                rules:{
                    email:{
                        required: true,
                        email: true

                    },
                    password:{
                        required: true,
                        minlength: 6
                    }
                },
                messages:{
                    email:{
                        required: "Vui lòng nhập Email.",
                        email: "Email không đúng định dạng."
                    },
                    password:{
                        required: "Vui lòng nhập mật khẩu.",
                        minlength: "Mật khẩu tối thiếu 6 ký tự."
                    }
                }
            });

        </script>

    </body>
</html>