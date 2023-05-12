<?php
session_start();
include "db.php";
if (isset($_POST["messageL_name"])) {
    $messageL_name = $_POST["messageL_name"];
    $messageF_name = $_POST["messageF_name"];
    $message_email = $_POST["message_email"];
    $messageText = $_POST["messageText"];
}
if(empty($messageF_name) || empty($messageL_name) || empty($message_email) || empty($messageText)) {
    echo "
    <div class = 'alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Minden mező kitöltése kötelező!</b>
    </div>";
    exit();
}
if (strlen($messageText > 200)) {
    echo "
    <div class = 'alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Az üzenet max. 200 karakter lehet!</b>
    </div>";
    exit();
}
else {
    $sql = "INSERT INTO `messages` 
    (`message_id`, `message_senderF`, `message_senderL`, `message_senderMail`, 
    `message_text`)
    VALUES(NULL, '$messageF_name', '$messageL_name', '$message_email', '$messageText')";
    $run_query = mysqli_query($con,$sql); 
    echo "<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Üzenet elküldve!</b>
			</div>";
			exit();
}

?>