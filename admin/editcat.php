 <?php

include 'inc/AHeader.php';
include 'inc/ASidebar.php';

 ?>

<?php
if(!isset($_GET['catid']) || $_GET['catid']==NULL)
{
   header("Location:catlist.php");
}else{
    $id=$_GET['catid'];
}
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 


                <?php
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $catname=$_POST['name'];
                    $catname=mysqli_real_escape_string($db->link,$catname);                  
                    if(empty($catname))
                    {
                        echo "<span class='error'>Category Field Must not be Empty!! </span>";
 
                    } else { 
                        $query="UPDATE tb_category SET name='$catname' Where id='$id'";
                        $catupdate=$db->update($query);
                        if($catupdate)
                        {
                             echo "<span class='success'>Category Name Inserted!! </span>";

                        }
                        else
                        {
                            echo "<span class='error'>Category not Inserted!! </span>";
 
                        }


                     }
                }


                ?>


                <?php
                $query="Select *From tb_category where id='$id'";
                $category=$db->select($query);
                while ($result=$category->fetch_assoc()) {
                
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                          <input type="text" name="name" value="<?php echo $result['name']; ?>"/> 
                            </td>
                        </tr>
						<tr> 
                            <td>                               
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
<?php
include 'inc/AFooter.php';
?>
