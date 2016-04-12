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
                        <div class="pws_example_mixed_content_left" id="form_search">
                            <input type="button" value="Chọn thuộc tính" class="button_title_feature" >
                                <div class="table_form_feature">
                                    <select class="custom_select_tag">
                                        <option value="Dạng dữ liệu">Dạng dữ liệu</option>
                                        <option value="EOS">EOS</option>
                                        <option value="NPP">NPP</option>

                                    </select>
                                    <select class="custom_select_tag">
                                        <option value="Nền tảng">Nền tảng</option>
                                        <option value="Aqua">Aqua</option>
                                        <option value="Terra">Terra</option>
                                    </select>
                                    <select class="custom_select_tag">
                                        <option value="Cấp độ sản phẩm">Cấp độ sản phẩm</option>
                                        <option value="Level 1A">Level 1A</option>
                                        <option value="Level 1B">Level 1B</option>
                                        <option value="Level 2">Level 2</option>
                                    </select>
                                    <select class="custom_select_tag">
                                        <option value="Loại sản phẩm">Loại sản phẩm</option>
                                        <option value="MOD04">MOD04</option>
                                        <option value="MOD06">MOD06</option>
                                        <option value="MOD07">MOD07</option>
                                        <option value="MOP10">MOD10</option>
                                        <option value="MOD11">MOD11</option>
                                        <option value="MOD13">MOD13</option>
                                        <option value="MOD14">MOD14</option>
                                        <option value="MOD29">MOD29</option>
                                        <option value="MOD35">MOD35</option>
                                        <option value="MODOC">MODOC</option>
                                        <option value="MODCR">MODCR</option>
                                    </select>
                                </div>

                                <input type="button" value="Chọn thời gian" class="button_title_time" >
                                <div class="table_form_time">
                                    <input type="button" value ="Thời gian từ" class="button_title_date_from"><br>
                                    <input type="date" style="margin-left: 10px;box-shadow: 1px 1px 1px #888888; border:1px solid #000000;height: 30px;"><br>
                                    <input type="button" value ="Thời gian đến" class="button_title_date_to"><br>
                                    <input type="date" style="margin-left: 10px;box-shadow: 1px 1px 1px #888888;border:1px solid #000000;height: 30px">
                                </div>
                                <input type="submit" style="margin-left: 20px; margin-top: 20px ;border: 1px double black; width: 80px;height: 30px; background-color: white" value="Tìm kiếm" onclick="show_result('form_search','form_result');" >
                        </div><!-- pws_example_mixed_content_left -->
                        <div class="pws_example_mixed_content_result" id="form_result">
                            <div class ="title_result">
                                <div  style="margin-top: 15px;margin-left: 50px">
                                    <span> Có 500 kết quả tìm được</span>
                                </div>
                            </div>
                            <input type="checkbox" value="Chọn tất cả" style="margin-left: 20px" id="check" onclick="allchecked();">
                            <span>Chọn tất cả</span>
                            <input type="submit" style="margin-left: 20px; margin-top: 20px ;border: 1px double black; width: 150px;height: 30px; background-color: white;box-shadow: 1px 1px 1px #888888;" value="Cho vào giỏ hàng" >
                            <div class="table_form_result">
                                <div class="table_form_one_result">
                                    <a href="#" class="result_image"></a>
                                    <div class="data_show">
                                        <div class="name_product">
                                            <span>MOD04..............</span>
                                        </div>
                                        <div class="time_product">
                                             <span>11/04/2016</span>
                                        </div>
                                    </div>
                                    <div class="toolbar_result">
                                        <a href="#" class="toolbar_metadata_image"></a>
                                        <a href="#" class="toolbar_download_image"></a>
                                    </div>
                                    <input type="checkbox" id ="check1" style="float: leftl;margin-left: 40px;margin-top: 40px">
                                </div>
                                 <div class="table_form_one_result">
                                    <a href="#" class="result_image"></a>
                                      <div class="data_show">
                                            <div class="name_product">
                                                <span>MOD04..............</span>
                                            </div>
                                            <div class="time_product">
                                                 <span>11/04/2016</span>
                                            </div>
                                            </div>
                                            <div class="toolbar_result">
                                                <a href="#" class="toolbar_metadata_image"></a>
                                                <a href="#" class="toolbar_download_image"></a>
                                      </div>
                                      <input type="checkbox" id ="check2" style="float: leftl;margin-left: 40px;margin-top: 40px">
                                 </div>
                                 <div class="table_form_one_result">
                                    <a href="#" class="result_image"></a>
                                    <div class="data_show">
                                        <div class="name_product">
                                            <span>MOD04..............</span>
                                        </div>
                                        <div class="time_product">
                                             <span>11/04/2016</span>
                                        </div>
                                    </div>
                                    <div class="toolbar_result">
                                        <a href="#" class="toolbar_metadata_image"></a>
                                        <a href="#" class="toolbar_download_image"></a>
                                    </div>
                                    <input type="checkbox" id ="check3" style="float: leftl;margin-left: 40px;margin-top: 40px">
                                </div>
                                <div class="table_form_one_result">
                                    <a href="#" class="result_image"></a>
                                    <div class="data_show">
                                        <div class="name_product">
                                            <span>MOD04..............</span>
                                        </div>
                                        <div class="time_product">
                                             <span>11/04/2016</span>
                                        </div>
                                    </div>
                                    <div class="toolbar_result">
                                        <a href="#" class="toolbar_metadata_image"></a>
                                        <a href="#" class="toolbar_download_image"></a>
                                    </div>
                                    <input type="checkbox" id ="check4" style="float: leftl;margin-left: 40px;margin-top: 40px">
                                </div>
                                <div class="table_form_one_result">
                                    <a href="#" class="result_image"></a>
                                    <div class="data_show">
                                        <div class="name_product">
                                            <span>MOD04..............</span>
                                        </div>
                                        <div class="time_product">
                                             <span>11/04/2016</span>
                                        </div>
                                    </div>
                                    <div class="toolbar_result">
                                        <a href="#" class="toolbar_metadata_image"></a>
                                        <a href="#" class="toolbar_download_image"></a>
                                    </div>
                                    <input type="checkbox" id ="check5" style="float: leftl;margin-left: 40px;margin-top: 40px">
                                </div>
                                <div class="table_form_one_result">
                                    <a href="#" class="result_image"></a>
                                    <div class="data_show">
                                        <div class="name_product">
                                            <span>MOD04..............</span>
                                        </div>
                                        <div class="time_product">
                                             <span>11/04/2016</span>
                                        </div>
                                    </div>
                                    <div class="toolbar_result">
                                        <a href="#" class="toolbar_metadata_image"></a>
                                        <a href="#" class="toolbar_download_image"></a>
                                    </div>
                                    <input type="checkbox" id ="check6" style="float: leftl;margin-left: 40px;margin-top: 40px" >

                                </div>
                                <script language="javascript">
                                    function allchecked(){
                                        if (document.getElementById('check').checked==true){
                                            document.getElementById('check1').checked=true;
                                            document.getElementById('check2').checked=true;
                                            document.getElementById('check3').checked=true;
                                            document.getElementById('check4').checked=true;
                                            document.getElementById('check5').checked=true;
                                            document.getElementById('check6').checked=true;
                                            }else{
                                                document.getElementById('check1').checked=false;
                                                document.getElementById('check2').checked=false;
                                                document.getElementById('check3').checked=false;
                                                document.getElementById('check4').checked=false;
                                                document.getElementById('check5').checked=false;
                                                document.getElementById('check6').checked=false;
                                            }
                                    }
                                </script>
                            </div>
                            <input type="submit" style="margin-left: 20px; margin-top: 20px ;margin-bottom:20px;border: 1px double black; width: 80px;height: 30px; background-color: white" value="Quay lai" onclick="back_seach('form_search','form_result');" >

                          </div>


                        <script language="javascript">
                            function show_result(id1,id2){
                                if (document.getElementById(id1).style.display='block'){
                                    document.getElementById(id1).style.display='none';
                                    document.getElementById(id2).style.display='block';
                                }
                            }
                            function back_seach(id1,id2){
                                if (document.getElementById(id2).style.display='block'){
                                    document.getElementById(id2).style.display='none';
                                    document.getElementById(id1).style.display='block';
                                }
                            }
                        </script>
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
                <span style="margin-top: -35px;margin-bottom: 30px;margin-left: 170px;"> 
                <a class="forgot" href="#">Quên mật khẩu?</a>
                </span><br /><br /> 

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

        <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/jquery.pwstabs.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/dialog.js') }}"></script>
        

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