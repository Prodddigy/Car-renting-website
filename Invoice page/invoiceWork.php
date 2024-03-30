<!--
13/06/2021
Damian Czarnacki 20004926
version 2.0
    /-->
<html>
<head>
<title>Invoice print</title>
</head>
<body bgcolor="azure">
<H1>Invoice</H1>





<?php	
    include("DataBase.php");  

    $Email	 = $_POST['E_mail_address'];
    //here some variables for calculations
    $VAT = 0;

    $sum = 0;
    
    $sumVAT = 0;
  

    $Query = "SELECT Driver_no FROM Driver
    WHERE  E_mail_address = '$Email'";
  
    $Result = mysqli_query($DB,$Query);
				 	 							   
    $row = mysqli_num_rows($Result);	
  	
    //echo $row;

    if ($row==1) //checking if driver exisst in the DB
    { 
      $fetch = mysqli_fetch_array($Result);

      $Driver_no = $fetch['Driver_no'];

      echo '<h2>'.'Driver number: '.$Driver_no.' '.'</h2>';
//
    $Query3 = "SELECT Vehicle.Vehicle_no AS 'Vehicle no',COUNT(Booking_day) AS 'No of Hires',
    Make_model AS 'Vehicle Type', Cost_of_hire_per_day AS 'Cost per day', 
    COUNT(Booking_day) AS 'No of hire days',
    COUNT(Booking_day) * Cost_of_hire_per_day AS 'Total hire cost'
     
    
    FROM Vehicle,Booking
    WHERE Driver_no = '$Driver_no' AND Booking.Vehicle_no = Vehicle.Vehicle_no
    GROUP BY Booking.Vehicle_no";
    //this query prepares and fills up data from the DB to show in INvoice
//   
      
	$Result3 = mysqli_query($DB,$Query3); 


                  echo '﻿<table border="1">';

                  echo '<tr>';
                  echo'<th>Vehicle no</th>';
                  echo'<th>No of Hires</th>';
                  echo'<th>Vehicle Type</th>';
                  echo'<th>Cost per day</th>';
                  echo'<th>No of hire days</th>';
                  echo'<th>Total hire cost</th>';
                  
  //here some variables for calculations                
  $VAT = 0;

  $sum = 0;
  
  $sumVAT = 0;


//
//preparing and inserting data from DB to the 2nd table
  $Query4 = "SELECT Vehicle.Vehicle_no AS 'Vehicle no',COUNT(Booking_day) AS 'No of Days'
     
    
    FROM Vehicle, Booking
    WHERE Driver_no = '$Driver_no' AND Booking.Vehicle_no = Vehicle.Vehicle_no
    GROUP BY Booking.Vehicle_no";

    $Result4 = mysqli_query($DB,$Query4);
//


  while ($row3 = mysqli_fetch_assoc($Result3)) 
  {
      if ($row3['No of Hires'] > 1) //this comes into play when User has booked same car multiple times
                                    //which results in a discount  
      {
        $totalDisc = $row3['Total hire cost'] * 0.9;

          echo '</tr>';
          echo '<tr>';
          echo '<td>'.$row3['Vehicle no'].'</td>';
          echo '<td>'.$row3['No of Hires'].'</td>';
          echo '<td>'.$row3['Vehicle Type'].'</td>';
          echo '<td>'.$row3['Cost per day'].'</td>';
          echo '<td>'.$row3['No of hire days'].'</td>';

          echo '<td>'.$totalDisc.'</td>';  //
          echo '</tr>';
          
          $sum += $totalDisc;

          
        
    }
      else//if there is no multiple cars with the same name booked which means no discount
      {
              echo '</tr>';
          echo '<tr>';
          echo '<td>'.$row3['Vehicle no'].'</td>';
          echo '<td>'.$row3['No of Hires'].'</td>';
          echo '<td>'.$row3['Vehicle Type'].'</td>';
          echo '<td>'.$row3['Cost per day'].'</td>';
          echo '<td>'.$row3['No of hire days'].'</td>';
          echo '<td>'.$row3['Total hire cost'].'</td>';
          echo '</tr>';

          
          
      $sum += $row3['Total hire cost']; //
          
          
      }

      $VAT = $sum * 0.2;//this calculates the VAT based on a sumed up price for all the bookings

            $sumVAT = $sum + $VAT;//this calculates amount of money + VAT previously calculated^

  }
  //this is the sum up of all the VAT and amount of money that user needs to pay for bookings
  echo 'Totals :';
                  echo '<br>';    
                    
                  echo 'Total hire cost less VAT:£'.$sum.' ';

                  echo '<br>';
                  
                  echo 'VAT:£'.$VAT.' ';
                  
                  echo 'Total VATted hire cost £'.$sumVAT.' ';


  echo '﻿<table border="1">';

  echo '<tr>';
  echo'<th>Vehicle no</th>';
  echo'<th>No of Days</th>';
  
 while ($row4 = mysqli_fetch_assoc($Result4)) //Table number 2 which will be filled with the data from DB
  {
  
   echo '</tr>';
   echo '<tr>';
   echo '<td>'.$row4['Vehicle no'].'</td>';
   echo '<td>'.$row4['No of Days'].'</td>';
   echo '</tr>';
  }

}
  else
    echo '<h2>'.'User not found '.'</h2'; //if  user was not fount witha select query
      
    

  

?>
 








</form>

</table>
<tr>
<FORM > 
<button onclick="printFunction()">Print</button>
​
<script> //this script enables user to priint out an invoice
function printFunction() {
window.print();
}
</script> </FORM>  



<FORM METHOD="LINK" ACTION="bookingLook.php"> 
<INPUT TYPE="submit" VALUE="Make a new booking"> </FORM>    
<FORM METHOD="LINK" ACTION="rateService.php">
<INPUT TYPE="submit" VALUE="Main Menu">
</tr>
</body>
</html>