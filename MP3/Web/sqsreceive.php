<?php
require './vendor/autoload.php';
use Aws\Exception\AwsException;
$sqs = new Aws\Sqs\SqsClient([
    'region' => 'us-west-2',
    'version' => 'latest'
]);
try{
    $rcv = $sqs->receiveMessage([
        'MaxNumberOfMessages' => 1,
        'QueueUrl' => 'https://sqs.us-west-2.amazonaws.com/',
        'VisibilityTimeout' => 60,
        'WaitTimeSeconds' => 5
    ]);
    echo 'result is';
    if ($rcv)
        echo "Yes";
    else
        echo "No";
    $rcvhandle = $rcv['Messages'][0]['ReceiptHandle'];
    $rcvuid = $rcv['Messages'][0]['Body'];
    echo $rcvuid;
    echo 'var rcvmsg = \''.$rcvuid.'\';';
    echo 'localStorage.setItem("rcvqueue",rcvmsg);';
    echo '</script>';
    $result = $sqs->deleteMessage([
        'QueueUrl' => 'https://sqs.us-west-2.amazonaws.com/',
        'ReceiptHandle' => $rcvhandle
    ]);
}catch(AwsException $e){
    echo "receive fail";
}
?>