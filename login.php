
<?php
require 'config/dbcon.php';
if(isset($_POST["submit"])){
$emailoruser = $_POST["emailoruser"];
$password = $_POST["password"];
$result = mysqli_query($con, "SELECT * FROM man WHERE username = '$emailoruser' OR email= '$emailoruser' " );
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){
    if($password == $row["password"]){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("Location: ../index.php");
    }
    else{
        echo
        "<script>alert('Wrong Password'); </script>";
    }
    }
    else{
         echo
        "<script>alert('User Not Registered'); </script>";
    }
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Open Sans", sans-serif;
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  width: 100%;
  padding: 0 10px;
}

body::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background-color: green;
  opacity: 0.3;
  background-position: center;
  background-size: cover;
}

.LOG {
  width: 400px;
  border-radius: 8px;
  padding: 10px;
  text-align: center;
  border: 1px solid rgba(255, 255, 255, 0.5);
  background-color:rgba(0, 128, 0, 0.3) ;
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
}

form {
  display: flex;
  flex-direction: column;
}

h2 {
  font-size: 2rem;
  margin-bottom: 20px;
  color: #fff;
}

.input-field {
  position: relative;
  border-bottom: 2px solid #ccc;
  margin: 15px 0;
}

.input-field label {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  color: #fff;
  font-size: 16px;
  pointer-events: none;
  transition: 0.15s ease;
}

.input-field input {
  width: 100%;
  height: 40px;
  background: transparent;
  border: none;
  outline: none;
  font-size: 16px;
  color: #fff;
}

.input-field input:focus~label,
.input-field input:valid~label {
  font-size: 0.8rem;
  top: 10px;
  transform: translateY(-120%);
}

.forget {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 25px 0 35px 0;
  color: #fff;
}



.LOG a {
  color: #f8f8fc;
  text-decoration: none;
}

.LOG a:hover {
  text-decoration: underline;
}

button {
  background: #fff;
  color: #000;
  font-weight: 600;
  border: none;
  padding: 12px 20px;
  cursor: pointer;
  border-radius: 3px;
  font-size: 16px;
  border: 2px solid transparent;
  transition: 0.3s ease;
}

button:hover {
  color: #fff;
  border-color: #fff;
  background: rgba(255, 255, 255, 0.15);
}

.register {
  text-align: center;
  margin-top: 30px;
  color: #fff;
}
</style>
</head>
<body>
    <div class="LOG">
    <form action="" method="POST" autocomplete="off">
    <h2>LogIn</h2>
        <div class="input-field">
        <input type="text" name="emailoruser" id="emailoruser" required value="">
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" name="password"  
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <label>Enter a password</label>
      </div>
    
      <button type="submit" name="submit" class="submit" id="submit">Login</button>
      <div class="register">
        <p>Don't have an account? <a href="signup.php">signUp</a></p>
      </div>
    </form>
    </div>
</body>
</html> 