<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Data Tables - Managed Datatables</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
<link href="{{ asset('public/assets/global/css/components.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
<link id="style_color" href="{{ asset('public/assets/admin/layout/css/themes/default.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="{{ asset('public/img/favicon.ico') }}"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<!-- <img src="../assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/> -->
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">

				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="../assets/admin/layout/img/avatar3_small.jpg"/>
					<span class="username username-hide-on-mobile">
					Hoàng Dương </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="extra_profile.html">
							<i class="icon-user"></i> Thông tin cá nhân</a>
						</li>

						<li class="divider">
						</li>

						<li>
							<a href="login.html">
							<i class="icon-key"></i> Đăng xuất </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="javascript:;" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                <li class="sidebar-search-wrapper">
                    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                    <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                    <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                    <form class="sidebar-search " action="extra_search.html" method="POST">
                        <a href="javascript:;" class="remove">
                            <i class="icon-close"></i>
                        </a>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
                        </div>
                    </form>
                    <!-- END RESPONSIVE QUICK SEARCH FORM -->
                </li>
                <li class="start">
                    <a href="index.html">
                        <i class="fa fa-users"></i>
                        <span class="title">Trang chủ</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                </li>


                <li class="active open">
                    <a href="javascript:;">
                        <i class="fa fa-bar-chart"></i>
                        <span class="title">Quản lý dữ liệu</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="vien_tham.html">
                                <i class="fa fa-user"></i>
                                Viễn thám</a>
                        </li>
                        <li>
                            <a href="khi_tuong.html">
                                <i class="fa fa-pencil-square-o"></i>
                                Khí tượng</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <i class="fa fa-bar-chart"></i>
                        <span class="title">Quản lý hệ thống</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="vaitro.html">
                                <i class="fa fa-user"></i>
                                Vai trò</a>
                        </li>
                        <li>
                            <a href="quyenhan.html">
                                <i class="fa fa-pencil-square-o"></i>
                                Quyền hạn</a>
                        </li>
                        <li>
                            <a href="nguoi_dung.html">
                                <i class="fa fa-money"></i>
                                Người dùng</a>
                        </li>

                    </ul>
                </li>


                <li>
                    <a href="javascript:;">
                        <i class="fa fa-bar-chart"></i>
                        <span class="title">Quản lý đặt hàng</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="don_hang_yeu_cau.html">
                                <i class="fa fa-pencil-square-o"></i>
                                Đơn hàng yêu cầu</a>
                        </li>
                        <li>
                            <a href="dang_ky_an.html">
                                <i class="fa fa-pencil-square-o"></i>
                                Xử lý đơn hàng đã duyệt</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <i class="fa fa-bar-chart"></i>
                        <span class="title">Thống kê</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="nguoi_an.html">
                                <i class="fa fa-pencil-square-o"></i>
                                Dữ liệu có sẵn</a>
                        </li>
                        <li>
                            <a href="dang_ky_an.html">
                                <i class="fa fa-pencil-square-o"></i>
                                Dữ liệu đã mất</a>
                        </li>
                    </ul>
                </li>
            </ul>



            <!-- END SIDEBAR MENU -->
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->

            </div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->

			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Dữ liệu viễn thám
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Trang chủ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="vien_tham.html">Quản lý dữ liệu</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="vien_tham.html">Viễn thám</a>
					</li>
				</ul>

			</div>
            <div class="row" >
                <form action="" role="form" class="form-horizontal" style="margin-left: 40px;margin-top: 30px">
                    <div class="form-body">
                        <div class="form-group">
                            <!-- <label class="col-md-3 control-label">Input Group</label> -->
                            <div class="col-md-9">
                                <div class="input-inline input-medium">
                                    <!-- <div class="input-group">
                                        <span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
													</span>
                                        <input type="email" class="form-control" placeholder="Email Address">
                                    </div> -->
                                    <p><b><font size ="4">Tìm kiếm</font></b></p>

                                </div>
                                <span class="help-inline">
											</span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <!-- <label class="col-md-3 control-label">Input Group</label> -->
                            <div class="col-md-9">
                                <div class="input-inline input-medium">
                                    <div class="ql_droplist">
                                        <p><font size ="3">Vệ tinh</font></p>
                                       <select name = "ql_tim_ve_tinh" id = "ql_tim_kiem" style="width:200px;height:30px">
                                            <option value ="tera">Tera</option>
                                            <option value ="auqa">Aqua</option>
                                            <option value ="npp">NPP</option>
                                            <option value ="other">Khac</option>
                                       </select>
                                    </div>
                                </div>
                                <span class="help-inline">
											 </span>
                            </div>


                            <div class="col-md-9">
                                <div class="input-inline input-medium">
                                    <div class="ql_droplist">
                                        <p><font size ="3">Cấp độ</font></p>
                                       <select name = "ql_cap_do" id = "ql_tim_kiem" style="width:200px;height:30px" >
                                            <option value ="lv1">Level 1</option>
                                            <option value ="lv2">Level 2</option>
                                           
                                       </select>
                                    </div>
                                </div>
                                <span class="help-inline">
                                             </span>
                            </div>



                            <div class="col-md-9">
                                <div class="input-inline input-medium">
                                    <div class="ql_droplist">
                                        <p><font size ="3">Loại dữ liệu</font></p>
                                       <select name = "ql_loai_du_lieu" id = "ql_tim_kiem" style="width:200px;height:30px">
                                            <option value ="MOD04">MOD04</option>
                                            <option value ="MOD06">MOD06</option>
                                            <option value ="MOD">.....</option>
                                             
                                       </select>
                                    </div>
                                </div>
                                <span class="help-inline">
                                             </span>
                            </div>

                            <div class="col-md-9">
                                <div class="input-inline input-medium">
                                    <div class="ql_time">
                                       <div class="al_time_from">
                                        <p>Từ</p>
                                        <input type = "date" name = "ql_tf" style = "width:200px;height:30px"> </input>
                                        <p>Đến</p>
                                        <input type = "date" name = "ql_te" style = "width:200px;height:30px" > </input>
                                       </div>
                                    </div>
                                </div>
                                <span class="help-inline">
                                             </span>
                            </div>


                            <div class="col-md-9">
                                <div class="input-inline input-medium">
                                    <div class="ql_timkiem">
                                        <input type="button" class="btn blue" value="Tìm kiếm" style = "margin-top:10px">  
                                    </div>
                                </div>
                                <span class="help-inline">
                                             </span>
                            </div>

                             
                        </div>

                        
                    </div>
                </form>
            </div>


					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue" style="margin-left: 300px; margin-right: 30px;margin-top: -400px">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Danh sách dữ liệu tìm kiếm
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 STT
								</th>

								<th>
									 Dữ liệu
								</th>
								<th>
									 Dung lượng
								</th>

                                <th>
                                    Lượt đặt hàng
                                </th>
							</tr>
							</thead>
							<tbody>
							<tr class="odd gradeX">

								<td>
									 1
								</td>

								<td>
									MOD04
								</td>
								<td>
									200MB
								</td>
                                <td>
                                    3
                                </td>
							</tr>
                            <tr class="odd gradeX">

                                <td>
                                    2
                                </td>

                                <td>
                                    MOD04
                                </td>
                                <td>
                                    200MB
                                </td>
                                <td>
                                    3
                                </td>
                            </tr>
                            <tr class="odd gradeX">

                                <td>
                                    3
                                </td>

                                <td>
                                    MOD04
                                </td>
                                <td>
                                    200MB
                                </td>
                                <td>
                                    3
                                </td>
                            </tr>
                            <tr class="odd gradeX">

                                <td>
                                    4
                                </td>

                                <td>
                                    MOD04
                                </td>
                                <td>
                                    200MB
                                </td>
                                <td>
                                    3
                                </td>
                            </tr>
                            <tr class="odd gradeX">

                                <td>
                                    5
                                </td>

                                <td>
                                    MOD04
                                </td>
                                <td>
                                    200MB
                                </td>
                                <td>
                                    3
                                </td>
                            </tr>
                            <tr class="odd gradeX">

                                <td>
                                    6
                                </td>

                                <td>
                                    MOD04
                                </td>
                                <td>
                                    200MB
                                </td>
                                <td>
                                    3
                                </td>
                            </tr>

							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->


			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/table-managed.js"></script> -->
<!-- <script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   TableManaged.init();
});</script> -->
</body>
<!-- END BODY -->
</html>