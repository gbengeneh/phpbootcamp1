<?php
include"db.php";

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

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $firstname=$_POST["firstname"];
    $surname=$_POST["surname"];
    $username=$_POST["username"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $phonenumber=$_POST["phonenumber"];
    $password=$_POST["password"];
    $confirm_password=$_POST["confirm_password"];
  

    if(empty($firstname) || empty($surname) || empty($username)|| empty($gender)|| empty($email) || empty($phonenumber)|| empty($password) || empty($confirm_password)){
        $errorMessage="All the fields are required";
        exit;
    }
    if($password !==$confirm_password){
        $errorMessage="Password Not match";

    }
    else{
    //check email
    $check_email= "SELECT * FROM clients WHERE email='$email'";
    $query=mysqli_query($conn,$check_email);
    if (mysqli_num_rows($query)>0){
        $errorMessage= "Email already Exist";
    }
       else{
        $encrypt_password=md5($password);
        $sql="INSERT INTO clients(firstname,surname,username,gender,email,phonenumber,password,confirm_password)
        VALUES ('$firstname','$surname','$username','$gender','$email','$phonenumber','$encrypt_password','$confirm_password')";
        $result= $conn->query($sql);
    

  if (!$result){
      $errorMessage = "Invalid query:".$connection->error;
      exit;
  
    }
    else{
        header("location:/phpbootcamp1/index.php");
    
    
    $firstname="";
$surname="";
$username="";
$gender="";
$email="";
$phonenumber="";
$password="";
$confirm_password="";

$successMessage= "CLient added successfuly";

    }

}
}
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