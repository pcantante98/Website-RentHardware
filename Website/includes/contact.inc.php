<?php
  if (isset($_POST['contacto_submit'])) {

    require 'dbh.inc.php';

    $pNome = $_POST['pnomeContacto'];
    $uNome = $_POST['unomeContacto'];
    $email = $_POST['emailContacto'];
    $assunto = $_POST['assuntoContacto'];
    $mensagem = $_POST['mensagemContacto'];

    if (!preg_match("/^([a-zA-Z' ]+)$/", $pNome) || !preg_match("/^([a-zA-Z' ]+)$/", $uNome)) {
      header("Location: ../index.php?erro=nome_invalido");
      exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../index.php?erro=email_invalido");
      exit();
    }
    else {
      $sql = "INSERT INTO contactos (firstNameContact, lastNameContact, mailContact, subjectContact, messageContact) VALUES (?, ?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?erro=erro_sql_insert");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "sssss", $pNome, $uNome, $email, $assunto, $mensagem);
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php?sucesso=envio");
        exit();
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
else {
header("Location: ../index.php");
exit();
}
