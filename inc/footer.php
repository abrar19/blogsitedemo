<div class="footersection template clear">
<div class="footermenu clear">
	<ul>
	<li><a href="#">Home</li></a>
	<li><a href="#">About</li></a>
	<li><a href="#">Contact</li></a>
	<li><a href="#">Services</li></a>
	<li><a href="#">Portfolio</li></a>
	</ul>
</div>
<?php 
    $query = "select * from tbl_footer where id='1'";
    $footernote = $db->select($query);
    if($footernote){
    while($result = $footernote->fetch_assoc()){

?>
	<p>
	&copy; <?php echo $result['note']; echo " ".date('Y');?>
	</p>
<?php } } ?>
</div>

<div class="fixedicon clear">
<?php 
    $query = "select * from tbl_social where id='1'";
    $socialmedia = $db->select($query);
    if($socialmedia){
    while($result = $socialmedia->fetch_assoc()){

?>
<a href="<?php echo $result['fb'];?>" target="_blank"><img src="images/f.png" alt="Facebook"/></a>
<a href="<?php echo $result['tw'];?>" target="_blank"><img src="images/t.png" alt="Facebook"/></a>
<a href="<?php echo $result['ln'];?>" target="_blank"><img src="images/l.png" alt="LinkedIn"/></a>
<a href="<?php echo $result['gp'];?>" target="_blank"><img src="images/g.png" alt="GooglePlus"/></a>
<?php } } ?>
</div>

							

<script type="text/javascript" src="js/scrolltotop.js"></script>
<noscript>


</body>
</html>