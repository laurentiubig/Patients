<?

$con =  mysqli_connect("localhost", "root", "root", "patDB");

$email = $_POST['email'];
$pass = sha1($_POST['pass']);

$data = array();

$getData = mysqli_fetch_object(mysqli_query($con,"SELECT COUNT(id) as c FROM users WHERE email='$email' "));
   if ($getData->c == 0){
      mysqli_query($con,"INSERT INTO users(email,password) VALUES('$email','$pass')");
      $data['error'] = 0;

     }else{
        $data['error'] = 1;
     }

     echo json_encode($data);