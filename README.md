![alt text](https://github.com/Awni-Rifai/Affiliate-Marketing-App/blob/main/public/images/Capture.PNG)

This project demos a super affiliate marketing referral system built with Laravel. 
 
 To run the project

- Clone it to your computer.
- Run `composer install` to install application dependencies.
- Copy `.env.example` to `.env`.
- use `cp .env.example .env` 
- Run `php artisan key:generate` to generate an application key.
- Add database credentials to `.env`.
- Run `php artisan migrate` to migrate the database.
- Run `php artisan db:seed RoleSeeder` to seed user roles
- Run `php artisan db:seed DatabaseSeeder` to seed users
- you should run the command above once if you have any error run `php artisan migrate:fresh` then repeat the above 2 commands
- you can see the admin acount ready in DatabaseSeeder.php the account with the role_id 1 is a user account and with role_id 2 admin account



