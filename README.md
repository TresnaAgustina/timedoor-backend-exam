Author & Book Management API Project (Laravel 12)
This is a simple API project built with Laravel 12 to manage Author and Book data. This project is designed as API-first and does not use Vite for frontend asset compilation, so its main focus is on backend functionality.

System Requirements
Ensure your local environment meets the following requirements before you begin:

PHP >= 8.2

Composer version 2.x

A database (MySQL, MariaDB, or PostgreSQL is recommended)

Git

Installation Steps
Follow these steps to get the project running on your local machine.

1. Clone the Repository
Open your terminal or command prompt, then clone this repository to your local directory.

git clone https://github.com/username/project-name.git
cd project-name

(Replace https://github.com/username/project-name.git with your actual repository URL)

2. Install PHP Dependencies
Install all the required Laravel dependencies using Composer. This command will download all libraries listed in composer.json.

composer install

3. Create Environment File (.env)
Copy the .env.example file to a new file named .env. This file will hold all your environment-specific configurations, including database credentials.

cp .env.example .env

4. Generate Application Key
Every Laravel application requires a unique application key for secure encryption. Generate this key with the following Artisan command:

php artisan key:generate

5. Configure the Database
Open the .env file you just created with a text editor and adjust the database configuration to match your local setup.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12_project_db  # Replace with your database name
DB_USERNAME=root                # Replace with your database username
DB_PASSWORD=                    # Replace with your database password (leave blank if none)

Important: Make sure you have already created the database (laravel12_project_db or another name) in your database management system (e.g., via phpMyAdmin, DBeaver, or the command line).

6. Run Database Migrations
Once the database is configured, run the migrations to create all the necessary tables (like authors and books) in your database.

php artisan migrate

7. (Optional) Run Seeders
If the project includes database seeders for populating initial data (dummy data), you can run them with this command:

php artisan db:seed

8. Run the Application
The project is now ready to run! Use Laravel's built-in development server with the following command:

php artisan serve

Your application will be running and accessible at the URL displayed in the terminal, typically:

http://127.0.0.1:8000

You are now ready to start using or developing the API.
