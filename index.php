<?php
include 'inc/Header.php';
include 'inc/Slider.php';
?>




    <?php
    
    $per_page=2;
    if(isset($_GET['page']))
    {
    	$First_Page=$_GET['page'];
    } else{
    	$First_Page=1;
    }

    $Start_Form=($First_Page-1)*$per_page;

    ?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

			<?php
              $query="Select *From tb_post limit $Start_Form,$per_page";
              $post=$db->select($query);

              if($post)
              {
                while ($result=$post->fetch_assoc()) {
                	# code...
                

			?>
			<div class="samepost clear">

				<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $readDate->DateFormat($result['date']);?> <a href="#"><?php echo $result['author'];?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php echo $result['body'];?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>	
			
			<?php }?>
       
		<?php }	?>

		</div><!---End While Loop-->

		<!--Pagination-->
		<?php

         $query="Select *from tb_post";
         $result=$db->select($query);
         $total_row=mysqli_num_rows($result);
         $total_page=ceil($total_row/$per_page);
		 echo "<span class='Pagination'><a href='index.php?page=1'>".'First Page'."</a></span>" ;

		 for ($i=1; $i< $total_page; $i++)
		 {
		 	echo "<a href='index.php?page=".$i."'>".$i."</a>" ;
		 };

		 echo "<span class='Pagination'><a href='index.php?page=$total_page'>".'Last Page'."</a></span>" ;?>

		<!--Pagination-->
	<?php include 'inc/Sidebar.php';?>
	</div>

	<?php include 'inc/Footer.php';?>