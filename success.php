<link rel="stylesheet" href="success.css">




<?php


echo "payment complete";



?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking App</title>
</head>
<body>
  <table id="tbstyle">
    <tr>
      <th>User-management</th>
    </tr>
    <tbody>
				<tr>
					<th>Name</th>
					<th>surname</th>
					<th>email</th>
					<th>checkin</th>
					<th>checkout</th>
          <th>hotel</th>
          <th>total-days</th>
				</tr>
    <?php
    $data = file_get_contents("user.json");
    $data = json_decode($data,true);
   foreach($data as $row)
   {
    echo '<tr>
    <td>'.$row['name'].'</td>
    <td>'.$row['surname'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['checkin'].'</td>
    <td>'.$row['checkout'].'</td>
    <td>'.$row['hotel'].'</td>
    <td>'.$row['total days'].'</td>
    
    </tr>';

   }

   ?>
   



  </table>
</body>
</html>




