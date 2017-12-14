<?php
require 'vendor/autoload.php';
$rds = new Aws\Rds\RdsClient([
    'version' => 'latest',
    'region'  => 'us-west-2'
]);
$result = $rds->describeDBInstances(['DBInstanceIdentifier' => 'itmo544-mini-project']);
$endAddress = $result['DBInstances'][0]['Endpoint']['Address'];
$connection = mysqli_connect($endAddress,"kphadatare","hello135","itmo544") or die("Error " . mysqli_error($link));

$dbname = 'itmo544';
$dbuser = 'kphadatare';
$dbpass = 'hello135';

mkdir("/tmp/Backup");
$Bkpspath = '/tmp/Backup/';
$bname = uniqid("DBBackUp", false);
$append = $bname . '.' . sql;
$Path = $Bkpspath . $append;
$sql="mysqldump --user=$dbuser --password=$dbpass --host=$endAddress $dbname > $Path";
exec($sql);
$bucketname = uniqid("dbbackup", false);
$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-west-2'
]);
$result = $s3->createBucket([
    'ACL' => 'public-read',
    'Bucket' => $bucketname,
]);
$result = $s3->putObject([
    'ACL' => 'public-read',
    'Bucket' => $bucketname,
   'Key' => $append,
'SourceFile' => $Path,
]);
mysql_close($link);
echo "Database Backup was successful";
?>
<!DOCTYPE html>
 <meta charset="UTF-8"> 
<html>
<body>
<br>
<br>
<a href="index.php"> Main page</a>
</body>
</html> 

