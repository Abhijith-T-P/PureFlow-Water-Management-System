<?php
session_start();
$usrid = 0;
include("../Connection/Connection.php");
$selQry = "select * from tbl_user where customer_id=" . $_GET['did'];
$res = $con->query($selQry);
if ($data = $res->fetch_assoc()) {
    $_SESSION['unique_id']=$data['user_id'];

    $usrid=$data["user_id"];
    
?>
    <table width="361" >

        <tbody>

            <tr>
                <td width="129">User</td>
                <td width="216"><?php echo $data['user_name'] ?>

            </tr>

            
            <tr>
                <td>Address</td>
                <td><?php echo $data["user_address"] ?></td>
            </tr>
            
<?php

} else {
  echo "";
}
$_SESSION['pre_reading']=0;

$pre= "select * from tbl_bill where user_id= $usrid ORDER BY bill_id  DESC" ;
    $preres = $con->query($pre);
if ($predata = $preres->fetch_assoc()) {
    $_SESSION['unique_id']=$data['user_id'];
    ?>

<tr>
                <td>Previous Reading</td>
                <td><?php
                    if (isset($predata['bill_reading'])) {
                        echo $predata["bill_reading"];
                     
                    }
                    ?></td>
            </tr>
          
            <tr>
                <td>Last bill on</td>
                <td><?php echo $predata["bill_date"];?></td>
            </tr>
            <tr>
                <td>Bill Status</td>
                <td><?php if ($predata["bill_status"]==1)
                echo"Pending";
                else if($predata["bill_status"]==3)
                echo"Paid";
                ?></td>
            </tr>
        </tbody>
    </table>
    <?php

} else {
  echo "";
}

?>