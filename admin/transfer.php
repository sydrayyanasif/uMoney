<?php
    include 'header.php';

    if(isset($_POST['submit'])){
        
        $account = $_POST['account'];
        $amount = $_POST['amount'];
        $taccount = $_POST['taccount'];
        $tamount = $_POST['tamount'];
        $transaction = "Transfer to ".$taccount;
        $transaction1 = "Deposit from ".$account;

        $result1 = mysqli_query($conn, "SELECT * FROM customer WHERE Account_Number = '$account'");

        $row1 = mysqli_fetch_assoc($result1);
        $cid = $row1['Customer_Id'];
        

        $result2 = mysqli_query($conn, "SELECT * FROM customer WHERE Account_Number = '$taccount'");

        $row2 = mysqli_fetch_assoc($result2);
        $tcid = $row2['Customer_Id'];
        $amount1 = $row2['Opening_Amount'];

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
                VALUES ('$cid','$amount','$tamount','$transaction','$datetime')";
    
                $query2 = "INSERT INTO transaction (`Customer_Id`,`Amount`,`Transaction_Amount`,`Transaction`,`Transaction_Date_Time`)
                VALUES ('$tcid','$amount1','$tamount','$transaction1','$datetime')";
    
                $query3 = "UPDATE customer SET Opening_Amount = '$amount' WHERE Customer_Id = '$cid'";
    
                $query4 = "UPDATE customer SET Opening_Amount = '$amount1' WHERE Customer_Id = '$tcid'";
        
                // Query Execute 
                $result3 = mysqli_query($conn, $query1);
                $result4 = mysqli_query($conn, $query2);
    
                $result5 = mysqli_query($conn, $query3);
                $result6 = mysqli_query($conn, $query4);
    
                if($result3 && $result4 && $result5 && $result6){
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
                <form action="" method="post" autocomplete="off">
                    <div class="input-box">
                        <label>Account Number</label>
                        <input type="number" name="account" placeholder="Enter Account Number" required="required" id="search_account">
                    </div>
                    <div class="input-box">
                        <label>Name</label>
                        <input type="text" name="name" disabled required="required" id="searchresult">
                    </div>
                    <div class="input-box">
                        <label>Current Amount</label>
                        <input type="number" disabled required="required" class="searchresult2">
                        <input type="hidden" name="amount" class="searchresult2">
                    </div>
                    <div class="input-box">
                        <label>Transfer To</label>
                        <input type="number" name="taccount" placeholder="Enter Account Number" required="required" id="search_account2">
                    </div>
                    <div class="input-box">
                        <label>Name</label>
                        <input type="text" name="tname" disabled required="required" id="searchresult3">
                    </div>
                    <div class="input-box">
                        <label>Transfer Amount</label>
                        <input type="number" name="tamount" placeholder="Enter Transfer Amount" required="required" id="validate">
                    </div>
                    <div class="submit-box">
                        <input type="submit" name="submit">
                    </div>
                </form>
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
                    if(data){

                        const res= JSON.parse(data);
                        $("#searchresult").val(res[0]);
                        $(".searchresult2").val(res[1]);
                    }
                    else{
                        $("#searchresult").val(null);
                        $(".searchresult2").val(null);
                    }
                }
            });                
        });

        $("#search_account2").keyup(function(){
            var input1 = $(this).val();
            $.ajax({
                url:"live-search.php",
                method:"POST",
                data:{input1:input1},
                success:function(data){
                    if(data){
                        $("#searchresult3").val(data);
                    }
                    else{
                        $("#searchresult3").val(null);
                    }
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