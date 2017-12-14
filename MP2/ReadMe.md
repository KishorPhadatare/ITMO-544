1. Copied all the following files in vagrant directory:
   - create-env.sh: File contains all the create instance commands.
   - destroy-env.sh: File contains all the destroy commands
   - install-app-env.sh: File contains all the executable file commands.

2. Run the 'create-env.sh' file to create environment with following parameters:
  - $1 is count for number of instances
  - $2 is key-pair name
  - $3 is security-group ID
  - $4 is IAM instance profile name
  - $5 is desired launch configuration name
3. When the instance is launched, copy the public DNS server address & paste it in the browser. 
4. To access index.php, gallery.php files, use'/filename'.
5. Once the instances are launched & operation is performed correctly, use destroy file to destroy the instances.
   - $1 is given launch configuration name while creating
6. The code Deploy key has been updated in install-app-env.sh file.
7. The webserver, database connected & aws-sdk is deployed.
8. The SQS create command has been added in create-env.sh shell script which communicates with SQSsend.php & SQSreceive.php files.
9. The SNS create command has also been added to create-env.shell script which communicates with sns.php file.
10. The second backend image has been created & permissions were given to account number 548002151864 to access it.
11. The introspection information has been mentioned in introspection.php file.
12. The file provides the information about backup system which was created using ec2 instance, RDs & s3 bucket.
12. Once the image is uploaded & processed, the user receives the notification message about the same.
