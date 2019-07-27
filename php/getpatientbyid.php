<?


$con =  mysqli_connect("localhost", "root", "root", "patDB");
$id= $_POST['id'];



echo json_encode(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM patients WHERE id=$id")));