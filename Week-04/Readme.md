We started with Vagrant up.
We performed vagrant ssh to connect to vagrant.
As aws configuration was already configured, we created create-env.sh script in order to execute all our scripts.
In create-env.sh script, first we had to run the instances, so we ran the command to create instances as follows:
aws ec2 run-instances --count $1 --image-id $2 --key-name $3 --security-group-ids $4 --instance-type t2.micro --user-data file://jekyll-install.sh
Here we created another jekyll-install.sh script to install jekyll, apache, ruby.
Then we intialized a variable named query to get the instance information whose values are in pending state.
We run wait command to halt the running instances & which we obtained from query variable.
We created load balancer according to availability time zones.
We added security groups to load balancer.
We created load balancer listeners for TCP protocol & for 4000 ports.
Now cookie stickiness policy was created for load balancer.
We set the load balancer policy listeners to enable cookie stickiness policy.
Then we created another destroy-env.sh file.
In this file we destroyed load balancers, ec2 isntances etc.
![Amazon Console](https://github.com/illinoistech-itm/kphadatare/blob/master/ITMO-544/images/Jekyll%20Installation.PNG)
