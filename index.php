<?php
date_default_timezone_set('Indian/Reunion');
//include "authorize.php";
	//visitors log
	$filename = 'visit_log.txt';
	$content = date("d-M-Y H:i:s").' |Home page| IP: '.$_SERVER['REMOTE_ADDR']."\n";
	$cont=fopen($filename,'a');
	fwrite($cont,$content);
	fclose($cont);

//initial config
//if(isset($_REQUEST['numrows'])) $limitCount = $_REQUEST['numrows'];
//else $limitCount = 15;//10;
//



include("common/connect.php");

//echo '<br>--------------customer_id='.$_SESSION['customer_id'];//exit;

////paging #1
//if(isset($_GET["page"])){
//	$page = intval($_GET["page"]);
//}
//else {
//	$page = 1;
//}
//$calc = $limitCount * $page;
//$start = $calc - $limitCount;
////paging #1 end
//$sqlcateg = "";//for breadcrumb
//$sqlcat = "";
//echo '<br />------'.$date_check;
/*$sql="select * from items where status='active' ";
if(isset($date_check) && $date_check>0) {
	$sql .= " and substring(updation_date, 1, 10)>=DATE_SUB(CURDATE( ) , INTERVAL $date_check DAY) ";
}
if(isset($_POST['srchplace']) && !empty($_POST['srchplace'])) {
	$sql .= " and (item_place like '%".$_POST['srchplace']."%' or item_otherplace like '%".$_POST['srchplace']."%' or prod_title like '%".$_POST['srchplace']."%' or description like '%".$_POST['srchplace']."%') ";
}
if(isset($_POST['cat']) && !empty($_POST['cat'])) {
	$sql .= " and catid =".$_POST['cat']."";
	$sqlcateg = " and id =".$_POST['cat']."";
}
if(isset($_GET['catid']) && !empty($_GET['catid'])) {
	$sql .= " and catid =".$_GET['catid']."";
	$sqlcateg = " and id =".$_GET['catid']."";
}
$sqlCount = $sql;
$sql .= " order by updation_date desc limit $start, $limitCount";
//echo '<br><br><br><br>---sql='.$sql.'<br><br><br>';
$data=mysql_query($sql);
$dataCount=mysql_query($sqlCount);*/
//$rowsCount = mysql_num_rows($dataCount);

/*$sqlcat="select * from categories order by sort_order asc ";
//echo '<br><br><br><br>---sqlcat='.$sqlcat;
$datacat=mysql_query($sqlcat);
$datacat1=mysql_query($sqlcat);*/

/*$categoryname = "All Categories";
if($sqlcateg!="") {
	$sqlcatsele="select * from categories where 1 ".$sqlcateg."";
	//echo '<br>---sqlcatsele='.$sqlcatsele;
	$datacatsele=mysql_query($sqlcatsele);
	if($rowCatSele=mysql_fetch_array($datacatsele)) {
		$categoryname = $rowCatSele['categoryname'];
	}
}*/

//echo '<br />------------';
//print_r($_POST);//exit;


