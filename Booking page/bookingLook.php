<html>
<head>
<title>Booking</title>
</head>
<body bgcolor="DarkCyan">

<h2>Please enter details for booking</h2>

<!-- event handler button  -->
<p>click here to check current date and time</p>
<button id="button">current date</button>
<p id="Check today's date"></p>


<form method="post" action="bookingWork.php">



<table>

 </tr>

 <?php
include("DataBase.php");




//echo $Make_Model;

//this selects all cars from vehicle table
$QUERY = "SELECT Make_Model,Cost_of_hire_per_day
FROM Vehicle ";

$Result = mysqli_query($DB,$QUERY);



echo'<tr>';
echo'<td>Select Vehicle :</td>';
echo'<td>';
echo "<select name='Make_Model'>";

//this part is essentailly how the drop down selection for all the vehicles looks  like
while ($row = mysqli_fetch_array($Result)) {
    echo "<option value='" . $row['Make_Model'] . "'>" . $row['Make_Model'] . "</option>";
}

echo "</select>";
echo'</td>';
echo'</tr>';
?>


<tr>
  <td>Email address :</td>
  <td><input type="text" name="E_mail_address" size="20"/></td>
  
 </tr>

<tr>
<td>Booking day:</td>
<td><input type="date" name="Booking_day" size="20"> </td>
</tr>
</select>

</table>
<input type=submit value=Submit>
</form>



 </table>



 <tr>
<h2>MainMenu</h2>
<FORM METHOD="LINK" ACTION="MainMenu.php">
<INPUT TYPE="submit" VALUE="HomePage">
</tr>



 </form>
 <!-- event handler button date display  -->
<script>
document.getElementById("button").addEventListener("click", displayDate);

function displayDate() {
    document.getElementById("button").innerHTML = Date();
}
</script>


</body>
</html>