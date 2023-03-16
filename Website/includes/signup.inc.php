<?php
  if (isset($_POST['signup_submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $firstName = $_POST['firstN'];
    $lastName = $_POST['lastN'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../admin.php?erro=mail_numAluno_invalidos");
      exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../admin.php?erro=email_invalido");
      exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../admin.php?erro=numAluno_invalido");
      exit();
    }
    else if ($password !== $passwordRepeat) {
      header("Location: ../admin.php?erro=password_nao_corresponde");
      exit();
    }
    else {
      $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../admin.php?erro=erro_sql_select");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
          header("Location: ../admin.php?erro=utilizador_em_uso");
          exit();
        }
        else {
          $sql = "INSERT INTO users (uidUsers, firstNameUser, lastNameUser, emailUsers, pwdUsers) VALUES (?, ?, ?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../admin.php?erro=erro_sql_insert");
            exit();
          }
          else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sssss", $username, $firstName, $lastName, $email, $hashedPwd);
            mysqli_stmt_execute($stmt);
            header("Location: ../admin.php?sucesso=registo");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
else {
  header("Location: ../admin.php");
  exit();
}
