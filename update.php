<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // Consulta SQL direta sem proteção contra SQL injection
    $sql = "UPDATE users SET name='$name', email='$email', age=$age WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-warning m-5 w-25' role='alert'>Usuário alterado com sucesso!</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "<div class='alert alert-danger m-5 w-25' role='alert'>Usuário não encontrado!</div>";
            $conn->close();
            exit;
        }

        $conn->close();
    } else {
        echo "<div class='alert alert-danger m-5 w-25' role='alert'>ID do usuário não fornecido!</div>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class='m-5'>
        <h2>Alterar usuário</h2>
        <?php if (isset($row)): ?>
        <form class="w-25" method="POST" action="update.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" placeholder="Nome completo" required>
                <label for="name">Nome completo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" placeholder="name@example.com" required>
                <label for="email">E-mail</label>
            </div>
            <div class="form-floating">
                <input type="number" class="form-control" name="age" value="<?php echo htmlspecialchars($row['age']); ?>" placeholder="Idade" required>
                <label for="age">Idade</label>
            </div><br>
            <input type="submit" class="btn btn-primary" value="Alterar">
        </form>
        <?php endif; ?><br>
        <a href="index.php" class='btn btn-secondary'>Voltar</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
