<?


$con =  mysqli_connect("localhost", "root", "root", "patDB");

$id=$_POST['id'];

mysqli_query($con,"DELETE FROM patients WHERE id=$id");