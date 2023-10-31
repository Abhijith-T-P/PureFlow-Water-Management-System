<?php

ob_start();
include('Head.php');
include("../assets/connection/connection.php");
if(isset($_POST['submit']))
{
    $Arsenic=$_POST['Arsenic'];
    $Barium=$_POST['Barium'];
    $Chromium=$_POST['Chromium'];
    $selenium=$_POST['selenium'];
     $ins="INSERT INTO tbl_report( Arsenic, Barium, Chromium, selenium) VALUES ($Arsenic,$Barium,$Chromium,$selenium)";
    if ($con->query($ins) === TRUE) {
        echo "<script>alert('Report upladed succesfulley');</script>";

      } else {
          echo "Error: " . $con->error;
      }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Dashboard</title>
   
</head>
<body>
<div class="card">
    <div class="card-body">
    <p> <h3>Upload report readings</h3></p>
        <form method="post">
            
            <div class="mb-3">
                <label for="Arsenic" class="form-label">Arsenic</label>
                <input name="Arsenic" type="number" step="any" class="form-control" name="Arsenic" aria-describedby="Arsenic" required >
                <div id="Arsenic" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="Barium" class="form-label">Barium</label>
                <input name="Barium" type="number" step="any" class="form-control" name="Barium" aria-describedby="Barium" required >
                <div id="Barium" class="form-text"></div>
            </div>
			<div class="mb-3">
                <label for="Chromium" class="form-label">Chromium</label>
                <input name="Chromium" type="number" step="any" class="form-control" name="Chromium" aria-describedby="Chromium" required >
                <div id="Chromium" class="form-text"></div>
            </div><div class="mb-3">
                <label for="selenium" class="form-label">Selenium</label>
                <input name="selenium" type="number" step="any"class="form-control" name="selenium" aria-describedby="selenium" required >
                <div id="selenium" class="form-text"></div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</div>

	
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>
