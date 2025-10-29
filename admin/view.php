<?php
    include 'header.php';
    
?>

        
        <!-- ======= Profile ======= -->

        <div class="container">
            <div class="view">

                <a href="manage-account.php"><i class="fa-solid fa-delete-left"></i></a>

                <!-- ======= Left Side ======= -->

                <?php

                    $cid = $_GET['cid'];

                    $result = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_Id = '$cid'");

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){

                ?>
                <div class="left-side">
                    <div class="img-box">
                        <img src="user-img/<?php echo $row['Image_Name']; ?>" style="width: 150px; height: 150px;">
                    </div>
                    <div class="input-box">
                        <input type="text" value="<?php echo $row['Name']; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <input type="number" value="<?php echo $row['Customer_Id']; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <input type="number" value="<?php echo $row['Account_Number']; ?>" disabled>
                    </div>
                </div>

                <!-- ======= End Left Side ======= -->


                <!-- ======= Right Side ======= -->

                <div class="right-side">
                    <div class="input-box">
                        <label for="fname">Father's Name</label>
                        <input type="text" id="fnmae" value="<?php echo $row['Father_Name']; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <label for="dob">D O B</label>
                        <input type="text" value="<?php echo $row['DOB']; ?>" onfocus="this.type='date'" onblur="this.type='text'" id="dob" disabled>
                    </div>
                    <div class="input-box">
                        <label for="mnumber">Mobile Number</label>
                        <input type="number" id="mnumber" value="<?php echo $row['Mobile_Number']; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <label for="gmail">Gmail Id</label>
                        <input type="email" id="gmail" value="<?php echo $row['Gmail_Id']; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <label for="accountopendate">Account Opening Date</label>
                        <input type="text" id="accountopendate" value="<?php echo $row['Account_Opening_Date']; ?>" onfocus="this.type='date'" onblur="this.type='text'" disabled>
                    </div>
                    <div class="input-box">
                        <label>Current Amount</label>
                        <input type="text" name="currentamount" value="<?php echo $row['Opening_Amount']; ?>"disabled>
                    </div>
                    <div class="input-box">
                        <label for="address">Address</label>
                        <input type="text" id="address" value="<?php echo $row['Address']; ?>" disabled>
                    </div>
                </div>

                <?php
                        }
                    }
                ?>

                <!-- ======= End Right Side ======= -->

            </div>
        </div>

        <!-- ======= End Profile ======= -->
    </div>
    
<?php
    include 'footer.php';
?>