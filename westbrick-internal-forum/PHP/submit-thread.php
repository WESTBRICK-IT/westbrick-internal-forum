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
    <img class="main-title" src="../img/westbrick-internal-forum.svg" alt="Westbrick Internal Forum Title">
      
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
        $dbname = "threads_db";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }    
        
        $title = $_POST['title'];
        $creator = $_POST['creator'];
        $email = $_POST['email'];        
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
        $creator = convertApostrophe($creator);
        $body = convertApostrophe($body);            
        

        //get the first file and upload it
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];          
        // echo "<h1>file Name: $file_name " . "file tmp: $file_tmp</h1>";
        $target_dir = "../img/thread-files/";
        $target_file = $target_dir . basename($file_name);        
        // move_uploaded_file($file_tmp, $target_file);
        //chek if error
        if(!move_uploaded_file($file_tmp, $target_file)){
            $error = error_get_last();
            // echo 'Error: ' . $error['message'];
        }
        else {
            // echo "<h1>Successfully Uploaded</h1>";
        }
        //end of first file upload


        //get the second file and upload it
        $file_name2 = $_FILES['file2']['name'];
        $file_tmp2 = $_FILES['file2']['tmp_name'];         
        // echo "<h1>file Name: $file_name " . "file tmp: $file_tmp</h1>";
        $target_dir2 = "../img/thread-files/";
        $target_file2 = $target_dir2 . basename($file_name2);        
        // move_uploaded_file($file_tmp, $target_file);
        //chek if error
        if(!move_uploaded_file($file_tmp2, $target_file2)){
            $error = error_get_last();
            // echo 'Error: ' . $error['message'];
        }
        else {
            // echo "<h1>Successfully Uploaded</h1>";
        }
        //end of second file upload

        //get the third file and upload it
        $file_name3 = $_FILES['file3']['name'];
        $file_tmp3 = $_FILES['file3']['tmp_name'];         
        // echo "<h1>file Name: $file_name " . "file tmp: $file_tmp</h1>";
        $target_dir3 = "../img/thread-files/";
        $target_file3 = $target_dir3 . basename($file_name3);        
        // move_uploaded_file($file_tmp, $target_file);
        //chek if error
        if(!move_uploaded_file($file_tmp3, $target_file3)){
            $error = error_get_last();
            // echo 'Error: ' . $error['message'];
        }
        else {
            // echo "<h1>Successfully Uploaded</h1>";
        }
        //end of third file upload

        //get the fourth file and upload it
        $file_name4 = $_FILES['file4']['name'];
        $file_tmp4 = $_FILES['file4']['tmp_name'];         
        // echo "<h1>file Name: $file_name " . "file tmp: $file_tmp</h1>";
        $target_dir4 = "../img/thread-files/";
        $target_file4 = $target_dir4 . basename($file_name4);        
        // move_uploaded_file($file_tmp, $target_file);
        //chek if error
        if(!move_uploaded_file($file_tmp4, $target_file4)){
            $error = error_get_last();
            // echo 'Error: ' . $error['message'];
        }
        else {
            // echo "<h1>Successfully Uploaded</h1>";
        }
        //end of fourth file upload

        //get the fifth file and upload it
        $file_name5 = $_FILES['file5']['name'];
        $file_tmp5 = $_FILES['file5']['tmp_name'];         
        // echo "<h1>file Name: $file_name " . "file tmp: $file_tmp</h1>";
        $target_dir5 = "../img/thread-files/";
        $target_file5 = $target_dir5 . basename($file_name5);        
        // move_uploaded_file($file_tmp, $target_file);
        //chek if error
        if(!move_uploaded_file($file_tmp5, $target_file5)){
            $error = error_get_last();
            // echo 'Error: ' . $error['message'];
        }
        else {
            // echo "<h1>Successfully Uploaded</h1>";
        }
        //end of fifth file upload

       //replace carriage return with paragraph
        $body = str_replace(chr(13), "</p><p class=`thread-body`>", $body); 
        
        $sql = "INSERT INTO threads (title, creator, date, body, file_name1, file_name2, file_name3, file_name4, file_name5, time, email) VALUES ('$title', '$creator', '$date', '$body', '$file_name1', '$file_name2', '$file_name3', '$file_name4', '$file_name5', '$time', '$email')";
        // $sql = "INSERT INTO articles (title, author, body, date) VALUES ('$title', '$author', '$body', '$date')";
        
        if ($conn->query($sql) === TRUE) {
            // echo "<h1>Article $title submitted successfully! Redirecting to articles page in 5 seconds.</h1>";
            echo "<div class='westbrick-success-svg-container'>";
            echo    "<img class='westbrick-success-svg' src='../img/thread-submitted-successfully.svg' alt='WESTBRICK SUCCESS SVG'>";
            echo    "<button class='home-button' type='button' onclick='window.location.href=`../index.php`;'>Home</button>";
            echo "</div>";
            // echo "<br><h1>File name: $file" . "File tmp name: $file_tmp" . "</h1>";
            // Set the time delay in seconds
            // $timeDelay = 5; // 5 seconds
            // Wait for the specified amount of time before redirecting
            // header("refresh:".$timeDelay.";url=../articles/index.php");
        } else {
            echo "<div class='westbrick-success-svg-container'>";
            echo    "Error: " . $sql . "<br>" . $conn->error;
            echo    "<button class='home-button' type='button' onclick='window.location.href=`../index.php`;'>Compose</button>";
            echo "</div>";
        }
        $conn->close();
        
        ?>
</body>
</html>