<?php
    include 'header.php';

    $cid = $_GET['cid'];

    if(isset($_POST['update'])){

    /*  if(empty($_FILES['new-img'])){

            $uniquename = $_FILES['old-img'];

        }
        else{

            // Upload Image

            if(isset($_FILES['new-img'])){

                $errors = array();
        
                $file_name = $_FILES['new-img']['name'];
                $file_size = $_FILES['new-img']['size'];
                $file_tmp = $_FILES['new-img']['tmp_name'];
                $file_type = $_FILES['new-img']['type'];
                $file_ext = explode('.',$file_name);
                $ext = end($file_ext);
                $extensions = array("jpeg","jpg","png","JPEG","JPG","PNG");

                $random = rand(9999,1111);
                $time = time();

                $uniquename = ($random.$time.$file_name);
        
                if(in_array($ext,$extensions) === false){
                    $errors[] = "Please Upload jpeg/jpg or png image";
                }
        
                if($file_size > 1048576){
                    $errors[] = "Image size must be 1mb or lower";
                }
        
                if(empty($errors) == true){
                    move_uploaded_file($file_tmp,"user-img/".$uniquename);
                }
                else{
                    print_r($errors);
                    die();
                }
            }
        }  */

        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $dob = $_POST['dob'];
        $mnumber = $_POST['mnumber'];
        $gmail = $_POST['gmail'];
        $address = $_POST['address'];

        // Check Data already present or not 
        $duplicate = mysqli_query($conn, "SELECT * FROM customer WHERE Mobile_Number = '$mnumber' OR Gmail_Id = '$gmail'");

        if(mysqli_num_rows($duplicate) > 1){

            ?>
            <script> 
                alert('Mobile Number or Gmail Id are allready registered!');
                // swal("Oops!", "Mobile Number or Gmail Id are allready registered!", "error")
                location.replace("manage-account.php")
            </script>
            <?php
            die();
    
        }
        else{   

            // Data Update
            $query = "UPDATE customer SET Name = '$name', Father_Name = '$fname', DOB = '$dob', Mobile_Number = '$mnumber', Gmail_Id = '$gmail', Address = '$address' WHERE Customer_Id = '$cid'";

            // Query Execute
            $result1 = mysqli_query($conn, $query);

            if($result1){

                ?>
                <script> 
                    alert('Successfull.')
                    // swal("Good job.", "Successfull.", "success")
                    location.replace("manage-account.php")
                </script>
                <?php
            }
            else{

                ?>
                <script> 
                    alert('Failed!')
                    // swal("Oops!", "Failed!", "error")
                    location.replace("manage-account.php")
                </script>
                <?php
            }

        }
    }
?>

        
        <!-- ======= Profile ======= -->

        <div class="profile-box">
            <div class="profile">
                <a href="manage-account.php"><i class="fa-solid fa-delete-left"></i></a>

                <?php

                    $result = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_Id = '$cid'");

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){

                ?>

                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="img-box">
                        <img id="imgId" src="user-img/<?php echo $row['Image_Name']; ?>">
                        <!-- <i class="fa-solid fa-upload"></i> -->
                        <!-- <input type="file" id="typeId" name="new-img"onchange="showImage(this, 'imgId')">
                        <input type="hidden" name="old-img" value=""> -->
                    </div>
                    <div class="input-box">
                        <label>Customer Id</label>
                        <input type="number" name="customerid" value="<?php echo $row['Customer_Id']; ?>" required="required" disabled>
                    </div>
                    <div class="input-box">
                        <label>Account Number</label>
                        <input type="number" name="accountnumber" value="<?php echo $row['Account_Number']; ?>" required="required" disabled>
                    </div>
                    <div class="input-box">
                        <label>Name</label>
                        <input type="text" name="name" required="required" value="<?php echo $row['Name']; ?>">
                    </div>
                    <div class="input-box">
                        <label>Father's Name</label>
                        <input type="text" name="fname" required="required" value="<?php echo $row['Father_Name']; ?>">
                    </div>
                    <div class="input-box">
                        <label>D O B</label>
                        <input type="text" name="dob" value="<?php echo $row['DOB']; ?>" onfocus="this.type='date'" onblur="this.type='text'" required="required">
                    </div>
                    <div class="input-box">
                        <label>Mobile Number</label>
                        <input type="number" name="mnumber" required="required" value="<?php echo $row['Mobile_Number']; ?>">
                    </div>
                    <div class="input-box">
                        <label>Gmail Id</label>
                        <input type="email" name="gmail" required="required" value="<?php echo $row['Gmail_Id']; ?>">
                    </div>
                    <div class="input-box">
                        <label>Address</label>
                        <input type="text" name="address" required="required" value="<?php echo $row['Address']; ?>">
                    </div>
                    <div class="submit-box">
                        <input type="submit" value="Update" name="update">
                    </div>
                </form>

                <?php
                        }
                    }
                ?>

            </div>
        </div>

        <!-- ======= End Profile ======= -->
    </div>
    
<?php
    include 'footer.php';
?>