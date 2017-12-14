#!/bin/bash

aws autoscaling detach-load-balancers --auto-scaling-group-name itmo-544-as --load-balancer-name krp-elb

aws autoscaling delete-auto-scaling-group --auto-scaling-group-name itmo-544-as --force-delete

aws autoscaling delete-launch-configuration --launch-configuration-name $1

query=`aws ec2 describe-instances  --query 'Reservations[*].Instances[].InstanceId' --filters "Name=instance-state-name, Values=pending" --output text`

aws elb deregister-instances-from-load-balancer --load-balancer-name krp-elb --instances $query

aws elb delete-load-balancer-listeners --load-balancer-name krp-elb --load-balancer-ports 80

aws elb delete-load-balancer --load-balancer-name krp-elb

aws ec2 terminate-instances --instance-ids $query

aws rds delete-db-instance --db-instance-identifier itmo544-mini-project --skip-final-snapshot

aws rds wait db-instance-deleted --db-instance-identifier itmo544-mini-project

aws sns delete-topic --topic-arn krp-sns
aws sns unsubscribe --subscription-arn krp-sns

aws sqs get-queue-url --queue-name krp-sqs


aws s3 rb s3://raw_images_bucket --force
aws s3 rb s3://finished_images_bucket --force