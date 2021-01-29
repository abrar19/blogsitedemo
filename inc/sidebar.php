<div class = "sidebar clear">
		
		<div class="samesidebar clear">
		<h2>Categories</h2>
		 <ul>
		 <?php 
			$query = "select * from tbl_category";
			$category = $db->select($query);

			if($category){
					while($result=$category->fetch_assoc())
		 {
		 ?>
			<li><a href="posts.php?category=<?php echo  $result['id'];?>"><?php echo $result['name'];?></li></a>
		 <?php } }else{ ?>
		 <li>No Category Created</li>
		 <?php } ?>
		 </ul>
		</div>

		<div class="samesidebar clear">
		<h2>Latest Article</h2>
		 <ul>
			<li><a href="#">Post title one</li></a>
			<li><a href="#">Post title two</li></a>
			<li><a href="#">Post title three</li></a>
			<li><a href="#">Post title four</li></a>
			<li><a href="#">Post title five</li></a>
		 </ul>
		</div>
		
		<div class="samesidebar clear">
		<h2>Popular Articles</h2>
		<?php 
		$query = "select * from tbl_post limit 3";
		$post = $db->select($query);

		 if($post){
				while($result=$post->fetch_assoc())
		 {
		?>
			<div class="popular clear">
				<h3><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']?></a></h3>
				<img src="admin/<?php echo $result['image']; ?>" alt="Popular Post"/>
				<?php echo $fm->textShortner($result['body'], 130); ?>
			</div>
		<?php } } else{
			header("Location:404.php");
		 }
		?>
		</div>

		<div class="samesidebar clear">
		<h2>Sidebar 3 Title</h2>
		<p>Some SIDEBAR text will go here.Some SIDEBAR text will go here.Some SIDEBAR text will go here.Some SIDEBAR text will go here.Some SIDEBAR text will go here.Some SIDEBAR text will go here.Some SIDEBAR text will go here.Some SIDEBAR text will go here.</p>
		</div>		
	</div>

</div>