<?


$con =  mysqli_connect("localhost", "root", "root", "patDB");
$id= $_POST['mid'];
$fname=$_POST['mfname'];
$lname=$_POST['mlname'];
$birthday=$_POST['mbirthday'];
$notes=$_POST['mnotes'];
$date = $_POST['mregisteredDate'];

mysqli_query($con,"UPDATE patients SET fname='$fname',lname='$lname',birthday='$birthday',registeredDate='$date',notes='$notes' WHERE id = $id");