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
        $dbname = "threads_db";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }    
        //get the amount of replies
        $query = "SELECT number_of_replies FROM threads WHERE id = " . $threadNumber;
        $result = mysqli_query($conn, $query);
        echo "<h1>$result</h1>";
        
        $name = $_POST['name'];
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
        $body = convertApostrophe($body);    
        $name = convertApostrophe($name); 
        
       //replace carriage return with paragraph
        $body = str_replace(chr(13), "</p><p class=`thread-body`>", $body); 
        
        $sqlNewColumns= "ALTER TABLE threads ADD COLUMN reply" + $replyNumber + "_name INT(255), ADD COLUMN reply" + $replyNumber + "_date DATE, ADD COLUMN reply" + $replyNumber + "_body TEXT, ADD COLUMN reply" + $replyNumber + "_time TIME;";
        $sql = "INSERT INTO threads (reply" + $replyNumber + "_name, reply" + $replyNumber + "_date, reply" + $replyNumber + "_body, reply" + $replyNumber + "_time) VALUES ('$name', '$date', '$body', '$time')";
                
        if ($conn->query($sql) === TRUE) {
            // echo "<h1>Article $title submitted successfully! Redirecting to articles page in 5 seconds.</h1>";
            echo "<div class='westbrick-success-svg-container'>";
            echo    "<img class='westbrick-success-svg' src='../img/reply-submitted-successfully.svg' alt='WESTBRICK REPLY SUCCESS SVG'>";
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