#!/bin/bash

aws ec2 run-instances --count $1 --image-id $2 --key-name $3 --security-group-ids $4 --instance-type t2.micro --user-data file://jekyll-install.sh
query=`aws ec2 describe-instances  --query 'Reservations[*].Instances[].InstanceId' --filters "Name=instance-state-name, Values=pending" --output text`
aws ec2 wait instance-running --instance-ids $query
aws elb create-load-balancer --load-balancer-name jrh-elb --listeners Protocol=HTTP,LoadBalancerPort=80,InstanceProtocol=HTTP,InstancePort=80 --availability-zones us-west-2a 
aws elb register-instances-with-load-balancer --load-balancer-name jrh-elb --instances $query

aws elb apply-security-groups-to-load-balancer --load-balancer-name jrh-elb --security-groups $4

aws elb create-load-balancer-listeners --load-balancer-name jrh-elb --listeners "Protocol=TCP,LoadBalancerPort=4000,InstanceProtocol=TCP,InstancePort=4000"

aws elb create-lb-cookie-stickiness-policy --load-balancer-name jrh-elb --policy-name enable-stickiness-cookie-policy --cookie-expiration-period 60

aws elb set-load-balancer-policies-of-listener --load-balancer-name jrh-elb --load-balancer-port 80 --policy-names enable-stickiness-cookie-policy

