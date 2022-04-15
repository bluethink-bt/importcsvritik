<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/loginStyle.css">
    <title>Admin Login</title>

</head>
<?php

function showErr($errname){
    echo    "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    ". $errname."
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}

if (isset($_GET['passwordWrong'])) { //checking password
    showErr('Wrong password try again...');
}
if (isset($_GET['userNotFound'])) {  // check user found or not
    
    header("location: htmlpage/register.php");
} 
if (isset($_GET['userAlreadyExist'])) {  // check user exist or not
    showErr('User already exist you need to login...');


}

?>

<body>
    <div class="form">
        <form action="assets/userLogIn.php" method="post">
            <h1 class="glow">Admin Log In</h1>
            <hr><br>
            <label for="username">Username</label>
            <input type="text" name="uname" id="username" placeholder="Enter Your Username" required>

            <label for="password">Password</label>
            <input type="password" name="pass" id="password" placeholder="Enter Your Password" required>

            <input type="submit" value="Log In" onclick="validation()">
        </form>
    </div>
    <script>
        console.log('hello');
    </script>
</body>

</html>