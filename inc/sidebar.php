

<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>

					<ul>
						<?php
							$query = "SELECT * FROM tbl_category";
							$category = $db->select($query);
							if($category){
								while($row = $category->fetch_assoc()){?>
									<li><a href="posts.php?category=<?php echo $row['id']?>"><?php echo $row['name'];?></a></li>

						 <?php }
							} else {
								echo "<li>No Category</li>";
							}
						?>																
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php 
					$query = "SELECT * FROM tbl_post ORDER BY id DESC";
					$post = $db->select($query);
					if($post){
						while($row = $post->fetch_assoc()){
							$output = "";
							$output .= "<div class='popular clear'>";
							$output .= "<h3><a href='post.php?id=".$row['id']."'>".$row['title']."</a></h3>";
						   
							$output .= "<a href='#'><img src='images/".$row['image']."' alt='post image'/></a>";
							$output .= "<p>".$fm->textShorten($row['body'], 50)."...</p>";
							$output .= "</div>";
						}
						echo $output;
					}

				?>



					
					
					
					
					
					
	
			</div>
			
</div>