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
    <body>

        <div class="header" >
           
        </div> <!-- end header -->

        <div id="toolbar">            
            <a href="{!! url('index.html') !!}" style="color: blue;float: left;">Trang chủ</a>
            @if (Auth::guest())
                <!-- <a href="#dialog-profile-box" class="dialog-window button" style="padding: 0px 15px;">Chào mừng DuongND</a>&nbsp;&nbsp; -->
                <a href="#dialog-login-box" class="dialog-window" style="color: blue;float: right;">Đăng nhập</a>
                <a href="#dialog-logout-box" class="dialog-window" style="color: blue;padding: 0px 15px;float: right;">Đăng ký</a>&nbsp;

            @else
                <a href="{{ url('/auth/logout') }}" class="dialog-window" style="color: blue;padding: 0px 15px;float: right;">Thoát</a>&nbsp;&nbsp;
                
                <a href="#dialog-profile-box" class="dialog-window" style="color: blue;padding: 0px 15px;float: right;">Chào mừng {{ Auth::user()->name }}</a>&nbsp;&nbsp;
                <a href="{{url('/home/shopping-card')}}" class="dialog-window" style="color: blue;padding: 0px 15px;float: right;">Giỏ hàng</a>&nbsp;&nbsp;
                
            @endif
            
        </div> <!-- end div option -->
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
                             <?php $stt ?>
                            <div class="table_form_result">
                              
                                @foreach($result_data as $data)
                                <div class="table_form_one_result">
                                    <a href="#" > <img src="{{$data->path}}{{ $data->filename }}.png"   name="show_image" onclick="showimage(this.id);" style="background-color: #000000;float: left; z-index: 100px; width: 80px;height: 80px; margin-left: 5px;margin-top: 8px;"  ></a>

                                <div class="data_show">
                                    <div class="name_product">
                                        <span style="font-size: 8px">{{$data ->filename}}</span>
                                    </div>
                                    <div class="time_product">
                                       
                                        <span id="datetimes" style ="font-size:10px;" >Date :{{$data->aqstime}}</span>


                                    </div>
                                    <input type="hidden" name="type_product" id="type_product" value=" {{ $type_product }}">
                                    <input type="hidden" name="time_product"  id="time_product" value="{{ $data->aqstime}}">
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
                                    <div class="toolbar_delete">
                                        <input type="button" class=" toolbar_delete_image" name="hide_Image"  style="background-color: white;" onclick="hideImage(this.id);">
                                        &nbsp;
                                        <span class="tooltip">Ẩn ảnh</span>
                                    </div>

                                    <div >
                                        <a href="#dialog-show-metadata" class="dialog-window toolbar_metadata">
                                        <input type="button" class=" toolbar_metadata_image"  style="background-color: white" >
                                        &nbsp;
                                        <span class="tooltip">Hiển thị metadata</span>
                                        </a>
                                    </div>
                                    <div >
                                        <a href="#dialog-show-download-png" class="dialog-window toolbar_download">
                                        <input type="button" class="toolbar_download_image" style="background-color: white">
                                        &nbsp;
                                        <span class="tooltip">Tải về png</span>
                                        </a>
                                    </div>
                                    <div class="toolbar_foot">
                                        <input type="button" class=" toolbar_foot_image" name="foot"  style="background-color: white;"  onclick="footMap(this.id);">
                                        &nbsp;
                                        <span class="tooltip">Ðánh dấu</span>
                                    </div>
                                    <div class="toolbar_delete_foot">
                                        <input type="button" class=" toolbar_delete_foot_image" name="hide_Foot"  style="background-color: white;"  onclick="hideFoot(this.id);">
                                        &nbsp;
                                        <span class="tooltip">Ẩn đánh dấu</span>
                                    </div>
                                    <input type="hidden" name="_token" value=" {{ csrf_token() }}">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                                </div>
                                    <input type="checkbox" name="check_element" value="{{$data->filename}}"   style="float: left;margin-left: 25px;margin-top: 22px">
                                    <input type="hidden" name="count" id="count" value="{{ $count }}">
                                    <input type="hidden" name="id_product" id="id_product" value="{{ $data->id }}">
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
                                      var id_hide_image=[];
                                      var id_hide_foot=[];
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
                                      var UperLeftLat=[];
                                      var UperLeftLong=[];
                                      var UperRightLat=[];
                                      var UperRightLong=[];
                                      var LowerLeftLat=[];
                                      var LowerLeftLong=[];
                                      var LowerRightLat=[];
                                      var LowerRightLong=[];
                                      var cornerCoordinate_db=[];
                                      var cornerCoordinate_sub=[];
                                      var cornerCoordinate_split=[];
                                      var id_stt=document.getElementsByName('show_image');
                                      var eastbound_stt=document.getElementsByName('eastbound');
                                      var northbound_stt=document.getElementsByName('northbound');
                                      var southbound_stt=document.getElementsByName('southbound');
                                      var westbound_stt=document.getElementsByName('westbound');
                                      var corner_stt=document.getElementsByName('corner');
                                      var foot_stt=document.getElementsByName('foot');
                                      var hide_Image_stt=document.getElementsByName('hide_Image');

                                      var hide_Foot_stt=document.getElementsByName('hide_Foot');

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
                                      for (var i=stt-1,n=hide_Image_stt.length;i<n;i++){
                                          hide_Image_stt[i].id='hide_Image['+i+']';

                                          }
                                      for (var i=stt-1,n=hide_Foot_stt.length;i<n;i++){
                                          hide_Foot_stt[i].id='hide_Foot['+i+']';

                                          }

                                      <!--Đánh dấu tọa độ polygon của ảnh trên bản đồ-->
                                      function footMap(id) {

                                          corner[id]='corner['+id+']';
                                          cornerCoordinate_db[id]=document.getElementById(corner[id]).value;
                                          cornerCoordinate_sub[id]=cornerCoordinate_db[id].substring(2,cornerCoordinate_db[id].length-2);
                                          cornerCoordinate_split[id]=cornerCoordinate_sub[id].split('),(');

                                          UperLeft[id]=cornerCoordinate_split[id][0].split(',');
                                          UperRight[id]=cornerCoordinate_split[id][1].split(',');
                                          LowerLeft[id]=cornerCoordinate_split[id][2].split(',');
                                          LowerRight[id]=cornerCoordinate_split[id][3].split(',');



                                          UperLeftLat[id]=parseFloat(UperLeft[id][0]);
                                          UperLeftLong[id]=parseFloat(UperLeft[id][1]);
                                          UperRightLat[id]=parseFloat(UperRight[id][0]);
                                          UperRightLong[id]=parseFloat(UperRight[id][1]);
                                          LowerLeftLat[id]=parseFloat(LowerLeft[id][0]);
                                          LowerLeftLong[id]=parseFloat(LowerLeft[id][1]);
                                          LowerRightLat[id]=parseFloat(LowerRight[id][0]);
                                          LowerRightLong[id]=parseFloat(LowerRight[id][1]);



                                          triangleCoords[id] = [
                                              {lat: UperLeftLat[id], lng: UperLeftLong[id]},
                                              {lat: UperRightLat[id], lng: UperRightLong[id]},
                                              {lat: LowerLeftLat[id], lng: LowerLeftLong[id]},
                                              {lat: LowerRightLat[id], lng: LowerRightLong[id]}
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
                                      <!--end đánh dấu-->
                                      <!--hiển thị ảnh-->
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
                                      function hideImage(id) {
                                        id_hide_image[id]=id.substring(11,id.length-1);
                                        historicalOverlay[id_hide_image[id]].setMap(null);
                                        }
                                      function hideFoot(id) {
                                        id_hide_foot[id]='foot['+id.substring(10,id.length-1)+']';
                                        bermudaTriangle[id_hide_foot[id]].setMap(null);
                                        }

                                      <!--end hiển thị ảnh-->
                                      <!--check all-->
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
                                              for (var i=0,n=checkboxes.length;i<n;i++){
                                                checkboxes[i].id='check_elelement['+i+']';
                                              }
                                          }

                                          <!--end check all-->
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

        </div><!-- content -->
        <div class="footer">
            &copy; 2016 - Copy right by DuongND
        </div><!-- footer -->


        @yield('option')

        <!-- start div login-box -->
        <div id="dialog-login-box" class="dialog_login">
            <p class="dialog_title"> Ðăng nhập</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
            <form method="post" id="form-login" class="login-content" action="{{ url('/auth/login') }}" role="form" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label class="email">
                <span>Email:</span>
                <input id="email_login" name="email_login" type="email" autocomplete="on" placeholder="example@gmail.com">
                </label><br/>
                <label class="password">
                <span>M?t kh?u:</span>
                <input id="password_login" name="password_login" type="password" placeholder="Mật khẩu">
                </label>

                <button class="button submit-button" type="submit" style="margin-left: 0px;" >Ðăng nhập</button>
                <span style="margin-top: -40px;margin-bottom: 30px;margin-left: 170px;text-decoration: underline;">
                <!-- <a class="reset-password" href="dialog-reset-password">Quên m?t kh?u?</a> -->
                <a href="#dialog-reset-box" class="reset-password">Quên mật khẩu</a>
                </span><br /><br />

            </form>
        </div> <!-- end div show-box -->
        <!--Show metadata-->
        @foreach($result_data as $meta):
            <div id="dialog-show-metadata" class="dialog">
                <p class="dialog_title_metadata">Thông số dữ liệu </p> <br /><br />
                     <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>

                    <form method="post" id="form-metadata" class="login-content" action="{{url ('/download_txt') }}">
                    <table border="1" style="width:90%;height: 90%;margin-bottom: 10px;">
                        <tr >
                          <td style="font-size: 10px">Tên sản phẩm</td>
                          <td  style="font-size: 10px" >{{$meta->filename}}</td>
                        </tr>
                        <tr >
                          <td style="font-size: 10px">Band hiển thị hiên tại</td>
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
                            <td style="font-size: 10px">Tọa độ góc trên trái</td>
                            <td style="font-size: 10px"></td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px">Tọa độ góc trên phải</td>
                            <td style="font-size: 10px"></td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px">Tọa độ góc dưới phải</td>
                            <td style="font-size: 10px"></td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px">Tọa độ góc dưới trái</td>
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
                        <p>Bạn sẽ phải đăng nhập để đặt hàng sản phẩm đầy đủ</p>
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
            <p class="dialog_title"> Ðãng ký</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>

            <form method="post" id="form-register" class="login-content" action="{{ url('/auth/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="role" value="1">
                <label class="name">
                <span>Họ tên:</span><input id="name_register" name="name_register" type="text" autocomplete="on" placeholder="H? và tên">
                </label><br />
                <label class="email">
                <span>Email:</span><input id="email_register" name="email_register" type="email" autocomplete="on" placeholder="example@gmail.com">
                </label><br />
                <label class="password">
                <span>Mật khẩu:</span><input id="password_register" name="password_register" type="password" placeholder="Mật khẩu">
                </label><br />
                <label class="password">
                <span>Gõ lại mật khẩu:</span><input id="password_confirmation_register" name="password_confirmation_register" type="password" placeholder="G? l?i m?t kh?u">
                </label><br />
                <button class="button submit-button" type="submit">Ðăng ký</button>
            </form>
        </div><!-- end div logout-box -->



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
            <p class="dialog_title">Giỏ hàng</p> <br /><br />
            <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
            <form class="login-content" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
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
                        minlength: "Mật khẩu t?i thi?u 6 k? t?."
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
                        required: "Vui l?ng nh?p Email.",
                        email: "Email không ðúng ð?nh d?ng.",
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
                        required: "Vui l?ng nh?p h? tên.",
                    },
                    email_register:{
                        required: "Vui l?ng nh?p Email.",
                        email: "Email không ðúng ð?nh d?ng."
                    },
                    password_register:{
                        required: "Vui l?ng nh?p m?t kh?u.",
                        minlength: "M?t kh?u t?i thi?u 6 k? t?."
                    },
                    password_confirmation_register:{
                        required: "Vui long nh?p m?t kh?u.",
                        equalTo: "M?t kh?u xác nh?n không ðúng."
                    }
                }
            });

        </script>

    </body>
</html>
