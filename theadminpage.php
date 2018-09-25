<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: "Lato", sans-serif;

}

.sidenav {
    display: none;
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.avatar
{
	width: 200px;
	height: 200px;
	border-radius: 50%;
	position: absolute;
	top:-10px;
	left: calc(50% - 50px)
}
.dropbtn, .dropbtn1, .dropbtn2 {
    background-color: #818181;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus ,.dropbtn1:hover, .dropbtn1:focus ,.dropbtn2:hover, .dropbtn2:focus 

{
    background-color: #2980B9;
}

.dropdown ,.dropdown1, .dropdown2{
    position: relative;
    display: inline-block;
}

.dropdown-content, .dropdown-content1 ,.dropdown-content2 {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a,.dropdown-content1 a, .dropdown-content2 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover,.dropdown1 a:hover, .dropdown2 a:hover {background-color: #ddd;}

.show {display: block;}
</style>
</head>
<body>
<img src="avatar.png" class="avatar">
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

 
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Add Housing Details</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="add_product.php">Add Bookings and Houses</a>
    <a href="#">Delete An Accommodation or House</a>
    <a href="#">Update A Booking and House</a>
  </div>
</div>

<div class="dropdown1">
<button onclick="myFunction1()" class="dropbtn1">Customer Feedback Details</button>
  <div id="myDropdown1" class="dropdown-content1">
    <a href="#">View All Feedback</a>
  </div>
</div>

<div class="dropdown2">
<button onclick="myFunction2()" class="dropbtn2">System users Details</button>
  <div id="myDropdown2" class="dropdown-content2">
    <a href="#">View All Users</a>
    <a href="#">Delete a users</a>
    <a href="#">Update a booking</a>
  </div>
</div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn1')) {

    var dropdowns = document.getElementsByClassName("dropdown-content1");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn2')) {

    var dropdowns = document.getElementsByClassName("dropdown-content2");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</div>

<h2>Admin Panel</h2>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; CLICK TO OPEN</span>

<script>
function openNav() {
    document.getElementById("mySidenav").style.display = "block";
}

function closeNav() {
    document.getElementById("mySidenav").style.display = "none";
}
</script>
    

</body>
</html> 
