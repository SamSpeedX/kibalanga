<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <div>
        <h1>Profile of <?= htmlspecialchars($user['name']) ?></h1>
        <p>Email: <?= htmlspecialchars($user['email']) ?></p>
        <p>Age: <?= htmlspecialchars($user['age']) ?></p>
    </div>
</body>
</html>
