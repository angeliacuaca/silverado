<?php
if( isset($_POST['action'])){
// $validActions=['booking','cart','details']; 
// if(in_array($_GET['action'],$validActions) ) {

// }


}


?>

<div class="nav">
   <a class="navBtn" href="index.php">Schedule</a>  
  <a class="selected navBtn" href="index.php?page=movie" onmouseover="this.innerHTML='Movie'" onmouseout="this.innerHTML='Booking'" >Booking</a>
  <a class="navBtn" href="index.php?page=ticket">Ticket</a>
  <a class="navBtn" href="index.php?page=contact">Contact</a>
  <div class="logoDiv">
  <img class="logoAbs" src="img/logo.png" alt="logo">
</div>
  <div class="clear-shadow"></div>
 
<div class="content">
        
  <form action="check/addCart.php" method="post" id="conSub">
<div class="ticket">

<input type="hidden" name="cheap" id="cheap" value="<?php echo $cheap; ?>">
<div class="ticOutter">
  <div class="ticBorder">
                                      <div class="tichd">
                                        <div class="ticOutter">
                                          <h2>Ticket Selection</h2>
                                      </div>
                                    </div>
      <div class="ticbd borderDot">
          <div class="ticInner">
              
<div class="ticbd">
<div class="row ticH1">
                          <div class="col ticType">
                              <div class="ticInner">
                                  Ticket Type
                              </div>
                          </div>
                          <div class="col ticPrice">
                              <div class="ticInner">
                                  Price
                              </div>
                          </div>
                          <div class="col ticQ">
                                  <div class="ticInner">
                                      Quantity
                                  </div>
                          </div>
                          <div class="col ticPrice">
                              <div class="ticInner">
                                  Subtotal
                              </div>
                          </div>
          </div>
            <div class="row">
                          <div class="col ticType">
                              <div class="ticInner">                       
                                  <label for="SA">Adult</label>
                              </div>
                            </div>
                            <div class="col ticPrice">
                                <div class="ticInner">
                                  <p id="priceSA">$12</p></div>
          </div>
              <div class="col ticQ">
                               <div class="ticInner">
                                    <select name="SA" id="quantSA">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    </select>
                                                            </div>
               
              </div>
              <div class="col ticPrice">                        
                  <div class="ticInner">
                    <p id="totalSA">$0.00</p>
                  </div>
              </div>
                                          </div>
                    <div class="row rowBorder">
                  <div class="col ticType">
                      <div class="ticInner">                       
                          <label for="SP">Concession</label>
                      </div>
                    </div>
                  <div class="col ticPrice">
                      <div class="ticInner">
                        <p id="priceSP">$10</p>
                      </div>
                  </div>
                  <div class="col ticQ">
                          <div class="ticInner">
                              <select name="SP" id="quantSP" >
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              </select>
                                                      </div>
                                        </div>
                                              <div class="col ticPrice">                        
                                                  <div class="ticInner">
                                                    <p id="totalSP">$0.00</p></div>
                                              </div>
                                          </div>
                                        <div class="row">
                                            <div class="col ticType">
                                                <div class="ticInner">                       
                                                    <label for="SC">Child</label>
                                                </div>
                                              </div>
                                            <div class="col ticPrice">
                                                <div class="ticInner"><p id="priceSC">$8</p></div>
                                            </div>
                                            <div class="col ticQ">
                                                    <div class="ticInner">
                            <select name="SC" id="quantSC">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            </select>
                                                    </div>
                                             
                                            </div>
                                            <div class="col ticPrice">                        
                                                <div class="ticInner"><p id="totalSC">$0.00</p></div>
                                            </div>
                                        </div>
                                        <div class="row rowBorder">
                                            <div class="col ticType">
                                                <div class="ticInner">                       
                                                    <label for="FA">First Class Adult</label>
                                                </div>
                                              </div>
                                            <div class="col ticPrice">
                                                <div class="ticInner"><p id="priceFA">$25</p></div>
                                            </div>
                                            <div class="col ticQ">
                                                    <div class="ticInner">
                            <select name="FA" id="quantFA">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            </select>
                                                    </div>
                                             
                                            </div>
                                            <div class="col ticPrice">                        
                                                <div class="ticInner"><p id="totalFA">$0.00</p></div>
                                            </div>
                                        </div>

             
                                          <div class="row">
                                                  <div class="col ticType">
                                                      <div class="ticInner">                       
                                                          <label for="FC">First Class Children</label>
                                                      </div>
                                                    </div>
                                                  <div class="col ticPrice">
                                                      <div class="ticInner"><p id="priceFC">$20</p></div>
                                                  </div>
                                                  <div class="col ticQ">
                                                          <div class="ticInner">
                                  <select name="FC" id="quantFC">
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  </select>
                                                          </div>
                                                   
                                                  </div>
                                                  <div class="col ticPrice">                        
                                                      <div class="ticInner"><p id="totalFC">$0.00</p></div>
                                                  </div>
                                              </div>
                                          
                                  <div class="row rowBorder">
                                                  <div class="col ticType">
                                                      <div class="ticInner">                       
                                                          <label for="B1">Beanbag - 1 Person</label>
                                                      </div>
                                                    </div>
                                                  <div class="col ticPrice">
                                                      <div class="ticInner"><p id="priceB1">$20</p></div>
                                                  </div>
                                                  <div class="col ticQ">
                                                          <div class="ticInner">
                                  <select name="B1" id="quantB1" >
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  </select>
                                                          </div>
                                                   
                                                  </div>
                                                  <div class="col ticPrice">                        
                                                      <div class="ticInner"><p id="totalB1">$0.00</p></div>
                                                  </div>
                                              </div>
                                          
                                  <div class="row">
                                                  <div class="col ticType">
                                                      <div class="ticInner">                       
                                                          <label for="B2">Beanbag - 2 People</label>
                                                      </div>
                                                    </div>
                                                  <div class="col ticPrice">
                                                      <div class="ticInner"><p id="priceB2">$20</p></div>
                                                  </div>
                                                  <div class="col ticQ">
                                                          <div class="ticInner">
                                  <select name="B2" id="quantB2" >
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  </select>
                                                          </div>
                                                   
                                                  </div>
                                                  <div class="col ticPrice">                        
                                                      <div class="ticInner"><p id="totalB2">$0.00</p></div>
                                                  </div>
                                              </div>

                                  <div class="row rowBorder">
                                                  <div class="col ticType">
                                                      <div class="ticInner">                       
                                                          <label for="B3">Beanbag - 3 Children</label>
                                                      </div>
                                                    </div>
                                                  <div class="col ticPrice">
                                                      <div class="ticInner"><p id="priceB3">$20</p></div>
                                                  </div>
                                                  <div class="col ticQ">
                                                          <div class="ticInner">
                                  <select name="B3" id="quantB3" >
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  </select>
                                                          </div>
                                                   
                                                  </div>
                                                  <div class="col ticPrice">                        
                                                      <div class="ticInner"><p id="totalB3">$0.00</p></div>
                                                  </div>
                                              </div>
                                      </div>
                                     
                                  
                                   
                    </div> <!--ticInner outside form-->
                </div>
            </div>
        </div>
