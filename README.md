# Tamagotchi (Laravel)

## How to install

### Pre-requisite
 * Install PHP5.6+ (see https://launchpad.net/~ondrej/+archive/ubuntu/php)
 * Install Laravel (see https://laravel.com/docs/5.3)
 * Install Composer (https://getcomposer.org/download/)
 * Install Node.js (Stable version) (https://github.com/creationix/nvm)
 * Install Gulp (http://gulpjs.com/)
 * Install a Mysql Server
 
### Setting up the app
Installing some libraries needed
```
sudo apt-get install php5.6-mbstring php5.6-xml php5.6-mysql
```
Download the code
```
git clone https://github.com/wuilliam321/tamagotchi_laravel.git
```
Move to the `tamagotchi_laravel` folder
```
cd tamagotchi_laravel/
```
Install composer dependencies, you have to go to pre-requisite link and see how to enable composer
```
composer install
```
This step is for nvm users only (stable)
```
nvm use stable
```
Install node dependencies
```
npm install
npm install --global gulp-cli # Ensure you have gulp installed
```
Create a mysql database named `tamadb`. First log into the mysql shell
```
$ mysql # Use your custom credentials ex: mysql -u root -proot
```
In the mysql shell run:
```
mysql> create database tamadb; 
```
Prepare `.env` file
```
cp .env.example .env
php artisan key:generate
```
Open the `.env` file and change these values with the yours
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tamadb # < HERE GOES YOUR MYSQL DATABASE
DB_USERNAME=root # < HERE GOES YOUR MYSQL USERNAME
DB_PASSWORD=root    # HERE GOES YOUR MYSQL PASSWORD
```
Save and close the file

After install all dependencies you have to run migrations
```
php artisan migrate
```
Fill database with data values
```
php artisan db:seed
```
If you want to clean all data and seed database again use:
```
php artisan migrate:refresh --seed
```
Run:
```
gulp # Every time you change the javascript files
```
And run:
```
php artisan serve
```
Now you can go to:
```
http://localhost:8000/
```
And see the app working
