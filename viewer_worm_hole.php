<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title><?php echo $_SERVER['SERVER_NAME']; ?> | File Crawler </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="assets/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap/css/bootstrap-responsive-rtl.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/searchbox.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/reset-rtl.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style-metro-rtl.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style-rtl.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style-responsive-rtl.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css">               
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="assets/plugins/bxslider/jquery.bxslider-rtl.css" />    
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="assets/css/themes/blue-rtl.css" rel="stylesheet" type="text/css" id="style_color"/>    
    <link rel="shortcut icon" href="favicon.ico" />
    <!--PDF.js-->
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->

<body>
    <!-- BEGIN HEADER -->
    <div class="front-header">
	    <div class="container">
	        <div class="navbar">
	            <div class="navbar-inner" style="height:100px;">
	                <!-- BEGIN LOGO (you can use logo image instead of text)-->
	                <a class="brand logo-v1" href="index.php">

	                </a>
	                <!-- END LOGO -->

	                <!-- BEGIN TOP NAVIGATION MENU -->

                                                        <form class="form-wrapper" accept-charset="utf-8" method="get" action="http://searching.blue/vendor/solarium/solarium/examples/search.php">
                                                        <input id="q" name="q" size="50" maxlength="255" style="width:350px;" value="" type="text">
                                                        <input name="searchsubmit" value="SEARCH" type="submit">
                                                        </form>
                                                        <br>
		
	            </div>
	        </div>
	    </div>        
    </div>
    <!-- END HEADER -->

    <!-- BEGIN BREADCRUMBS -->   
    <div class="row-fluid breadcrumbs margin-bottom-40">
        <div class="container">
            <div class="span4">
                <h1>File Download</h1>
            </div>
            <div class="span8">
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN CONTAINER -->   
    <div class="container min-hight" style="width:95%;">
							
			
				<!-- ROW 4 -->
				<div class="row-fluid margin-bottom-40" style="width:95%;">
					<!-- COLUMN 1 -->
					<div class="span8" style="width:95%;">
						<!-- BEGIN WELLS PORTLET-->
						<div style="width:95%;">
							<h3>File&nbsp;Information</h3>
							<div class="well" style="width:95%;">
							<?php
							include("db.php");
							$conn = db_connect_100();
							$joe = $_SERVER['SERVER_NAME'];
							$doc = strip_tags(stripslashes($_GET['doc']));
							$query = "SELECT `system_file_name`, `short_name`, `file_title`, `url`, `seoterm`, `file_timestamp`, `counter` FROM `docunator`.`file` WHERE `file`.`system_file_name` = '".$doc."';";
							if (is_numeric($doc)) {
									$query = "SELECT `system_file_name`, `short_name`, `file_title`, `url`, `seoterm`, `file_timestamp`, `counter` FROM `docunator`.`file` WHERE `file`.`counter` = '".$doc."';";
							//echo $query;
							}
							if ($stmt = mysqli_prepare($conn, $query)) {
									mysqli_stmt_execute($stmt);
									mysqli_stmt_bind_result($stmt, $system_file_name, $short_name, $file_title, $url, $seoterm, $file_timestamp, $counter);
								while (mysqli_stmt_fetch($stmt)) {
											$doc = $system_file_name;
											
											$file = "space/".$system_file_name."/".$system_file_name;
											echo $counter."<br>";
											echo $file_title."<br>";
											echo $url."<br>";
											echo $file_timestamp."<br>";
											$text = "<a href='".$file."'>".$system_file_name."</a><br>";
if($file_title == "image/png" or $file_title == "image/gif" or $file_title == "image/jpeg"){
echo "<img src='space/".$system_file_name."/".$system_file_name."' style='width:100%;height:100%;'>";
$text = "";
}
											if($file_title == "text/html" or $file_title == "application/xml" or $file_title == "text/plain" or $file_title == "inode/x-empty"){
					echo "<iframe src='space/".$system_file_name."/".$system_file_name."' height='1000px' width=100%></iframe>";
											$text = "";
											}
echo $text;

									}
								mysqli_stmt_close($stmt);
							}

?>

<!--
<p style="color:#0000FF;font-size:14px; font-weight:normal;text-align:left;padding-left:5px"><a href="http://www.jvzoo.com/c/540409/45177" class="jam-link" target="_blank">Eco-coloring and activity books</a></p><p style="color:#333333;font-size:14px;text-align:left;padding-left:5px">This packet of books for youth contains 3 coloring and activity books:   (1)COLORS OF HEALTH ....(2) DO and LEARN ECO-FUN BOOK....and (3) AMAZING ANCESTORS.

There are many pages of fun activities and coloring pages which are also educational.</p><p style="color:#0000FF;font-size:14px; font-weight:normal;text-align:left;padding-left:5px"><a href="http://www.jvzoo.com/c/540409/38547" class="jam-link" target="_blank">RFP's, Proposals, and Contracts for Web Designers and Agencies</a></p><p style="color:#333333;font-size:14px;text-align:left;padding-left:5px">This full 31 video course you can learn how to increase you income, land more clients, and protect yourself with contracts. 15 bonus down-loadable documents included.</p>
-->

