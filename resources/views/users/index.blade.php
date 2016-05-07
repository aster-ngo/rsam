<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>RSAM</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/dialog.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/jquery.pwstabs.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/pwstabs.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/table.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/jquery-ui.css') }}">

        <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/jquery-ui.js') }}"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

    </head>


    <style type="text/css">
        #toolbar {
            height: 20px;
            font-size: 12px;
            font-weight: bold;
            background: #efefef;
            background: linear-gradient(#fefefe, #efefef);
            border: 1px solid #678ab7;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.35);
            margin-bottom: 5px;
            padding-top: 10px;
            padding-right: 20px;
            /*float: right;*/
        }
    </style>


    <body>
        
        <div class="header" >
            <!-- <h1 class="title-banner">Hệ thống dữ liệu viễn thám, khí tượng</h1> -->

        </div> <!-- end header -->

        <div id="toolbar">            
                 @if (Auth::guest())
                    <!-- <a href="#dialog-profile-box" class="dialog-window button" style="padding: 0px 15px;">Chào mừng DuongND</a>&nbsp;&nbsp; -->
                    <a href="#dialog-login-box" class="dialog-window" style="float: right;">Đăng nhập</a>
                    <a href="#dialog-logout-box" class="dialog-window" style="padding: 0px 15px;float: right;">Đăng ký</a>&nbsp;

                @else
                    <a href="{{ url('/auth/logout') }}" class="dialog-window" style="color: blue;padding: 0px 15px;float: right;">Thoát</a>&nbsp;&nbsp;
                    
                    <a href="#dialog-profile-box" class="dialog-window" style="padding: 0px 15px;float: right;">Chào mừng {{ Auth::user()->name }}</a>&nbsp;&nbsp;
                    <a href="#dialog-shopping-card-box" class="dialog-window" style="padding: 0px 15px;float: right;">Giỏ hàng</a>&nbsp;&nbsp;
                    
                @endif
            
        </div> <!-- end div option -->

        <span class="content">
            <div class="tabset0">

                <div data-pws-tab="tab1" data-pws-tab-name="Viễn thám" data-pws-tab-icon="fa-refresh fa-spin" >
                    <div class="pws_example_mixed_content_block">
                        <form method="post" action="{{url ('/rs_result')}}"   >
                            <div class="pws_example_mixed_content_left" id="form_search">

                                    

                            </div><!-- pws_example_mixed_content_left -->
                        </form>

                    


                        <div class="pws_example_mixed_content_right" >
                            <div style="width: 100%;height: 99%;border: 1px solid blue;margin-bottom: 10px;padding-top: 7px;background-color: white;">
                                <div id="map" style="width: 30%;height: 100%;margin-top: -7px;"></div>
                                
                                
                                </div>
                            <div>
                                
                            </div>
                        </div><!-- pws_example_mixed_content_right -->
                    </div><!-- pws_example_mixed_content_block -->
                    </div>
        





















                 <div data-pws-tab="tab2" data-pws-tab-name="Khí tượng" data-pws-tab-icon="fa-child">

                    <!-- start pws_example_mixed_content_left -->
                    <div class="pws_example_mixed_content_left" >

                        <input type="button" value="Thuộc tính" class="button_title_feature" style="border: 1px solid blue;" >
                        <div class="table_form_feature" style="height: auto;background-color: white;border: 1px solid blue;"><br/><br/>
                            <label style="color: black;margin-left: 10px;">Thành phần:</label> <br/>
                            <select class="custom_select_tag" id="variable" name="variable" style="margin-top: 2px;margin-bottom: 20px;">
                                <option value="pr" selected >Lượng mưa</option>
                                <option value="ps">Áp suất</option>
                                <option value="sst">Nhiệt đồ bề mặt biển</option>
                                <option value="temp">Nhiệt độ</option>
                                <option value="temp2m">Nhiệt độ 2m</option>
                                <option value="wind">Gió</option>

                            </select>

                            <span id="add-level" ></span>

                            <label id="level-variable" style="color: black;margin-left: 10px;">Cấp độ:</label> <br/>
                            <select class="custom_select_tag" id="level-option" name="level-option" style="margin-top: 2px;margin-bottom: 20px;">
                                <option value="1000">1000mb</option>
                                <option value="850">850mb</option>
                                <option value="500">500mb</option>
                                <option value="200">250mb</option>
                            </select>

                            <label style="color: black;margin-left: 10px;">Loại đầu ra:</label> <br/>
                            <select class="custom_select_tag" id="type-result" name="type-result" style="margin-top: 2px;margin-bottom: 20px;">
                                <option value="map">Bản đồ</option>
                                <option value="chart">Biểu đồ</option>
                                
                            </select>

                            <span id="add-type-map" ></span>

                            <label id="label-type-map" style="color: black;margin-left: 10px;">Dạng biểu đồ:</label> <br/>
                            <select class="custom_select_tag" id="type-map" name="type-map" style="margin-top: 2px;margin-bottom: 20px;">
                                <option value="shaded" selected >shaded</option>
                                <option value="contour">contour</option>
                                
                            </select>

                        </div> <!-- end div 'thuộc tính' -->

                        <script type="text/javascript">
                            
                        </script>

                        <input type="button" value="Thời gian" class="button_title_feature" style="border: 1px solid blue;" >
                        <div class="table_form_feature" style="height: auto;background-color: white;border: 1px solid blue;"><br/><br/>
                            <label style="color: black;margin-left: 10px;">Thang tỷ lệ:</label> <br/>
                            <select class="custom_select_tag" id="time-date" name="time-date" style="margin-top: 2px;margin-bottom: 20px;">
                                <option value="daily" selected >Hàng ngày</option>
                                <option value="monthly">Hàng tháng</option>
                                <option value="year">Hàng năm</option>

                            </select>
                        <div id="div-add-date-time" >
                        </div>
                        <div id="div-date-time" >
                            
                            <span id="add-from-date" ></span>
                            <label id="label-time" style="color: black;margin-left: 10px;">Thời gian từ:</label> <br/>
                            <input type="text" id="fromDate" class="fromDate time" name="fromDate" value="02-03-2012" placeholder="dd-mm-yyyy" ><br/> 
    

                            <label id="label-time" style="color: black;margin-left: 10px;">Thời gian đến:</label> <br/>
                            <span id="add-to-date" ></span>
                            <input type="text" id="toDate" class="toDate time" name="toDate" value="04-03-2012" placeholder="dd-mm-yyyy" ><br/>
                        </div>
                        </div>  <!-- end div 'thời gian' -->










                        <input type="button" value="Không gian" class="button_title_feature" style="border: 1px solid blue;" >
                        <div class="table_form_feature" style="height: auto;background-color: white;border: 1px solid blue;"><br/><br/>
                           <label style="color: black;margin-left: 10px;">Min lat:</label>
                           <label style="color: black;margin-left: 10px;float: right;margin-right: 78px;">Max lat:</label><br/>
                            <input type="text" id="minlat" name="minlat" value="7" style="width: 120px;margin-left: 10px;float: left;" ></input>
                            <input type="text" id="maxlat" name="maxlat" value="30" style="width: 120px;float: right;margin-right: 10px" ></input><br/>
                            <p style="margin-top: 20px;"></p>
                            
                            <label style="color: black;margin-left: 10px;">Min lon:</label>
                           <label style="color: black;margin-left: 10px;float: right;margin-right: 78px;">Max lon:</label><br/>
                            <input type="text" id="minlon" name="minlon" value="90" style="width: 120px;margin-left: 10px;float: left;" ></input>
                            <input type="text" id="maxlon" name="maxlon" value="120" style="width: 120px;float: right;margin-right: 10px" ></input><br/>
                            <p style="margin-top: 20px;"></p>

                            



                        </div> <!-- end div 'không gian' -->



                    </div> <!-- end pws_example_mixed_content_left -->

                    <!-- start pws_example_mixed_content_right -->
                    <div class="pws_example_mixed_content_right" >
                        <div style="width: 100%;height: 7%;border: 1px solid blue;margin-bottom: 10px;padding-top: 7px;">
                            <!-- <a class="button" id="plot" style="padding: 0px 15px;text-decoration: none;margin-left: 5px;">Plot</a> -->
                            <input type="button" class="button" id="plot" style="padding: 0px 15px;text-decoration: none;margin-left: 5px;" value="Tạo ảnh"></input>
                            <a class="button" id="reset" style="padding: 0px 15px;text-decoration: none;">Đặt lại</a>

                            <select class="custom_select_tag" id="option-time" style="margin-top: 7px;width: 150px;">

                            </select>
                            <a class="button" id="create-animation" style="padding: 0px 15px;text-decoration: none;">Tạo ảnh động</a>


                            @if (!Auth::guest())
                                <a href="#dialog-add-shopping-card-box" class="dialog-window button" id="dialog-shopping-card" style="padding: 0px 15px;text-decoration: none;margin-left: 10px;">Thêm giỏ hàng</a>
                            @endif
                            

                            <a href="#dialog-download-box" class="dialog-window button" id="dialog-download" style="padding: 0px 15px;text-decoration: none;">Tải về</a>
                        </div> <!-- end option -->

                       

                        <div style="width: 97.6%%;height: 90%;;border: 1px solid blue;padding: 10px">
                            <img id="plot-result" src="{{ asset('public/img/plot-example.png') }}" width="100%" height="100%" >
                            <span id="not-data" >Không có dữ liệu.</span>
                        </div>
                    </div> <!-- end pws_example_mixed_content_right -->
                    
                    





















                    
                </div>
            </div><!-- tabset0 -->


        </span><!-- content -->
        <div class="footer">
            &copy; 2016 - Copy right by RSAM
        </div><!-- footer -->


        @yield('option')

        <!-- start div login-box -->
        <div id="dialog-login-box" class="dialog">
            <p class="dialog_title"> Đăng nhập</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
            <form method="post" id="form-login" class="login-content" action="{{ url('/auth/login') }}" role="form" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label class="email">
                <span>Email:</span>
                <input id="email_login" name="email_login" type="email" autocomplete="on" placeholder="example@gmail.com">
                </label><br/>
                <label class="password">
                <span>Mật khẩu:</span>
                <input id="password_login" name="password_login" type="password" placeholder="Mật khẩu">
                </label>

                <button class="button submit-button" type="submit" style="margin-left: 0px;" >Đăng nhập</button>
                <span style="margin-top: -40px;margin-bottom: 30px;margin-left: 170px;text-decoration: underline;"> 
                <!-- <a class="reset-password" href="dialog-reset-password">Quên mật khẩu?</a> -->
                <a href="#dialog-reset-box" class="reset-password">Quên mật khẩu</a>
                </span><br /><br /> 

            </form>
        </div> <!-- end div login-box -->
               
        </div>
        
        <!-- start div login-box -->
        <div id="dialog-reset-box" class="dialog">
            <p class="dialog_title"> Quên mật khẩu</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
            <form method="post" id="form-reset-password" class="login-content" action="{{ url('reset-password') }}" role="form" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label class="email">
                <span>Email:</span>
                <input id="email_reset_password" name="email_reset_password" type="email" autocomplete="on" placeholder="example@gmail.com">
                </label><br/>

                <button class="button submit-button" type="submit" style="margin-bottom: 40px;margin-top: 5px;" >Gửi mail</button>
                

            </form>
        </div> <!-- end div login-box -->


        <!-- start div logout-box -->
        <div id="dialog-logout-box" class="dialog">
            <p class="dialog_title"> Đăng ký</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>

            <form method="post" id="form-register" class="login-content" action="{{ url('/auth/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="role" value="1">
                <label class="name">
                <span>Họ tên:</span><input id="name_register" name="name_register" type="text" autocomplete="on" placeholder="Họ và tên">
                </label><br />
                <label class="email">
                <span>Email:</span><input id="email_register" name="email_register" type="email" autocomplete="on" placeholder="example@gmail.com">
                </label><br />
                <label class="password">
                <span>Mật khẩu:</span><input id="password_register" name="password_register" type="password" placeholder="Mật khẩu">
                </label><br />
                <label class="password">
                <span>Gõ lại mật khẩu:</span><input id="password_confirmation_register" name="password_confirmation_register" type="password" placeholder="Gõ lại mật khẩu">
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

        <!-- start div download-box -->
        <div id="dialog-download-box" class="dialog">
            <p class="dialog_title">Tải về</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
            <form class="login-content" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div id="list-result-png" style="width: 380px;height: 200px;overflow: auto;border: 1px solid blue;margin-bottom: 6px;">
                    <!-- <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.10.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                     -->
                </div>
                <input id="select-all-result-png" type="checkbox" style="width: 17px" id="select-all" ></input>
                <label style="margin-left: 30px;margin-top: -25px;" >Chọn tất cả</label> <br/>

                <button id="download-png" class="button submit-button" type="button" style="margin-bottom: 40px;margin-top: 5px;" >Tải về</button>
                

            </form>
        </div> <!-- end div download-box -->

        <!-- start div add-shopping-card-box -->
        <div id="dialog-add-shopping-card-box" class="dialog">
            <p class="dialog_title">Giỏ hàng</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
            <form class="login-content" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div id="list-result-filename" style="width: 380px;height: 200px;overflow: auto;border: 1px solid blue;margin-bottom: 6px;">
                    <!-- <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.10.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                     -->
                </div>
                <input id="select-all-result-filename" type="checkbox" style="width: 17px" id="select-all" ></input>
                <label style="margin-left: 30px;margin-top: -25px;" >Chọn tất cả</label> <br/>

                <button id="add-shopping-card" class="button submit-button" type="button" style="margin-bottom: 40px;margin-top: 5px;" >Thêm vào giỏ</button>
                

            </form>
        </div> <!-- end div add-shopping-card-box -->




























        <script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/jquery.pwstabs.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/dialog.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/mydatepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/meteo.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/meteo-input.js') }}"></script>
        

        <script  type="text/javascript">
            jQuery(document).ready(function ($) {
                $('.tabset0').pwstabs();

            });
        </script>

        <script type="text/javascript">
            $("#form-login").validate({
                rules:{
                    email_login:{
                        required: true,
                        email: true

                    },
                    password_login:{
                        required: true,
                        minlength: 6
                    }
                },
                messages:{
                    email_login:{
                        required: "Vui lòng nhập Email.",
                        email: "Email không đúng định dạng."
                    },
                    password_login:{
                        required: "Vui lòng nhập mật khẩu.",
                        minlength: "Mật khẩu tối thiếu 6 ký tự."
                    }
                }
            });

            $("#form-reset-password").validate({
                rules:{
                    email_reset_password:{
                        required: true,
                        email: true,
                    }
                },
                messages:{
                    email_reset_password:{
                        required: "Vui lòng nhập Email.",
                        email: "Email không đúng định dạng.",
                    }
                }
            });

            $("#form-register").validate({
                rules:{
                    name_register:{
                        required: true
                    },
                    email_register:{
                        required: true,
                        email: true
                    },
                    password_register:{
                        required: true,
                        minlength: 6
                    },
                    password_confirmation_register:{
                        required: true,
                        equalTo: "#password_register"
                    }
                },
                messages:{
                    name_register:{
                        required: "Vui lòng nhập họ tên.",
                    },
                    email_register:{
                        required: "Vui lòng nhập Email.",
                        email: "Email không đúng định dạng."
                    },
                    password_register:{
                        required: "Vui lòng nhập mật khẩu.",
                        minlength: "Mật khẩu tối thiếu 6 ký tự."
                    },
                    password_confirmation_register:{
                        required: "Vui lòng nhập mật khẩu.",
                        equalTo: "Mật khẩu xác nhận không đúng."
                    }
                }
            });

        </script>

    </body>
</html>