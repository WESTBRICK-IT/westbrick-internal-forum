<!-- //Programmed by Chris Barber June 6 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westbrick Internal Marketplace Thread Submitted</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js" defer></script>
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>
    <img class="main-title" src="../img/westbrick-internal-market.svg" alt="Westbrick Internal Market Title">
      
    <?php
        $allowedIPs = array('206.174.198.58', '206.174.198.59', '50.99.132.206'); // Define the list of allowed IP addresses

        $remoteIP = $_SERVER['REMOTE_ADDR']; // Get the remote IP address of the client
        
        if (!in_array($remoteIP, $allowedIPs)) {
            // Unauthorized access - display an error message or redirect
            echo "Access denied. Your IP address is not allowed to submit this thread.";
            exit();
        }
        
        // Process the form submission if the IP address is allowed
        // Your form processing code here...

        $servername = "localhost";
        $username = "cbarber";
        $password = "!!!Dr0w554p!!!";
        $dbname = "thread_db";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }    
        
        $title = $_POST['title'];
        $seller = $_POST['seller'];
        $email = $_POST['email'];
        $price = $_POST['price'];
        $body = $_POST['body'];        
        $date = date('Y-m-d');        
        date_default_timezone_set('America/Denver'); 
        $time = date('H:i:s', time());
        // echo $time;
        // echo "<h1>$time</h1>";
        function convertApostrophe($string) { 
            $newString = str_replace("'", '`', $string); 
            return $newString; 
        }    
        $title = convertApostrophe($title);
        $seller = convertApostrophe($seller);
        $body = convertApostrophe($body);    
        $price = convertApostrophe($price); 
        

        //get the first image and upload it
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];          
        // echo "<h1>Image Name: $image_name " . "Image tmp: $image_tmp</h1>";
        $target_dir = "../img/thread-images/";
        $target_file = $target_dir . basename($image_name);        
        // move_uploaded_file($image_tmp, $target_file);
        //chek if error
        if(!move_uploaded_file($image_tmp, $target_file)){
            $error = error_get_last();
            // echo 'Error: ' . $error['message'];
        }
        else {
            // echo "<h1>Successfully Uploaded</h1>";
        }
        //end of first image upload


        //get the second image and upload it
        $image_name2 = $_FILES['image2']['name'];
        $image_tmp2 = $_FILES['image2']['tmp_name'];         
        // echo "<h1>Image Name: $image_name " . "Image tmp: $image_tmp</h1>";
        $target_dir2 = "../img/thread-images/";
        $target_file2 = $target_dir2 . basename($image_name2);        
        // move_uploaded_file($image_tmp, $target_file);
        //chek if error
        if(!move_uploaded_file($image_tmp2, $target_file2)){
            $error = error_get_last();
            // echo 'Error: ' . $error['message'];
        }
        else {
            // echo "<h1>Successfully Uploaded</h1>";
        }
        //end of second image upload

        //get the third image and upload it
        $image_name3 = $_FILES['image3']['name'];
        $image_tmp3 = $_FILES['image3']['tmp_name'];         
        // echo "<h1>Image Name: $image_name " . "Image tmp: $image_tmp</h1>";
        $target_dir3 = "../img/thread-images/";
        $target_file3 = $target_dir3 . basename($image_name3);        
        // move_uploaded_file($image_tmp, $target_file);
        //chek if error
        if(!move_uploaded_file($image_tmp3, $target_file3)){
            $error = error_get_last();
            // echo 'Error: ' . $error['message'];
        }
        else {
            // echo "<h1>Successfully Uploaded</h1>";
        }
        //end of third image upload

        //get the fourth image and upload it
        $image_name4 = $_FILES['image4']['name'];
        $image_tmp4 = $_FILES['image4']['tmp_name'];         
        // echo "<h1>Image Name: $image_name " . "Image tmp: $image_tmp</h1>";
        $target_dir4 = "../img/thread-images/";
        $target_file4 = $target_dir4 . basename($image_name4);        
        // move_uploaded_file($image_tmp, $target_file);
        //chek if error
        if(!move_uploaded_file($image_tmp4, $target_file4)){
            $error = error_get_last();
            // echo 'Error: ' . $error['message'];
        }
        else {
            // echo "<h1>Successfully Uploaded</h1>";
        }
        //end of fourth image upload

        //get the fifth image and upload it
        $image_name5 = $_FILES['image5']['name'];
        $image_tmp5 = $_FILES['image5']['tmp_name'];         
        // echo "<h1>Image Name: $image_name " . "Image tmp: $image_tmp</h1>";
        $target_dir5 = "../img/thread-images/";
        $target_file5 = $target_dir5 . basename($image_name5);        
        // move_uploaded_file($image_tmp, $target_file);
        //chek if error
        if(!move_uploaded_file($image_tmp5, $target_file5)){
            $error = error_get_last();
            // echo 'Error: ' . $error['message'];
        }
        else {
            // echo "<h1>Successfully Uploaded</h1>";
        }
        //end of fifth image upload

       //replace carriage return with paragraph
        $body = str_replace(chr(13), "</p><p class=`thread-body`>", $body); 
        
        $sql = "INSERT INTO threads (title, seller, date, price, body, image_name, image_name2, image_name3, image_name4, image_name5, image_tmp, time, email) VALUES ('$title', '$seller', '$date', '$price', '$body', '$image_name', '$image_name2', '$image_name3', '$image_name4', '$image_name5', '$image_tmp', '$time', '$email')";
        // $sql = "INSERT INTO articles (title, author, body, date) VALUES ('$title', '$author', '$body', '$date')";
        
        if ($conn->query($sql) === TRUE) {
            // echo "<h1>Article $title submitted successfully! Redirecting to articles page in 5 seconds.</h1>";
            echo "<div class='westbrick-success-svg-container'>";
            echo    "<img class='westbrick-success-svg' src='../img/thread-submitted-successfully.svg' alt='WESTBRICK SUCCESS SVG'>";
            echo    "<button class='home-button' type='button' onclick='window.location.href=`../index.php`;'>Home</button>";
            echo "</div>";
            // echo "<br><h1>File name: $image" . "File tmp name: $image_tmp" . "</h1>";
            // Set the time delay in seconds
            // $timeDelay = 5; // 5 seconds
            // Wait for the specified amount of time before redirecting
            // header("refresh:".$timeDelay.";url=../articles/index.php");
        } else {
            echo "<div class='westbrick-success-svg-container'>";
            echo    "Error: " . $sql . "<br>" . $conn->error;
            echo    "<button class='home-button' type='button' onclick='window.location.href=`index.html`;'>Compose</button>";
            echo "</div>";
        }
        $conn->close();
        
        ?>
</body>
</html>