$query="SELECT * FROM country";
$result=mysql_query($query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="themes/assets/ico/favicon.ico">
    <title>CommonShoppy.com</title>


<meta name="description" content="Welcome to commonshoppy.com. It is free! Anyone can register and post their flats/apartments/rooms/villas/... Anyone can search and find their stay" />
<meta name="keywords" content="Common Shoppy, Kerala" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(countryId) {		
		
		var strURL="common/findState.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;
						document.getElementById('citydiv').innerHTML='<select class="form-control" name="city">'+
						'<option>Select District/City</option>'+
				        '</select>';						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getCity(countryId,stateId) {
		var strURL="common/findCity.php?country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;		
						document.getElementById('deliverydiv').innerHTML='<select class="form-control" name="delivery">'+
						'<option>Select Place of Delivery</option>'+
				        '</select>';				
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	function getDeliveryPlace(countryId,stateId,cityId) {
		var strURL="common/findDeliveryPlace.php?country="+countryId+"&state="+stateId+"&city="+cityId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('deliverydiv').innerHTML=req.responseText;			
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>


<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>


<script src="js/jquery-1.7.1.js"></script>
<script>
function selectChange(val)
{
	//Set the value of action in action attribute of form element.
	//Submit the form
	//alert(val);
	$("input[id=numrows]").val(val);
	$('#myForm').submit();
}
</script>


<link rel="stylesheet" href="css/style_popup.css" type="text/css" />


<link href="jquery-validation/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">





    <!-- Bootstrap core CSS -->
    <link href="themes/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="themes/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="themes/assets/css/carousel.css" rel="stylesheet">
    
    
	<!--<script>
	$(document).ready(function(){
		$(".btn1").click(function(){
			$("p").hide();
		});
		$(".btn2").click(function(){
			$("p").show();
		});
	});
	</script>-->
    
    <style type="text/css">
<!--
.style1 {color: #FFFF00}
-->
    </style>
</head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">CommonShoppy</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="shoppingcart.php">Shopping Cart</a></li>
                <!--<li><a href="products.php">Products</a></li>-->
                <li><a href="contact.php">Contact</a></li>
              </ul>
              <div align="center"><span style=" float:right; margin-right:20px; background-color:#EFEFEF;">
			  <?php 
			  if(isset($_SESSION['customer_user']) && $_SESSION['customer_user']!='') {
			  		echo 'Welcome '.ucwords($_SESSION['customer_user']);
					echo ' | <a href="orders.php" class="btn-link" style="color:#000000;">Orders</a> | <a href="index.php?logout=yes" class="btn-link" style="color:#000000;">Logout</a>';
			  }
			  else {
			  		echo '<a href="login.php" class="alert-info" style="color:#000000;">Customer Login</a>';
			  }
			  ?>
              ||
			  <?php 
			  if(isset($_SESSION['mem_user']) && $_SESSION['mem_user']!='') {
			  		echo 'Welcome '.ucwords($_SESSION['mem_user']);
					echo ' | <a href="member/viewproducts.php" class="btn-link">View Products</a> | <a href="index.php?logout=yes" class="btn-link" style="color:#000000;">Logout</a>';
			  }
			  else {
			  		echo '<a href="shop_login.php" class="alert-info" style="color:#000000;">Shop Login</a>';
			  }
			  ?>
              </span>
              </div>
              
            </div>
          </div>
        </div>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="mainCarousel">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <!--<ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>-->
      <div class="carousel-inner">
        <div class="item active" style=" background-color:#3B5998;">
          <!--<script
			src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBGm9VlGfLCC9QoFGxrtd-nomb1JH73PTA&sensor=false">
			</script>
			<script>
			var myCenter=new google.maps.LatLng(21.7679, 78.8718);//51.508742,-0.120850);
			var marker;
			function initialize()
			{
			var mapProp = {
			  center:myCenter,
			  zoom:15,
			  mapTypeId:google.maps.MapTypeId.ROADMAP
			  };
			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
			marker=new google.maps.Marker({
			  position:myCenter,
			 // icon:'themes/assets/images/nepali-momo.png',
			  animation:google.maps.Animation.BOUNCE
			  });

			marker.setMap(map);

			// Info open
			var infowindow = new google.maps.InfoWindow({
			  content:"Hello World!"
			  });

			google.maps.event.addListener(marker, 'click', function() {
			  infowindow.open(map,marker);
			  });
			}
			google.maps.event.addDomListener(window, 'load', initialize);
			</script>-->
            
			<!--<div id="googleMap" style="height:450px;"></div>-->
<div class="container">
				<div class="carousel-caption" style="max-width:200px;">
                <span class="h3 style1">Select your place of delivery</span>
<form method="post" action="products.php" name="form1">

  <div style="padding:5px;"><select name="country" class="form-control" onChange="getState(this.value)">
        <option value="">Select Country</option>
        <?php while ($row=mysql_fetch_array($result)) { ?>
        <option value=<?php echo $row['id']?>><?php echo $row['country']?></option>
        <?php } ?>
        </select></div>
        
        <div id="statediv" style="padding:5px;">
        <select class="form-control" name="state" >
        <option>Select State</option>
        </select></div>
        
        <div id="citydiv" style="padding:5px;"><select class="form-control" name="city">
        <option>Select District/City</option>
        </select></div>
        
        <div id="deliverydiv" style="padding:5px;"><select class="form-control" name="delivery">
        <option>Select Place of Delivery</option>
        </select></div>
        
        <input name="Submit" type="submit" class="btn" value="Search Items">
</form>

				  <!--<a class="btn btn-lg btn-default" href="#" role="button" style="font-size:2em">Order Online Now &raquo;</a>-->
                  <p><?=isset($msg)?$msg:''?></p>
                  <!--<button class="btn1">Hide</button>
				  <button class="btn2">Show</button>-->
		  </div>
		  </div>
			</div>
		  </div>
		</div><!-- /.carousel -->
	</div>

	<div class="mainTitle">
	<div class="container">
	<h1>Common Shoppy</h1>
	<p>
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
	</p>
    <p>Categories</p>
    <p>&nbsp;</p>
    
    <div class="highlightSection">
    <div class="container">
    <div class="row">
    <?php
    /*while($row=mysql_fetch_array($datacat1)) {
		//echo '<br>--------row=';print_r($row);
		?>
            <div class="col-lg-4">
            <div class="media">
                <a href="menu/"><img src="http://dev.bombaytakeawayclub.com/assets/img/nepali-momo.png" alt="nepali-momo"> </a>
                <h3 class="media-heading text-primary-theme"><a href="products.php?catid=<?=$row['id']?>"><?=$row['categoryname']?></a></h3>
                <p>Steamed dumplings filled with slightly spiced minced meat served with special sauce.</p>
            </div>
            </div>
        <?php
	}*/
	?>
    </div>
    </div>
    </div>
    
	</div>
	</div>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    
	
	

	
	
	<div class="introSection">
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="cntr">We are launching complete online ordering system for shops <br>&hearts; Free of cost &hearts;</h1>
			</div>
		</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	 <div class="highlightSection">
	<div class="container"></div>
  </div>
	      

	
	<div class="introSection">
		<div class="container"></div>
  </div>


   <div class="container marketing">
     <!-- /.carousel -->	  
  </div>
<!-- /.container -->
      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
		<div class="container">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
		</div>
      </footer>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="themes/dist/js/bootstrap.min.js"></script>
    <script src="themes/assets/js/holder.js"></script>
  </body>
</html>
