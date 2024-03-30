<!--
13/06/2021
Damian Czarnacki 20004926
version 2.0
    /-->
<html>
<head>
<title>iCarZ Rate us</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<header>
    <h1>iCarZ</h1>
</header>
<h2>Welcome User !</h2>

<h2>iCarz Rate us! Menu</h2>



<!--buttons which react with eventlisteners and echo chosen number    /-->
<h2>Could you take a second and rate our services on scale from 1 to 4 ?</h2>
<p> 4 being the best <p>
<button id="button1">1</button> <button id="button2">2</button>
<button id="button3">3</button> <button id="button4">4</button> <p id="show"></p>

<script> 
//this page is mainly for the Small scale apps 
//this part shows event lsiteners which show certain numbers on the screen 
//the numbers represent satisfaction from users
//whenever they choose a button with a number from 1 to 4
//also outputs a message window alert to ask for feedback and shows email adress for correspondence purposes 

document.getElementById("button1").addEventListener("click", () => {
    clickFunction(1); 
});
document.getElementById("button2").addEventListener("click", () => {
    clickFunction(2);
});
document.getElementById("button3").addEventListener("click", () => {
    clickFunction(3);
});
document.getElementById("button4").addEventListener("click", () => {
    clickFunction(4);
});

function clickFunction(feedback) {  //function which enables aboveEvenListeners to show window alert and show number which user has chosen
    var result = feedback;

    if (feedback = 1)
          

  window.alert("If you would like to send us feedback on how to improve our service please email us at icars@feedback.com");
    
  document.getElementById("show").innerHTML = result;
    elseif (feedback = 2)
    document.getElementById("show").innerHTML = result;

    elseif (feedback = 3)
    document.getElementById("show").innerHTML = result;

    elseif (feedback = 4)
    document.getElementById("show").innerHTML = result;
    //after the input, the data ( 1,2,3 or 4) is sent to a data base which stores all rating from all the users
    
}
    </script> 
    <p>Would you kindly give us some love and appreciations? <p>
    <button id="like">Love and appreciation</button>
<script>//here script counts number of times the user has clicked the button
        //serves as a neat way to express how much the user is glad 
        //from making all of the bookings
        // and the data can also be transfered to a DB 


var button = document.getElementById("like"), //variable for enabling like button
  count = 0;
button.onclick = function() { //this function enables user to click a button " "Love and appreciation: " and counts number of *clicks*
  count += 1;
  button.innerHTML = "Love and appreciation: " + count;
};

</script>
<p>Thank you in advance... <p>
<!--menu option with 3 choices Invoice, Homepage, Booking  /--> 
<FORM METHOD="LINK" ACTION="invoiceLook.php">
<INPUT TYPE="submit" VALUE="Invoice">


<FORM METHOD="LINK" ACTION="HomePage.php">
<INPUT TYPE="submit" VALUE="HomePage">


<FORM METHOD="LINK" ACTION="bookingLook.php">
<INPUT TYPE="submit" VALUE="Booking">
</FORM>


</body>
</html>