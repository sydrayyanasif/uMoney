<?php
    include 'header.php';

?>


        <!-- ======= Transactions ======= -->

        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>Transactions</h2>
                    <div class="search">
                        <input type="search" placeholder="Search" id="live_search" autocomplete="off">
                    </div>
                    <i class="fa-solid fa-print" id="print-img" onclick="printFun('print')"></i>
                </div>
                <div id="print">

                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM `customer` a, `transaction` b WHERE a.Customer_Id = b.Customer_Id");
                        if(mysqli_num_rows($result) > 0){
                            $i=1;
                    ?>

                    <table id="searchresult">
                        
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Account Number</th>
                                <th>Name</th>
                                <th>Current Amount</th>
                                <th>Transaction Amount</th>
                                <th>Transaction</th>
                                <th>Date & Time</th>
                            </tr>
                        </thead>

                        <?php
                            while($row = mysqli_fetch_assoc($result)){
                        ?>

                        <tbody>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $row['Account_Number']; ?> </td>
                                <td> <?php echo $row['Name']; ?> </td>
                                <td> <?php echo $row['Amount']; ?> </td>
                                <td> <?php echo $row['Transaction_Amount']; ?> </td>
                                <td> <?php echo $row['Transaction']; ?> </td>
                                <td> <?php echo $row['Transaction_Date_Time']; ?> </td>
                            </tr>
                        </tbody>

                        <?php
                           $i++; }
                        ?>
                    </table>
                    <?php
                        }
                        else
                            echo "<h2> Record Not Found ! </h2>";
                    ?>
                </div>
            </div>
        </div>

        <!-- ======= End Transactions ======= -->

    </div>

    <script type="text/javascript">

        $(document).ready(function(){
            $("#live_search").keyup(function(){
                search_table($(this).val());    
            });

            function search_table(value){
                $('#searchresult tbody tr').each(function(){
                    var found = 'false';
                    $(this).each(function(){
                        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
                            found = 'true';
                        }
                    });
                    if(found == 'true'){
                        $(this).show();
                    }
                    else{
                        $(this).hide();
                    }
                });
            }
        });

    </script>

<?php
    include 'footer.php';
?>