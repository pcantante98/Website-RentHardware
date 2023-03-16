<?php
  if (isset($_POST['requisitar_submit'])) {

    require 'dbh.inc.php';

    $uidRepeat = $_POST['uidRepeat'];
    $packSelected = $_POST['packSelected'];
    session_start();

    if ($uidRepeat !== $_SESSION['userUid']) {
      header("Location: ../index.php?erro=aluno_nao_corresponde");
      exit();
    }
    else {
      $sql = "SELECT numAluno FROM requisicoes WHERE numAluno=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?erro=erro_sql_select");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "s", $uidRepeat);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
          header("Location: ../index.php?erro=ja_requisitou");
          exit();
        }
        else {
          $sql = "INSERT INTO requisicoes (numAluno, tipoPack) VALUES (?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?erro=erro_sql_insert");
            exit();
          }
          else {
            mysqli_stmt_bind_param($stmt, "ss", $uidRepeat, $packSelected);
            mysqli_stmt_execute($stmt);
            header("Location: ../index.php?sucesso=requisicao");
            exit();
          }
        }
      }
    }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: ../index.php");
  exit();
}
