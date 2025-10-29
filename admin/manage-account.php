<?php
    include 'header.php';
?>


        <!-- ======= Transactions ======= -->

        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>Account Management</h2>
                    <div class="search">
                        <input type="search" placeholder="Search" id="live_search" autocomplete="off">
                    </div>
                    <i class="fa-solid fa-print" id="print-img" onclick="printFun('print')"></i>
                </div>
                <div id="print">

                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM customer");
                        if(mysqli_num_rows($result) > 0){
                            $i=1;
                    ?>

                    <table id="searchresult">
                        
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Profile</th>
                                <th>Account Number</th>
                                <th>Name</th>
                                <th>Father's Name</th>
                                <th>Current Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <?php
                            while($row = mysqli_fetch_assoc($result)){
                        ?>

                        <tbody>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <img src="user-img/<?php echo $row['Image_Name']; ?>" style="width: 60px; height: 60px;border-radius:50%;"> </td>
                                <td> <?php echo $row['Account_Number']; ?> </td>
                                <td> <?php echo $row['Name']; ?> </td>
                                <td> <?php echo $row['Father_Name']; ?> </td>
                                <td> <?php echo $row['Opening_Amount']; ?> </td>
                                <td>
                                    <a href="view.php?cid=<?php echo $row['Customer_Id']; ?>">
                                        <i class="fa-solid fa-eye" style="color: green;"></i>
                                    </a>
                                    <a href="edit.php?cid=<?php echo $row['Customer_Id']; ?>">
                                        <i class="fa-solid fa-pen-to-square" style="color: blue;"></i>
                                    </a>
                                    <a href="delete.php?cid=<?php echo $row['Customer_Id']; ?>">
                                        <i class="fa-solid fa-trash" style="color: red;"></i>
                                    </a>
                                </td>
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