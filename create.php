<?php
include 'db.php';
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "INSERT INTO users (name, email, age) VALUES ('$name', '$email', $age)";
    
    if ($conn->query($sql) === TRUE) {
        $success = true;
        echo "<div class='alert alert-success m-5 w-25' role='alert'>Usuário cadastrado com sucesso!</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class='m-5'>
        <h2>Cadastrar usuário</h2>
        <?php if (!$success): ?>
            <form class="w-25" method="POST" action="create.php">
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="name" placeholder="nome" required>
                    <label>Nome completo</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="email" name="email" placeholder="email" required>
                    <label>E-mail</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" type="number" name="age" placeholder="idade" required>
                    <label>Idade</label>
                </div><br>
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </form>
        <?php endif; ?><br>
        <a href='index.php' class='btn btn-secondary'>voltar</a>
    </div>
</body>
</html>
