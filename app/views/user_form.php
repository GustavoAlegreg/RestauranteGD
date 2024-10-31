<!DOCTYPE html>
<html>
<head>
    <title><?php echo $user ? 'Editar Usuario' : 'Agregar Usuario'; ?></title>
</head>
<body>
    <h1><?php echo $user ? 'Editar Usuario' : 'Agregar Usuario'; ?></h1>
    <form method="POST">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?php echo $user ? $user->name : ''; ?>" required placeholder="Nombre">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user ? $user->email : ''; ?>" required placeholder="Email">
        <br><br>
        <input type="submit" value="Guardar">
    </form>
    

</body>
</html>
