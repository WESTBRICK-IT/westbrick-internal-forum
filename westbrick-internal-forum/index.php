<!-- //Programmed by Chris Barber June 14 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Westbrick Internal Marketplace</title>
    <link rel="stylesheet" href="css/style.css?v=1.02">
    <link rel="stylesheet" href="css/carousel.css?v=1.02">
    <script src="js/script.js" defer></script>
    <script src="js/carousel.js" defer></script>
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
</head>
<body>
    <img class="main-title" src="img/westbrick-internal-market.svg" alt="Westbrick Internal Market Title">
    <button onclick="window.location.href='./PHP/new-item.html'" class="post-item-button" type="button">Post New Item</button>
    <div class="items">

        <!-- <div class="item">            
            <img class="item-image" src="img/motorcycle-1.jpg" alt="Item Image"></img>
            <div class="top-middle-things">
                <h1 class="item-title">Japanese 80's Motorcycle Really Long Title OVer here</h1>
                <h4 class="item-seller">Chris Barber</h4>
                <h5 class="item-posting-date">May 3rd 2024</h5>                
            </div>              
            <p class="item-body">Sup dudes, I'm selling this motorcycle. It's really cool. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <h1 class="item-price">$5000</h3>            
            <a class="item-garbage-button" href="#"><img class="item-garbage-button" src="img/garbage-can.svg" alt="Garbage Can"></a>
        </div>         -->

        <?php

            

            $allowedIPs = array('206.174.198.58', '206.174.198.59', '50.99.132.206'); // Define the list of allowed IP addresses

            $remoteIP = $_SERVER['REMOTE_ADDR']; // Get the remote IP address of the client

            if (!in_array($remoteIP, $allowedIPs)) {
                // Unauthorized access - display an error message or redirect
                echo "<h1>Access denied. Your IP address is not allowed to view these items.</h1>";
                exit();
            }
            function convertApostrophe($string) { 
				$newString = str_replace("`", "'", $string); 
				return $newString; 
			}
            // Connect to the database
			 $conn = mysqli_connect("localhost", "cbarber", "!!!Dr0w554p!!!", "item_db");
	 
			 // Check connection
			 if (!$conn) {
				 die("Connection failed: " . mysqli_connect_error());
			 }

             $query = "SELECT * FROM `items` ORDER BY `date` DESC, `time` DESC";
             $result = mysqli_query($conn, $query);
             if (mysqli_num_rows($result) > 0) {                                            
                while($row = mysqli_fetch_assoc($result)){
                   //replace grave image with apostrophe
                   $title = $row["title"];
                   $seller = $row["seller"];
                   $date = $row["date"];
                   $time = $row["time"];
                   $price = $row["price"];
                   $body = $row["body"];
                   $image_name = $row["image_name"];
                   $image_name2 = $row["image_name2"];
                   $image_name3 = $row["image_name3"];
                   $image_name4 = $row["image_name4"];
                   $image_name5 = $row["image_name5"];
                   $id = $row["id"];
                   $email = $row["email"];


                   $title = convertApostrophe($title);
                   $seller = convertApostrophe($seller);
                //    $date = convertApostrophe($date);
                   $body = convertApostrophe($body);

                   //if image name is empty or not found then add default image
                   $westbrickSVG = "WESTBRICK-Normal.svg";
                   $allEmpty = false;                   
                    if( $image_name == "" &&
                        $image_name2 == "" &&
                        $image_name3 == "" &&
                        $image_name4 == "" &&
                        $image_name5 == ""){                        
                        $allEmpty = true;
                    }
                    //check if there are at least two images to display next and prev arrows
                    $atLeastTwo = false;
                    $itemCount = 0;
                    if($image_name != "") {
                        $itemCount = $itemCount +1;
                    }
                    if($image_name2 != "") {
                        $itemCount = $itemCount +1;
                    }
                    if($image_name3 != "") {
                        $itemCount = $itemCount +1;
                    }
                    if($image_name4 != "") {
                        $itemCount = $itemCount +1;
                    }
                    if($image_name5 != "") {
                        $itemCount = $itemCount +1;
                    }
                    if($itemCount >= 2) {
                        $atLeastTwo = true;                        
                    }                    

                    //see if e-mail is there
                    if($email == ""){
                        $emailEmpty = true;
                    }
                    
                    
                   echo 	"<div class='item'>";
                   //Item Carousel
                //    echo		    "<img class='item-image' onclick='window.location.href = `img/item-images/" . $image_name . "`;' src='img/item-images/". $image_name ."' alt='Item Image'></img>";
                   echo     "<div class='item$id-images item-images' alt='0'>";
                   if($image_name != "") {
                   echo         "<div class='mySlides fade'>";                   
                   echo             "<img class='item$id-image1 item-image1 item-image' onclick='window.location.href = `img/item-images/" . $image_name . "`;' src='./img/item-images/". $image_name . "' alt='Item Image' style='width:100%'></img>";
                   echo         "</div>";
                   }
                   if($image_name2 != "") {
                   echo         "<div class='mySlides fade' alt='0'>";
                   echo             "<img class='item$id-image2 item-image' onclick='window.location.href = `img/item-images/" . $image_name2 . "`;' src='./img/item-images/". $image_name2 . "' alt='Item Image' style='width:100%'></img>";
                   echo         "</div>";
                   }
                   if($image_name3 != "") {
                   echo         "<div class='mySlides fade' alt='0'>";
                   echo             "<img class='item$id-image3 item-image' onclick='window.location.href = `img/item-images/" . $image_name3 . "`;' src='./img/item-images/". $image_name3 . "' alt='Item Image' style='width:100%'></img>";
                   echo         "</div>";
                   }
                   if($image_name4 != "") {
                   echo         "<div class='mySlides fade' alt='0'>";
                   echo             "<img class='item$id-image4 item-image' onclick='window.location.href = `img/item-images/" . $image_name4 . "`;' src='./img/item-images/". $image_name4 . "' alt='Item Image' style='width:100%'></img>";
                   echo         "</div>";
                   }
                   if($image_name5 != "") {
                   echo         "<div class='mySlides fade' alt='0'>";
                   echo             "<img class='item$id-image5 item-image' onclick='window.location.href = `img/item-images/" . $image_name5 . "`;' src='./img/item-images/". $image_name5 . "' alt='Item Image' style='width:100%'></img>";
                   echo         "</div>";
                   }
                   if($allEmpty){
                   echo         "<div class='mySlides fade' alt='0'>";
                   echo             "<img class='item$id-image5 item-image' onclick='window.location.href = `img/item-images/" . $westbrickSVG . "`;' src='./img/item-images/". $westbrickSVG . "' alt='Item Image' style='width:100%'></img>";
                   echo         "</div>";
                   }
                   //If there is at least two images then add arrows
                   if($atLeastTwo) {
                    echo         "<a class='prev' onclick='prevSlide($id)'>&#10094;</a>";
                    echo         "<a class='next' onclick='nextSlide($id)'>&#10095;</a>";
                   }                   
                   echo     "</div>";
                   //Item Carousel End
                   echo         "<div class='top-middle-things'>";
                   echo		        "<h1 class='item-title'>" . $title . "</h1>";
                   echo			    "<h4 class='item-seller'>". $seller . "</h4>";
                   if(!$emailEmpty){
                   echo             "<h4><a href='mailto:$email' class='item-seller-email'>$email</a></h4>";
                   }                   
                   echo 		    "<h5 class='item-posting-date'>" . $date . "</h5>";
                   echo 		    "<h5 class='item-posting-date'>" . $time . "</h5>";
                   echo 	    "</div>";
                   echo         "<div class='item-body'>";
                   echo 	        "<p class='item-body'>" . $body . "</p>";
                   echo         "</div>";
                   echo 	    "<h1 class='item-price'>$" . $price . "</h1>";
                //    echo 	    "<a class='item-garbage-button' href='./PHP/delete-item.php?id=$id'><img class='item-garbage-button' src='img/garbage-can.svg' alt='Garbage Can'></a>";
                   echo         "<img class='item-garbage-button' src='img/garbage-can.svg' alt='Garbage Can $id'></img>";
                   echo         "<h6 class='item-id'>Item # $id</h6>";
                //    echo 	    "<a class='item-garbage-button' onclick='deleteItem(this.alt)'><img class='item-garbage-button' src='img/garbage-can.svg' alt='Garbage Can $i'></a>";
                   echo     "</div>";                   
                }            
            }
            else {
                echo "<p>no rows found.</p>";
            }
            //  echo "<h1>TESTING</h1>";
             // Close connection
			 mysqli_close($conn);
        ?>
        
    </div>    
</body>
</html>