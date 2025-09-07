<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
  exit();
}
?>

<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form login">
      <a href="" title="Pasalista">
        <img class="mb-8" src="img/Pasalista_img.jpg" alt="Pasalista" width="100%" height="45">
      </a>
      <header>INICIO DE SESIÓN</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Dirección de Correo Electrónico</label>
          <input type="text" name="email" placeholder="Ingresa tu Correo Registrado" required>
        </div>
        <div class="field input">
          <label>Contraseña</label>
          <input type="password" name="password" placeholder="Ingresa tu Contraseña" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Chatear">
        </div>
      </form>
      <div class="link">¿Aún no te has registrado? <a href="registro.php">Regístrate acá</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>

</html>