<?php

    include '../config.php';

    if(isset($_POST['input'])){
        
        $input = $_POST['input'];

        $query = "SELECT * FROM customer WHERE Account_Number = '$input' ";

        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);

            echo $row['Name'];
        
        }
        // else{
        //     echo "Record Not Found!";
        // }
    }    
?>