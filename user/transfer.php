<?php
    include 'header.php';

    $user = $_SESSION["user"];

    $result = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_Id = '{$user['userId']}'");

    if(isset($_POST['submit'])){
        
        $account = $_POST['account'];
        $amount = $_POST['amount'];
        $taccount = $_POST['taccount'];
        $tamount = $_POST['tamount'];
        $transaction = "Transfer to ".$taccount;
        $transaction1 = "Deposit from ".$account;

        $result3 = mysqli_query($conn, "SELECT * FROM customer WHERE Account_Number = '$taccount'");

        $row3 = mysqli_fetch_assoc($result3);

        $custmrid = $row3['Customer_Id'];
        $amount1 = $row3['Opening_Amount'];

        date_default_timezone_set("Asia/Kolkata");
        $datetime = date("Y-m-d h:i:s A");

        if($tamount > $amount){
            ?>
            <script> 
                alert('You have no sufficient balance!')
                // swal("Oops!", "You have no sufficient balance!", "error")
                location.replace("transfer.php")
            </script>
            <?php
        }
        else{

            $amount = $amount - $tamount;

            if($amount < 1000){
                ?>
                <script> 
                    alert('You have no sufficient balance!')
                    // swal("Oops!", "You have no sufficient balance!", "error")
                    location.replace("transfer.php")
                </script>
                <?php
            }
            else{
                
                $amount1 = $amount1 + $tamount;

                // Data Insert
                $query1 = "INSERT INTO transaction (`Customer_Id`,`Amount`,`Transaction_Amount`,`Transaction`,`Transaction_Date_Time`)
                VALUES ('{$user['userId']}','$amount','$tamount','$transaction','$datetime')";
    
                $query2 = "INSERT INTO transaction (`Customer_Id`,`Amount`,`Transaction_Amount`,`Transaction`,`Transaction_Date_Time`)
                VALUES ('$custmrid','$amount1','$tamount','$transaction1','$datetime')";
    
                $query3 = "UPDATE customer SET Opening_Amount = '$amount' WHERE Customer_Id = '{$user['userId']}'";
    
                $query4 = "UPDATE customer SET Opening_Amount = '$amount1' WHERE Customer_Id = '$custmrid'";
        
                // Query Execute 
                $result1 = mysqli_query($conn, $query1);
                $result2 = mysqli_query($conn, $query2);
    
                $result4 = mysqli_query($conn, $query3);
                $result5 = mysqli_query($conn, $query4);
    
                if($result1 && $result2 && $result4 && $result5){
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
                        location.replace("transfer.php")
                    </script>
                    <?php
                }
            }
        }
    }
?>


        <!-- ======= Transfer ======= -->

        <div class="container">
            <div class="dep-with-tr">
                <div class="title">
                    <h2>Transfer</h2>
                </div>

                <?php

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){

                ?>

                <form action="" method="post" autocomplete="off">
                    <div class="input-box">
                        <label>Account Number</label>
                        <input type="number" value="<?php echo $row['Account_Number']; ?>" disabled required="required">
                        <input type="hidden" name="account" value="<?php echo $row['Account_Number']; ?>">
                    </div>
                    <div class="input-box">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $row['Name']; ?>" disabled required="required">
                    </div>
                    <div class="input-box">
                        <label>Current Amount</label>
                        <input type="number" value="<?php echo $row['Opening_Amount']; ?>" disabled required="required">
                        <input type="hidden" name="amount" value="<?php echo $row['Opening_Amount']; ?>">
                    </div>
                    <div class="input-box">
                        <label>Transfer To</label>
                        <input type="number" name="taccount" id="search_account" placeholder="Enter Account Number" required="required">
                    </div>
                    <div class="input-box">
                        <label for="">Name</label>
                        <input type="text" id="searchresult" disabled required="required">
                    </div>
                    <div class="input-box">
                        <label for="">Transfer Amount</label>
                        <input type="number" name="tamount" placeholder="Enter Transfer Amount" required="required" id="validate">
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

        <!-- ======= End Transfer ======= -->

    </div>

    <script type="text/javascript">

        $(document).ready(function(){

            $("#search_account").keyup(function(){
                var input = $(this).val();
                $.ajax({
                    url:"live-search.php",
                    method:"POST",
                    data:{input:input},
                    success:function(data){

                        $("#searchresult").val(data);
                    }
                });                
            });

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