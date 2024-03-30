<html>
<head>
  <h1>ICarz</h1>
</head>

</form>
<body>
<?php
  include("DataBase.php");              // Add in the database connection details

  $Email	 = $_POST['E_mail_address'];
  $Make_Model = $_POST['Make_Model'];
  $Booking_day = $_POST['Booking_day'];
 

//echo $Make_Model;
//echo $Booking_day;

//echo $Email;


$Query = "SELECT Vehicle_no, Driver_no  
FROM Vehicle, Driver
WHERE  E_mail_address = '$Email' AND Make_Model = '$Make_Model'";

$Result = mysqli_query($DB,$Query);

$row = mysqli_num_rows($Result);

//echo $row;


if($row == 1) {

  $fetch = mysqli_fetch_array($Result);

          $Vehicle_no = $fetch['Vehicle_no']; 
          $Driver_no = $fetch['Driver_no'];
    
  $Query2 = "SELECT Driver_no  
  FROM Booking
  WHERE  Vehicle_no = '$Vehicle_no' AND Booking_day = '$Booking_day'";
  $Result2 = mysqli_query($DB,$Query2);

  $row2 = mysqli_num_rows($Result2);

  
  if($row2 == 1)//if the query outputs a row -> means that the date with the car is already booked and unavailabe
  {
    echo "Date is already booked with this car.";
    echo " Please choose a different date or/and different car";
    echo '<FORM METHOD="LINK" ACTION="bookingLook.php"> <INPUT TYPE="submit" VALUE="Make a new booking"> </FORM>';
  }
  else//if row is not outputted insert the booking 
  {        
    $Query3 = "INSERT INTO Booking
      (Vehicle_no, Booking_day, Driver_no, Account_Status)
      VALUES ('$Vehicle_no','$Booking_day','$Driver_no','Unpaid')";

      $Result3 = mysqli_query($DB,$Query3);

     echo "Successful booking ! :)";
     
  }

}
else {//in case the email is also wrong and non existened in DB
echo "Unavailable date or/and car";
echo " or wrong email";
echo '<FORM METHOD="LINK" ACTION="bookingLook.php"> <INPUT TYPE="submit" VALUE="Make a new booking"> </FORM>';
//echo $Vehicle_no;
//echo $Driver_no;
} 
?>



<FORM METHOD="LINK" ACTION="MainMenu.php">


<INPUT TYPE="submit" VALUE="Back Main Menu">
</FORM>

</body>
</html>
