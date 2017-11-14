 <?php

include 'inc/AHeader.php';
include 'inc/ASidebar.php';

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
                        $query="INSERT INTO tb_category(name) Values('$catname')";
                        $catinsert=$db->insert($query);
                        if($catinsert)
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
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="tex" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>                               
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php
include 'inc/AFooter.php';
?>
