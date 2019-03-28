<?php
        
    ini_set('display_errors', 1);
    error_reporting(E_ALL);     

    saveUser();

    function saveUser($user) {
    
        $connection = connect();
    
        $sql = "INSERT INTO users (id_number, first_name, last_name, date_of_birth) VALUES (".$user['id_number'].",".$user['first_name'].", ".$user['last_name'].",".$user['date_of_birth'].")";

        mysqli_query($connection, $sql);
    
        mysqli_close($connection);
    
        echo "Thank you for your submission";
    
        return;
    
    }
    
    function connect () {
    
        $servername = "localhost";
        $username = "devprox";
        $password = "7Ptz-#xWu6kKbjXn";
        $db = 'devprox';

        $conn = new mysqli($servername, $username, $password,  $db);

        if($conn->connect_error) {
        
            die("Connection failed: " . $conn->connect_error);
            
        }else {

            return $conn;

        }
    
    }
