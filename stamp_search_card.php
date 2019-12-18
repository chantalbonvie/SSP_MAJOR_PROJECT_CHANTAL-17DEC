<?php
require_once("header.php");

//print_r($_SESSION);

?>

<!-- this is where I am going to put a div to hold a card that will pop up on searchers
giving the individual stamp's details of:  item#, price(or mint), a photo of called stamp, name/info of stamp if available

- make container name it search_card
- give it 4 display rows each with their own class or id
- give it a btn to purchase/add to shopping cart if avaliable or state not available at this time
- give it a btn to save as a wish list item
- give it a btn to go back to main search area search

possible style ideas
- can the color of the card border change automatically to match a color somewhere on the stamp?
- have a hover over on the stamp that brings up some information

-->

<div class="container">
 <div class="search_card">
  <div class="row">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Stamps">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">This is where stamp Country, title will go</h4>
          <h6 class="card-subtitle mb-2 text-muted">Stamo id here</h6>
          <p class="card-text">
            need to link in each stamp's informaitonT
             <div class="options d-flex flex-fill">
             <select class="custom-select mr-1">
                <option selected>Color</option>
                <option value="1">Green</option>
                <option value="2">Blue</option>
                <option value="3">Red</option>
            </select>
            <select class="custom-select ml-1">
                <option selected>Size</option>
                <option value="1">41</option>
                <option value="2">42</option>
                <option value="3">43</option>
            </select>
          </div>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">need to use database to bring in each stamps cost</h5></div>
             <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>




















<?php
require_once("footer.php");
?>