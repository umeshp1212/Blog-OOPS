<?php
include_once 'config/config.php';
include 'lib/Database.php';
include 'helpers/Format.php';
?>
	<!-- Header Start-->
	<?php include 'inc/header.php'?>
	<!--Header End-->
<?php if (!isset($_GET['id']) || $_GET['id'] == null) {
    header("Location:404.php");
} else {
    $id = $_GET['id'];
}?>
<?php
$db = new Database();
$fm = new Format();
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

					<?php
					$query = "SELECT * FROM tbl_post WHERE id = '$id'";
					$post = $db->select($query);
					if ($post) {
						while ($row = $post->fetch_assoc()) {?>
							<h2><?php echo $row['title']; ?></h2>
							<h4><?php echo $fm->formatDate($row['date']) ?>, By <?php echo $row['author']; ?></h4>
							<img src="images/<?php echo $row['image']; ?>" alt="MyImage"/>
							<?php echo $row['body']; ?>
							<?php $catid = $row['cat'];?>
						

					<?php
					$queryrelated = "SELECT * FROM tbl_post WHERE cat = '$catid' ORDER BY rand()";
					$related_post = $db->select($queryrelated);?>

									<div class="relatedpost clear">
										<h2>Related articles</h2>
											<?php if ($related_post) {
												while ($other_row = $related_post->fetch_assoc()) {?>
														<a href="post.php?id=<?php echo $other_row['id']; ?> "><img src="images/<?php echo $other_row['image']; ?>" alt="post image"/></a>
												<?php }
											}?>

									</div>
									<?php	}
					}
					?>
								
			</div>
		</div>	
			<!-- Sidebar Start -->
			<?php include 'inc/sidebar.php'?>
		<!-- Sidebar End -->		
	</div>

<!-- Footer Start -->
<?php include 'inc/footer.php'?>
	<!-- Footer End -->