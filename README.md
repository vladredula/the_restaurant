## About The Restaurant

The Restaurant is a web application that displays food and drinks menu extracted by [Web Scraper](https://github.com/vladredula/web_scraper) from a source web page.


## Features

- [DynamoDB as Database driver](#dynamodb-as-database-driver)
- Login and Member Registration
- Forgot Password (Send email password reset link)
- English and Japanese Localization

### DynamoDB as Database driver
I am using [kitar/laravel-dynamodb](https://github.com/kitar/laravel-dynamodb) to setup a DynamoDB based Eloquent model for laravel. For information about the installation and usage, visit [kitar/laravel-dynamodb](https://github.com/kitar/laravel-dynamodb#installation).

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

### Installing the project

Clone the repo locally:

```
git clone https://github.com/vladredula/the_restaurant.git therestaurant
cd therestaurant
```

Setup configuration:

```
cp .env.example .env
```

Open `.env` file and configure the `AWS_*`.

```
# AWS configurations
AWS_ACCESS_KEY_ID="********************"
AWS_SECRET_ACCESS_KEY="****************************************"
AWS_DEFAULT_REGION="ap-northeast-1" 
```
For the authorization token, you can use my sample token to get past api authorization:
```
API_AUTH_TOKEN="therestaurantauthtoken"
```

Update the `MAIL_*` variables. You can use any email service provider that you want but in this case we will use Gmail. Generate an [app password sign in](https://support.google.com/mail/answer/185833?hl=en) for your gmail and paste to your `.env` file along with your email. 
```
# Mail configurations
MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME= // your email address
MAIL_PASSWORD= 
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS= // your email address
MAIL_FROM_NAME="${APP_NAME}"
```

Install PHP dependencies:

```
composer install
```

Install NPM dependencies:

```
npm install
```

Build assets:

```
npm run build
```

Generate application key:

```
php artisan key:generate
```

Run the dev server (the output will give the address):

```
php artisan serve
```

#### That's it!
Now you can visit `http://127.0.0.1:8000` with your browser.

#### Tools used for this project
- [Laravel](https://laravel.com/)
- [Bootstrap](https://getbootstrap.com/)
- [kitar/laravel-dynamodb](https://github.com/kitar/laravel-dynamodb)
- [Ionicons](https://ionic.io/ionicons)
- [lipis/flag-icons](https://github.com/lipis/flag-icons)

#### Deploy to Elastic Beanstalk
On how deploy your application to elastic beanstalk, click [here](./ELASTICBEANSTALK.md)