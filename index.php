<?php include 'inc/header.php';?>


            <div class="card bg-light">
                <article class="card-body mx-auto" style="width: 500px;">
                	<h4 class="card-title mt-3 text-center">Property Registration Form</h4><hr>
                	
                	
                    <?php 


                        if ($_SERVER['REQUEST_METHOD']=='POST') {  

                            $houseno =  $fm->validation($_POST['houseno']);
                            $street =  $fm->validation($_POST['street']);
                            $city =  $fm->validation($_POST['city']);
                            $postcode =  $fm->validation($_POST['postcode']);
                            $bedrooms =  $fm->validation($_POST['bedrooms']);
                            $floors =  $fm->validation($_POST['floors']);
                            $accommodationtype =  $fm->validation($_POST['accommodationtype']);
                            $comments =  $fm->validation($_POST['comments']);
                            $price =  $fm->validation($_POST['price']);

                            $houseno =  mysqli_real_escape_string($db->link,$houseno);
                            $street =  mysqli_real_escape_string($db->link,$street);
                            $city =  mysqli_real_escape_string($db->link,$city);
                            $postcode =  mysqli_real_escape_string($db->link,$postcode);
                            $bedrooms =  mysqli_real_escape_string($db->link,$bedrooms);
                            $floors =  mysqli_real_escape_string($db->link,$floors);
                            $accommodationtype =  mysqli_real_escape_string($db->link,$accommodationtype);
                            $comments =  mysqli_real_escape_string($db->link,$comments);
                            $price =  mysqli_real_escape_string($db->link,$price);



                            if(empty($houseno) || empty($street) || empty($city) || empty($postcode) || empty($bedrooms)|| empty($floors)|| empty($accommodationtype)|| empty($comments)|| empty($price)){
                                echo "<center><span class='text-danger'>Required fields must not be empty  !!!</span><center><br><br>";
                               }else{

                                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                                    $file_name = $_FILES['image']['name'];
                                    $file_size = $_FILES['image']['size'];
                                    $file_temp = $_FILES['image']['tmp_name'];

                                    $div = explode('.', $file_name);
                                    $file_ext = strtolower(end($div));
                                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                                    $uploaded_image = "images/".$unique_image;



                                    if ($file_size >1048567) {
                                     echo "<center><span class='text-success'>Image Size should be less then 1MB!</span><center>";
                                    } elseif (in_array($file_ext, $permited) === false) {
                                     echo "<center><span class='text-success'>You can upload only:-".implode(', ',$permited)."</span><center>";
                                    } else{

                                        move_uploaded_file($file_temp, $uploaded_image);

                                   $query = "INSERT INTO  property(houseno,street,city,postcode,bedrooms,floors,accommodationtype,comments,image,price) VALUES ('$houseno','$street','$city','$postcode','$bedrooms','$floors','$accommodationtype','$comments','$uploaded_image','$price')";
                                    $userinsert = $db->insert($query);
                                    if($userinsert){
                                      echo "<center><span class='text-success'>Thank you for your details and the property will be added in 3-5 days !!!</span><center><br><br>";
                                
                                    }   else {
                                      echo "<center><span class='text-danger'>Registration is Unsuccessful  !!!</span><center><br><br>";
                                
                                        }


                                    }

                             }                
                                  
                        }
                        
                     ?>
                    
                	<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-home"></i> </span>
                         </div>
                        <input name="houseno" class="form-control" placeholder="Enter House No..." type="number" required>
                    </div> <!-- form-group// -->


                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-map-marker"></i> </span>
                         </div>
                        <input name="street" class="form-control" placeholder="Enter Street..." type="text" required>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-location-arrow"></i> </span>
                         </div>
                         <select class="form-control" id="sel1" name="city">
                        <option value="">Select City Name</option>
                        <option value="city_1">City 1</option>
                        <option value="city_2">City 2</option>
                        <option value="city_3">City 3</option>
                        <option value="city_4">City 4</option>
                      </select>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-sort-numeric-up"></i> </span>
                         </div>
                        <input name="postcode" class="form-control" placeholder="Enter Post Code..." type="number" required>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-bed"></i> </span>
                         </div>
                        <input name="bedrooms" class="form-control" placeholder="Enter the Number of Bed Rooms..." type="number" required>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fab fa-stack-exchange"></i> </span>
                         </div>
                        <input name="floors" class="form-control" placeholder="Enter the Number of Floors..." type="number" required>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-info"></i> </span>
                         </div>
                         <select class="form-control" id="sel1" name="accommodationtype" required>
                        <option value="">Select Accomadation Type</option>
                        <option value="type_1">Type 1</option>
                        <option value="type_2">Type 2</option>
                        <option value="type_3">Type 3</option>
                        <option value="type_4">Type 4</option>
                      </select>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="far fa-comments"></i> </span>
                         </div>
                        <textarea name="comments" class="form-control" rows="5" id="comment" placeholder="Comments..." required></textarea>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-images"></i> </span>
                         </div>
                        <input class="form-control" name="image" type="file"  required/>
                    </div> <!-- form-group// -->


                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-money-bill-alt"></i> </span>
                         </div>
                        <input name="price" class="form-control" placeholder="Enter Price..." type="number" required>
                    </div> <!-- form-group// -->

                                                   
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Submit  </button>
                    </div> <!-- form-group// -->      
                                                                                   
                </form>
                </article>
                </div> <!-- card.// -->

            </div> 
            <!--container end.//-->


<?php include 'inc/footer.php';?>