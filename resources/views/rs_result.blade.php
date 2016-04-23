<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>RSAM</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/dialog.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/jquery.pwstabs.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/pwstabs.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/table.css') }}">

        <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>

    </head>
    <body>

        <div class="header" >
            <h1 class="title-banner">Hệ thống dữ liệu viễn thám, khí tượng</h1>


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

                <div data-pws-tab="tab1" data-pws-tab-name="Viễn thám" data-pws-tab-icon="fa-refresh fa-spin" >
                    <div class="pws_example_mixed_content_block">
                    <form method="post" action="{{url('/shopping-card')}}">
                        <div class="pws_example_mixed_content_result" id="form_search">
                            <div class ="title_result">
                            <div  style="margin-top: 15px;margin-left: 50px">
                                <span> Kết quả tìm được</span>
                            </div>
                            </div>
                            <input type="checkbox" value="Chọn tất cả" style="margin-left: 20px" id="check" onclick="allchecked(this);">
                            <span>Chọn tất cả</span>
                            <input type="submit" style="margin-left: 20px; margin-top: 20px ;border: 1px double black; width: 150px;height: 30px; background-color: white;box-shadow: 1px 1px 1px #888888;" value="Cho vào giỏ hàng">
                             <script> var stt=0</script>
                             <?php
                                $stt=0;
                             ?>

                            <div class="table_form_result">
                                @foreach($result_data as $data):


                                <div class="table_form_one_result">
                                    <a href="#" > <img src="{{$data->path}}.png"   name="show_image" onclick="showimage(this.id);" style="background-color: #000000;float: left; z-index: 100px; width: 100px;height: 100px; margin-left: 5px;margin-top: 8px;"  ></a>

                                <div class="data_show">
                                    <div class="name_product">
                                        <span style="font-size: 12px">{{$type_product}}</span>
                                    </div>
                                    <div class="time_product">
                                        <span >{{$data->aqstime}}</span>
                                    </div>
                                    <input type="hidden" name="type_product" id="type_product" value=" {{ $type_product  }}">
                                    <input type="hidden" name="time_product" id="time_product" value="{{ $data->aqstime}}">
                                    <input type="hidden" name="size_product" id="size_product" value=" {{ $data->size  }}">
                                    <input type="hidden" name="name_product" id="name_product" value="{{ $data->filename }}">
                                    <input type="hidden" name="eastbound"  value="{{ $data->east }}">
                                    <input type="hidden" name="northbound"  value="{{ $data->north }}">
                                    <input type="hidden" name="southbound"  value="{{ $data->south }}">
                                    <input type="hidden" name="westbound"  value="{{ $data->west }}">
                                    <input type="hidden" name="corner"  value="{{ $data->corner }}">
                                    <input type="hidden" name="stt">


                                </div>

                                <div class="toolbar_result">
                                    <div >
                                        <a href="#dialog-show-metadata" class="dialog-window toolbar_metadata">
                                        <input type="button" class=" toolbar_metadata_image"  style="background-color: white" >&nbsp;&nbsp;
                                        <span class="tooltip">Hiển thị metadata</span>
                                        </a>
                                    </div>
                                    <div >
                                        <a href="#dialog-show-download-png" class="dialog-window toolbar_download">
                                        <input type="button" class="toolbar_download_image" style="background-color: white">
                                        <span class="tooltip">Tải về png</span>
                                        </a>
                                    </div>
                                    <div class="toolbar_foot">

                                        <input type="button" class=" toolbar_foot_image" name="foot"  style="background-color: white"  onclick="footMap(this.id);">&nbsp;&nbsp;
                                        <span class="tooltip">Đánh dấu</span>

                                    </div>
                                    <input type="hidden" name="_token" value=" {{ csrf_token() }}">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                                </div>
                                    <input type="checkbox" name="check_element" value="{{$data->filename}}" id="check_element"  style="float: left;margin-left: 20px;margin-top: 40px">
                                </div>

                                @endforeach
                            </div>
                            <script>

                                         // This example creates a simple polygon representing the Bermuda Triangle.
                                    var map;
                                    function initMap(){
                                          var uluru = {lat: 21.0216, lng: 105.4657};
                                          map = new google.maps.Map(document.getElementById('map'), {
                                          zoom: 4,
                                          center: uluru
                                        });
                                      }
                                      stt++;
                                      var historicalOverlay=[];
                                      var imageBounds=[];
                                      var eastbound=[];
                                      var northbound=[];
                                      var westbound=[];
                                      var southbound=[];
                                      var triangleCoords=[];
                                      var bermudaTriangle=[];
                                      var part=[];
                                      var east=[];
                                      var north=[];
                                      var west=[];
                                      var south=[];
                                      var corner=[];
                                      var UperLeft=[];
                                      var UperRight=[];
                                      var LowerLeft=[];
                                      var LowerRight=[];
                                      var cornerCoordinate_db=[];
                                      var cornerCoordinate_sub=[];
                                      var id_stt=document.getElementsByName('show_image');
                                      var eastbound_stt=document.getElementsByName('eastbound');
                                      var northbound_stt=document.getElementsByName('northbound');
                                      var southbound_stt=document.getElementsByName('southbound');
                                      var westbound_stt=document.getElementsByName('westbound');
                                      var corner_stt=document.getElementsByName('corner');
                                      var foot_stt=document.getElementsByName('foot');
                                      for (var i=stt-1,n=id_stt.length;i<n;i++){
                                          id_stt[i].id=i;

                                          }
                                      for (var i=stt-1,n=eastbound_stt.length;i<n;i++){
                                          eastbound_stt[i].id='eastbound['+i+']';

                                          }
                                      for (var i=stt-1,n=northbound_stt.length;i<n;i++){
                                          northbound_stt[i].id='northbound['+i+']';

                                          }
                                      for (var i=stt-1,n=southbound_stt.length;i<n;i++){
                                          southbound_stt[i].id='southbound['+i+']';
                                          ;
                                          }
                                      for (var i=stt-1,n=westbound_stt.length;i<n;i++){
                                          westbound_stt[i].id='westbound['+i+']';

                                          }
                                      for (var i=stt-1,n=corner_stt.length;i<n;i++){
                                          corner_stt[i].id='corner[foot['+i+']]';

                                          }
                                      for (var i=stt-1,n=foot_stt.length;i<n;i++){
                                          foot_stt[i].id='foot['+i+']';
                                          }

                                      function footMap(id) {
                                          corner[id]='corner['+id+']';
                                          cornerCoordinate_db[id]=document.getElementById(corner[id]).value;
                                          cornerCoordinate_sub[id]=cornerCoordinate_db[id].substring(2,cornerCoordinate_db[id].length-2);
                                          alert (cornerCoordinate_sub[id]);
//                                          UperLeft[id]
//                                          UperRight[id]
//                                          LowerLeft[id]
//                                          LowerRight[id]
                                          triangleCoords[id] = [
                                              {lat: 30.7968977202481, lng: 87.5304566407693},
                                              {lat: 27.3460943296505, lng: 111.324649481482},
                                              {lat: 9.6645489566301, lng: 106.12942400895},
                                              {lat: 12.6418638326524, lng: 84.87399058194}
                                          ];

                                          // Construct the polygon.
                                          bermudaTriangle[id] = new google.maps.Polygon({
                                              paths: triangleCoords[id],
                                              strokeColor: '#FF0000',
                                              strokeOpacity: 0.8,
                                              strokeWeight: 2,
                                              fillColor: '#FF0000',
                                              fillOpacity: 0.35
                                          });

                                          bermudaTriangle[id].setMap(map);
                                      }


                                      function showimage(id) {

                                          eastbound[id]='eastbound['+id+']';
                                          northbound[id]='northbound['+id+']';
                                          southbound[id]='southbound['+id+']';
                                          westbound[id]='westbound['+id+']';
                                          part[id]=document.getElementById(id).getAttribute("src");

                                          east[id]=parseFloat(document.getElementById(eastbound[id]).value);
                                          north[id]=parseFloat(document.getElementById(northbound[id]).value);
                                          south[id]=parseFloat(document.getElementById(southbound[id]).value);
                                          west[id]=parseFloat(document.getElementById(westbound[id]).value);

                                          imageBounds[id] = {
                                              north: north[id],
                                              south: south[id],
                                              east: east[id],
                                              west: west[id]
                                          };



                                          historicalOverlay[id] = new google.maps.GroundOverlay(
                                                  part[id],
                                                  imageBounds[id]);
                                          historicalOverlay[id].setMap(map);

                                      }
                                      function removeOverlay() {
                                      for (var i=0;i<stt;i++){
                                        historicalOverlay[0].setMap(null);
                                        historicalOverlay[1].setMap(null);
                                        }
                                          }

                                  </script>

                            <script language="javascript">
                            function allchecked(source){
                            checkboxes=document.getElementsByName('check_element');
                                if (document.getElementById('check').checked==true){
                                 for(var i=0, n=checkboxes.length;i<n;i++) {
                                    checkboxes[i].checked = source.checked;
                                  }
                                  }else{
                                 for(var i=0, n=checkboxes.length;i<n;i++) {
                                    checkboxes[i].checked = false;
                                  }

                                }
                            }
                            </script>
                            <a href="index.html" ><input type="button" style="margin-left: 20px; margin-top: 20px ;margin-bottom:20px;border: 1px double black; width: 80px;height: 30px; background-color: white" value="Quay lai"  ></a>

                        </div>
                    </form>


                        <script language="javascript">

                        </script>
                        <div class="pws_example_mixed_content_right" >
                            <div style="width: 100%;height: 99%;border: 1px solid blue;margin-bottom: 10px;padding-top: 7px;background-color: white;">
                                <div id="map" style="height: 100%;margin-top: -7px; " >
                                </div>
                                <input type="button" id="hide" value="Clear map" onclick="removeOverlay();" style="z-index: 5;position: absolute;float: left;">



                                <script async defer
                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPgZPImlcrZ5Wffcmglv6XmFQgaNbG1dI&callback=initMap">
                                </script>
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
                            <select class="custom_select_tag" id="variable" style="margin-top: 2px;margin-bottom: 20px;">
                                <option value="pr">Lượng mưa</option>
                                <option value="ps">Áp suất</option>
                                <option value="sst">Nhiệt đồ bề mặt biển</option>
                                <option value="temp">Nhiệt độ</option>
                                <option value="temp2m">Nhiệt độ 2m</option>
                                <option value="wind">Gió</option>

                            </select>

                            <span id="add-level" ></span>

                            <label id="level" style="color: black;margin-left: 10px;">Cấp độ:</label> <br/>
                            <select class="custom_select_tag" id="level-option" style="margin-top: 2px;margin-bottom: 20px;">
                                <option value="1000mb">1000mb</option>
                                <option value="850mb">850mb</option>
                                <option value="500mb">500mb</option>
                                <option value="250mb">250mb</option>
                            </select>

                            <label style="color: black;margin-left: 10px;">Loại đầu ra:</label> <br/>
                            <select class="custom_select_tag" id="type-result" style="margin-top: 2px;margin-bottom: 20px;">
                                <option value="Bản đồ">Bản đồ</option>
                                <option value="Biểu đồ">Biểu đồ</option>

                            </select>

                            <span id="add-type-map" ></span>

                            <label id="label-type-map" style="color: black;margin-left: 10px;">Dạng biểu đồ:</label> <br/>
                            <select class="custom_select_tag" id="type-map" style="margin-top: 2px;margin-bottom: 20px;">
                                <option value="">contour</option>
                                <option value="">shaded</option>

                            </select>

                        </div> <!-- end div 'thuộc tính' -->

                        <script type="text/javascript">
                            $('#variable').change(function() {
                                // console.log($(this).val());
                                $('#level, #level-option').remove();
                                $variable = $(this).val();
                                if($variable == "temp" || $variable == "wind"){
                                    var level = "<label id='level' style='color: black;margin-left: 10px;''>Cấp độ:</label> <br/><select class='custom_select_tag' id='level-option' style='margin-top: 2px;margin-bottom: 20px;'><option value='1000mb'>1000mb</option><option value='850mb'>850mb</option><option value='500mb'>500mb</option><option value='250mb'>250mb</option></select>";
                                    $('#add-level').html(level);

                                }else{

                                    $('#add-level').html("<span id='add-level' ></span>");
                                }
                            });

                            $('#type-result').change(function() {
                                // console.log($(this).val());
                                $('#label-type-map, #type-map').remove();
                                var variable = $(this).val();
                                if(variable == "Bản đồ"){
                                    var level = "<label id='label-type-map' style='color: black;margin-left: 10px;''>Dạng biểu đồ:</label> <br/><select class='custom_select_tag' id='type-map' style='margin-top: 2px;margin-bottom: 20px;'><option >contour</option><option >shaded</option></select>";
                                    $('#add-type-map').html(level);

                                }else{

                                    $('#add-type-map').html("<span id='add-type-map' ></span>");
                                }
                            });
                        </script>

                        <input type="button" value="Thời gian" class="button_title_feature" style="border: 1px solid blue;" >
                        <div class="table_form_feature" style="height: auto;background-color: white;border: 1px solid blue;"><br/><br/>
                            <label style="color: black;margin-left: 10px;">Thang tỷ lệ:</label> <br/>
                            <select class="custom_select_tag" id="time-date" style="margin-top: 2px;margin-bottom: 20px;">
                                <option value="daily">Hàng ngày</option>
                                <option value="monthly">Hàng tháng</option>
                                <option value="year">Hàng năm</option>

                            </select>

                            <label id="" style="color: black;margin-left: 10px;">Thời gian từ:</label> <br/>
                            <input type="date" id="fromtDate" style="margin-left: 10px;margin-top: 2px;margin-bottom: 20px;box-shadow: 1px 1px 1px #888888; border:1px solid #9D9DA2;height: 30px;"><br>

                            <label id="" style="color: black;margin-left: 10px;">Thời gian đến:</label> <br/>
                            <input type="date"  id="totDate" style="margin-left: 10px;margin-top: 2px;margin-bottom: 20px;box-shadow: 1px 1px 1px #888888; border:1px solid #9D9DA2;height: 30px;"><br>

                        </div>  <!-- end div 'thời gian' -->

                        <script type="text/javascript">
                            $('#time-date').change(function() {

                                $('#totDate').disabled();
                                // var variable = $(this).val();
                                // if(variable == "daily"){
                                //     $()
                                // }else{

                                //     $('#add-type-map').html("<span id='add-type-map' ></span>");
                                // }
                            });
                        </script>




                        <input type="button" value="Không gian" class="button_title_feature" style="border: 1px solid blue;" >
                        <div class="table_form_feature" style="height: auto;background-color: white;border: 1px solid blue;"><br/><br/>
                           <label style="color: black;margin-left: 10px;">Min lat:</label>
                           <label style="color: black;margin-left: 10px;float: right;margin-right: 78px;">Max lat:</label><br/>
                            <input type="text" style="box-shadow: 1px 1px 1px #888888;width: 120px;margin-left: 10px;float: left;" >
                            <input type="text" style="box-shadow: 1px 1px 1px #888888;width: 120px;float: right;margin-right: 10px" ><br/>
                            <p style="margin-top: 20px;"></p>

                            <label style="color: black;margin-left: 10px;">Min lon:</label>
                           <label style="color: black;margin-left: 10px;float: right;margin-right: 78px;">Max lon:</label><br/>
                            <input type="text" style="box-shadow: 1px 1px 1px #888888;width: 120px;margin-left: 10px;float: left;" >
                            <input type="text" style="box-shadow: 1px 1px 1px #888888;width: 120px;float: right;margin-right: 10px" ><br/>
                            <p style="margin-top: 20px;"></p>
                        </div> <!-- end div 'không gian' -->



                    </div> <!-- end pws_example_mixed_content_left -->

                    <!-- start pws_example_mixed_content_right -->
                    <div class="pws_example_mixed_content_right" >
                        <div style="width: 100%;height: 7%;border: 1px solid blue;margin-bottom: 10px;padding-top: 7px;">
                            <a class="button" id="plot" style="padding: 0px 15px;text-decoration: none;margin-left: 5px;">Plot</a>
                            <a class="button" id="reset" style="padding: 0px 15px;text-decoration: none;">Đặt lại</a>

                            <select class="custom_select_tag" id="option-time" style="margin-top: 7px;width: 150px;">
                                <option value="">10 - 6 - 2012</option>
                                <option value="">11 - 6 - 2012</option>
                                <option value="">12 - 6 - 2012</option>
                                <option value="">13 - 6 - 2012</option>
                                <option value="">14 - 6 - 2012</option>

                            </select>
                            <a class="button" id="animation" style="padding: 0px 15px;text-decoration: none;">Tạo animation</a>
                            <a href="#dialog-add-shopping-card-box" class="dialog-window button" id="shopping-card" style="padding: 0px 15px;text-decoration: none;margin-left: 10px;">Thêm</a>
                            <a href="#dialog-download-box" class="dialog-window button" id="download" style="padding: 0px 15px;text-decoration: none;">Tải về</a>
                        </div> <!-- end option -->

                        <script type="text/javascript">

                            $(document).ready(function(){
                                $('#reset, #animation, #download, #shopping-card, #option-time').hide();
                                // $('#reset').attr("disabled", true);
                                // $('#reset').css('background-color', '#BDAFC7');
                            });

                            $('#plot').click(function() {
                                $('#reset, #animation, #download, #shopping-card, #option-time').show();
                                $('#plot').attr("disabled", true);
                                $('#plot').css('background-color', '#BDAFC7');

                            });
                            $('#reset').click(function() {
                                $('#plot').css('background-color', '#844CAF');
                                $('#reset, #animation, #download, #shopping-card, #option-time').hide();
                                $('#plot').attr("disabled", false);


                            });

                        </script>

                        <div style="width: 100%;height: 90%;;border: 1px solid blue;">
                            <img src="{{ asset('public/img/plot-example.png') }}" width="100%" height="100%">
                        </div>
                    </div> <!-- end pws_example_mixed_content_right -->













                </div>
            </div><!-- tabset0 -->


        </div><!-- content -->
        <div class="footer">
            &copy; 2016 - Copy right by DuongND
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
        </div> <!-- end div show-box -->
        <!--Show metadata-->
        @foreach($result_data as $meta):
            <div id="dialog-show-metadata" class="dialog">
                <p class="dialog_title_metadata">Thông số dữ liệu </p> <br /><br />
                     <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>

                    <form method="post" id="form-metadata" class="login-content" action="{{url ('/download') }}">
                    <table border="1" style="width:90%;height: 90%;margin-bottom: 10px;">
                      <tr>
                          <th style="border: 1px solid black;height: 30px;text-align: center;">Tên trường</th>
                          <th style="border: 1px solid black;height: 30px;text-align: center">Giá trị</th>

                        </tr>
                        <tr >
                          <td style="font-size: 10px">Tên sản phẩm</td>
                          <td  style="font-size: 10px" >{{$meta->filename}}</td>
                        </tr>
                        <tr >
                          <td style="font-size: 10px">Band hiển thị hiện tại</td>
                          <td style="font-size: 10px"><?php if($type_product=='MOD04')
                            {
                               echo "Aerosol_Optical_Depth_Land_And_Ocean";
                            }else if($type_product=='MOD07'){
                                echo "Skin_Temperature";
                            }
                            ?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 10px">Ngày sản xuất</td>
                          <td style="font-size: 10px">{{$meta->aqstime}}</td>
                        </tr>
                        <tr>
                          <td style="font-size: 10px">Dung lượng</td>
                          <td style="font-size: 10px">{{$meta->size}} KB</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px">Phiên bản</td>
                            <td style="font-size: 10px">{{$meta->collection}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px">Vĩ độ góc trên trái</td>
                            <td style="font-size: 10px"></td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px">Kinh độ góc trên trái</td>
                            <td style="font-size: 10px"></td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px">Vĩ độ góc dưới phải</td>
                            <td style="font-size: 10px"></td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px">Kinh độ góc dưới phải</td>
                            <td style="font-size: 10px"></td>
                        </tr>

                    </table>
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                        <input type="hidden" name="_token" value=" {{ csrf_token() }}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" id="metadata_name_product" name="metadata_name_product" value="{{$meta->filename}}">

                        <button class="button submit-button" type="submit" style="font-size: 12px;">Tải về để xem đầy đủ</button>
                    </form>
            </div>
        @endforeach

        <!--download png div-->
        @foreach($result_data as $meta):
            <div id="dialog-show-download-png" class="dialog">
                <p class="dialog_title_metadata">Tải về </p> <br /><br />
                     <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>

                    <form method="post" id="form-metadata" class="login-content" action="{{url ('/download_png') }}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                        <input type="hidden" name="_token" value=" {{ csrf_token() }}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" id="metadata_name_product" name="metadata_name_product" value="{{$meta->filename}}">
                        <p>Bạn sẽ phải đăng nhập để đặt hàng sản phẩm dữ liệu đầy đủ</p>
                        <button class="button submit-button" type="submit" style="font-size: 12px;">Tải về ảnh png</button>
                    </form>
            </div>
        @endforeach
        <!--end-->


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

                        <th>Thời gian</th>
                        <th>Loại sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Kích thước</th>
                        <th>Đặt hàng</th>
                      </tr>

                      {{--@foreach($shopping_data as $shopping):--}}
                      {{--<tr>--}}
                        {{--<td>{{$shopping->datetime}}</td>--}}
                        {{--<td>{{$shopping->type_product}}</td>--}}
                        {{--<td>{{$shopping->name_product}}</td>--}}
                        {{--<td>{{$shopping->size}}</td>--}}

                        {{--<td><input type="checkbox"></td>--}}
                      {{--</tr>--}}
                      {{--@endforeach--}}

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
            <form method="post" id="form-reset-password" class="login-content"  role="form" >
                <div style="width: 380px;height: 200px;overflow: auto;border: 1px solid blue;margin-bottom: 6px;">
                    <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.10.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.11.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.12.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.13.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.14.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.15.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.16.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.17.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.18.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.19.6.2012.png</label> <br/>
                    <input type="checkbox" style="width: 17px" ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.20.6.2012.png</label> <br/>
                </div>
                <input type="checkbox" style="width: 17px" id="select-all" ></input>
                <label style="margin-left: 30px;margin-top: -25px;" >Chọn tất cả</label> <br/>

                <button class="button submit-button" type="submit" style="margin-bottom: 40px;margin-top: 5px;" >Tải về</button>


            </form>
        </div> <!-- end div download-box -->

        <!-- start div add-shopping-card-box -->
        <div id="dialog-add-shopping-card-box" class="dialog">
            <p class="dialog_title">Đặt hàng</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
            <form method="post" id="form-reset-password" class="login-content"  role="form" >
                <div style="width: 380px;overflow: auto;border: 1px solid blue;margin-bottom: 6px;">
                    <input type="checkbox" style="width: 17px" checked ></input>
                    <label style="margin-left: 30px;margin-top: -25px;" >nhietdo.10.6.2012.nc</label> <br/>
                </div>

                <button class="button submit-button" type="submit" style="margin-bottom: 40px;margin-top: 5px;" >Thêm vào giỏ hàng</button>


            </form>
        </div> <!-- end div add-shopping-card-box -->










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