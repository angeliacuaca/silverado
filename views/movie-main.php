
<div class="nav">

   <a class="navBtn" href="index.php">Schedule</a>  
  <a class="navBtn selected" href="index.php?page=movie">Movies</a>
  <a class="navBtn" href="index.php?page=ticket">Ticket</a>
  <a class="navBtn" href="index.php?page=contact">Contact</a>
  <div class="logoDiv">
  <img class="logoAbs" src="img/logo.png" alt="logo">
</div>
  <div class="clear-shadow"></div>
 
<div class="content">

  <div class="movInner">
    <div class="moviesContainer">

<?php
$jsonString ='{"AF":{"title":"Mardaani","summary":"Every War is Personal","poster":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/AF.jpg","trailer":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/AF.mp4","rating":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/image4.jpeg","description":["Shivani Shivaji Roy is an astute cop working in a Mumbai Crime Branch unit. Deft at picking up hidden clues and fearless in confronting hardened criminals, Shivani stumbles into the world of debauchery, cruel desires and exploitation and onto a case that will change her life forever.","A teenage girl is kidnapped by the child trafficking mafia and smuggled outside the city. Shivani embarks on an obsessive hunt for the girl and what follows is a cat and mouse game between a fearless cop and a ruthless mafia kingpin.","Starring Rani Mukerji in the lead, playing the role of a cop for the first time, this raw and gritty film will be a distinct departure from Pradeep Sarkar’s style of filmmaking."],"sessions":{"Monday":"6pm","Tuesday":"6pm","Saturday":"3pm","Sunday":"3pm"}},"CH":{"title":"Planes: Fire and Rescue","summary":"Cars with Wings","poster":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/CH.jpg","trailer":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/CH.mp4","rating":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/image1.jpeg","description":["Planes: Fire & Rescue is a new comedy-adventure about second chances, featuring a dynamic crew of elite racing cars equipped with wings and now operating as firefighting aircraft devoted to protecting historic Piston Peak National Park from raging wildfire. When world famous car racer Lightning McQueen, now known as \"Dusty\" (voice of Dane Cook) learns that his engine is damaged and he may never race again, he must shift gears and is launched into the world of aerial firefighting.","Dusty joins forces with veteran fire and rescue helicopter Blade Ranger and his courageous team, including spirited super scooper Dipper (voice of Julie Bowen), heavy-lift helicopter Windlifter, ex-military transport Cabbie and a lively bunch of brave all-terrain vehicles known as The Smokejumpers. Together, the fearless team battles a massive wildfire and Dusty learns what it takes to become a true hero."],"sessions":{"Monday":"1pm","Tuesday":"1pm","Wednesday":"6pm","Thursday":"6pm","Friday":"6pm","Saturday":"12pm","Sunday":"12pm"}},"RC":{"title":"Once a Princess","summary":"Always a Princess","poster":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/RC.jpg","trailer":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/RC.mp4","rating":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/image3.jpeg","description":["A beautiful, rich and princess-like girl \"unexpectedly\" falls for two guys, someone who ticks all the right boxes class-wise and this other guy who seems quite nice, but who is deemed unsuitable by her family. If you’ve seen the Pillow Book or The Great Gatsby, you can guess which one she picks ...","Several years later, the one she thought would be right turns out to be a bad person (nooooo!). Quite by chance she meets the other guy who is now a successful mobile app developer and perhaps now worthy of her parents’ approval. Although it takes her the rest of the movie, the princess dumps the bad one, goes out with the good one and finds true happiness. Until the sequel due out next year (fingers crossed)."],"sessions":{"Monday":"9pm","Tuesday":"9pm","Wednesday":"1pm","Thursday":"1pm","Friday":"1pm","Saturday":"6pm","Sunday":"6pm"}},"AC":{"title":"Guardians of the Galaxy","summary":"Not the Avengers","poster":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/AC.jpg","trailer":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/AC.mp4","rating":"\/\/titan.csit.rmit.edu.au\/~e54061\/wp\/movie-service\/image3.jpeg","description":["From Marvel, the studio that brought you the global blockbuster franchises of Iron Man, Thor, Captain America and The Avengers, comes a new team - the Guardians of the Galaxy that take over when The Avengers go on vacation.","An action-packed, epic space adventure, where brash adventurer Peter Quill finds himself the object of an unrelenting bounty hunt after stealing a mysterious orb coveted by Ronan, a powerful villain with ambitions that threaten the entire universe, taking over from Loki whilst he is off on vacation too.","To evade the ever-persistent Ronan, Quill is forced into an uneasy truce with a quartet of disparate misfits - Rocket, a gun-toting raccoon, Groot, a tree-like humanoid, the deadly and enigmatic Gamora and the revenge-driven Drax the Destroyer. But when Quill discovers the true power of the orb and the menace it poses to the cosmos, he must do his best to rally his ragtag rivals for a last, desperate stand with the galaxy’s fate in the balance whilst waiting for a postcard from his Avenger pals that never comes ..."],"sessions":{"Wednesday":"9pm","Thursday":"9pm","Friday":"9pm","Saturday":"9pm","Sunday":"9pm"}}}';
// $jsonString = file_get_contents('http://titan.csit.rmit.edu.au/~e54061/wp/movie-service.php');

