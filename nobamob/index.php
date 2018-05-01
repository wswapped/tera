<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> teranoba </title>
	<link rel="stylesheet"  href="css/themes/default/jquery.mobile-1.3.2.min.css">
	<link rel="stylesheet" href="_assets/css/jqm-demos.css">
	<link rel="stylesheet" href="css/pipCoursel.css">
	<link rel="shortcut icon" href="img/img_476282.png">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<script src="js/jquery.js"></script>
	<script src="_assets/js/index.js"></script>
	<script src="js/jquery.mobile-1.3.2.min.js"></script>
</head>
<body>
<div data-role="page" class="jqm-demos jqm-demos-home">

	<div data-role="header"
	     class="jqm-header"
	     style="background-color: #165388; box-shadow:0 0 10px #165388;">
			<a href="#" class="jqm-navmenu-link" data-icon="bars" data-iconpos="notext" style="background-color: #fff;  box-shadow:0 0 10px #fff;">Navigation</a>
			<h1 class="jqm-logo"><img src="img/moblogo.png" alt="Teranoba mobile"></h1>
			<a href="#" class="jqm-search-link ui-btn-right" data-icon="search" data-iconpos="notext">Search</a>
			<div class="jqm-search">
				<ul class="jqm-list">
			      <li data-section="Widgets" 
			          data-filtertext="accordions collapsible sets content formatting grouped inset mini">
			          <a href="widgets/accordions/"></a>
			      </li>
			    </ul>
			</div>
	</div><!-- /header -->
	<div data-role="content" class="jqm-content">
		<div class="jqm-home-welcome">
			<div id="pipCoursel">
				<ul data-role="carousel" data-captions="true" data-shadow="true">
					<?php
                    include("conne.php");
					$sql = "SELECT * FROM `products` ORDER BY `products`.`productId` ASC LIMIT 0,3";
					$result = mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
				            {
					?>
					<li class="pipCoursel">
						<a href="products/?xcfgdy=<?php echo $row["productId"]?>">
							<h1><?php echo $row["productName"] ?></h1>
							<img alt="" src="<?php echo $row["productIcon"] ?>"/>
						</a>
					</li>
					<?php
                          }
					?>
				</ul>
			</div>
			<p class="jqm-intro" style="display: none;">
	        	<a href="#api-popup" data-rel="popup" data-transition="slideup" data-position-to="window">
	        		API
	        	</a>
	        </p>
	    </div>
		<div data-role="popup" id="api-popup" class="home-pop ui-content" data-theme="e" data-overlay-theme="b">
			<p>The API docs are a separate site from the demos and cover the technical details of each jQuery Mobile plugin in depth.</p>
			<a href="#" data-role="button" data-inline="true" data-rel="back"  data-mini="true" data-theme="c">Stay here</a>
			<a href="http://api.jquerymobile.com" class="jqm-button" data-ajax="false" data-role="button" data-inline="true" data-mini="true" data-icon="arrow-r" data-iconpos="right" data-theme="f">Visit API Site </a>
		</div>
		<ul data-role="listview" data-inset="true" data-theme="e" data-icon="false" data-filter-placeholder="Search..." class="jqm-list jqm-home-list">
			<?php
				 $sql = "SELECT * FROM `products`";
				 $result = mysqli_query($conn,$sql);
				 $nums = mysqli_num_rows($result);
				 $sql = "SELECT * FROM `products` ORDER BY `products`.`productId` ASC LIMIT 0,6";
				 if(isset($_POST["active"]))
				 {
				 	$limits = $_POST["active"];
				 	$limits = ($limits-1) * 6;
				 	$limits2 = $limits + 6;
				 	$sql = "SELECT * FROM
				 	        `products` 
				 	        ORDER BY `products`.`productId` 
				 	        DESC LIMIT $limits,$limits2";
				 }
				  if(isset($_POST["categorie"]))
				 {
				 	$limits = $_POST["categorie"];
				 	$sql = "SELECT * FROM
				 	        `products`
				 	        WHERE `products`.`productCategory` = '$limits'
				 	        ORDER BY `products`.`productId` DESC LIMIT 0,6";
				 }
				 $currency = array("RWF","USD");
				 $result = mysqli_query($conn,$sql);
				 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
				            {
							?>
      <li>
    	<a href="products/?xcfgdy=<?php echo $row["productId"]?>">
	    	<div data-role="content">
		    	<div class="article">
		            <h2><?php echo $row["productName"] ?></h2>
		            <p style=" display: inline; float: left; width: 30%">
		            	<img 
		    			 src="<?php echo $row["productIcon"] ?>"  
	    			     alt="<?php echo $row["productName"] ?>"
	    			     style="width: 100%;">
	    			</p>
		            <p><?php echo $row["notes"] ?></p>
		            <p><small>Price: <b>
	                        <?php
	                              if(!($row['promotion']==0)){
	                              	?>
				          	<del><?php
	                              	echo $row["productPrice"]." ".$currency[$row["currency"]]; ?></del></b><br>
							          <b style="color: #fd8e21"><?php echo $row["promotion"]." ".$currency[$row["currency"]];}
	                                else{
	                                	?>
	                                  <b> <?php echo $row["productPrice"]." ".$currency[$row["currency"]] ?></b>
	                                	<?php
	                                }

							          ?></b><br>
							    </small></p>

				</div><!-- /article -->

		    </div><!-- /content -->
        </a>
      </li>
		<?php
            }
		?>
		</ul>
	</div><!-- /content -->

	<div data-role="footer" class="jqm-footer">
		<p></p>
	</div><!-- /jqm-footer -->



	<div data-role="panel" class="jqm-nav-panel jqm-navmenu-panel" data-position="left" data-display="reveal" data-theme="c">
        <ul data-role="listview" data-theme="d" data-divider-theme="d" data-icon="false" data-global-nav="demos" class="jqm-list">
            <li data-role="list-divider"> Teranoba Electronics </li>
			<li><a href="#">Home</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Orders</a></li>
            <li><a href="#">Contact us</a></li>
			<li><a href="#">Account</a></li>
            <li data-role="list-divider"> Products Categories </li>
            <?php
            $sql = "SELECT * FROM `categories` ORDER BY `categories`.`id` DESC LIMIT 0,10";
			 $sql3 = "SELECT * FROM `categories` ORDER BY `categories`.`id`";
			 $result = mysqli_query($conn,$sql);
			 $nums = mysqli_num_rows(mysqli_query($conn,$sql3));
			 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
			 ?>
			<li data-section="Widgets"
			    data-filtertext="accordions collapsible sets content formatting grouped inset mini">
			    <a href="#"><?php echo $row["name"] ?></a>
			</li>
			<?php
             }
			?>
        </ul>
	</div><!-- /panel -->



</div><!-- /page -->
<script src="js/pipCoursel.js"></script>
</body>
</html>
