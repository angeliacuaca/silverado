
<div class="nav">

 <a class="navBtn" href="index.php">News</a>
   <a class="navBtn"href="index.php?page=schedule">Schedule</a>  
  <a class="navBtn selected" href="index.php?page=movie">Details</a>
  <a class="navBtn" href="index.php?page=contact">Contact</a>
  <div class="logoDiv">
  <img class="logoAbs" src="img/logo.png" alt="logo">
</div>
  <div class="clear-shadow"></div>
 
<div class="content">
<div class="inner"> 

<div class="alert alert-danger" role="alert" id="hsAlert">
  <span class="errorDiv glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  <p id="error" class="errorMessage">Enter a valid email address</p>
</div>


  <div class="customerCon">
<form action="index.php?page=contact" method="post">

 <div class="cusVoucher">
<label for="cVoucher">Voucher:  </label><input type="text" id="cVoucher" oninput="checkVoucher()" name="cVoucher" class="cVoucher" placeholder="Input your voucher" required>
  <p id="msgVoucher" class="validationMsg">Must be an Australian Mobile Number</p>
  </div>

   <div class="cusV">
<button type="submit" id="cVoucher" name="cVoucher" value="Voucher">Apply</button>
  </div>
</form>

  <form action="" method="post">

  <div class="cusName">
<label for="cName">Name:  </label><input type="text" oninput="checkStr()" id="cName" name="cName" class="cName" placeholder="Input your name">
  <p id="msgName" class="validationMsg">Not a Valid Name</p>
  </div>

 <div class="cusMobile">
<label for="cMobile">Mobile:</label><input type="text" oninput="checkMob()" id="cMobile" name="cMobile" class="cMobile" pattern="^(04|\+614|\(04\))[0-9 \-]{8,}$" title="Must be Australian Mobile Number" placeholder="Input mobile number" required>
  <p id="msgMobile" class="validationMsg">Must be an Australian Mobile Number</p>
  </div>

 <div class="cusEmail">
<label for="cEmail">Email:  </label><input type="email" id="cEmail" name="cEmail" class="cEmail" placeholder="Input your email">
  <p id="msgEmail" class="validationMsg">Not a Valid Email Address</p>
  </div>

 <div class="cusSubmit">
<button type="submit" id="cSubmit" name="cSubmit" value="Checkout">Checkout</button>
  <a class="cSubmit" id="clickThis" onclick="Mob()">click this</a>
  </div>
</form>
</div> <!-- END customerCon-->



 </div>
   <div class="clearDiv"> </div>
</div>
</div>