#!/bin/bash
query=`aws ec2 describe-instances  --query 'Reservations[*].Instances[].InstanceId' --filter "Name=instance-state-name,
Values=running" --output text`


aws elb deregister-instances-from-load-balancer --load-balancer-name jrh-elb --instances $query


aws elb delete-load-balancer-listeners --load-balancer-name jrh-elb --load-balancer-ports 80 4000


aws elb delete-load-balancer --load-balancer-name jrh-elb


aws ec2 terminate-instances --instance-ids $query

