# Add New User Connection
### Connection for S3 and RDS

# Adding a New User in AWS, Setting Up Access Key, and Configuring Permissions for S3 and RDS

This guide explains the process of adding a new user in AWS, setting up an access key, and configuring the necessary permissions to allow the user to connect and upload data to S3 and record it in an RDS MySQL database.

## Table of Contents

- [Create User](#create-user)
    - [Create New Access Token](#create-new-access-token)
    - [Create Custom Permissions with JSON Editor](#create-custom-permissions-with-json-editor)
        - [BkClusterS3Connection](#bkclusters3connection)
        - [BkClusterRDSConnection](#bkclusterrdsconnection)
    - [Create New Role](#create-new-role)
        - [BkClusterS3RdsRole](#bkclusters3rdsrole)
            - [Attach Custom Permissions to Role](#attach-custom-permissions-to-role)
        - [Retrieve RDS Endpoint](#retrieve-rds-endpoint)
        - [Connect to MySQL Database](#connect-to-mysql-database)

## Create User

#### BlackKnightDataSourceUser
---

1. Navigate to the IAM (Identity and Access Management) service in AWS Console.
2. In the left navigation pane, click on "Users".
3. Click the “Add User” button.
4. Enter the user name (e.g., `BlackKnightDataSourceUser`) and select the “Programmatic access” checkbox.
5. Click “Next: Permissions”.
---

### Create Custom Permissions with JSON Editor

#### Permission Name: BkClusterS3Connection

```json
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Effect": "Allow",
            "Action": [
                "s3:PutObject",
                "s3:GetObject",
                "s3:DeleteObject",
                "s3:ListBucket"
            ],
            "Resource": [
                "arn:aws:s3:::mre-bk-data",
                "arn:aws:s3:::mre-bk-data/*"
            ]
        }
    ]
}
```    

1. In the "Set permissions" section, click on “Attach existing policies directly”.
2. Click on “Create policy” and switch to the JSON tab.
3. Enter the JSON for the custom policy `BkClusterS3Connection` (define actions and resources as needed for S3 access).
4. Click on "Review policy".
5. Name the policy `BkClusterS3Connection` and click on “Create policy”.

#### Permission Name: BkClusterRDSConnection

```json
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Effect": "Allow",
            "Action": [
                "rds-db:connect"
            ],
            "Resource": "arn:aws:rds:us-east-1:042681705980:db:bk-reader"
        }
    ]
}
```

1. Follow the same steps as above, but enter the JSON for the custom policy `BkClusterRDSConnection` (define actions and resources as needed for RDS access).
2. Name the policy `BkClusterRDSConnection`.
---


#### Permission Name: BKS3BucketRDSDataAllow
Allow all data communication. 
```json
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Sid": "VisualEditor0",
            "Effect": "Allow",
            "Action": [
                "s3:ListAllMyBuckets",
                "s3:HeadBucket",
                "s3:ListObjects"
            ],
            "Resource": "*"
        },
        {
            "Sid": "VisualEditor1",
            "Effect": "Allow",
            "Action": "s3:*",
            "Resource": [
                "arn:aws:s3:::mre-bk-data/*",
                "arn:aws:s3:::mre-bk-data"
            ]
        }
    ]
}
```

### Create New Access Token 

1. Open user go to Security Credentials section
2. On Access Keys  click on Create access key
3. Select Other, then click on next
4. Enter a description for the key then click on Create access key 

---

### Create New Role

#### Role Name: BkClusterS3RdsRole
Allows RDS and S3 communication for BK Cluster

1. In the IAM dashboard, click on "Roles" in the left navigation pane.
2. Click on “Create role”.
3. Choose the “AWS service” type of trusted entity, and then choose “RDS”.
4. Click “Next: Permissions”.

##### Attach Custom Permissions to Role

1. Search for the `BkClusterS3Connection` and `BkClusterRDSConnection` and `BkClusterS3RdsRole`. policies you created earlier and select them.
2. Also, search for and select the `AmazonRDSDirectoryServiceAccess` and `RDSCloudHsmAuthorizationRole` managed policies.
3. Click “Next: Tags”.
4. (Optional) Add tags as needed.
5. Click “Next: Review”.
6. Click “Create role”.
---

#### Retrieve RDS Endpoint: Use the AWS CLI to retrieve the endpoint for your RDS instance:
```
aws rds describe-db-instances --db-instance-identifier my-mysql-instance
```
#### Connect to MySQL Database
    
Use the MySQL client to connect to your RDS instance. Replace <endpoint> with the endpoint you got in step 4, and <masteruser> and <password> with the master username and password for your RDS instance.

```
mysql -h <endpoint> -u <masteruser> -p
```
#### Run these commands to create a user and add permissions:

```
CREATE USER 'newuser'@'%' IDENTIFIED BY 'password';
```

#### Grant Permissions to the New User:
after creating the user, you need to grant them permissions to access specific databases. To grant all permissions on a database to the new user:

```
GRANT ALL PRIVILEGES ON database_name.* TO 'newuser'@'%';
```

#### Flush Privileges:
After granting the permissions, you need to flush privileges so that the changes take effect:
```
FLUSH PRIVILEGES;
```

#### Exit MySQL Client and Test the Connection:
You can exit the MySQL client and try to connect using the new user to ensure that it was configured correctly.
