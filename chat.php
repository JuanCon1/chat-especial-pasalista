<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: index.php");
  exit();
}
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <a href="users.php" class="back-icon" style="color: #28a745;"><i class="fas fa-arrow-left"></i></a>

        <!-- ES MI ROW DE USUARIO-->
        <?php $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <!-- ES MI IMAGEN DE USUARIO-->
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        
        <div class="details">
          
          <?php echo $row['fname'] ?>
          <span style="color:#FF0000;  ">Escribe a:</span>
        </div>

        <!-- ES EL ROW DEL OTRO USUARIO-->
        <?php
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: users.php");
          exit();
        }
        ?>
        <!-- ES LA IMAGEN DEL OTRO USUARIO-->
        <img src="php/images/<?php echo $row['img']; ?>" alt="">        
        <div class="details">
          <!-------------------------->

          <span>
          <?php echo $row['fname'] . " " . $row['lname'] ?>
          </span>
          <p style="color: #28a745;"><?php echo $row['status']; ?></p>
        </div>

      </header>

      <div class="chat-box">
      </div>
      
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Escribe tu mensaje aquí..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>

</html>