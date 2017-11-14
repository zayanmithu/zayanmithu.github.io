<?php

include 'inc/AHeader.php';
include 'inc/ASidebar.php';

 ?>
 <?php
  if(isset($_GET['delcatid']))
  {
  	$delid=$_GET['delcatid'];
  	$query="Delete from tb_category Where id='$delid'";
  	$result=$db->delete($query);
  	if($result)
  	{
  	     echo "<span class='success'>Category Name Deleted Successfully!! </span>";
    }
  else
   {
       echo "<span class='error'>Category Name is not Deleted!! </span>";
   }

  }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>ID</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        
                        <?php
                        $query="Select *From  tb_category order by id desc";
                        $result=$db->select($query);

                        if($result->num_rows>0)
                        {
                        	$i=0;
                        	while ($rows=$result->fetch_assoc()) {
                        		$i++
                        ?>


						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $rows['id'];?></td>
							<td><?php echo $rows['name'];?></td>
							<td><a href="editcat.php?catid=<?php echo $rows['id'];?>">Edit</a> || <a onclick="return confirm('Are You Sure??');" href="?delcatid=<?php echo $rows['id'];?>">Delete</a></td>
						</tr>	

						<?php }?>
						<?php }?>				
					
					</tbody>
				</table>
               </div>
            </div>
        </div>


        <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
<?php
include 'inc/AFooter.php';
?>



 