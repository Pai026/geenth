<?php 
	include("includes/includedFiles.php");
 ?>
 <div class="entityInfo">
 	<div class="centerSection">
 		<div class="profilePic">
 		<img src="<?php
 				echo $userLoggedIn->getProfilePic();

 			?>">	
 		</div>
 		<div class="userInfo">
 			<h1>
 					<?php 
 						echo $userLoggedIn->getFirstAndLastName();
 					 ?>

 			</h1>
 		</div>
 	</div>
 	<div class="buttonItems">
 		<button class="button" onclick="openPage('updateDetails.php')">User Details</button>
 		<button class="button" onclick="logout()">Logout</button>
 	</div>
 	



 </div>