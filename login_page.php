<?php
//connect to database
$conn = mysqli_connect('localhost', 'root', '', 'flairbnb') or die('Error connecting to database.');

//user inputs

// username OR email
$login_user = mysqli_real_escape_string($conn, $_REQUEST["username"]);
// Passwort 
$login_password = mysqli_real_escape_string($conn, $_REQUEST['psw']); 
// Query  to find user
$query = "SELECT * FROM registered WHERE email = '$login_user' OR username = '$login_user'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $user_data = mysqli_fetch_assoc($result);
    $hashed_password = $user_data['password'];

    // Verwenden Sie password_verify(), um das eingegebene Passwort mit dem gehashten Passwort in der Datenbank zu überprüfen
    if (password_verify($login_password, $hashed_password)) {
        echo "Login successful! Redirecting...";
        echo ' <script type="text/javascript">
        	function redirect() {
            setTimeout(function() {
            window.location.href = "index.html";}, 3000);}
       		window.onload = redirect;
    		</script>';}
    	else {
        echo "Login failed. Invalid credentials.";
    }
} else {
    // Benutzer nicht gefunden
    echo "User not found.";
}


?>