<?php
    include 'header.php';

    if(isset($_POST['submit'])){

        $uname = $_POST['uname'];
        $name = $_POST['name'];
        $mnumber = $_POST['mnumber'];
        $gmail = $_POST['gmail'];
        $password = md5($_POST['password']);
    
        // Check Data already present or not 
        $duplicate = mysqli_query($conn, "SELECT * FROM admin WHERE User_Name = '$uname' OR Mobile_Number = '$mnumber' OR Gmail_Id = '$gmail'");
    
        if(mysqli_num_rows($duplicate) > 0){

            ?>
            <script> 
                alert('User Name or Mobile Number or Gmail Id are allready registered!');
                // swal("Oops!", "User Name or Mobile Number or Gmail Id are allready registered!", "error")
                location.replace("add-new-admin.php")
            </script>
            <?php

            die();
    
        }
        else{

            // Upload Image

            if(isset($_FILES['uploadimage'])){

                $errors = array();
        
                $file_name = $_FILES['uploadimage']['name'];
                $file_size = $_FILES['uploadimage']['size'];
                $file_tmp = $_FILES['uploadimage']['tmp_name'];
                $file_type = $_FILES['uploadimage']['type'];
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
                    move_uploaded_file($file_tmp,"admin-img/".$uniquename);
                }
                else{
                    print_r($errors);
                    die();
                }
            }
          
            // Data Insert
            $query = "INSERT INTO admin (`User_Name`,`Name`,`Mobile_Number`,`Gmail_Id`,`Password`,`Image_Name`)
            VALUES ('$uname','$name','$mnumber','$gmail','$password','$uniquename')";
          
            // Query Execute 
            $result = mysqli_query($conn, $query);

            if($result){

                ?>
                <script> 
                    alert('Successfull.')
                    // swal("Good job.", "Successfull.", "success")
                    location.replace("dashbord.php")
                </script>
                <?php
            }
            else{

                ?>
                <script> 
                    alert('Failed!')
                    // swal("Oops!", "Failed!", "error")
                    location.replace("dashbord.php")
                </script>
                <?php
            }
        }
    }
?>

        
        <!-- ======= Profile ======= -->

        <div class="profile-box">
            <div class="profile">
            <a href="dashbord.php"><i class="fa-solid fa-delete-left"></i></a>
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="img-box">
                        <img id="imgId">
                        <i class="fa-solid fa-upload"></i>
                        <input type="file" id="typeId" name="uploadimage" onchange="showImage(this, 'imgId')" required="required">
                    </div>
                    <div class="input-box">
                        <label>User Name</label>
                        <input type="text" name="uname" placeholder="Enter User Name" required="required">
                    </div>
                    <div class="input-box">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Enter Name" required="required">
                    </div>
                    <div class="input-box">
                        <label>Mobile Number</label>
                        <input type="number" name="mnumber" placeholder="Enter Mobile Number" required="required">
                    </div>
                    <div class="input-box">
                        <label>Gmail Id</label>
                        <input type="email" name="gmail" placeholder="Enter Gmail Id" required="required">
                    </div>
                    <div class="input-box">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required="required">
                    </div>
                    <div class="submit-box">
                        <input type="submit" name="submit">
                    </div>
                </form>
            </div>
        </div>

        <!-- ======= End Profile ======= -->
    </div>
    
<?php
    include 'footer.php';
?>