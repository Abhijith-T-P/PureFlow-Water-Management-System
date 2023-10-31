<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
$sel="SELECT * FROM tbl_report ORDER BY report_id DESC";
$data=$con->query($sel);
$row=$data->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Water Quality Report </h5>
<table width="656" border="1">
  <tbody>
    <tr>
      <td width="167" rowspan="2">DATE : <?php   echo$row['report_date'];?></td>
      <td width="92" rowspan="2">Units</td>
      <td colspan="2">EPA LIMITS</td>
      <td colspan="2">Drinking Water</td>
    </tr>
    <tr>
      <td width="71">MCLG</td>
      <td width="60">MCL</td>
      <td width="73">Highest</td>
      <td width="91">Range</td>
    </tr>
    <tr>
      <td colspan="6">Inorganic Materials</td>
    </tr>
    <tr>
      <td>Arsenic</td>
      <td>ppb</td>
      <td>0</td>
      <td>10</td>
  
      <td><?php   echo$row['Arsenic'];?></td>
      <td>ND to 0.5</td>
    </tr>
    <tr>
      <td>Barium</td>
      <td>ppm</td>
      <td>2</td>
      <td>2</td>
      <td><?php   echo$row['Barium'];?></td>
      <td>0.03 to 0.05</td>
  
    </tr>
    <tr>
      <td>Chromium</td>
      <td>ppb</td>
      <td>100</td>
      <td>100</td>
      <td><?php   echo$row['Chromium'];?></td>
      <td>ND to 3</td>
 
    </tr>
    <tr>
      <td>Selenium</td>
      <td>ppb</td>
      <td>50</td>
      <td>50</td>
      <td><?php   echo$row['selenium'];?></td>
  
      <td>ND to 0.8</td>
    </tr>
    
  </tbody>
</table>
            <p></p>
<p class="mb-0"></p>
			  <div class="card">
          <div class="card-body">
			  <div class="card-header">
                      
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"> Abbreviations</h5>
                      <p class="card-text">MCLG - Maximum Contaminant Level Goal: Below this level, a contaminant has no known or expected risk to human health.</p>
                      <p>MCL - Maximum Contaminant Level: The highest amount of a contaminant EPA allows in drinking water.</p>
                      <p>ppb - Part per billion.</p>
                      <p>ppm - Patr per million.</p>
                    </div>
          </div>
        </div>
      </div>
  </div>
      </div>
	
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>
