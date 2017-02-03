<?php $modulePermission=Session::get('modulePermission');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>

    <!-- Bootstrap -->
   <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{URL::asset('admin/css/style.css')}}">
   <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/highslide.css')}}" />
    <link href="{{URL::asset('admin/cms/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="{{URL::asset('admin/cms/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js')}}"></script>
 <script type="text/javascript" src="{{URL::asset('admin/js/highslide.js')}}"></script>
 <script type="text/javascript">
    // override Highslide settings here
    // instead of editing the highslide.js file
    //hs.graphicsDir = "{{URL::asset('admin/highslide/graphics/')}}";
    hs.graphicsDir = '../../../../admin/highslide/graphics/';
</script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{URL::asset('admin/cms/ckeditor/ckeditor.js')}}"></script>
    <!-- <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script> -->

  

  </head>
   <body>
         <div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://cijulenlinea.ucr.ac.cr/dev-users/">
                <img src="{{URL::asset('admin/css/img/logoupdated.png')}}" alt="<?php echo Config::get('cmsconfig.logotitle');?>">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Session::get("loggedInUser")->user_name }} <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::to(PREFIX.'logout')}}"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
       <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
           <!-- <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> MENU 1 <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.1</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.2</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  MENU 2 <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.1</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.2</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="investigaciones/favoritas"><i class="fa fa-fw fa-user-plus"></i>  MENU 3</a>
                </li>
                <li>
                    <a href="sugerencias"><i class="fa fa-fw fa-paper-plane-o"></i> MENU 4</a>
                </li>
                <li>
                    <a href="faq"><i class="fa fa-fw fa fa-question-circle"></i> MENU 5</a>
                </li>
            </ul> -->
            <ul class="nav navbar-nav side-nav">
            @php 
            $counter = 0;
            @endphp
            @foreach($modulePermission as $permission)
            @if($permission['pages']==1)
                                     {{--*/$moduleLink = ABS_URL. $permission['id'];/*--}} 

                                    @else
                                        {{--*/$moduleLink = '#';/*--}}
                                    @endif
            <?php $counter++;?>
            <li><a href="{{ $moduleLink }}" @if($permission['pages']>1) data-toggle="collapse" data-target="#submenu-<?php echo $counter;?>" @endif><i class="fa fa-edit"></i> {{ $permission['title'] }} <i class="@if($permission['pages']>1){{ 'fa fa-fw fa-angle-down pull-right'}}@endif"></i></a>
            @if($permission['pages']>1)
             <ul id="submenu-<?php echo $counter;?>" class="collapse">
             @foreach($permission['subPages'] as $pageid=>$pagetitle)
            {{--*/$moduleLink = ABS_URL.$permission['id']."/pages/$pageid";/*--}}
                        <li><a href="{{ $moduleLink }}"><i class="fa fa-angle-double-right"></i> {{ $pagetitle }}</a></li>
             @endforeach 
            </ul>
            @endif
            </li>
             @endforeach
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                 @yield('content')
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->

   


    <script type="text/javascript">
//            $(function(){
//     $('[data-toggle="tooltip"]').tooltip();
//     $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
//         $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
//     });
//     $('.side-nav .collapse').on("show.bs.collapse", function() {                        
//         $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
//     });
// })

$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
});

        </script>

        <script>
      CKEDITOR.replace( 'article-ckeditor' ); 
 </script>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>

  </body>
</html>