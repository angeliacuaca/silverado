 
<header>
  <div class="masthead">
<img class="logo" src="img/logo.png" alt="logo">

<div class="sns">
  <div class="sns snsUP">
  <?php 
  if (isset($_SESSION['user'])) {
?>
<a id="snsT" href="index.php?page=ticket&action=view"><img alt="view ticket" src="img/icon/ticket-white.png"></a>
<a id="snsP"href="views/print.php" target="_blank"><img alt="print" src="img/icon/print-white.png"></a>
<a id="snsR"href="index.php?page=ticket&action=receipt"><img alt="view receipt" src="img/icon/receipt-white.png"></a>
<?php
  }
?>
<a href="index.php?page=cart"><img alt="cart" src="img/icon/cart-white.png"><span>(<?php echo $cartCount; ?>)</span></a>
</div>
<div class="snsD">
<span><?php echo $welcome; ?></div>
</div>
</div>

<!--carousel from http://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_carousel2&stacked=h -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
<ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class=""></li>
          <li class="" data-target="#myCarousel" data-slide-to="1"></li>
          <li class="active" data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!--Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item">
            <img data-holder-rendered="true" src="img/header/1.png" alt="First slide [1140x500]">
          <!--   <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div> -->
          </div>

          <div class="item">
            <img data-holder-rendered="true" src="img/header/2.png" alt="Second slide [1140x500]">
          </div>

          <div class="item active">
            <img data-holder-rendered="true" src="img/header/3.png" alt="Third slide [1140x500]">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel"  role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

</header>