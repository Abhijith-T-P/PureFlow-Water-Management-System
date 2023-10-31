<?php

ob_start();
include('Head.php');

include("../assets/connection/connection.php");
$id = $_SESSION['oid'];

function generateUniqueID($length = 8) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
  
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
    }
  
    return $randomString;
  }
  
  $uniqueID = generateUniqueID();
if (isset($_POST['submit'])) {
    $uid = $_SESSION['unique_id'];
    $reading = $_POST['txt_reading'];
    $meter = $_POST['txt_reading'];

    $sel = "SELECT * FROM `tbl_bill` WHERE user_id=$uid ORDER BY bill_id DESC";
    $res = $con->query($sel);
    if ($data = $res->fetch_assoc()) {
        $pre = $data['bill_reading'];
        $reading -= $pre;
        if ($reading <= 10000) {
            $amount = 200;
        } else if ($reading > 10000 && $reading <= 15000) {
            $reading -= 10000;
            $amount = $reading * .02 + 200;
        } else {
            $reading -= 15000;
            $amount = $reading * .05 + 300;
        }
        $ins = "INSERT INTO tbl_bill(`bill_status`, `user_id`, `bill_reading`,`bill_pre_reading`, `bill_amount`, `operator_id`,`bill_due_date`,`bill_no`) VALUES (1,$uid,$meter,$pre,$amount,$id,DATE_ADD(CURDATE(), INTERVAL 30 DAY),$uniqueID)";
        $con->query($ins);
    } else {
        if ($reading <= 10000) {
            $amount = 200;
        } else if ($reading > 10000 && $reading <= 15000) {
            $reading -= 10000;
            $amount = $reading * .02 + 200;
        } else {
            $reading -= 15000;
            $amount = $reading * .05 + 300;
        }

        $ins = "INSERT INTO tbl_bill(`bill_status`, `user_id`, `bill_reading`, `bill_amount`, `operator_id`,`bill_due_date`) 
                VALUES (1, $uid, $meter, $amount, $id, DATE_ADD(CURDATE(), INTERVAL 30 DAY))";
        $con->query($ins);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator-Bill</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>

<body>

    
    <div class="container">
        <tr>
            <td width="129">Customer id :</td>
            <td width="216">
                <input type="text" name="txt_search" id="txt_search" onkeyup="getCustomer(this.value)" />
        </tr>
    </div>

    <div id="reading">
        <form action="" method="post" enctype="multipart/form-data">
            <div id="mydiv"></div>


            <table width="361" >
                <tbody>
                    <tr>
                        <td>Reading</td>
                        <td>
            

                            <input type="number" name="txt_reading" id="txt_reading" />  
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit"></td>
                    </tr>
                </tbody>
            </table>


        </form>
    </div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>

<script>
    document.getElementById('reading').style.display = "none";

    function getCustomer(did) //did district id
    {
        document.getElementById('reading').style.display = "none";

        if (did.length == 8) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxGetCustomer.php?did=" + did, //LOCATION OF AJAX FILE
                success: function(html) {
                    $("#mydiv").html(html);
                    if (html == "") {
                        document.getElementById('reading').style.display = "none";

                    } else {
                        document.getElementById('reading').style.display = "block";

                    }
                }
            });
        } else {
            document.getElementById('mydiv').innerHTML = "";

        }

    }
</script>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>