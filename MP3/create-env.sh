#!/bin/bash

aws rds create-db-instance --db-name itmo544 --db-instance-identifier itmo544-mini-project --allocated-storage 20 --db-instance-class db.t2.micro --engine mysql --master-username kphadatare --master-user-password hello135 --availability-zone us-west-2a

aws rds wait db-instance-available --db-instance-identifier itmo544-mini-project

aws sns set-topic-attributes --topic-arn krp-sns --attribute-name krp-display-sns --attribute-value krp-snsMetric

aws sns subscribe --topic-arn krp-sns --protocol email --notification-endpoint kphadatare@hawk.iit.edu

aws sqs create-queue --queue-name krp-sqs

aws s3 mb s3://initial-images-bucket --region us-west-2
aws s3 mb s3://finished-images-bucket --region us-west-2

aws ec2 run-instances --count $1 --image-id ami-6e1a0117 --key-name $2 --security-group-ids $3 --instance-type t2.micro --iam-instance-profile Name=$4 --user-data file://install-app-env.sh

 query=`aws ec2 describe-instances  --query 'Reservations[*].Instances[].InstanceId' --filters "Name=instance-state-name, Values=pending" --output text`

aws ec2 wait instance-running --instance-ids $query

aws elb create-load-balancer --load-balancer-name krp-elb --listeners "Protocol=HTTP,LoadBalancerPort=80,InstanceProtocol=HTTP,InstancePort=80" --availability-zones us-west-2a --security-groups $3

aws elb register-instances-with-load-balancer --load-balancer-name krp-elb --instances $query

aws elb create-lb-cookie-stickiness-policy --load-balancer-name krp-elb --policy-name enable-stickiness-cookie-policy --cookie-expiration-period 60

aws elb set-load-balancer-policies-of-listener --load-balancer-name krp-elb --load-balancer-port 80 --policy-names enable-stickiness-cookie-policy

aws autoscaling create-launch-configuration --launch-configuration-name $5 --image-id ami-6e1a0117 --key-name $2 --instance-type t2.micro --user-data file://install-app-env.sh --security-groups $3 --iam-instance-profile Name=$4

aws autoscaling create-auto-scaling-group --auto-scaling-group-name itmo-544-as --launch-configuration-name $5 --availability-zones us-west-2a --min-size 0 --max-size 5 --desired-capacity 1

aws autoscaling attach-instances --instance-ids $query --auto-scaling-group-name itmo-544-as

aws autoscaling attach-load-balancers --load-balancer-names krp-elb --auto-scaling-group-name itmo-544-as

aws cloudwatch put-metric-alarm --alarm-name cpu-ma --alarm-description "Alarm when CPU exceeds 30 percent" --metric-name CPUUtilization --namespace AWS/EC2 --statistic Average --period 300 --threshold 30 --comparison-operator GreaterThanOrEqualToThreshold  --dimensions  Name=autoscaling,Value=itmo-544-as --evaluation-periods 3 --alarm-actions arn:aws:sns:us-west-2:111122223333:MyTopic --unit Percent

aws cloudwatch put-metric-alarm --alarm-name cpu-mi --alarm-description "Alarm when CPU below 10 percent" --metric-name CPUUtilization --namespace AWS/EC2 --statistic Average --period 300 --threshold 10 --comparison-operator LessThanOrEqualToThreshold  --dimensions  Name=AutoScalingGroupName,Value=itmo544-autoscaling-2 --evaluation-periods 3 --alarm-actions arn:aws:sns:us-west-2:111122223333:MyTopic --unit Percent