<!-- 7Search Pay Per Text Code (start)
<a href="http://7search.com/scripts/search.asp?affiliate=82818&zoneid=5054067&qu=server%20hosting&s=ppt" target="_blank" style="color:#000000;font-size:12px;">server hosting</a>
<a href="http://7search.com/scripts/search.asp?affiliate=82818&zoneid=5054067&qu=cell%20phone%20accessory&s=ppt" target="_blank" style="color:#000000;font-size:12px;">cell phone accessory</a>
<a href="http://7search.com/scripts/search.asp?affiliate=82818&zoneid=5054067&qu=discount%20electronic&s=ppt" target="_blank" style="color:#000000;font-size:12px;">discount electronic</a>
<a href="http://7search.com/scripts/search.asp?affiliate=82818&zoneid=5054067&qu=laptop%20computer&s=ppt" target="_blank" style="color:#000000;font-size:12px;">laptop computer</a>
<a href="http://7search.com/scripts/search.asp?affiliate=82818&zoneid=5054067&qu=tablet&s=ppt" target="_blank" style="color:#000000;font-size:12px;">tablet</a>
<a href="http://7search.com/scripts/search.asp?affiliate=82818&zoneid=5054067&qu=computer%20game&s=ppt" target="_blank" style="color:#000000;font-size:12px;">computer game</a>
<a href="http://7search.com/scripts/search.asp?affiliate=82818&zoneid=5054067&qu=bluetooth&s=ppt" target="_blank" style="color:#000000;font-size:12px;">bluetooth</a>
<a href="http://7search.com/scripts/search.asp?affiliate=82818&zoneid=5054067&qu=monitor&s=ppt" target="_blank" style="color:#000000;font-size:12px;">monitor</a>
<a href="http://7search.com/scripts/search.asp?affiliate=82818&zoneid=5054067&qu=headset&s=ppt" target="_blank" style="color:#000000;font-size:12px;">headset</a>
<a href="http://7search.com/scripts/search.asp?affiliate=82818&zoneid=5054067&qu=hard%20drive&s=ppt" target="_blank" style="color:#000000;font-size:12px;">hard drive</a>
 7Search Pay Per Text Code (end) -->

<div id="disqus_thread"></div>
<script>

/**
 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
/*
var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = '//wormholed-com.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<a href="http://www.HardBase.FM/" target="_blank"><img src="http://n.image.weareone.fm/news/_tobima/graphics/works/HardBase_468x60_1.jpg" border="0" alt="HardBase.FM"></a>

<!--
<iframe src='chat/examples/theme_carbon.html' height='600px' width=100%></iframe>
-->
<?php
							echo "</div>";
							echo "<div class='well well-large'>";
							echo "<h4>Site Map</h4>";
                                                        $i = 0;
                                                        do {
                                                        $i++;
                                                        $file = "<a href='http://".$joe."/site.php?file=".$i."'>Site Map ".$i." </a>&nbsp;";
                                                        echo $file;
                                                        } while ($i < 442);
							?>
							</div>
						</div>
						<!-- END WELLS PORTLET-->
					</div>
					<!-- END COLUMN 1 -->
					<!-- COLUMN 2 -->
					<div class="span4">
	<h3></h3>
						<dl>
						</dl>
					</div>
					<!-- END COLUMN 2 -->
				</div>
				<!-- END ROW 4 -->
			
    </div>
    <!-- END CONTAINER -->

    <!-- BEGIN FOOTER -->
    <div class="front-footer">
        <div class="container">
            <div class="row-fluid">
                <div class="span4 space-mobile">
                    <!-- BEGIN ABOUT -->                    
                    <h2>About</h2>
                    <p class="margin-bottom-30">This site is created, served, and maintained by <a href='http://joehettich.com'>Joe&nbsp;Hettich</a></p>
                    <div class="clearfix"></div>                    
                    <!-- END ABOUT -->          

                </div>
                <div class="span4 space-mobile">
                    <!-- BEGIN CONTACTS -->                                    
                    <!-- END CONTACTS -->                                    

                    <!-- BEGIN SUBSCRIBE -->                                    
                    <!-- END SUBSCRIBE -->                                    
                </div>
                <div class="span4"></div>
            </div>
        </div>
    </div>
    <!-- END FOOTER -->

    <!-- BEGIN COPYRIGHT -->
    <div class="front-copyright">
        <div class="container">
            <div class="row-fluid">
                <div class="span8">
                    <p>
                        <a href="NONE">Privacy Policy</a> | <a href="TERMS">Terms of Service</a>
                        <span class="margin-left-10"></span> 
                    </p>
                </div>
                <div class="span4">
                </div>
            </div>
        </div>
    </div>
    <!-- END COPYRIGHT -->

    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <script src="assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap-rtl.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/plugins/back-to-top.js"></script>    
    <script type="text/javascript" src="assets/plugins/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="assets/plugins/hover-dropdown.js"></script>         
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->   
    <!-- END CORE PLUGINS -->
    <script src="assets/scripts/app.js"></script>      
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();        
            App.initBxSlider();
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
