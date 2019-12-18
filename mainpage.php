<?php

require_once("header.php");
?>

<style>

.topnav {
  overflow: hidden;
  background-color: #49668a;;
}

.topnav a {
  float: left;
  display: block;
  color:  black;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #49668a;
  color: white;
}

.topnav a.active {
  background-color: #49668a;
  color: white;
}

.topnav .search-container {
  float: left;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #49668a;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ffffff;
}

@media screen and (max-width: 900px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 10x;
  }
  .topnav input[type=text] {
  }
}


.ourstamps{
    text-align: center;
}

.photoofstamps{
    border: 5px solid black;
}

</style>





<!-- Menu Container -->

<div class="mycontainer w3-padding-75 w3-xlarge" id="list">
    <div class="w3-content">
    <div class="photoofstamps">
    <img src="/images/photoofstamps.jpg" alt="mixedstamps">
    </div>
        <h3 class="ourstamps">
        <p>Browse our Postage Stamp Collection</p>
        </h3>
    </div>

    <div class="w3-row w3-border w3-border-dark-grey">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-grey">
            <p id="searchcountry">Browse by Country</p>
        <div class="topnav">
        <a class="active" href="#home"></a>
        <div class="search-container">
        <form action="/action_page.php">
        <input type="text" placeholder="Country Name here" name="search">
        <button type="submit"><i class="fa fa-search"></i>Click</button>
        </form>
        </div>
    </div>

    <div>
      </a>
      <a href="javascript:void(0)" onclick="openList(event, 'description');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-grey">Browse by Description</div>
      </a>
      <a href="javascript:void(0)" onclick="openList(event, 'description');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-grey">Browse All</div>
      </a>
    </div>

    <div style="padding-left:16px">
        <h2>Search Results</h2>
        <p>Search Results here</p>
    </div>

</div>
</div>





















<!-- Contact Us -->

<br>
<br>

<div class="mycontainer w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Contact</h1>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required name="People"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2017-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-block" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
</div>



<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace("", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += "w3-#273444";
}
document.getElementById("myLink").click();


</script>



<?php
require_once("footer.php");


?>