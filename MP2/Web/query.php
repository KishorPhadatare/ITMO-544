<?php session_start();
header('Location: gallery.php');
require 'vendor/autoload.php';
use Aws\Rds\RdsClient;
$emailId=$_POST['emailId'];
$phoneNo=$_POST['phoneNo'];
$clientConn = RdsClient::factory(array('version' => 'latest','region'  => 'us-west-2'));
$s3 = new Aws\S3\S3Client(['version' => 'latest','region'  => 'us-west-2']);
$result = $client->describeDBInstances(array('DBInstanceIdentifier' => 'itmo544-mini-project',));
$endAddress = $result['DBInstances'][0]['Endpoint']['Address'];
$connection = mysqli_connect($endAddress,"database username","database password","databse name","3306") or die("Error " . mysqli_error($link));
if(mysqli_connect_errno()) {
        printf("Connection failed: %s\n", mysqli_connect_error());
        exit();
}
$name=$_FILES["photo"]["name"];
$tmp=$_FILES['photo']['tmp_name'];
$resultput = $s3->putObject(array('Bucket'=>'initialimagesbucket','Key' =>  $name,'SourceFile' => $tmp,'region' => 'us-west-2','ACL'    => 'public-read'));
$initial_uri = $resultput['ObjectURL'];
$checkingformat=substr($initial_uri, -3);
if($checkingformat == 'png' || $checkingformat == 'PNG'){
    $image_initial=imagecreatefrompng($initial_uri);
}
else{
    $image_initial = imagecreatefromjpeg($initial_uri);
}
if($image_initial && imagefilter($image_initial, IMG_FILTER_GRAYSCALE))
{
    $gray_uploaddir = '/tmp_grayscale/';
    $gray_uploadfile = $gray_uploaddir .  basename($_FILES['photo']['name']);
    imagepng($image_initial, $gray_uploadfile);
}
else
{
    echo 'Conversion to grayscale has failed.';
}
$resultimg = $s3->putObject(array('Bucket' => 'finishedimagesbucket','Key'    =>  basename($_FILES['photo']['name']),'SourceFile' => $gray_uploadfile,
    'ACL' => 'public-read'));
$finishedurl=$resultimg['ObjectURL'];
imagedestroy($image_initial);
$sql = "CREATE TABLE IF NOT EXISTS records
(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(32),
phone VARCHAR(32),
s3_raw_url VARCHAR(200),
s3_finished_url VARCHAR(200),
status INT(1),
receipt BIGINT
)";
$create_table = $conn->query($sql);
if(!($create_table)){
    echo "table insertion error";
}
$stmt = "INSERT INTO records (email,phone,s3_raw_url,s3_finished_url,status,receipt) VALUES ('$email','$phone','$initial_uri','$finishedurl',0,651615)";
if($conn->query($stmt) === FALSE){
    echo "data insert error";
}
$stmt->close();
$conn->close();
?>
