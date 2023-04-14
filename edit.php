<?php

$servername="localhost";
$username="root";
$password ="";
$database="myshop";
//create connection
$conn=new mysqli($servername,$username,$password,$database);
//check connection
if($conn ->connect_error){
    die("connection failed:" .$conn->connect_error);
}

?>
<?php
$userid="";
$firstname="";
$surname="";
$username="";
$gender="";
$email="";
$phonenumber="";
$password="";
$confirm_password="";

$errorMessage="";
$successMessage="";
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    //GET method: show the data of the client
     if (!isset($_GET["userid"])){
        header("location:/phpbootcamp1/index.php");
        exit;
     }
     $userid=$_GET["userid"];
     // read the row of the selected client from the database table
     $sql="SELECT* FROM clients WHERE userid=$userid";
     $result=$conn->query($sql);
     $row=$result->fetch_assoc();

     if (!$row){
        header("location:/phpbootcamp1/index.php");
        exit;
     }
        $firstname=$row["firstname"];
        $surname=$row["surname"];
        $username=$row["username"];
        $gender=$row["gender"];
        $email=$row["email"];
        $phonenumber=$row["phonenumber"];
        $password=$row["password"];
        $confirm_password=$row["confirm_password"];

}
else{
    //post method: Update the data of the client
    $firstname=$_POST["firstname"];
    $surname=$_POST["surname"];
    $username=$_POST["username"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $phonenumber=$_POST["phonenumber"];
    $password=$_POST["password"];
    $confirm_password=$_POST["confirm_password"];
  
    do{
        if(empty($firstname) || empty($surname) || empty($username)|| empty($gender)|| empty($email) || empty($phonenumber)|| empty($password) || empty($confirm_password)){
            $errorMessage="All the fields are required";
            break;   
         }
         $sql="UPDATE clients 
         SET firstname='$firstname', surname='$surname', username='$username', 
         gender='$gender',email='$email', phonenumber='$phonenumber',password='$password',
         confirm_password='$confirm_password' WHERE userid='$userid'"; 
                $result= $conn->query($sql);
                
                if (!$result){
                    $errorMessage="Invalid query:".$conn->error;
                    break;
                }
                $successMessage="Client Update Successfuly";
                header("location:/phpbootcamp1/index.php");
                exit;
                
            
    }while (true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 

</head>
<body>
    <div class="container my-5">
        <h2>New User</h2>
    <?php
if(!empty($errorMessage)){
    echo"
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
     ";
    }


    ?>

        <form method="post">
            <input type="hidden" name="userid" value="<?php echo $userid; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Firstname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
            </div>
    </div>   
    <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Surname</label>
                <div class="col-sm-6"><?php echo $firstname ?>
                    <input type="text" class="form-control" name="surname" value="<?php echo $surname; ?>">
            </div>
    </div>  
    <div class="row mb-3">
                <label class="col-sm-3 col-form-label">username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
            </div>
    </div>  
    <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="gender" value="<?php echo $gender; ?>">
            </div>
    </div>  
    <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
    </div>  
    <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phonenumber</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phonenumber" value="<?php echo $phonenumber; ?>">
            </div>
    </div>  
    <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
            </div>
    </div>  
    <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="confirm_password" value="<?php echo $confirm_password; ?>">
            </div>
    </div>  
    <?php
    if( !empty($successMessage)){                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
    echo "
    <div class='row mb-3'> 
    <div class='offset=m3 col-sm-6'>
    <div class='alert alert-success  alert-dismissible fade show' role='alert'>
        <strong>$successMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
     
     </div>
     </div>
     </div>
        ";
    }
    ?>

    <div class="row mb-3">
    <div class="offset-sm-3 col-3 d-grid">
       <button type="submit" class="btn btn-primary">Submit</button>
</div>

<div class="col-sm-3 d-grid">
    <a class="btn btn-outline-primary" href="/phpbootcamp1/index.php" role="button">Cancel</a>
</div>
</div>
    </form>
</body>
</html>