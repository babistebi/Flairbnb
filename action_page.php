
<!DOCTYPE html>
<html>

<head>
    <title>Redirect</title>
</head>
<body>
    <center>
        <?php

        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "flairbnb");

        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        // Taking all 5 values from the form data(input)
        $email = $_REQUEST['email'];
        $username = $_REQUEST['username'];
        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $birthday = $_REQUEST['birthday'];
        $password = $_REQUEST['psw'];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "SELECT * FROM registered WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
       
       	if(mysqli_num_rows($result)> 0) {
       			mysqli_close($conn);
       			echo "<script>
       					alert('Username already in use.');
       					window.history.back();
       					</script>";
				exit();
       	}

       	else {
       		echo "Registered! Redirecting...";
       	

        // Insert into database
      
       	$sql = "INSERT INTO registered VALUES ('$email',
            '$username', '$firstName','$lastName', '$birthday', '$hash')";


        // Check if the query is successful
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";

            echo nl2br("\n$email\n $username\n "
                . "$firstName\n $lastName\n $birthday\n $password");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection

        echo "Redirecting...";

        mysqli_close($conn);

        header("Location: index.html");
		exit();}
        ?>

    </center>
</body>
</html>