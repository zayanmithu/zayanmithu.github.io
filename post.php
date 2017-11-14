<?php
include 'inc/Header.php';
include 'inc/Slider.php';
?>


<?php

if(!isset($_GET['id']) || $_GET['id']==NULL)
{
	header("Location: 404.php");
} else
{
	$id=$_GET['id'];
}

?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

				<?php
                 $query="Select *From tb_post Where id=$id";
                 $post=$db->select($query);

	              if($post)
	              {
                   while ($result=$post->fetch_assoc()) {

				?>
				<h2>Our post title here</h2>
				<h3><?php echo $result['author'];?></h3>
				<h4><?php echo $result['date'];?></h4>
				<img src="admin/uploadimages/<?php echo $result['image']?>">
				<?php echo $result['body'];?>

				
       
		

	}?>
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
                     $catid=$result['cat'];
                     $rquery="Select *From tb_post Where cat='$catid' limit 3";
                     $relatedpost=$db->select($rquery);
                      if($relatedpost)
	                    {
                   while ($rresult=$relatedpost->fetch_assoc()) {
					?>
					<a href="post.php?id=<?php echo $rresult['id']; ?>"><img src="admin/uploadimages/<?php echo $rresult['image'] ;?>" alt="post image"/></a>
					

					<?php }}?>
					<?php }} else{ echo "Related Image not Found.";}?>
				</div>
	</div>
</div>


<?php include 'inc/Sidebar.php';?>
<?php include 'inc/Footer.php';?>