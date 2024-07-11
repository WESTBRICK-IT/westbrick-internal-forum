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
    <img class="main-title" src="img/westbrick-internal-forum.svg" alt="Westbrick Internal Forum Title">
    <button onclick="window.location.href='./PHP/new-thread.html'" class="post-thread-button" type="button">Post New thread</button>
    <div class="forum">

        <!-- <div class="thread">            
            <img class="thread-image" src="img/motorcycle-1.jpg" alt="thread Image"></img>
            <div class="top-middle-things">
                <h1 class="thread-title">Japanese 80's Motorcycle Really Long Title OVer here</h1>
                <h4 class="thread-seller">Chris Barber</h4>
                <h5 class="thread-posting-date">May 3rd 2024</h5>                
            </div>              
            <p class="thread-body">Sup dudes, I'm selling this motorcycle. It's really cool. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <h1 class="thread-price">$5000</h3>            
            <a class="thread-garbage-button" href="#"><img class="thread-garbage-button" src="img/garbage-can.svg" alt="Garbage Can"></a>
        </div>         -->

        <?php
            $allowedIPs = array('206.174.198.58', '206.174.198.59', '50.99.132.206'); // Define the list of allowed IP addresses

            $remoteIP = $_SERVER['REMOTE_ADDR']; // Get the remote IP address of the client

            if (!in_array($remoteIP, $allowedIPs)) {
                // Unauthorized access - display an error message or redirect
                echo "<h1>Access denied. Your IP address is not allowed to view these threads.</h1>";
                exit();
            }
            function convertApostrophe($string) { 
				$newString = str_replace("`", "'", $string); 
				return $newString; 
			}
            // Connect to the database
            $conn = mysqli_connect("localhost", "cbarber", "!!!Dr0w554p!!!", "threads_db");
	 
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT * FROM `threads` ORDER BY `date` DESC, `time` DESC";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {                                            
                while($row = mysqli_fetch_assoc($result)){                   
                    $title = $row["title"];
                    $creator = $row["creator"];
                    $date = $row["date"];
                    $time = $row["time"];                   
                    $body = $row["body"];
                    $file_name1 = $row["file_name1"];
                    $file_name2 = $row["file_name2"];
                    $file_name3 = $row["file_name3"];
                    $file_name4 = $row["file_name4"];
                    $file_name5 = $row["file_name5"];
                    $id = $row["id"];
                    $email = $row["email"];

                    $title = convertApostrophe($title);
                    $creator = convertApostrophe($creator);
                    //    $date = convertApostrophe($date);
                    $body = convertApostrophe($body);

                    //if image name is empty or not found then add default image
                    $westbrickSVG = "WESTBRICK-Normal.svg";
                    $allEmpty = false;                   
                    if( $file_name1 == "" &&
                        $file_name2 == "" &&
                        $file_name3 == "" &&
                        $file_name4 == "" &&
                        $file_name5 == "") {                        
                        $allEmpty = true;
                    }

                    //check if there are at least two files to display next and prev arrows
                    $atLeastTwo = false;
                    $fileCount = 0;
                    if($file_name1 != "") {
                        $fileCount = $fileCount +1;
                    }
                    if($file_name2 != "") {
                        $fileCount = $fileCount +1;
                    }
                    if($file_name3 != "") {
                        $fileCount = $fileCount +1;
                    }
                    if($file_name4 != "") {
                        $fileCount = $fileCount +1;
                    }
                    if($file_name5 != "") {
                        $fileCount = $fileCount +1;
                    }
                    if($fileCount >= 2) {
                        $atLeastTwo = true;                        
                    }
                    //see if e-mail is there
                    if($email == ""){
                        $emailEmpty = true;
                    }
                    // Start the thread!! LET"SS GOOOOOOO
                    echo    "<div class='thread$id thread'>";
        //             <div class='thread99 thread'>        
                    echo    "   <div class='thread$id-images thread-images' alt='0'>";
        //     <!-- using this alt number as indices, do not remove -->
        //     <div class='thread99-images thread-images' alt='0'>
                    echo    "       <div alt='0'>";
        //         <div alt='0'>
                    echo    "           <img class='thread$id-image1 thread-image1 thread-image" onclick="window.location.href = 'img/motorcycle-1.jpg';" src="./img/motorcycle-1.jpg" style="width:100%"></img>"
        //             <img class="thread99-image1 thread-image1 thread-image" onclick="window.location.href = 'img/motorcycle-1.jpg';" src="./img/motorcycle-1.jpg" style="width:100%"></img>
        //         </div>
        //         <div alt='0'>
        //             <img class="thread99-image2 thread-image2 thread-image" onclick="window.location.href = 'img/motorcycle-2.jpg';" src="./img/motorcycle-2.jpg" style="width:100%"></img>
        //         </div>
        //         <div alt='0'>
        //             <img class="thread99-image3 thread-image3 thread-image" onclick="window.location.href = 'img/motorcycle-3.jpg';" src="./img/motorcycle-3.jpg" style="width:100%"></img>
        //         </div>            
        //         <div alt='0'>
        //             <img class="thread99-image4 thread-image4 thread-image" onclick="window.location.href = 'img/motorcycle-4.webp';" src="./img/motorcycle-4.webp" style="width:100%"></img>
        //         </div>
        //         <div alt='0'>
        //             <img class="thread99-image5 thread-image5 thread-image" onclick="window.location.href = 'img/motorcycle-5.webp';" src="./img/motorcycle-5.webp" style="width:100%"></img>
        //         </div>            
        //         <a class='prev' onclick='prevSlide(99)'>&#10094;</a>
        //         <a class='next' onclick='nextSlide(99)'>&#10095;</a>
        //     </div>            
        //     <div class='top-middle-things'>
        //         <h1 class='thread-title'>Motorcycle Discussion</h1>
        //         <h4 class='thread-creator'>Chris Barber</h4>            
        //         <h4><a href='mailto:$email' class='thread-seller-email'>cbarber@westbrick.ca</a></h4>
        //         <h5 class='thread-posting-date'>June 19th 2024</h5>
        //         <h5 class='thread-posting-date'>14:41:40</h5>
        //     </div>
        //     <div class='thread-body'>
        //         <p class='thread-body'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        //     </div>                         
        //     <button class="thread-reply-button99 thread-reply-button" data-threadNumber="99">Reply</button>
        //     <form class="thread99-reply-input-group thread-reply-input-group" data-replyDivExtended="false" method="post" action="./PHP/submit-reply.php" enctype="multipart/form-data">

        //         <label for="thread99-reply-input-title-box" class="thread99-reply-input-title-label thread-reply-input-title-label">Title:</label>                
        //         <input type="text" id="thread99-reply-input-title-box" class="thread99-reply-input-title-box thread-reply-input-title-box" name="thread99-reply-input-name-box"></input>
                
        //         <label for="thread99-reply-input-name-box" class="thread99-reply-input-name-label thread-reply-input-name-label">Name:</label>                
        //         <input type="text" id="thread99-reply-input-name-box" class="thread99-reply-input-name-box thread-reply-input-name-box" name="thread99-reply-input-name-box"></input>

        //         <label for="thread99-reply-input-box" class="thread99-reply-input-box-label thread-reply-input-box-label">Reply:</label>
        //         <textarea type="text" id="thread99-reply-input-box" class="thread99-reply-input-box thread-reply-body-input-box" name="thread99-reply-input-box"></textarea>
        //         <!-- send the thread number with the data -->
        //         <input type="hidden" name="thread-number" value="99">                

        //         <button class="thread99-reply-submit-button thread-reply-submit-button" data-threadNumber="99" type="submit" value="Post Thread">Submit</button>
        //     </form>            
        //     <img class='thread99-garbage-button thread-garbage-button' src='img/garbage-can.svg' alt='Garbage Can 99'></img>
        //     <h6 class='thread99-id thread-id'>Thread #99</h6>      
        //     <div class="thread99-replies thread-replies">
        //         <div class="thread99-reply1 thread99-reply thread-reply">
        //             <div class="thread-reply-image-container">
        //                 <img class="thread99-reply1-image thread99-reply-image thread-reply-image" alt="Thread #99 Reply Image" onclick="window.location.href = 'img/motorcycle-1.jpg';" src="./img/motorcycle-1.jpg"></img>
        //             </div>                        
        //             <div class="thread99-reply1-text thread99-reply-text thread-reply-text">
        //                 <h3 class="thread99-reply1-title thread99-reply-title thread-reply-title">This is the Title of the Reply</h3>
        //                 <h5 class="thread99-reply1-name thread99-reply-name thread-reply-name">Jim Bob</h5>
        //                 <h5 class="thread99-reply1-date thread99-reply-date thread-reply-date">June 19th 2024</h5>
        //                 <h5 class="thread99-reply1-time thread99-reply-time thread-reply-time">14:41:40</h5>
        //                 <p class="thread99-reply1-body thread99-reply-body thread-reply-body">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium, maxime soluta ex blanditiis hic ut sapiente aperiam labore qui, iure, impedit quod commodi aspernatur dolorem ratione non voluptatum beatae veniam!</p>                        
        //             </div>
        //             <h6 class="thread99-reply1-number-display thread99-reply-number-display thread-reply-number-display">Reply #1</h6>
        //             <img class='thread99-reply1-garbage-button thread99-reply-garbage-button thread-reply-garbage-button' src='img/garbage-can.svg' alt='Garbage Can 99'></img>
        //         </div>
        //         <div class="thread99-reply2 thread99-reply thread-reply">
        //             <div class="thread-reply-image-container">
        //                 <img class="thread99-reply2-image thread99-reply-image thread-reply-image" alt="Thread #99 Reply Image" onclick="window.location.href = 'img/motorcycle-2.jpg';" src="./img/motorcycle-2.jpg"></img>
        //             </div>
        //             <div class="thread99-reply1-text thread99-reply-text thread-reply-text">
        //                 <h3 class="thread99-reply1-title thread99-reply-title thread-reply-title">This is the Title of the Reply</h3>
        //                 <h5 class="thread99-reply2-name thread99-reply-name thread-reply-name">John Doe</h5>
        //                 <h5 class="thread99-reply2-date thread99-reply-date thread-reply-date">June 19th 2024</h5>
        //                 <h5 class="thread99-reply2-time thread99-reply-time thread-reply-time">14:41:40</h5>
        //                 <p class="thread99-reply2-body thread99-reply-body thread-reply-body">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium, maxime soluta ex blanditiis hic ut sapiente aperiam labore qui, iure, impedit quod commodi aspernatur dolorem ratione non voluptatum beatae veniam!</p>                        
        //             </div>
        //             <h6 class="thread99-reply2-number-display thread99-reply-number-display thread-reply-number-display">Reply #2</h6>
        //             <img class='thread99-reply2-garbage-button thread99-reply-garbage-button thread-reply-garbage-button' src='img/garbage-can.svg' alt='Garbage Can 99'></img>
        //         </div>
        //         <div class="thread99-reply3 thread99-reply thread-reply">
        //             <div class="thread-reply-image-container">
        //                 <img class="thread99-reply3-image thread99-reply-image thread-reply-image" alt="Thread #99 Reply Image" onclick="window.location.href = 'img/motorcycle-3.jpg';" src="./img/motorcycle-3.jpg"></img>
        //             </div>
        //             <div class="thread99-reply1-text thread99-reply-text thread-reply-text">
        //                 <h3 class="thread99-reply1-title thread99-reply-title thread-reply-title">This is the Title of the Reply</h3>
        //                 <h5 class="thread99-reply3-name thread99-reply-name thread-reply-name">Harry Tom Sally</h5>
        //                 <h5 class="thread99-reply3-date thread99-reply-date thread-reply-date">June 19th 2024</h5>
        //                 <h5 class="thread99-reply3-time thread99-reply-time thread-reply-time">14:41:40</h5>
        //                 <p class="thread99-reply3-body thread99-reply-body thread-reply-body">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium, maxime soluta ex blanditiis hic ut sapiente aperiam labore qui, iure, impedit quod commodi aspernatur dolorem ratione non voluptatum beatae veniam!</p>                        
        //             </div>
        //             <h6 class="thread99-reply3-number-display thread99-reply-number-display thread-reply-number-display">Reply #3</h6>
        //             <img class='thread99-reply3-garbage-button thread99-reply-garbage-button thread-reply-garbage-button' src='img/garbage-can.svg' alt='Garbage Can 99'></img>
        //         </div>
        //     </div>
        // </div>

                    echo 	"<div class='thread'>";
                    //thread Carousel                
                    echo     "<div class='thread$id-images thread-images' alt='0'>";
                    if($image_name != "") {
                    echo         "<div alt='0'>";                   
                    echo             "<img class='thread$id-image1 thread-image1 thread-image' onclick='window.location.href = `img/thread-images/" . $image_name . "`;' src='./img/thread-images/". $image_name . "' alt='thread Image' style='width:100%'></img>";
                    echo         "</div>";
                    }
                    if($image_name2 != "") {
                    echo         "<div alt='0'>";
                    echo             "<img class='thread$id-image2 thread-image' onclick='window.location.href = `img/thread-images/" . $image_name2 . "`;' src='./img/thread-images/". $image_name2 . "' alt='thread Image' style='width:100%'></img>";
                    echo         "</div>";
                    }
                    if($image_name3 != "") {
                    echo         "<div alt='0'>";
                    echo             "<img class='thread$id-image3 thread-image' onclick='window.location.href = `img/thread-images/" . $image_name3 . "`;' src='./img/thread-images/". $image_name3 . "' alt='thread Image' style='width:100%'></img>";
                    echo         "</div>";
                    }
                    if($image_name4 != "") {
                    echo         "<div alt='0'>";
                    echo             "<img class='thread$id-image4 thread-image' onclick='window.location.href = `img/thread-images/" . $image_name4 . "`;' src='./img/thread-images/". $image_name4 . "' alt='thread Image' style='width:100%'></img>";
                    echo         "</div>";
                    }
                    if($image_name5 != "") {
                    echo         "<div alt='0'>";
                    echo             "<img class='thread$id-image5 thread-image' onclick='window.location.href = `img/thread-images/" . $image_name5 . "`;' src='./img/thread-images/". $image_name5 . "' alt='thread Image' style='width:100%'></img>";
                    echo         "</div>";
                    }
                    if($allEmpty){
                    echo         "<div alt='0'>";
                    echo             "<img class='thread$id-image5 thread-image' onclick='window.location.href = `img/thread-images/" . $westbrickSVG . "`;' src='./img/thread-images/". $westbrickSVG . "' alt='thread Image' style='width:100%'></img>";
                    echo         "</div>";
                    }
                    //If there is at least two images then add arrows
                    if($atLeastTwo) {
                    echo         "<a class='prev' onclick='prevSlide($id)'>&#10094;</a>";
                    echo         "<a class='next' onclick='nextSlide($id)'>&#10095;</a>";
                    }                   
                    echo     "</div>";
                    //thread Carousel End
                    echo         "<div class='top-middle-things'>";
                    echo		        "<h1 class='thread-title'>" . $title . "</h1>";
                    echo			    "<h4 class='thread-seller'>". $seller . "</h4>";
                    if(!$emailEmpty){
                    echo             "<h4><a href='mailto:$email' class='thread-seller-email'>$email</a></h4>";
                    }                   
                    echo 		    "<h5 class='thread-posting-date'>" . $date . "</h5>";
                    echo 		    "<h5 class='thread-posting-date'>" . $time . "</h5>";
                    echo 	    "</div>";
                    echo         "<div class='thread-body'>";
                    echo 	        "<p class='thread-body'>" . $body . "</p>";
                    echo         "</div>";                                 
                    echo         "<img class='thread-garbage-button' src='img/garbage-can.svg' alt='Garbage Can $id'></img>";
                    echo         "<h6 class='thread-id'>thread # $id</h6>";               
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