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
6. The RDS replica was created.
7. We have created a dashboard for SQS queue in dashboard.php.
8. Similaryly, We have created cloud watch matrix in dashboard.php.
