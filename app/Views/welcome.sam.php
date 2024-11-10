<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Kibalanga Framework</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 50px;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #343a40;
        }
        .btn {
            margin-top: 20px;
        }
        code {
            background-color: #f8f9fa;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome to the Kibalanga Framework!</h1>
        <p>Thank you for choosing Kibalanga. To get started with your application, please follow the installation instructions below:</p>

        <h3>Installation Steps</h3>
        <ol>
            <li><strong>Clone the Repository</strong>
                <pre><code>git clone https://github.com/username/kibalanga.git</code></pre>
                <p>Navigate to the cloned directory:</p>
                <pre><code>cd kibalanga</code></pre>
            </li>
            <li><strong>Run the Installation Script</strong>
                <p>This script will create the necessary folders, install Bootstrap, and set up default configuration files:</p>
                <pre><code>php install.php</code></pre>
            </li>
            <li><strong>Configure Database</strong>
                <p>Edit the <code>config/config.php</code> file to set your database credentials:</p>
                <pre><code>
return [
    'db' => [
        'host' => 'localhost',
        'username' => 'your_db_username',
        'password' => 'your_db_password',
        'database' => 'your_db_name',
    ],
];
                </code></pre>
            </li>
            <li><strong>Start the Development Server</strong>
                <p>Run the following command to start your local development server:</p>
                <pre><code>php -S localhost:8000 -t public</code></pre>
                <p>Now, visit <a href="http://localhost:8000">http://localhost:8000</a> in your browser.</p>
            </li>
        </ol>

        <h3>Getting Started</h3>
        <p>You can now start building your app with the Kibalanga framework. For more advanced features like creating models and controllers, use the following CLI commands:</p>
        <ul>
            <li><code>php kibalanga make:model ModelName</code> – Create a new model</li>
            <li><code>php kibalanga make:controller ControllerName</code> – Create a new controller</li>
            <li><code>php kibalanga serve</code> – Start the local development server</li>
        </ul>

        <a href="https://github.com/username/kibalanga" class="btn btn-primary">View Documentation</a>
    </div>

</body>
</html>
