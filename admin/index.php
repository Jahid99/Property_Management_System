<?php include 'inc/header.php';?>

 <div class="container">
      <div class="row">
        <h2>Users Property Details</h2><hr>

           <?php 
            if (isset($_GET['del'])) {
              $delid = $_GET['del'];
              $delquery = "delete from property where propid ='$delid'";
              $deldata = $db->delete($delquery);
              if($deldata){
                        echo "<span class='text-success'>Property Details Deleted Successfully !!!</span><br><br>";
                        $to = "jahidulpathan@gmail.com";
                        $from = "admin@gmail.com";
                        $headers = "From: $from\n";
                        $headers .= 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        $subject = "Your Password";
                        $message = "Property With Propid= ".$delid." Deleted successfully";

                        $sendmail = mail($to, $subject, $message,$headers);
                        if ($sendmail) {
                            echo "<span class='text-success'>E-mail Sent Successfully !!!</span><br><br>";
                        }else{
                            echo "<span class='text-success'>E-mail Not Sent !!!</span><br><br>";
                        }

                       } else {
                        echo "<span class='text-danger'>Property Details Not Deleted !!!</span><br><br>";
                    }
            }

         ?>
             <?php 

          $query = "SELECT * from property order by propid DESC";
          $donors = $db->select($query);
          if($donors){ ?>
            <table class="table table-bordered" id="example">
                <thead>
                  <tr>
                    <th width="5%">No.</th>
                    <th width="8%">House No</th>
                    <th width="8%">Street</th>
                    <th width="8%">City</th>
                    <th width="5%">Post Code</th>
                    <th width="5%">Bed Rooms</th>
                    <th width="5%">Floors</th>
                    <th width="8%">Accomadation Type</th>
                    <th width="8%">Comments</th>
                    <th width="8%">Image</th>
                    <th width="8%">Price</th>
                    <th width="8%">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                    <?php $i=0;
                      while ($result = $donors->fetch_assoc()) { $i++;?>

                        <tr class="odd gradeX">
                          <td><?php echo $i; ?></td>
                          <td><?php echo $result['houseno']; ?></td>
                          <td><?php echo $result['street']; ?></td>
                          <td><?php echo $result['city']; ?></td>
                          <td><?php echo $result['postcode']; ?></td>
                          <td><?php echo $result['bedrooms']; ?></td>
                          <td><?php echo $result['floors']; ?></td>
                          <td><?php echo $result['accommodationtype']; ?></td>
                          <td><?php echo $result['comments']; ?></td>
                          <td><img class="img-responsive" width="50" height="50" src="<?php echo SITE_URL;?>property/<?php echo  $result['image'];?>" alt="" /></td>
                          <td><?php echo $result['price']; ?></td>
                          <td><a onclick="return confirm('Are you sure to delete');" href="?del=<?php echo $result['propid']; ?>">Delete</a></td>
                        </tr>
                        <?php } ?>
                    
                </tbody>
              </table>
               <?php
                    }else{
                      echo '<center><h2 style="color:red">No Property Details Found...</h2></center>';
                    }
                  

                     ?>
              
      </div>
    </div>


<?php include 'inc/footer.php';?>