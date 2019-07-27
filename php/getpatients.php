<?
session_start();

$con =  mysqli_connect("localhost", "root", "root", "patDB");

$data = array();
$i = 0;
$result= mysqli_query($con,"SELECT * FROM patients ");
while($getData = mysqli_fetch_array($result)){
    $data[] = $getData;
}
// $getData = mysqli_fetch_object;
// var_dump($getData);die();
// foreach($getData as $patient){
//     $data[$i]['fname'] = $patient->fname;
//     $data[$i]['lname'] = $patient->lname;
//     $data[$i]['birthday'] = $patient->birthday;
//     $data[$i]['registerdDate'] = $patient->registerdDate;
//     $data[$i]['notes'] = $patient->notes;
//     $i++;
// }

echo json_encode($data);