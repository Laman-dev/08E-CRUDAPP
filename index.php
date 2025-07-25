<?php

include 'connection.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `crudapp`.`users` (username, email, password) VALUES ('$username', '$email', '$password')";

    $result = mysqli_query($connect, $sql);

    if($result){

        echo "
              <script> 
                alert('Form has been submitted');
                window.location.href = 'display.php'
              </script>
              ";
              // header('location: display.php');

    }else{
        die(mysqli_connect_error($connect));
    }

    mysqli_close($connect);

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CRUD-APP 08E</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2980b9, #6dd5fa);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      width: 400px;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 95%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      background: #f0f0f0;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #3498db;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background: #2980b9;
    }

     .error {
      border: 2px solid red;
    }
    .error-msg {
      color: red;
      font-size: 0.9em;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

   

<div class="form-container">
  <h2><u>Create Profile Account</u></h2>

  <form method="post" onsubmit="return validateForm();">
    <label>Username</label>
    <input type="text" name="username" id="username" placeholder="Username">
    <div class="error-msg" id="username-error"></div>

    <label>Email</label>
    <input type="email" name="email" id="email" placeholder="Email">
    <div class="error-msg" id="email-error"></div>

    <label>Password</label>
    <input type="password" name="password" id="password" placeholder="Password">
    <div class="error-msg" id="password-error"></div>

    <button type="submit" name="submit">Submit</button>
  </form>
</div>

</body>

<script>
  function validateForm() {
    // Clear all previous errors
    const fields = ['username', 'email', 'password'];
    let isValid = true;

    fields.forEach(function (field) {
      const input = document.getElementById(field);
      const errorDiv = document.getElementById(field + '-error');

      if (input.value.trim() === '') {
        input.classList.add('error');
        errorDiv.textContent = 'This field is required';
        isValid = false;
      } else {
        input.classList.remove('error');
        errorDiv.textContent = '';
      }
    });

    return isValid; // return false will prevent form submission
  }
</script>
</html>
