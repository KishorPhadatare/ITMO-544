<?php
require './vendor/autoload.php';
use Aws\Exception\AwsException;
$sqs = new Aws\Sqs\SqsClient([
    'region' => 'us-west-2',
    'version' => 'latest'
]);
try{
    $result = $sqs->sendMessage([
        'DelaySeconds' => 30,
        'MessageBody' => $_GET['source'],
        'QueueUrl' => '	https://sqs.us-west-2.amazonaws.com/'
    ]);
    echo 'result is';
    if ($result)
        echo "Yes";
    else
        echo "No";
}catch(AwsException $e){
    echo "send fail";
}
?>