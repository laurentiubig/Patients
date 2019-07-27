<?


$con =  mysqli_connect("localhost", "root", "root", "patDB");

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$birthday=$_POST['birthday'];
$notes=$_POST['notes'];
$date = date('m-d-Y');

mysqli_query($con,"INSERT INTO patients(fname,lname,birthday,registeredDate,notes) VALUES('$fname','$lname','$birthday','$date','$notes')");