<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo $page_title ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for full width layout with mega menu" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/admin/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/admin/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url() ?>assets/admin/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url() ?>assets/admin/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url() ?>assets/admin/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/admin/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url() ?>assets/admin/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url() ?>assets/admin/global/plugins/jquery.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->


        <!-- BEGIN PAGE LEVEL PLUGINS DATATABLE-->
        <link href="<?php echo base_url() ?>assets/admin/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS DATATABLE-->

        
        <link rel="shortcut icon" href="" /> 
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-full-width">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo site_url('admin/home')?>" style="height:50px">
                            <img src="<?php echo base_url() ?>assets/admin/layouts/layout/img/logo2.png" alt="logo" class="logo-default" />
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Remove "hor-menu-light" class to have a horizontal menu with theme background instead of white background -->
                    <!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) in the responsive menu below along with sidebar menu. So the horizontal menu has 2 seperate versions -->
                    <div class="hor-menu   hidden-sm hidden-xs">
                        <ul class="nav navbar-nav">
                            <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
                            <li class="classic-menu-dropdown" aria-haspopup="true">
                                <a href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true"><i class="fa fa-gears"></i> Setup
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li>
                                        <a href="<?php echo site_url('admin/setup?id=0')?>">
                                        <i class="fa fa-envelope"></i> Email </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('admin/user?id=0')?>">
                                        <i class="fa fa-user"></i> User </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="classic-menu-dropdown" aria-haspopup="true">
                                <a href="<?php echo site_url('admin/pengaduan')?>"> <i class="fa fa-book"></i> Pengaduan
                                    <span class="selected"> </span>
                                </a>
                            </li>
                            

                            <li class="classic-menu-dropdown" aria-haspopup="true">
                                <a href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true"><i class="fa fa-map"></i> Peta Rawan
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li>
                                        <a href="<?php echo site_url('admin/petarawanlist')?>">
                                        <i class="fa fa-list"></i> List </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('admin/peta_rawan')?>"> <i class="fa fa-map"></i> Peta
                                            <span class="selected"> </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                        
                    </div>
                    <!-- END MEGA MENU -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                            
                            <?php if($this->session->userdata('role') == 'admin') {?>
                                <?php
                                    $qry = "select count(id) as new from useraccount where `status` = 'new'";
                                    $qryResult = $this->db->query($qry)->result_array();
                                ?>
                                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="icon-bell"></i>
                                        <?php echo $qryResult[0]['new'] > 0 ? '<span class="badge badge-default">!</span>' : '' ?> 
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php if($qryResult[0]['new'] > 0) {  ?>
                                        <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                                <li>
                                                    <a href="<?php echo site_url('admin/user')?>">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success">
                                                                <i class="fa fa-plus"></i>
                                                            </span> New user registered. </span>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                        <?php } else { ?>
                                            <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="details"></span>Empty. </span>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                        <?php  }?>

                                    </ul>
                                </li>
                            <?php }?>
                            <!-- END NOTIFICATION DROPDOWN -->
                            
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?php echo base_url() ?>assets/admin/layouts/layout/img/bnn.png" />
                                    <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('fullname')?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?php echo site_url("admin/logout") ?>">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="chage-password">
                                            <i class="icon-lock"></i> Change Password 
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->


            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- END SIDEBAR MENU -->
                        <div class="page-sidebar-wrapper">
                            <!-- BEGIN RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
                            <ul class="page-sidebar-menu visible-sm visible-xs  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                                <!-- DOC: This is mobile version of the horizontal menu. The desktop version is defined(duplicated) in the header above -->
                                
                                <li class="nav-item start active open">
                                    <ul class="sub-menu">
                                        <li class="nav-item start ">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <i class="fa fa-gears"></i>
                                                <span class="title">Setup</span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="<?php echo site_url('admin/setup?id=0')?>">
                                                    <i class="fa fa-envelope"></i> Email </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo site_url('admin/user?id=0')?>">
                                                    <i class="fa fa-user"></i> User </a>
                                                </li>
                                    
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                    
                                    <ul class="sub-menu">
                                        <li class="nav-item start ">
                                            <a href="<?php echo site_url('admin/pengaduan')?>" class="nav-link">
                                                <i class="fa fa-book"></i>
                                                <span class="title">Pengaduan</span>
                                            </a>
                                        </li>
                                       
                                    </ul>

                                     <ul class="sub-menu">
                                        <li class="nav-item start ">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <i class="fa fa-map"></i>
                                                <span class="title">Peta Rawan</span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="<?php echo site_url('admin/petarawanlist')?>">
                                                    <i class="fa fa-list"></i> List </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo site_url('admin/peta_rawan')?>"> <i class="fa fa-map"></i> Peta
                                                        <span class="selected"> </span>
                                                    </a>
                                                </li>
                                    
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </li>



                            </ul>
                            <!-- END RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
                        </div>
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->

<!-- modal -->
<div class="modal fade chage-pass" id="chage-pass" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body"> 
                <form action="javascript:;"  enctype="multipart/form-data">
                    <!-- <div class="row"> -->
                        
                        <div class="form-group">
                            <input type="hidden" class="form-control input-sm" name="id" readonly value="<?php echo $this->session->userdata('id') ?>" >
                            <input type="hidden" class="form-control input-sm" name="current_password" readonly value="<?php echo $this->session->userdata('password') ?>" >
                        </div>
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control input-sm" name="current_password2">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control input-sm" name="new_password">
                        </div>
                        <div class="form-group">
                            <label>Re-type New Password</label>
                            <input type="password" class="form-control input-sm" name="re_type">
                        </div>
                        
                    <!-- </div> -->
                </form>
                <span class="alert-pass" style="color:red"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green btn-save-change-pass">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- end of modal -->
<script>
    $(".chage-password").click(function(){
        $("#chage-pass").modal("show");
    })

    $(".btn-save-change-pass").click(function(){
        var id = $("input[name='id']").val();
        var currPass = $("input[name='current_password']").val();
        var currPass2 = $("input[name='current_password2']").val();
        var newPass = $("input[name='new_password']").val();
        var reType = $("input[name='re_type']").val();


        
      
        if(currPass != currPass2){
            $(".alert-pass").html("Password lama anda salah");
        } else {
            if(newPass != reType){
                $(".alert-pass").html("Re-type password anda tidak cocok");
            } else {
                $.ajax({
                    url: '<?php echo site_url('admin/change_password')?>',
                    method: 'post',
                    data: {
                        'id': id, 'newPass': newPass
                    },
                    success: function(data){
                        // $(".alert-pass").html("Success edited your password, will affected after login again");
                        location.reload();
                    }
                })
            }
        }
        
        
        
    })
    
</script>