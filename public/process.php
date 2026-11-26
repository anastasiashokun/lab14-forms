<?php
// public/process.php - Завдання 1 (ручна валідація, без бібліотек)
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Результат</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="result">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name']  ?? '');
    $email = trim($_POST['email'] ?? '');

    $errors = [];

    // Валідація
    if ($name === '') {
        $errors[] = "Поле «Ім'я» не може бути порожнім.";
    }
    if ($email === '') {
        $errors[] = "Поле «Email» не може бути порожнім.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Введіть коректний email.";
    }

    if ($errors) {
        echo "<p class='error'>Виникли помилки:</p><ul>";
        foreach ($errors as $err) {
            echo "<li>" . htmlspecialchars($err) . "</li>";
        }
        echo "</ul>";
        echo "<a href='form.html'>Назад до форми</a>";
    } else {
        echo "<p>Дякуємо, <b>" . htmlspecialchars($name) . "</b>!</p>";
        echo "<p>Ми зв'яжемося з вами на <b>" . htmlspecialchars($email) . "</b>.</p>";
        echo "<a href='form.html'>Назад до форми</a>";
    }
} else {
    echo "Будь ласка, відкрийте <a href='form.html'>форму</a>.";
}
?>
</div>
</body>
</html>