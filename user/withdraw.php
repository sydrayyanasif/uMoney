<?php
    include 'header.php';

    $user = $_SESSION["user"];

    $result = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_Id = '{$user['userId']}'");

    if(isset($_POST['submit'])){
        
        $amount = $_POST['amount'];
        $wamount = $_POST['wamount'];
        $transaction = "Withdraw";

        date_default_timezone_set("Asia/Kolkata");
        $datetime = date("Y-m-d h:i:s A");

        if($wamount > $amount){
            ?>
            <script> 
                alert('You have no sufficient balance!')
                // swal("Oops!", "You have no sufficient balance!", "error")
                location.replace("withdraw.php")
            </script>
            <?php
        }
        else{

            $amount = $amount - $wamount;

            if($amount < 1000){
                ?>
                <script> 
                    alert('You have no sufficient balance!')
                    // swal("Oops!", "You have no sufficient balance!", "error")
                    location.replace("withdraw.php")
                </script>
                <?php
            }
            else{
                // Data Insert
                $query = "INSERT INTO transaction (`Customer_Id`,`Amount`,`Transaction_Amount`,`Transaction`,`Transaction_Date_Time`)
                VALUES ('{$user['userId']}','$amount','$wamount','$transaction','$datetime')";

                $query1 = "UPDATE customer SET Opening_Amount = '$amount' WHERE Customer_Id = '{$user['userId']}'";
        
                // Query Execute 
                $result1 = mysqli_query($conn, $query);
                $result2 = mysqli_query($conn, $query1);

                if($result1 && $result2){
                    ?>
                    <script> 
                        alert('Transaction Successfull.')
                        // swal("Good job.", "Transaction Successfull.", "success")
                        location.replace("transaction.php")
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script> 
                        alert('Transaction Failed!')
                        // swal("Oops!", "Transaction Failed", "error")
                        location.replace("withdraw.php")
                    </script>
                    <?php
                }
            }
        }
    }
?>


        <!-- ======= Withdraw ======= -->

        <div class="container">
            <div class="dep-with-tr">
                <div class="title">
                    <h2>Withdraw</h2>
                </div>

                <?php

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){

                ?>

                <form action="" method="post" autocomplete="off">
                    <div class="input-box">
                        <label>Account Number</label>
                        <input type="number" value="<?php echo $row['Account_Number']; ?>" disabled required="required">
                    </div>
                    <div class="input-box">
                        <label>Name</label>
                        <input type="text" value="<?php echo $row['Name']; ?>" disabled required="required">
                    </div>
                    <div class="input-box">
                        <label>Current Amount</label>
                        <input type="number" value="<?php echo $row['Opening_Amount']; ?>" disabled required="required">
                        <input type="hidden" name="amount" value="<?php echo $row['Opening_Amount']; ?>">
                    </div>
                    <div class="input-box">
                        <label>Withdraw Amount</label>
                        <input type="number" name="wamount" placeholder="Enter Withdraw Amount" required="required" id="validate">
                    </div>
                    <div class="submit-box">
                        <input type="submit" name="submit">
                    </div>
                </form>

                <?php
                        }
                    }
                ?>

            </div>
        </div>

        <!-- ======= End Withdraw ======= -->

    </div>

    <script type="text/javascript">

        $(document).ready(function(){

            $("#validate").keyup(function(){
                var val = $("#validate").val();
                if(val <= 0){
                    $("#validate").val(null);
                }               
            });

        });

    </script>

<?php
    include 'footer.php';
?>