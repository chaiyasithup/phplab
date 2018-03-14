<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/styles.min.css"> -->
    <style>
        .login-clean{background:#f1f7fc;padding:80px 0}.login-clean form{max-width:320px;width:90%;margin:0 auto;background-color:#fff;padding:40px;border-radius:4px;color:#505e6c;box-shadow:1px 1px 5px rgba(0,0,0,.1)}.login-clean .illustration{text-align:center;padding:0 0 20px;font-size:100px;color:#f4476b}.login-clean form .form-control{background:#f7f9fc;border:none;border-bottom:1px solid #dfe7f1;border-radius:0;box-shadow:none;outline:0;color:inherit;text-indent:8px;height:42px}.login-clean form .btn-primary{background:#f4476b;border:none;border-radius:4px;padding:11px;box-shadow:none;margin-top:26px;text-shadow:none;outline:0!important}.login-clean form .btn-primary:active,.login-clean form .btn-primary:hover{background:#eb3b60}.login-clean form .btn-primary:active{transform:translateY(1px)}.login-clean form .forgot{display:block;text-align:center;font-size:12px;color:#6f7a85;opacity:.9;text-decoration:none}.login-clean form .forgot:active,.login-clean form .forgot:hover{opacity:1;text-decoration:none}

    </style>
</head>

<body>
    <div class="login-clean">
        <form method="post" style="width:481px;">
            <h2 class="sr-only">Login Form</h2>
            <div class="form-group"><label>Username</label><input class="form-control" type="text" placeholder="Username" name="username"></div>
            <div class="form-group"><label>First Name</label><input class="form-control" type="text" placeholder="first name" name="firstname"></div>
            <div class="form-group"><label>Email</label><input class="form-control" type="email" placeholder="Email" name="email"></div>
            <div class="form-group"><label>Password(twice)</label><input class="form-control" type="password" placeholder="password" name="password">
            <input class="form-control" type="password" placeholder="password" name="password2"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="save">register</button></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="show">All Member</button></div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
class Member{

    function __construct(){
        
    }
    function insert($username,$firstname,$email,$password){
        $con=new mysqli("localhost","root","","lab3");
        if ($con->connect_error) {
            die('Connect Error: ' . $con->connect_error);
        }
        $sql="INSERT INTO member (Username,Firstname,Email,Password)VALUE('$username','$firstname','$email','$password')";
        if($con->query($sql)==TRUE){
            return 1;
        }
        else
            return 0;
    }
    function select(){
        $con=new mysqli("localhost","root","","lab3");
        if ($con->connect_error) {
            die('Connect Error: ' . $con->connect_error);
        }
        $sql="SELECT Username,Firstname,Email FROM member";
        $res = $con->query($sql);
        return $res;
    }
}


$conn = new Member();


if(isset($_POST['save']))
{
    if ($_POST['password']!= $_POST['password2'])
        echo("Password did not match! Try again. ");
    else{
        $username=$_POST['username'];
        $firstname=$_POST['firstname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
    
        if($conn->insert($username,$firstname,$email,$password)==1)
            echo "register success";
        else
            echo "register not success";
    }
}

if(isset($_POST['show']))
{
    $res=$conn->select();

    while($row = $res->fetch_assoc()) {
        echo "username: " . $row["Username"]. "  Name: " . $row["Firstname"]. " Email: " . $row["Email"]. "<br>";
    }
 

}


