<?php
require 'vendor/autoload.php';
$sqs = new Aws\Sns\SnsClient([
    'version' => 'latest',
    'region'  => 'us-east-2'
]);
$result = $sqs->listTopics([
    
]);
print_r ( $result['Topics']);
$topicarn = $result['Topics'][0]['TopicArn'];
echo "Your Topic ARN: " . $topicarn . "\n";
$subscriberesult = $sqs->subscribe([
    'Endpoint' => 'kphadatare@iit.edu',
    'Protocol' => 'email',
    'TopicArn' => $topicarn,
]);
// add the + sign for to make sms work in front of phone number
$subscriberesult = $sqs->subscribe([
    'Endpoint' => '+13128689905',
    'Protocol' => 'sms',
    'TopicArn' => $topicarn,
]);
//List S3 buckets
$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-west-2'
]);
$listbucketresult = $s3->listBuckets([
    ]);
echo "\n";
print_r ($listbucketresult['Buckets']);
echo $listbucketresult['Buckets'][0]['Name'] . "\n";
$bucketname = $listbucketresult['Buckets'][0]['Name'];
$listobjectresults = $s3->listObjects([
    'Bucket' => $bucketname,
    'MaxKeys' => 2,
]);
print_r($listobjectresults);
$s3url = $bucketname."/".$listobjectresults['Contents'][0]['Key'];
//$s3url = "NA";
// AWS S3 base URL 
$url = "https://sqs.us-west-2.amazonaws.com/344118653102/krp-sqs".$s3url;
// Publsih a message
$publishresult = $sqs->publish([
    'Message' => "Hello World -- its a bit rainy -- try this $url", // REQUIRED
    'Subject' => 'Contact from ITMO-544',
    'TopicArn' => $topicarn
]);
?>