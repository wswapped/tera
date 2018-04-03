<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8" />
    <?php
    	$site_name = "NobaRwanda";    	

        include_once '../functions/conne.php';
    	include_once 'scripts/functions.php';

        //Checking log in
        $User = getClass('user');

        $userid = $User->isLogged();

        if(!$userid){
            header("location: login.php");
        }

        //getting current user details
        $userData = $User->data($userid);

        $user_name = $userData['name'];
        $user_email = $userData['email'];;
        $user_image = $userData['profilePicture'];
        $user_shop = $userData['shopId'];
    ?>
        
    <title><?php echo $site_name; ?> | Dashboard</title>
    <meta name="description" content="Latest updates and statistic charts"> 

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       

    <!--begin::Web font -->
    <script src="assets/ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
      WebFont.load({
        google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>
    <!--end::Web font -->

    <!--begin::Base Styles -->

    <!--begin::Page Vendors --> 
    <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors -->
         

	<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/demo/demo4/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->

    <link rel="shortcut icon" href="assets/app/media/img/logos/logo.png" /> 
</head>
<!-- end::Head -->

    
    <!-- end::Body -->
    <body style="background-image: url(images/admin_bg.jpg); background-size: cover"  class="m-page--boxed m-body--fixed m-header--static m-aside--offcanvas-default" >

        
        
    	
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">	
	<!-- begin::Header -->
	<?php include_once 'modules/header.php' ?>
	<!-- end::Header -->

	<!-- begin::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid m-grid--hor m-container m-container--responsive m-container--xxl">
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
			<div class="m-grid__item m-body__nav">
				<?php include_once 'modules/menu.php'; ?>
			</div>
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
				<?php
					$page_name = $_GET['page']??"home";

					if(!file_exists("pages/$page_name.php")){
						$page_name = 'not-found';
					}

					$page_file = "pages/$page_name.php";
					include $page_file;

				?>
			</div>
		</div>
	</div>
	<!-- begin::Body -->

	<!-- begin::Footer -->
	<footer class="m-grid__item		m-footer ">
		<?php include_once 'modules/footer.php' ?>
	</footer>
</div>
<!-- end:: Page -->
<!-- begin::Quick Sidebar -->
<?php include_once 'modules/quick_sidebar.php'; ?>
<!-- end::Quick Sidebar -->

<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
	<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->

<!-- begin::Quick Nav -->
<?php include_once "modules/sticky_nav.php" ?>
<!-- end::Quick Nav -->	

<!--begin::Base Scripts -->        
<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="assets/demo/demo4/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->   

 
<!--begin::Page Vendors --> 
<script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<!--end::Page Vendors -->


<script type="text/javascript">
    const shop = <?php echo $user_shop; ?> 
</script>

<!--begin::Page Snippets --> 
<script src="assets/app/js/dashboard.js" type="text/javascript"></script>

<script src="assets/demo/default/custom/components/forms/widgets/dropzone.js" type="text/javascript"></script>
<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>