<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
<?php 
	$db = new Database();
	$fm = new Format();
?>
<!DOCTYPE html>
<html>
<head>
<title>Basic Website</title>
<meta name="description" content="It is a personal website for tech blogs">
<meta name="keywords" content="tech,technology,blog,tech blog">
<meta name="author" content="Abrar Haque">

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:2200,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>


</head>
<body>
<div class="headersection template clear">
<div class="logo clear">
<?php 
    $query = "select * from title_slogan where id='1'";
    $blog_title = $db->select($query);
    if($blog_title){
    while($result = $blog_title->fetch_assoc()){

?>
	<img src="admin/<?php echo $result['logo'];?>" alt="Logo" width="100px" height="100px"/>
	<h2><?php echo $result['title'];?></h2>
	<p><?php echo $result['slogan'];?></p>
<?php }  }?>
</div>
<div class="social clear">
<?php 
    $query = "select * from tbl_social where id='1'";
    $socialmedia = $db->select($query);
    if($socialmedia){
    while($result = $socialmedia->fetch_assoc()){

?>
	<a href="<?php echo $result['fb'];?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	<a href="<?php echo $result['tw'];?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	<a href="<?php echo $result['ln'];?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
	<a href="<?php echo $result['gp'];?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
</div>
<?php } }?>
<div class="searchbtn clear">
<form action="search.php" method="get">
	<input type="text" name="search" placeholder="Search keyword..."/>
	<input type="submit" name="submit" value="Search"/>
</form>
</div>
</div>
<div class="navsection template">
	<ul>
	<li><a id="active" href="index.php">Home</a></li>
	<li><a href="about.php">About</a></li>
	<li><a href="contact.php">Contact</a></li>
	<li><a href="service.php">Services</a>
		<ul>
		<li><a href="#">WEB</a></li>
		<li><a href="#">NETWORK</a></li>
		<li><a href="#">SOFTWARE</a></li>
		<li><a href="#">HARDWARE</a></li>
		<li><a href="#">CLOUD</a></li>
		</ul>
	</li>
	<li><a href="portfolio.php">Portfolio</a></li>
	</ul>
</div>