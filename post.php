<?php include 'inc/header.php';?>
<?php
	if(!isset($_GET['id']) || $_GET['id']==NULL)
	{
		header("Location: 404.php");
	}else{
		$id = $_GET['id'];
	}
?>

<div class="contentsection contemplate clear">
	
	<div class = "maincontent clear">
	<div class="about">

	<?php 
		$query = "select * from tbl_post where id=$id";
		$post = $db->select($query);

		 if($post){
				while($result=$post->fetch_assoc())
		 {
	?>

	<h2><?php echo $result['title']; ?></h2>
	<h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
	<img src="admin/<?php echo $result['image']; ?>" alt="Post Image"/>
	<?php echo $result['body']; ?>
		
		<iframe width="100%" height="345" src="https://www.youtube.com/embed/6_I0XvA17bo?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	
	<p>Some content will go here.Some content will go here.Some content will.Some content will go here.Some content will go here.Some content will go here.Some content will go here.Some content will go here.Some content will go here.Some content will go here.Some content will go here.</p>

	
	<div class="relatedpost clear">
		<h2>Related Articles</h2>
		<?php 
			$catid = $result['cat'];
			$queryrelated = "select * from tbl_post where cat='$catid' order by rand() limit 6";
			$relatedpost = $db->select($queryrelated);
			if($relatedpost){
				while($rresult=$relatedpost->fetch_assoc())
		 {
		?>
		<a href="post.php?id=<?php echo $rresult['id']; ?>">
		<img src="admin/<?php echo $rresult['image']; ?>" alt="MyImage"/>
		</a>
		 <?php } }else{
			 echo "No related post available!!";
		 }?>
	</div>
		<?php } } else{
			header("Location:404.php");
		 }
	?>
	</div>
	</div>

	<?php include 'inc/sidebar.php';?>

</div>
<!--<div style="clear:both"></div>-->
<?php include 'inc/footer.php';?>