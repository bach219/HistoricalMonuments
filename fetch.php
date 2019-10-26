<?php require_once("includes/connection.php"); ?>
<?php

//fetch.php
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM advertisement 
  WHERE vehicle_name LIKE '%".$search."%'
  OR vehicle_number	 LIKE '%".$search."%' 
  OR vehicle_price LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM advertisement ORDER BY id_ad
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Customer Name</th>
     <th>Address</th>
     <th>City</th>

    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["vehicle_name"].'</td>
    <td>'.$row["vehicle_number"].'</td>
    <td>'.$row["vehicle_price"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>