<?php
session_start()


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking App</title>
</head>
<body>
    <form action="registration.php" method="post" >

        <label for="name">Name</label>
        <input type="text" name="name"  autocomplete="off" required>

        <label for="surname">Surname</label>
        <input type="text" name="surname"  autocomplete="off" required/>

        <label for="email">email</label>
        <input type="email" name="email" required />


        <label for="checkin">check-in</label>
        <input type="date" name="checkin" id="date1" autocomplete="off" required/>

        <label for="checkout" id="date">check-out</label>
        <input type="date" name="checkout" id="date" autocomplete="off" required/>

        <label for="hotel">Hotel</label>
        <select id="hotels" name="hotel">
      <option value=" The Commodore Hotel">The Commodore Hotel</option>
      <option value="Hotel transylvania">Hotel transylvania</option>
      <option value="Hotel CPT">Hotel CPT</option>
    </select>

        <input type="submit" value="save" name="save" id="saves"/>
    </form>

 
    
</body>
</html>