$mov = json_decode($jsonString,true);

$movCon="moviesRight";


foreach ($mov as $genre => $value) {

switch ($genre) {
	case 'AF':
		$movGenre = 'International';
		break;
	case 'CH':
		$movGenre = 'Children';
		break;
	case 'RC':
		$movGenre = 'Romantic Comedy';
		break;
	case 'AC':
		$movGenre = 'Action';
		break;
	
	default:
		$movGenre =$genre;
		break;
}

	
	$movTitle= $value['title'];
	$movPoster= $value['poster'];
	$movTrailer= $value['trailer'];
	$movRating= $value['rating'];


switch ($movRating) {
	case '//titan.csit.rmit.edu.au/~e54061/wp/movie-service/image1.jpeg':
		$movClass="General";
		break;
	case '//titan.csit.rmit.edu.au/~e54061/wp/movie-service/image2.jpeg':
		$movClass="Parental Guidance";
		break;
	case '//titan.csit.rmit.edu.au/~e54061/wp/movie-service/image3.jpeg':
		$movClass="Action";
		break;
	case '//titan.csit.rmit.edu.au/~e54061/wp/movie-service/image4.jpeg':
		$movClass="Mature 15+";
		break;
	
	default:
		$movClass="General";
		break;
}

	$movSum= $value['summary'];
	$movDesc=$value['description'];

			if ($movCon=="moviesRight") {
				$movCon="moviesLeft";
				$movCap="caption";
				$bigTitle="bigTitle";
			}
			else{
				$movCon="moviesRight";
				$movCap="captionR";
				$bigTitle='bigTitleR';
			}
				


?>
<div class="<?php echo $movCon; ?>  borderDot" id="<?php echo $genre; ?>">

      <div class="<?php echo $bigTitle; ?>  borderDot"><?php echo $movTitle; ?> <img src="<?php echo $movRating; ?>" alt="<?php echo $movClass; ?>"> </div>


      <img class="imgs" src="<?php echo $movPoster; ?>" alt="<?php echo $movTitle; ?>" onclick='$("#<?php echo $genre; ?>more").click()'>
   
    <div class="schedule" id="<?php echo $genre; ?>time">

<div class="ticOutter">

      <div class="ticbd ">
          <div class="ticOutter">
   <?php


$unique= array_unique($value['sessions']);
// echo count($unique);

	foreach ($unique as $movDay => $movTime) {
		// echo nl2br("\n".$movDay." ".$movTime."\n"); 
		$movDay=strtoupper($movDay);
		$movTime=strtoupper($movTime);

	
?>
 <div class="schbox">
          <div class="schTime tichd">
                  <div class="ticInner">
                      <h2><?php echo $movTime; ?></h2>
                  </div>
              </div>
              <div class="schdays">
                  <div class="ticInner">
				<?php
				foreach ($value['sessions'] as $newDay => $newTime) {
					if ($movTime==strtoupper($newTime)){
						$newDay=strtoupper($newDay);
						$movID = $genre .substr($newDay, 0, 3). $movTime;
						// echo $movID;
						?>
                      <div class="schDiv1">     
<form action="index.php" method="post">
<input type="hidden" name="movID" value="<?php echo $movID; ?>">
<input type="hidden" name="movTitle" value="<?php echo $movTitle; ?>">
<input type="hidden" name="movGenre" value="<?php echo $movGenre; ?>">
<input type="hidden" name="movPoster" value="<?php echo $movPoster; ?>">
<input type="hidden" name="movRating" value="<?php echo $movRating; ?>">
<input type="hidden" name="movClass" value="<?php echo $movClass ?>">
<input type="hidden" name="movDay" value="<?php echo $newDay; ?>">
<input type="hidden" name="movTime" value="<?php echo $newTime; ?>">
<a type="submit" href="#" onclick="$(this).closest('form').submit()" onmouseover="this.innerHTML = 'BUY'" onmouseout="this.innerHTML = '<?php echo $newDay; ?>'" class="schBtn"  id="<?php echo $movID; ?>" ><?php echo $newDay; ?></a>
                      </form>
                      </div>        
							<?php
						}
					}
					?>
  						</div>
                  </div>
          </div>


<?php


	}

?>
  
      </div>
       </div>
         </div>

        </div> <!-- end Schedule -->
       
      <div class="<?php echo $movCap; ?>">
        
        <p id="<?php echo $genre; ?>short"> <?php echo $movSum; ?> </p>
        <p></p>
        </div>

        <div class="more">
          <a href="#<?php echo $genre; ?>time" id="<?php echo $genre; ?>more">More Info...</a> 
           </div>
      <div class="movDesc" id="<?php echo $genre; ?>desc">
<?php
for($i=0; $i<count($movDesc); $i++){
		echo nl2br($movDesc[$i]."\n");
	}
?>

      </div>
    </div>
    
<?php
}
?>


</div>
</div>
<div class="clearDiv"> </div>
</div><!--content-->


</div> <!--nav-->