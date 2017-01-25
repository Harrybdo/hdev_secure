# EC2 Server Config
#!/bin/bash
yum update -y
ln -sf /usr/share/zoneinfo/America/New_York /etc/localtime

yum install -y epel-release
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
rpm -Uvh https://mirror.webtatic.com/yum/el6/latest.rpm
rpm -Uvh http://repo.mysql.com/mysql-community-release-el6-5.noarch.rpm

yum install -y nginx php70w php70w-mysql php70w-xml php70w-soap php70w-xmlrpc php70w-mbstring php70w-json php70w-gd php70w-mcrypt php70w-fpm ruby aws-cli

sed -i s'/listen = 127.0.0.1:9000/listen = \/var\/run\/php-fpm\/php-fpm.sock/' /etc/php-fpm.d/www.conf
sed -i s'/listen.allowed_clients = 127.0.0.1/;listen.allowed_clients = 127.0.0.1/' /etc/php-fpm.d/www.conf
sed -i s'/;listen.owner = nobody/listen.owner = nginx/' /etc/php-fpm.d/www.conf
sed -i s'/;listen.group = nobody/listen.group = nginx/' /etc/php-fpm.d/www.conf
sed -i s'/;listen.mode = 0660/listen.mode = 0664/' /etc/php-fpm.d/www.conf
sed -i s'/user = apache/user = nginx/' /etc/php-fpm.d/www.conf
sed -i s'/group = apache/group = nginx/' /etc/php-fpm.d/www.conf
sed -i s'/upload_max_filesize = 2M/upload_max_filesize = 20M/' /etc/php.ini

cd /home/ec2-user
aws s3 cp s3://aws-codedeploy-us-east-1/latest/install . --region us-east-1
chmod +x ./install
./install auto
mkdir .aws
cd .aws
echo '[default]
aws_access_key_id = XXXXXXXXXXXXXXX
aws_secret_access_key = XXXXXXXXXXXXXXX' >credentials
echo '[default]
output = json
region = us-east-1' >config

cd /var/cache
mkdir nginx
cd nginx
mkdir fastcgi_temp

chkconfig nginx on
chkconfig php-fpm on

service nginx start
service php-fpm start




######## ADD THE FOLLOWING TO THE BOTTOM OF PHP-FPM.CONFIG FILE
env[DBNAME] = DBNAME
env[DBUSER] = DBUSERNAME
env[DBPASS] = DBPASSWORD
env[DBHOST] = DBHOSTNAME