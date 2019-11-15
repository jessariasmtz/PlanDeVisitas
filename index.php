<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="icon" href="img/tab-icon.png">
  <title>Visitas - Login</title>
</head>

<body>
  <main class="contenedor">
    <h1 id="page-titulo">Sistema de Visitas a Clientes</h1>

    <div id="login-contenedor">
      <div>
        <h1 id="login-titulo">Iniciar Sesión</h1>
      </div>

      <div>
        <img src="img/logo.png" alt="logo" id="login-logo">
      </div>

      <div>
        <form action="app/models/Login.php" id="login-form" method="POST">
          <label for="email">Correo</label>
          <input type="email" name="mail" required placeholder="ejemplo@correo.com" />

          <label for="pass">Contraseña</label>
          <input type="password" name="pass" required />

          <button type="submit">Ingresar</button>
        </form>
      </div>
    </div>
  </main>
</body>

</html>