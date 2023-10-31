<?php
session_start();
include("../Connection/Connection.php");
$selQry = "select * from tbl_service_request where user_id=" . $_SESSION['uid'];
$res = $con->query($selQry);
if ($data = $res->fetch_assoc()) {
    $_SESSION['unique_id']=$data['user_id'];
?>
    <table width="361" >

        <tbody>

            <tr>
                <td width="129">Service id</td>
                <td width="216"><?php echo $data['req_id'] ?>

            </tr>

            <tr>
                <td>Request Type</td>
                <td><?php echo $data["req_type"] ?></td>
            </tr>
        </tbody>
    </table>
<?php

} else {
  echo "";
}

?>