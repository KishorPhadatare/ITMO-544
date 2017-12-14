<?php
// Include the SDK using the Composer autoloader
require 'vendor/autoload.php';
use Aws\Sns\SnsClient;
$sns = SnsClient::factory(array(
'version' => 'latest',
'region' => 'us-west-2'
));
$topicArn = $sns->createTopic([
'Name' => 'krp-sns',
]);
echo $topicArn;
$topicAttributes = $sns->setTopicAttributes([
'AttributeName'=>'krp-display-sns',
'AttributeValue'=>'krp-snsMetric',
'topicArn'=>$topicResult->get($topicArn['Name']),
]);