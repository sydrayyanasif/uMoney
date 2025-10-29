<?php
    include 'header.php';

    $uid = $_GET['ui'];

    if(isset($_POST['update'])){

        $uname = $_POST['uname'];
        $name = $_POST['name'];
        $mnumber = $_POST['mnumber'];
        $gmail = $_POST['gmail'];

        // Check Data already present or not 
        $duplicate = mysqli_query($conn, "SELECT * FROM admin WHERE User_Name = '$uname' OR Mobile_Number = '$mnumber' OR Gmail_Id = '$gmail'");

        if(mysqli_num_rows($duplicate) > 1){

            ?>
            <script> 
                alert('User Name or Mobile Number or Gmail Id are allready registered!');
                // swal("Oops!", "User Name or Mobile Number or Gmail Id are allready registered!", "error")
                location.replace("dashbord.php")
            </script>
            <?php
            die();
    
        }
        else{

            // Data Update
            $query = "UPDATE admin SET User_Name = '$uname', Name = '$name', Mobile_Number = '$mnumber', Gmail_Id = '$gmail' WHERE Id = '$uid'";

            // Query Execute
            $result1 =  mysqli_query($conn, $query);

            if($result1){

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

                <?php

                    $result = mysqli_query($conn, "SELECT * FROM admin WHERE Id = '$uid'");

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){

                ?>

                <form action="" method="post">
                    <div class="img-box">
                        <img id="imgId" src="admin-img/<?php echo $row['Image_Name']; ?>">
                        <!-- <i class="fa-solid fa-upload"></i> -->
                        <!-- <input type="file" id="typeId" onchange="showImage(this, 'imgId')"> -->
                    </div>
                    <div class="input-box">
                        <label>User Name</label>
                        <input type="text" name="uname" required="required" value="<?php echo $row['User_Name']; ?>">
                    </div>
                    <div class="input-box">
                        <label>Name</label>
                        <input type="text" name="name" required="required" value="<?php echo $row['Name']; ?>">
                    </div>
                    <div class="input-box">
                        <label>Mobile Number</label>
                        <input type="number" name="mnumber" required="required" value="<?php echo $row['Mobile_Number']; ?>">
                    </div>
                    <div class="input-box">
                        <label>Gmail Id</label>
                        <input type="email" name="gmail" required="required" value="<?php echo $row['Gmail_Id']; ?>">
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