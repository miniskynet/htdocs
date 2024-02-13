<?php

require_once 'model.php';
require_once 'controller.php';

$model = new Model();
$controller = new Controller($model);

$id = isset($_POST['user_id']) ? $_POST['user_id'] : null;

if (isset($_POST['submit'])) {
    $users = $controller->getUsers($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Example</title>
</head>
<body>

<h1>User Details</h1>

<form method="post" action="index.php">
    <label for="user_id">Enter User ID:</label>
    <input type="text" id="user_id" name="user_id" required>
    <button type="submit" name="submit">Get Details</button>
</form>

<?php if (isset($_POST['submit']) && $users): ?>
    <h2>User Details:</h2>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user['name'] ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>
