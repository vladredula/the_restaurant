## About The Restaurant

The Restaurant is a web application that displays food and drinks menu extracted by [Web Scraper](https://github.com/vladredula/web_scraper) from a source web page.


## Features

- [DynamoDB as Database driver](#dynamodb-as-database-driver)
- Login and Member Registration
- Forgot Password (Send email password reset link)
- English and Japanese Localization

## DynamoDB as Database driver
I am using [kitar/laravel-dynamodb](https://github.com/kitar/laravel-dynamodb) to setup a DynamoDB based Eloquent model for laravel. In this repo, the package is already setup and installed. For information about the installation and usage, visit [kitar/laravel-dynamodb](https://github.com/kitar/laravel-dynamodb#installation)

### Implementation

#### Table creation
In DynamoDB, create the following tables with the respective partition keys
| Table name | Partition key |
|-|-|
| users | email (String) |
| password_resets | email (String) |

These tables will be used to store our users and password reset tokens.

#### IAM user

Create an IAM user to interact with DynamoDB and attach the policy below:

```json
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Effect": "Allow",
            "Action": [
                "dynamodb:GetItem",
                "dynamodb:PutItem",
                "dynamodb:UpdateItem",
                "dynamodb:DeleteItem",
                "dynamodb:Scan",
                "dynamodb:Query"
            ],
            "Resource": [
                // replace with the arn of the tables you just create
                "arn:aws:dynamodb:ap-northeast-1:705561772438:table/users",
                "arn:aws:dynamodb:ap-northeast-1:705561772438:table/password_resets",
            ]
        }
    ]
}
```

#### Configuration
After creating the IAM user, create an access key and copy it to your `.env` file. Also update the `DB_CONNECTION` to `dynamodb`.

```
DB_CONNECTION=dynamodb
...
# AWS configurations
AWS_ACCESS_KEY_ID="********************"
AWS_SECRET_ACCESS_KEY="****************************************"
AWS_DEFAULT_REGION="ap-northeast-1" 
```

#### To send emails for password reset
Update your `MAIL_*` variables. Generate an App signin password in gmail and paste to your `.env` file along with your email. 
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME= // your email address
MAIL_PASSWORD= 
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS= // your email address
MAIL_FROM_NAME="${APP_NAME}"
```
>Click [here](https://support.google.com/mail/answer/185833?hl=en) to learn how to create a signin app password for your gmail account.