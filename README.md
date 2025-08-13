# Timedoor Backend Exam

## Installation
Here are the steps to install and run this Laravel project:

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/TresnaAgustina/timedoor-backend-exam.git

2. **Enter the Project Folder:**

   ```bash
   cd timedoor-backend-exam

3. **Install Dependencies:**

   ```bash
   composer install

4. **Generate .env file:**

   ```bash
   cp .env.example .env
Note: after generating, set the database credentials according to your local configuration.

5. **Generate app key:**

    ```bash
    php artisan key:generate

6. **Run migrations and seeders:**

   ```bash
   php artisan migrate --seed

8. **Run Server:**

   ```bash
   php artisan serve
