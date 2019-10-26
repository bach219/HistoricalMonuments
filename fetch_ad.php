<?php require_once("includes/connection.php"); ?>
<?php


$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "
  SELECT * FROM combine_ad_mon
  WHERE name_mon LIKE '%" . $search . "%'
  OR vehicle_name LIKE '%" . $search . "%' 
  OR vehicle_number LIKE '%" . $search . "%' 
  OR vehicle_price LIKE '%" . $search . "%' 
  OR travel_from LIKE '%" . $search . "%'
  OR departure_time LIKE '%" . $search . "%'
  OR arrival_time	 LIKE '%" . $search . "%'
  OR vehicle_status	 LIKE '%" . $search . "%' 
 ";
} else {
    $query = "
    SELECT * FROM combine_ad_mon ORDER BY departure_time desc
 ";
}
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $output .= '
  <div class="table-responsive">
   <table class="table table-striped table-dark table-hover">
    <tr>
     <th>Monument</th>
     <th>Vehicle Name</th>
     <th>Vehicle Number</th>
     <th>Price</th>
     <th>From</th>
     <th>Departure time</th>
     <th>Arrival time</th>
     <th>Status</th>
    </tr>
 ';
    while ($row = mysqli_fetch_array($result)) {
        if($row["is_public"] == 1){
        $output .= '
   <tr>
    <td>' . $row["name_mon"] . '</td>
    <td>' . $row["vehicle_name"] . '</td>
    <td>' . $row["vehicle_number"] . '</td>
    <td>' . $row["vehicle_price"] . '</td>
    <td>' . $row["travel_from"] . '</td>
    <td>' . $row["departure_time"] . '</td>
    <td>' . $row["arrival_time"] . '</td>
    <td>' . $row["vehicle_status"] . '</td>
   </tr>
  ';
    }}
    echo $output;
}else
{
 echo 'Data Not Found';
}

?>
