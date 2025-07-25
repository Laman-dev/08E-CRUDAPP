<?php
include 'connection.php';

$id = $_GET['updateid'];

$sql = "select * from `crudapp`.`users` where id=$id";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);
$username =  $row['username'];
$email =  $row['email'];
$password =  $row['password'];


?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Curd App</title>
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
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 350px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
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
  </style>
</head>

<body>


  <div class="form-container">
    <h2><u>Update Data</u></h2>
    <form>
      <label>Username</label>
      <input type="text" name="username" placeholder="Username" required value="<?php echo $username?>" >

      <label>Email</label>
      <input type="email" name="email" placeholder="Email" required value="<?php echo $email?>">

      <label>Password</label>
      <input type="password" name="password" placeholder="Password" required value="<?php echo $password?>">

      <button type="submit">Update</button>
    </form>
  </div>

</body>

</html>