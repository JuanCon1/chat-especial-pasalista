<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("Location: index.php");
  exit();
}
?>

<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <a href="" title="Pasalista">
        <img class="mb-8" src="img/Pasalista_img.jpg" alt="Pasalista" width="100%" height="45">
      </a>
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
            <p style="display:none;"><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Cerrar Sesión
        </a>
      </header>
      <div class="search" style="margin: -30px 0px 8px 0px;">
  <div style="display:flex; justify-content:center; width:100%;">
    <span style="color: green; font-weight:bold;">
      Busca un usuario para mensajear
    </span>
  </div>
  <input type="text" placeholder="Buscar usuario...">
  <button style="color: green;"><i class="fas fa-search"></i></button>
</div>

      <div class="users-list">
      </div> 
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>