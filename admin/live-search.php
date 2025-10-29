<?php

    include '../config.php';

    if(isset($_POST['input'])){
        
        $data= array();
        $input = $_POST['input'];

        $query = "SELECT * FROM customer WHERE Account_Number = '$input'";

        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);

            array_push($data,$row['Name'] );
            array_push($data,$row['Opening_Amount'] );

            echo json_encode($data);
        }
    }
    
    if(isset($_POST['input1'])){
        
        $input1 = $_POST['input1'];

        $query1 = "SELECT * FROM customer WHERE Account_Number = '$input1' ";

        $result1 = mysqli_query($conn,$query1);

        if(mysqli_num_rows($result1) > 0){

            $row1 = mysqli_fetch_assoc($result1);

            echo $row1['Name'];
        
        }
    }
?>