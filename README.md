# Kibalanga PHP Framework

**Kibalanga** is a simple, secure, and lightweight PHP framework designed to help developers quickly build scalable web applications. It provides an easy-to-use structure for creating MVC-based applications with a focus on security, performance, and extendability.

## Features
- **MVC Architecture**: A simple and clean structure to organize your application into Models, Views, and Controllers.
- **Database Layer**: A secure and easy-to-use MySQL database layer with PDO and prepared statements.
- **CLI Tools**: Command-line tools to help you scaffold and manage your application.
- **Environment Configuration**: Support for `.env` files to manage environment settings like database credentials.
- **Security**: Secure password hashing and authentication using bcrypt.
- **Customizable Routing**: Easily define your application routes with flexible routing options.
- **Session Management**: Simplified session handling to store user data securely.

## Installation

### Prerequisites
Before installing **Kibalanga**, make sure you have the following software installed on your machine:
- **PHP** (7.4 or higher)
- **Composer** (dependency manager for PHP)
- **MySQL** or **MariaDB** (for database management)
- A web server like **Apache** or **Nginx**

### Steps to Install

1. **Fork or Clone the repository**:

   If you haven't already, [ Fork ](https://github.com/SamTechnologyTz/kibalanga/fork) and clone the repository:

   ```bash
   git clone https://github.com/SamTechnologyTz/kibalanga
   cd kibalanga
   ```

2. **Install dependencies**:

   Run the following command to install required PHP packages using Composer:

   ```bash
   composer install
   ```

3. **Configure your environment**:

   - Copy the `.env.example` file to `.env`:

     ```bash
     cp .env.example .env
     ```

   - Open the `.env` file and update the database credentials:
     ```env
     DB_HOST=127.0.0.1
     DB_DATABASE=kibalanga
     DB_USERNAME=root
     DB_PASSWORD=
     ```

4. **Create the database**:

   Create a new MySQL database (e.g., `kibalanga`) for your application.

   Example:
   ```sql
   CREATE DATABASE kibalanga;
   ```

5. **Run migrations** (optional):

   If your application has migrations, you can run them to create the necessary tables in your database:
   
   ```bash
   php kibalanga migrate
   ```

6. **Set file permissions** (Linux/Unix users):

   Ensure that your application can write to the necessary directories (like `storage/` and `bootstrap/cache/`):

   ```bash
   chmod -R 775 storage/
   chmod -R 775 bootstrap/cache/
   ```

7. **Set up your web server**:

   If you're using Apache or Nginx, configure your web server to point to the `public/` directory.

   Example Apache configuration:
   ```apache
   <VirtualHost *:80>
       ServerName kibalanga.local
       DocumentRoot /path/to/kibalanga/public
       <Directory /path/to/kibalanga/public>
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```

8. **Access your application**:

   Open your web browser and go to `http://localhost` or `http://kibalanga.local` (if you set up a local domain).

## Usage

- **Run the Application**: The framework uses standard MVC architecture. Create your controllers, models, and views as needed.
- **CLI Tools**: You can use CLI tools to create models, controllers, and more. Example:
  
  ```bash
  php kibalanga-cli make:model User
  php kibalanga-cli make:controller AuthController
  ```

- **Authentication**: The framework supports user registration and login. Simply use the `AuthController` for handling user authentication.

## Directory Structure

Here is an overview of the directory structure:

```
/kibalanga
│
├── /app
│   ├── /Controllers
│   ├── /Models
│   └── /Views
│
├── /public
│   └── index.php       # Entry point for the web application
│
├── /config
│   └── config.php      # Configuration file for routing, etc.
│
├── /core            # Logs, sessions, and other writable files
│   ├── /
│   ├── /
│   └── /
├── .env                # Environment configuration
├── .env.example
├── composer.json
├── bootstrap.php
├── install
└── kibalanga                
```

## Example Code

### Create a New Controller

```bash
php kibalanga-cli make:controller UserController
```

This will generate a new controller file inside the `/app/Controllers` directory.

### Create a New Model

```bash
php kibalanga-cli make:model User
```

This will generate a new model file inside the `/app/Models` directory.

### Example: User Authentication

- **Registration**: Use the `AuthController@register` method to register new users.
- **Login**: Use the `AuthController@login` method for authenticating users.

```php
$user = new UserModel();
$user->register('Sam Ochu', 'sam@example.com', 'password123');
```

## Security Features

- **Password Hashing**: User passwords are securely hashed using `password_hash()` and validated with `password_verify()`.
- **Session Management**: User sessions are managed securely to keep users logged in.

## Contributing

We welcome contributions to improve **Kibalanga**! If you want to contribute, follow these steps:

1. Fork the repository.
2. Clone your forked repository locally.
3. Create a new branch for your changes.
4. Make the necessary changes and commit them.
5. Push your changes and open a pull request.

Please ensure that your code adheres to the PHP coding standards and that all tests pass before submitting a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

---

