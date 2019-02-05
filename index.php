   <?php 
   include 'config/config.php';
   include 'lib/Database.php';
   include 'helpers/Format.php';
   ?>
	<!-- Header Start-->
		<?php include 'inc/header.php' ?>
	<!--Header End-->

	<!-- Slider Start -->
		<?php include 'inc/slider.php' ?>
	<!-- Slider End -->
	
	<?php  
		$db = new Database();
		$fm = new Format();
	?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<!-- Pagination  -->
			<?php 
			    $per_page = 1;
				if(isset($_GET['page'])){
					$page = $_GET['page'];
				} else {
					$page = 1;
				}
				 $start_page = ($page - 1) * $per_page;
			?>

			<!-- Pagination -->
			<?php 
			$query = "SELECT * FROM tbl_post ORDER BY id limit $start_page, $per_page";
			$post = $db->select($query);
			if($post){
				while($row = $post->fetch_assoc()){  ?>
					<div class="samepost clear">
					<h2><a href=""><?php echo $row['title']?></a></h2>
					<!-- April 10, 2016, 12:30 PM -->
					
					<h4><?php echo $fm->formatDate($row['date']);?>, By <a href="#"><?php echo $row['author'];?></a></h4>
					 <a href="#"><img src="images/<?php echo $row['image']?>" alt="post image"/></a>
					 <?php echo $fm->textShorten($row['body']);?>
					<div class="readmore clear">
						<a href="post.php?id=<?php echo $row['id']?>">Read More</a>
					</div>
				</div>		
					
				 <?php } ?> <!-- While Loop End -->
				<!-- Pagination  -->
				<?php 
					$query = "SELECT * FROM tbl_post";
					$result = $db->select($query);
					$total_rows = mysqli_num_rows($result);
				?>
				<?php echo "<span class='pagination'><a href='index.php?page=$page'>First</a>";
				     for($i = 1; $i <= $total_rows; $i++){
						echo "<a href='index.php?page=$i'>".$i."</a>";
					 }					 					 
					  echo "<a href='index.php?page=$total_rows'>Last</a>";
					  echo "</span>";
			    ?>


				<!-- Pagination -->

			<?php } else {

				echo '<h2>No Post Available</h2>';
			}
			
			?>
								
		</div>
		<!-- Sidebar Start -->
			<?php include 'inc/sidebar.php' ?>
		<!-- Sidebar End -->
	</div>

	<!-- Footer Start -->
	<?php include 'inc/footer.php'?>
	<!-- Footer End -->
