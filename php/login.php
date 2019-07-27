<?
session_start();

$con =  mysqli_connect("localhost", "root", "root", "patDB");

$email = $_POST['email'];
$pass = sha1($_POST['pass']);

$data = array();

$getData = mysqli_fetch_object(mysqli_query($con,"SELECT COUNT(id) as c FROM users WHERE email='$email' AND password='$pass' "));
   if ($getData->c == 1){
      $data['error'] = 0;
        $_SESSION['email']=$email;
     }else{
        $data['error'] = 1;
     }

     echo json_encode($data);