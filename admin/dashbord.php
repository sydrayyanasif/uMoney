<?php
    include 'header.php';

    $result = mysqli_query($conn, "SELECT * FROM customer");
    $result1 = mysqli_query($conn, "SELECT SUM(Opening_Amount) AS Total FROM customer");

    $row = mysqli_num_rows($result);

    $row1 = mysqli_fetch_assoc($result1);
        
?>


        <!-- ======= Dashbord ======= -->

        <div class="container">
            <div class="cards">
                <div class="card">
                    <div class="img-box">
                        <i class="fa-regular fa-address-card"></i>
                    </div>
                    <div class="box">
                        <h2> <?php echo $row; ?> </h2>
                        <h3>Total Accounts</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="img-box">
                        <i class="fa-solid fa-money-bill"></i>
                    </div>
                    <div class="box">
                        <h2> &#8377 <?php echo $row1['Total']; ?> </h2>
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