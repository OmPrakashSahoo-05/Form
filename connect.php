<?
    $username = $_POST['username'];
    $language = $_POST['language'];
    $stdin = $_POST['stdin'];
    $sourcecode = $_POST['sourcecode'];


    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'mystore');
    if($conn->connection_error){
        die('Connection Failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into userdata(username,language,stdin,sourcecode)
        values (? , ? ,? , ?)");
        $stmt->bind_param("ssss", $username, $language, $stdin, $sourcecode);
        $stmt->execute();
        echo "Data Inserted Successfully";
        $stmt->close();
        $conn->close();
    }
?>