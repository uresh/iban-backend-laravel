# IBAN Backend (Laravel)

This is the backend API for the IBAN validation web application. It provides services for user registration, IBAN validation, and admin functionalities.

## Technologies Used

- Laravel: The backend framework for building robust APIs.
- MySQL (or your preferred database): To store user data and validated IBAN numbers.

## Setup

1. **Clone the Repository**: 

   ```shell
   https://github.com/uresh/iban-backend-laravel.git

2. Install Dependencies:

   ```shell
   composer install
   
3. Database Configuration:
   - Create a new MySQL database.
   - Copy the .env.example file to .env and update the database connection details:
   
   ```shell
   DB_CONNECTION=mysql
   DB_HOST=your_db_host
   DB_PORT=your_db_port
   DB_DATABASE=your_db_name
   DB_USERNAME=your_db_username
   DB_PASSWORD=your_db_password
   
4. Run database migrations to create the necessary tables:
   
   ```shell
   php artisan migrate
   
5. Seed the database with the admin user:
   
   ```shell
   php artisan db:seed --class=AdminUserSeeder

  - #### This will create an admin user with the following credentials:

    - Email: admin@example.com
    - Password: admin@123

6. Generate Application Key:
   
   ```shell
   php artisan key:generate
   
7. Start the Server:
   
   ```shell
   php artisan serve
   
The API will be available at http://localhost:8000.
- If you prefer to use a localhost web server like XAMPP, WAMP, or MAMP:

    - Place the project files in the web server's document root directory.
    - Configure your web server to use the public directory as the entry point.
    - Start the web server.
      
- For example, with XAMPP:

    - Place the project in C:\xampp\htdocs\iban-backend-laravel (on Windows).
    - Access the API at http://localhost/iban-backend-laravel/public.
 
### API Endpoints
- POST /api/signup: User registration.
- POST /api/login: User login.
- POST /api/ibans: Validate an IBAN number.
- GET /api/ibans: Retrieve a paginated list of IBAN numbers (Admin access required).
  
### License
This project is licensed under the MIT License.
