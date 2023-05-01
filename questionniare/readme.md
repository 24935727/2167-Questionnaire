Steps to run the program:
1. set up a database with the name "questionnaire"
2. Run command "composer install" 
3. Make a copy of the .env.example and change the information inside to match the IP of your database as well as the username, password then rename the file to .env
4. Seed the database using "php artisan db:seed"
5. to run tests use "php vendor/bin/codecept run acceptance"

Only dependancies in the project are codeception, Laravel collective and laravel ui