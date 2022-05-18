# identity
Identity is a Portfolio website. I made it using technologies like Html,Css,Javascript,Jquery,Bootstrap,Laravel.I hope you people enjoy it .

## How to run the code
- git clone https://github.com/mahfuz-rahman007/identity.git
- cd identity
- cp .env.example `.env`
- open .env and update DB_DATABASE (database details)
- i didn't create database table by migration .i create it manually.so iam providing database sql file import it on your DMS.
- run : `composer install`
- run : `php artisan key:generate`
- run : `php artisan migrate:fresh --seed`
- run : `php artisan serve`

- Best of luck 


## Credentials
- #### Admin
- username: admin
- password : password
