## Deploying your application to AWS Elastic Beanstalk

### Preparing files
Before anything else, we need to create a zip file to upload to our elastic beanstalk later.
- inside your project folder, select all the files and folders except the `vendor folder`.
- right click an select `Compress` to create a zip file.

### Setting-up EB
> You need to create an EC2 Key pair beforehand if you don't have existing key pair

#### Configure Environment
- On your AWS console, go to Elastic Beanstalk and click `Create application`.
- Select `Web server environment`
- Application name: `TheRestaurant`
- Environment name: `TheRestaurant-env`
- Platform
    - Platform type: `Managed platform`
    - Platform: `PHP`
- Application Code
    - Select `Upload your code`
    - Type `1` in Version label.
    - Click on `Local file` and upload the zip file that you have created earlier.
- Presets: `Single instance (free tier eligible)`
- Click `Next` button

#### Service access
- Select `Create and use new service role` or choose `Use an existing service role` and select the existing roles you have.
- In the `EC2 key pair` select your existing Key Pair and click the `Next` button.

#### Set up networking, database, and tags
- Don't change anything in this page, you can leave it as it is because we are not going to use any of it.
- Just click `Next`

#### Configure instance traffic and scaling
- Same on this page, leave with the defaults and click `Next`.

#### Configure updates, monitoring, and logging
- Health reporting: `Basic`
- Uncheck `Activated` under Managed updates.
- Platform Software
    - Proxy server: `Nginx`
    - Document root: `/public`
- Leave other items on default
- Scroll down and click `Next`

#### Review
- Review items and click `Submit`

Elastic Beanstalk will now load up your environment and deploy an EC2 instance with your project in it.


## EC2
After the environment is launched, you still need to configure the `Nginx` and create your application `.env` file.
- Go to EC2, and click `Instances`.
- Select the Instance ID with the environment name `TheRestaurant-env`.
- Click `Connect` located on the upper right.
- Follow the instructions under `SSH client` and connect to your instance using its Public DNS.

example:
```
ssh -i "your-key-pair.pem" ec2-user@ec2-12-34-56-78.ap-northeast-1.compute.amazonaws.com
```

Once you are connected, navigate to where your project is located:
```
cd /var/www/html/
```
> if you do `ls` command, you should see your all project files.

make a `.env` file and edit it using nano.
```
sudo touch .env
sudo nano .env
```
copy and paste the contents from your `local .env` file.
press `ctrl + x` and press `y` to save changes and hit `Enter` to exit the editor.

#### Nginx
Now that you have created the `.env` file, we now need to modify `Nginx` settings.
```
cd ~
cd /etc/nginx/conf.d/elasticbeanstalk/
```
make a `laravel.conf` file and open it
```
sudo touch laravel.conf
sudo nano laravel.conf
```
and paste the code below:
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```
save the changes and restart nginx:
```
sudo systemctl restart nginx.service
```

And that's it. If you go to the domain of your elastic beanstalk environment, your application should be able to run.