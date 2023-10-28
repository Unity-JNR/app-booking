<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Booking App</title>
</head>
<body>

<div>
   <?php
   $target_dir = "images/hotel.jpg";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
   $day = strtotime($_POST['checkout'])- strtotime($_POST['checkin']);
$pay = abs(round($day / 86400));
   ?>

   <img src="<?echo $target_file;?>" alt="" class="img"><label>The Commodore Hotel</label>
  <form action="success.php" method="post">
  <label for="price">Daily rate : R350</label>
   <label for="total" name="total">total price :<?echo $pay * 350 ?></label>
   <input type="submit" name="pay" value="pay">
  </form>
   
</div>

<div>
   <?php
   $target_dir = "images/hotel2.jpeg";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
   ?>

   <img src="<?echo $target_file;?>" alt="" class="img"><label>Hotel transylvania </label>
  <form action="success.php" method="post">
  <label for="price">Daily rate : R550</label>
   <label for="total" name="total">total price :<?echo $pay * 550 ?></label>
   <input type="submit" name="pay" value="pay">
  </form>

   
</div>



<div>
   <?php
   $target_dir = "images/hotel3.jpeg";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
   ?>

   <img src="<?echo $target_file;?>" alt="" class="img"> <label>Hotel CPT</label>
  <form action="success.php" method="post">
  <label for="price">Daily rate : R750</label>
   <label for="total" name="total">total price :<?echo $pay * 750 ?></label>
   <input type="submit" name="pay" value="pay">
  </form>
   
</div>


</body>
</html>



<?php



class user {

    public $name;
    public $surname;
    public $email;
    public $checkin;
    public $checkout;
    public $hotel;
    public $days;

    function set_name($name) {
        $this-> name=$name;
    }

    function set_surname($surname) {
      $this-> surname=$surname;
  }

  function set_email($mail) {
    $this-> mail=$mail;
}

function set_checkin($checkin) {
  $this-> checkin=$checkin;
}

function set_checkout($checkout) {
  $this-> checkout=$checkout;
}
function set_hotel($hotel) {
  $this-> hotel=$hotel;
}


}

$_SESSION['name'] = $_POST['name'];
$_SESSION['surname'] = $_POST['surname'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['checkin'] = $_POST['checkin'];
$_SESSION['checkout'] = $_POST['checkout'];
$_SESSION['hotel'] = $_POST['hotel'];

$user = new user();
$user->set_name($_SESSION['name']);
$user->set_surname($_SESSION['surname']);
$user->set_email($_SESSION['email']);
$user->set_checkin($_SESSION['checkin']);
$user->set_checkout($_SESSION['checkout']);
$user->set_hotel($_SESSION['hotel']);


if(isset($_POST['save'])){
  $data = file_get_contents("user.json");
  $data = json_decode($data);

  $diff = strtotime($_SESSION['checkout'])- strtotime($_SESSION['checkin']);
  $days =  abs(round($diff / 86400));

  $_SESSION['days'] = $days;
  $input = array(
      'name'=> $user->name,
      'surname'=>$user->surname,
      'email'=> $user->mail,
      'checkin'=>$user->checkin,
      'checkout'=>$user->checkout,
      'hotel' =>$user->hotel,
      'total days'=> $days
       
  );

  $data[] = $input;

  $data = json_encode($data, JSON_PRETTY_PRINT);
  file_put_contents('user.json', $data);
}
?>



<?php

class booking extends user {
public $price;

function set_price($amount){
  $this-> price=$amount;
}

function get_price(){
  return $this;
}

    public function calculateprice($days){
    

      $this->price = $days * 350;
      return $this->price;
    }


   

}
$bookings = new booking();

// $price = booking::calculateprice($_SESSION['days']);





    
 


     class hotels extends user {
      public $hotel;

      function set_hotel($hotel) {
        $this-> hotel =$hotel;
     }
    }

    $hotels = new hotels();
    $hotels->set_hotel($_POST['hotel']);
     
       
   
      ?>






