<?php
    include 'header.php';

    if(isset($_POST['submit'])){
        
        $account = $_POST['account'];
        $amount = $_POST['amount'];
        $wamount = $_POST['wamount'];
        $transaction = "Withdraw";

        $result = mysqli_query($conn, "SELECT * FROM customer WHERE Account_Number = '$account'");

        $row = mysqli_fetch_assoc($result);
        $cid = $row['Customer_Id'];


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
                VALUES ('$cid','$amount','$wamount','$transaction','$datetime')";

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
                        <label>Withdraw Amount</label>
                        <input type="number" name="wamount" placeholder="Enter Withdraw Amount" required="required" id="validate">
                    </div>
                    <div class="submit-box">
                        <input type="submit" name="submit">
                    </div>
                </form>
            </div>
        </div>

        <!-- ======= End Withdraw ======= -->

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