</div> <!-- ticket-->


<div class="ticSum">
   <div class="ticOutter">
  <div class="ticBorder  borderDot">
      <div class="tichd">
        <div class="ticOutter">
          <h2>Purchase Summary</h2>
      </div>
    </div>
    <div class="ticbd">
      <div class="ticInner">
         <div class="bigSum"> <p id="sumTitle"><?php echo $movTitle; ?></p></div>
        <div class="ticImg borderDot">
<img id="movImg" src="<?php echo $movPoster; ?>" alt="<?php echo $movTitle; ?>">
</div>
  
      <div class="ticDetails">
       
        <div class="sumRate">
<img id="movRating" src="<?php echo $movRating; ?>" alt="<?php echo $movClass; ?>">

<p id="movGenre"><?php echo $movGenre; ?></p>
<p id="movClass"><?php echo $movClass; ?></p>

</div>
<p></p>
 <label id="sumDay">Session Day: <?php echo $movDay; ?></label><p></p>
  <label id="sumTime">Session Time: <?php echo $movTime; ?></label><p></p>
   <label for="movPrice">Price:   </label><label id="sumPrice">$0.00</label><p></p>


      </div>
 </div>
  

    <div class="payment" id="btnPay">
          <!-- <input type="submit" value="Checkout" name="checkout" class="schBtn">      -->
          <input type="submit" value="Add to Cart" name="addCart" class="cSubmit" onclick="alert('Item added to your cart')"> 
      </div>

 <div class="ticInner invisible">
<input type="text" name="movID" id="movID" value="<?php echo $movID; ?>" readonly>
<input type="text" name="movTitle" id="movTitle" value="<?php echo $movTitle; ?>" readonly>
<input type="text" name="movDay" id="movDay" value="<?php echo $movDay; ?>" readonly>
<input type="text" name="movTime" id="movTime" value="<?php echo $movTime; ?>" readonly>
<input type="hidden" name="movPrice" id="movPrice" readonly>
<input type="hidden" name="movPoster" value="<?php echo $movPoster; ?>">
<input type="hidden" name="movGenre" value="<?php echo $movGenre; ?>">  
<input type="text" name="postSA" id="postSA">
<input type="text" name="postSP" id="postSP"> 
<input type="text" name="postSC" id="postSC">
<input type="text" name="postFA" id="postFA">
<input type="text" name="postFC" id="postFC">
<input type="text" name="postB1" id="postB1">
<input type="text" name="postB2" id="postB2">
<input type="text" name="postB3" id="postB3">

  </div>
  
         

      </div>
        </div>
      </div>
    </div> <!--ticSum-->
  <input type="submit" value="Continue" name="btnCon" class="cSubmit" id="btnCon"> 
     <!-- <a class="cSubmit" id="btnCon" href="index.php?page=cart" onclick="$(this).closest('form').submit()">Continue</a> -->
   <a class="cSubmit" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">back</a>

  

 </form>
<div class="clearDiv"> 
</div>
       </div>
     </div>