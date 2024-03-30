<html>
<head>
<title>iCarZ register driver</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<header>
    <h1>iCarZ</h1>
</header>
<h2>Register Driver details</h2>

<form method="POST" action="WriteDriver.php">

<table>
 <tr>
  <td>Email address:</td>
  <td><input type="text" name="E_mail_address" size="30" "> </td>
 </tr>
 <tr>
  <td>Password:</td>
  <td><input type="Password" name="Passwrd" size="10" > </td>
 </tr>
 <tr>
  <td>Surname:</td>
  <td><input type="text" name="Driver_Surname" size="30" "> </td>
 </tr>
 <tr>
  <td>Initials:</td>
  <td><input type="text" name="Driver_Initials" size="30" "> </td>
 </tr>
 <tr>
 <tr>
<td>Date_of_birth:</td>
<td><input type="date" name="Driver_DOB" size="30"> </td>
</tr>
 <tr>
  <td>Mobile_no:</td>
  <td><input type="text" name="Mobile_no" size="30" "> </td>
 </tr>
 <tr>
  <td>GenderButtons:</td>
  <td>

  <form action="index.php" method="post">

  <label> 
  Female
  <input        type="radio" name="Driver_genderMF"
                class="button" value="F" /> 
  </label>
  <label>
  Male
  <input        type="radio" name="Driver_genderMF"
                class="button" value="M" />
  </label>
  
      <br><br>
      </td>
 </tr>
 <tr>
  <td>DVLA:</td>
  <td><input type="text" name="DVLA_no" size="30" "> </td>
 </tr>
 <tr>
  
 <td colspan="2"><input type="submit" value="Add User"/></td>
 </tr>
<tr>
  <td colspan="2"><input type="reset" value="Clear"/></td>
 </tr>
 </form>
</table>

<tr>
<h2>HomePage</h2>
<FORM METHOD="LINK" ACTION="HomePage.php">
<INPUT TYPE="submit" VALUE="HomePage">
</tr>

</form>
</body>
</html>