<?php

    include '../config.php';

    $query = "SELECT * FROM message";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){

        $i=1;

        while($row = mysqli_fetch_assoc($result)){

            ?>
            <tr>
                <td> <?php echo $i; ?> </td>
                <td> <?php echo $row['Name']; ?> </td>
                <td> <?php echo $row['Gmail_Id']; ?> </td>
                <td> <?php echo $row['Subject']; ?> </td>
                <td> <?php echo $row['Message']; ?> </td>
                <td> 
                    <a href="delete-msg.php?mid=<?php echo $row['Id']; ?>">
                    <i class="fa-solid fa-trash" style="color: red;"></i>
                    </a> 
                </td>
                
            </tr>
            <?php
            $i++; 
        }

    }
    
?>