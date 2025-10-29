<?php
    include 'header.php';

    $user = $_SESSION["user"];

    $result = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_Id = '{$user['userId']}'");

    $row = mysqli_fetch_assoc($result);

    mysqli_close($conn);
        
?>


        <!-- ======= Dashbord ======= -->

        <div class="container">
            <div class="cards">
                <div class="card">
                    <div class="img-box">
                        <i class="fa-regular fa-address-card"></i>
                    </div>
                    <div class="box">
                        <h2> <?php echo $row['Account_Number']; ?> </h2>
                        <h3>Account Number</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="img-box">
                        <i class="fa-solid fa-money-bill"></i>
                    </div>
                    <div class="box">
                        <h2> &#8377 <?php echo $row['Opening_Amount']; ?></h2>
                        <h3>Total Amount</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= End Dashbord ======= -->

<?php
    include 'footer.php';
?>