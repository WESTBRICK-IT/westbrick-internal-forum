<!-- //Programmed by Chris Barber June 14 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Westbrick Internal Forum</title>
    <link rel="stylesheet" href="css/style.css?v=1.02">
    <link rel="stylesheet" href="css/carousel.css?v=1.02">
    <script src="js/script.js" defer></script>
    <script src="js/carousel.js" defer></script>
    <script src="js/reply.js" defer></script>
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
                    $replyCount = $row["reply_count"];

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
                    echo    "   <div class='thread$id-files thread-files' alt='0'>";        
                    if($file_name1 != "") {
                    echo    "       <div alt='0'>";        
                    echo    "           <img class='thread$id-file1 thread$id-file thread-file1 thread-file' onclick='window.location.href = `files/thread-files/$file_name1`;' src='./files/thread-files/$file_name1' style='width:100%'></img>";        
                    echo    "       </div>";        
                    }
                    if($file_name2 != "") {
                    echo    "       <div alt='0'>";        
                    echo    "           <img class='thread$id-file2 thread$id-file thread-file2 thread-file' onclick='window.location.href = `files/thread-files/$file_name2`;' src='./files/thread-files/$file_name2' style='width:100%'></img>";        
                    echo    "       </div>";
                    }        
                    if($file_name3 != "") {
                    echo    "       <div alt='0'>";        
                    echo    "           <img class='thread$id-file3 thread$id-file thread-file3 thread-file' onclick='window.location.href = `files/thread-files/$file_name3`;' src='./files/thread-files/$file_name3' style='width:100%'></img>";        
                    echo    "       </div>";        
                    }
                    if($file_name4 != "") {
                    echo    "       <div alt='0'>";        
                    echo    "           <img class='thread$id-file4 thread$id-file thread-file4 thread-file' onclick='window.location.href = `files/thread-files/$file_name4`;' src='./files/thread-files/$file_name4' style='width:100%'></img>";        
                    echo    "       </div>";        
                    }
                    if($file_name5 != "") {
                    echo    "       <div alt='0'>";        
                    echo    "           <img class='thread$id-file5 thread$id-file thread-file5 thread-file' onclick='window.location.href = `files/thread-files/$file_name5`;' src='./files/thread-files/$file_name5' style='width:100%'></img>";        
                    echo    "       </div>";        
                    }
                    if($allEmpty) {
                    echo    "       <div alt='0'>";
                    echo    "           <img class='thread$id-file0 thread$id-file thread-file' onclick='window.location.href = `img/thread-files/" . $westbrickSVG . "`;' src='./img/thread-files/". $westbrickSVG . "' alt='Thread File' style='width:100%'></img>";
                    echo    "       </div>";
                    }
                    //If there is at least two images then add arrows
                    if($atLeastTwo) {
                    echo    "       <a class='prev' onclick='prevSlide($id)'>&#10094;</a>";
                    echo    "       <a class='next' onclick='nextSlide($id)'>&#10095;</a>";
                    }                   
                    echo    "   </div>";
                    echo    "   <div class='top-middle-things'>";        
                    echo    "       <h1 class='thread-title'>$title</h1>";        
                    echo    "       <h4 class='thread-creator'>$creator</h4>";        
                    echo    "       <h4><a href='mailto:$email' class='thread-seller-email'>$email</a></h4>";        
                    echo    "       <h5 class='thread-posting-date'>$date</h5>";        
                    echo    "       <h5 class='thread-posting-date'>$time</h5>";        
                    echo    "   </div>";        
                    echo    "   <div class='thread-body'>";        
                    echo    "       <p class='thread-body'>$body</p>";        
                    echo    "   </div>";        
                    echo    "   <button class='thread-reply-button$id thread-reply-button' data-threadNumber='$id'>Reply</button>";        
                    echo    "   <form class='thread$id-reply-input-group thread-reply-input-group' data-replyDivExtended='false' method='post' action='./PHP/submit-reply.php' enctype='multipart/form-data'>";        
                    echo    "       <label for='thread$id-reply-input-title-box' class='thread$id-reply-input-title-label thread-reply-input-title-label'>Title:</label>";        
                    echo    "       <input type='text' id='thread$id-reply-input-title-box' class='thread$id-reply-input-title-box thread-reply-input-title-box' name='thread$id-reply-input-name-box'></input>";        
                    echo    "       <label for='thread$id-reply-input-name-box' class='thread$id-reply-input-name-label thread-reply-input-name-label'>Name:</label>";        
                    echo    "       <input type='text' id='thread$id-reply-input-name-box' class='thread$id-reply-input-name-box thread-reply-input-name-box' name='thread$id-reply-input-name-box'></input>";        
                    echo    "       <label for='thread$id-reply-input-box' class='thread$id-reply-input-box-label thread-reply-input-box-label'>Reply:</label>";        
                    echo    "       <textarea type='text' id='thread$id-reply-input-box' class='thread$id-reply-input-box thread-reply-body-input-box' name='thread$id-reply-input-box'></textarea>";
                    echo    "       <input type='hidden' name='thread-number' value='$id'>";        
                    echo    "       <input type='hidden' name='reply-count' value='$replyCount'>";
                    echo    "       <button class='thread$id-reply-submit-button thread-reply-submit-button' data-threadNumber='$id' type='submit' value='Post Thread'>Submit</button>";        
                    echo    "   </form>";
                    echo    "   <img class='thread$id-garbage-button thread-garbage-button' src='img/garbage-can.svg' alt='Garbage Can $id'></img>";        
                    echo    "   <h6 class='thread$id-id thread-id'>Thread #$id</h6>";        
                    echo    "   <div class='thread$id-replies thread-replies' data-replyCount='0'>";        
                    echo    "       <div class='thread$id-reply1 thread$is-reply thread-reply'>";        
                    echo    "           <div class='thread-reply-file-container'>";        
                    echo    "               <img class='thread$id-reply1-file thread$id-reply-file thread-reply-file' alt='Thread #$id Reply file' onclick='window.location.href = `img/motorcycle-1.jpg`;' src='./img/motorcycle-1.jpg'></img>";        
                    echo    "           </div>";        
                    echo    "           <div class='thread$id-reply1-text thread$id-reply-text thread-reply-text'>";        
                    echo    "               <h3 class='thread$id-reply1-title thread$id-reply-title thread-reply-title'>This is the Title of the Reply</h3>";        
                    echo    "               <h5 class='thread$id-reply1-name thread$id-reply-name thread-reply-name'>Jim Bob</h5>";        
                    echo    "               <h5 class='thread$id-reply1-date thread$id-reply-date thread-reply-date'>June 19th 2024</h5>";        
                    echo    "               <h5 class='thread$id-reply1-time thread$id-reply-time thread-reply-time'>14:41:40</h5>";        
                    echo    "               <p class='thread$id-reply1-body thread99-reply-body thread-reply-body'>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium, maxime soluta ex blanditiis hic ut sapiente aperiam labore qui, iure, impedit quod commodi aspernatur dolorem ratione non voluptatum beatae veniam!</p>";        
                    echo    "           </div>";        
                    echo    "           <h6 class='thread99-reply1-number-display thread99-reply-number-display thread-reply-number-display'>Reply #1</h6>";        
                    echo    "           <img class='thread99-reply1-garbage-button thread99-reply-garbage-button thread-reply-garbage-button' src='img/garbage-can.svg' alt='Garbage Can 99'></img>";        
                    echo    "       </div>";
                    echo    "   </div>";        
                    echo    "</div>";
                }            
            }
            else {
                echo "<p>no rows found.</p>";
            }            
            mysqli_close($conn);
        ?>
    </div>    
</body>
</html>