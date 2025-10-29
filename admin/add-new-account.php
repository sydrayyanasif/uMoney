<?php
    include 'header.php';

    if(isset($_POST['submit'])){

        $custmrid = $_POST['custmrid'];
        $accountnumber = $_POST['account'];
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $dob = $_POST['dob'];
        $mnumber = $_POST['mnumber'];
        $gmail = $_POST['gmail'];
        $address = $_POST['address'];
        $openingamount = $_POST['openingamount'];
        $transaction = "Deposit";

        date_default_timezone_set("Asia/Kolkata");
        $date = date("Y-m-d");

        $datetime = date("Y-m-d h:i:s A");
    
        // Check Data already present or not 
        $duplicate = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_Id = '$custmrid' OR Account_Number = '$accountnumber' OR Mobile_Number = '$mnumber' OR Gmail_Id = '$gmail'");

        if($openingamount < 1000){

            ?>
            <script> 
                alert('Amount must be more than 1000!');
                //swal("Oops!", "Amount must be more than 1000!", "error")
                location.replace("add-new-account.php")
            </script>
            <?php
            die();
        }
    
        if(mysqli_num_rows($duplicate) > 0){

            ?>
            <script> 
                alert('Mobile Number or Gmail Id are allready registered!');
                // swal("Oops!", "Mobile Number or Gmail Id are allready registered!", "error")
                location.replace("add-new-account.php")
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
                    move_uploaded_file($file_tmp,"user-img/".$uniquename);
                }
                else{
                    print_r($errors);
                    die();
                }
            }
          
            // Data Insert
            $query = "INSERT INTO customer 
            VALUES ('$custmrid','$accountnumber','$name','$fname','$dob','$mnumber','$gmail','$date','$address','$openingamount','$uniquename')";

            $query1 = "INSERT INTO transaction (`Customer_Id`,`Amount`,`Transaction_Amount`,`Transaction`,`Transaction_Date_Time`)
            VALUES ('$custmrid','$openingamount','$openingamount','$transaction','$datetime')";
          
            // Query Execute 
            mysqli_query($conn, $query);
            mysqli_query($conn, $query1);

            if($query && $query1){

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
                <a href="dashbord.php"><i class="fa-solid fa-delete-left"></i></a>
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="img-box">
                        <img id="imgId" >
                        <i class="fa-solid fa-upload"></i>
                        <input type="file" id="typeId" name="uploadimage" accept="image/*" onchange="showImage(this, 'imgId')" required="required">
                    </div>
                    <div class="input-box">
                        <label>Customer Id</label>
                        <input type="number" id="customerid" name="custmrid" placeholder="Enter Customer Id" required="required">
                        <button onclick='generateId(event)'>Generate</button>
                    </div>
                    <div class="input-box">
                        <label>Account Number</label>
                        <input type="number" id="accountnumber" name="account" placeholder="Enter Account Number" required="required">
                        <button onclick="generateAccNo(event)" >Generate</button>
                    </div>
                    <div class="input-box">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Enter Name" required="required">
                    </div>
                    <div class="input-box">
                        <label>Father's Name</label>
                        <input type="text" name="fname" placeholder="Enter Father's Name" required="required">
                    </div>
                    <div class="input-box">
                        <label>D O B</label>
                        <input type="text" name="dob" placeholder="Select Date" onfocus="this.type='date'" onblur="this.type='text'" required="required">
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
                        <label>Address</label>
                        <input type="text" name="address" placeholder="Enter Address" required="required">
                    </div>
                    <div class="input-box">
                        <label>Opening Amount</label>
                        <input type="number" name="openingamount" placeholder="Minimum 1000" required="required">
                        <!-- <span id="oamount"></span> -->
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