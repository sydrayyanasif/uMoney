<?php
    include 'header.php';

    if(isset($_POST['submit'])){
        
        $account = $_POST['account'];
        $amount = $_POST['amount'];
        $damount = $_POST['damount'];
        $transaction = "Deposit";

        $result = mysqli_query($conn, "SELECT * FROM customer WHERE Account_Number = '$account'");

        $row = mysqli_fetch_assoc($result);
        $cid = $row['Customer_Id'];

        date_default_timezone_set("Asia/Kolkata");
        $datetime = date("Y-m-d h:i:s A");

        $amount = $amount + $damount;

        // Data Insert
        $query = "INSERT INTO transaction (`Customer_Id`,`Amount`,`Transaction_Amount`,`Transaction`,`Transaction_Date_Time`)
        VALUES ('$cid','$amount','$damount','$transaction','$datetime')";

        $query1 = "UPDATE customer SET Opening_Amount = '$amount' WHERE Customer_Id = '$cid'";
    
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
                location.replace("deposit.php")
            </script>
            <?php
        }
    }
?>


        <!-- ======= Deposit ======= -->

        <div class="container">
            <div class="dep-with-tr">
                <div class="title">
                    <h2>Deposit</h2>
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
                        <label>Deposit Amount</label>
                        <input type="number" name="damount" placeholder="Enter Deposit Amount" required="required" id="validate">
                    </div>
                    <div class="submit-box">
                        <input type="submit" name="submit">
                    </div>
                </form>
            </div>
        </div>

        <!-- ======= End Deposit ======= -->

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