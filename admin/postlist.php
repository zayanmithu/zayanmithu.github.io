 <?php

include 'inc/AHeader.php';
include 'inc/ASidebar.php';

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Post ID</th>
							<th width="10%">Post Title</th>
							<th width="10%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Description</th>
							<th width="10%">Tags</th>
							<th width="10%">Date</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>

                        <?php
                        $query="Select tb_post.*,tb_category.name from tb_post INNER JOIN tb_category ON tb_post.cat=tb_category.id order by tb_post.title desc";
                        $postresult=$db->select($query);

                        if($postresult->num_rows>0)
                        {
                        	$i=0;
                        	while ($rows=$postresult->fetch_assoc()) {
                        		$i++
                        ?>

						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td> <?php echo $rows['title']; ?> </td>
							<td><?php echo $rows['name']; ?></td>
							<td><img src="<?php echo $rows['image']; ?>" width="60px" height="40px" ></td>
							<td><?php echo $readDate->textShorten($rows['body'],1000); ?></td>
							<td><?php echo $rows['tags']; ?></td>
							<td><?php echo $rows['date']; ?></td>							
							<td><a href="">Edit</a> || <a href="">Delete</a></td>
						</tr>			
					<?php }?>
						<?php }?>		
					</tbody>
				</table>
	
               </div>
            </div>
        </div>

<?php
include 'inc/AFooter.php';
?>


	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    <div id="site_info">
      <p>
         &copy; Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
        </p>
    </div>
	   
</body>
</html>
