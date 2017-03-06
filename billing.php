<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>E-Cigs Pro Vapor Kit from Vapor.blue Billing Page</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="Vapor.blue post page" name="description" />
	<meta content="Vapor.blue" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->   
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<h4>
			<a href="http://vapor.blue">Vapor.Blue and E-Cigs Pro Vapor</a>
				</h4>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="assets/img/menu-toggler.png" alt="" />
				</a>          
				<!-- END RESPONSIVE MENU TOGGLER -->            
				<!-- BEGIN TOP NAVIGATION MENU -->              
				<!-- END TOP NAVIGATION MENU --> 
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->   
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>

<?php
include('menu.php');
menu_output();
?>


			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- Google Map -->
						<div class="row-fluid margin-bottom-20">
							<div class="span6">
								<div class="space20"></div>
								<h3 class="form-section">E-Cigs Pro Vapor Kit from Vapor.blue</h3>
								<div class="well">
									
<h3>
We will contact you about your Pro Vapor kit!!
</h3>


<?php
include("../db.php");
$conn = db_connect_100();

$first = strip_tags(stripslashes($_GET['first']));
$last = strip_tags(stripslashes($_GET['last']));
$address1 = strip_tags(stripslashes($_GET['address1']));
$address2 = strip_tags(stripslashes($_GET['address2']));
$city = strip_tags(stripslashes($_GET['city']));
$state = strip_tags(stripslashes($_GET['state']));
$zip = strip_tags(stripslashes($_GET['zip']));
$phone = strip_tags(stripslashes($_GET['phone']));
$email = strip_tags(stripslashes($_GET['email']));
$user_ip = $_SERVER['REMOTE_ADDR'];

echo "<table border='1'>
";
foreach($_GET as $stuff => $val ) {
$val_array_post[$stuff] = $val;
echo "<tr>";
echo "<td>".strip_tags(stripslashes($stuff))." </td>";
echo "<td>".strip_tags(stripslashes($val))." </td>";
echo "</tr>
";
}
echo "</table>";

if ($stmt = mysqli_prepare($conn, "INSERT INTO `vapor`.`user` (`first`, `last`, `address1`, `address2`, `city`, `state`, `zip`, `phone`, `email`) VALUES (?,?,?,?,?,?,?,?,?)")); {
	mysqli_stmt_bind_param($stmt, "sssssssss", $first, $last, $address1, $address2, $city, $state, $zip, $phone, $email);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}

/*
ID: 4QCi90GOPpBW
Key: 1c7d4df9f94d263f18a91b5aa73d0cb1
*/


$xml_data = "<?xml version='1.0' encoding='UTF-8' ?> <addLeads><affiliateID>4QCi90GOPpBW</affiliateID> <affiliateKey>1c7d4df9f94d263f18a91b5aa73d0cb1</affiliateKey> <dialerID>DI0955C3</dialerID> <listID>8673</listID> <callTimeOffset>0</callTimeOffset> <listAutoPopulate>y</listAutoPopulate> <leadNameFirst_1>".$first."</leadNameFirst_1> <leadNameLast_1>".$last."</leadNameLast_1> <leadAddress_1>".$address1."</leadAddress_1> <leadAddress2_1>".$address2."</leadAddress2_1> <leadCity_1>".$city."</leadCity_1> <leadState_1>".$state."</leadState_1> <leadZip_1>".$zip."</leadZip_1> <leadCountry_1>US</leadCountry_1> <leadPhone_1>".$phone."</leadPhone_1> <leadPhone2_1></leadPhone2_1> <leadEmail_1>".$email."</leadEmail_1> <leadIPAddress_1>".$user_ip."</leadIPAddress_1> <leadCompany_1>Universe.red</leadCompany_1> <leadGender_1>NULL</leadGender_1> <leadCCNumber_1>4444333322221111</leadCCNumber_1></addLeads>";

$URL = "https://api.infocu5.com/dialer/index.php";
 
$ch = curl_init($URL);
curl_setopt($ch, CURLOPT_MUTE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

echo $output;

?>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->  
		</div>
		<!-- END PAGE -->    
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			<a href="http://vapor.blue">Vapor.Blue</a>
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->

	<script src="assets/scripts/app.js"></script>    
	<script src="assets/scripts/contact-us.js"></script>  
	<script>
		jQuery(document).ready(function() {    
		   App.init();
		   ContactUs.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
