<?php
include 'inc/Header.php';

?>

<?php

if(!isset($_GET['category']) || $_GET['category']==NULL)
{
	header("Location: 404.php");
}

else
{
	$id=$_GET['category'];
}

?>

<div class="contentsection contemplete clear">
<div class="maincontent clear">

<?php

$query="Select *From tb_post Where cat=$id";
$post=$db->select($query);
if($post)
              {
                while ($result=$post->fetch_assoc()) {

?>

	<div class="samepost clear">

				<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $readDate->DateFormat($result['date']);?> <a href="#"><?php echo $result['author'];?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php echo $readDate->DateFormat ($result['body']);?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>	
			
			<?php }?>
       
		<?php }	?>




<?php include 'inc/Sidebar.php';?>
<?php include 'inc/Footer.php';?>
