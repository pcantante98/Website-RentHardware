<?php

if (isset($_POST['login_submit'])) {

  require 'dbh.inc.php';

  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  $sql = "SELECT * FROM users WHERE uidUsers=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../index.php?erro=sql");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, "s", $mailuid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
      $pwdCheck = password_verify($password, $row['pwdUsers']);
      if($password == false) {
        header("Location: ../index.php?erro=password1");
        exit();
      }
      else if($pwdCheck == true) {
        session_start();
        $_SESSION['userId'] = $row['uidUsers'];
        $_SESSION['userUid'] = $row['uidUsers'];
        $_SESSION['userFirstName'] = $row['firstNameUser'];
        $_SESSION['userLastName'] = $row['lastNameUser'];
        $_SESSION['requisitouPackNum'] = $row['lastNameUser'];

        header("Location: ../index.php?sucesso=login");
        exit();
      }
      else {
        header("Location: ../index.php?erro=password2");
        exit();
      }
    }
    else {
      header("Location: ../index.php?erro=utilizador");
      exit();
    }
  }
}
else {
  header("Location: ../index.php");
  exit();
}
