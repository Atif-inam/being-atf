<?php
 
 include('connect.php');
 $sql = "select*from users";
 $result =mysqli_query($con,$sql);
 $count=mysqli_num_rows($result);
 if($count>0){
        while($row=mysqli_fetch_assoc($result)){
               $arr[]=$row;
        }
        echo json_encode($arr);
 }
 else{
        echo "data not found";
 }


?>
