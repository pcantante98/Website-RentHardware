<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Requisição de Hardware (Registos ADMIN) ESA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>



</style>

  <!-- REGISTO -->
  <div class="w3-container">
      <div id="card-registo" class="w3-card-4 w3-animate-zoom w3-light-blue w3-round-large" style="max-width:600px">
        <div class="w3-center"><br>
          <h2 id="titulo_modal">Registo do Aluno</h2>
        </div>

        <div class="w3-section">
          <form class="w3-container" action="includes/signup.inc.php" method="post">
            <label><b>Número de Aluno (ESA)</b></label>
            <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" name="uid" placeholder="#Aluno" required>
            <label><b>Primeiro Nome</b></label>
            <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" name="firstN" placeholder="Exemplo: João" required>
            <label><b>Último Nome</b></label>
            <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" name="lastN" placeholder="Exemplo: Silva" required>
            <label><b>E-mail</b></label>
            <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" name="mail" placeholder="exemplo@gmail.com" required>
            <label><b>Password</b></label>
            <input class="w3-input w3-border w3-round-large" type="password" placeholder="************" name="pwd" required>
            <label><b>Repetir a password</b></label>
            <input class="w3-input w3-border w3-round-large" type="password" placeholder="************" name="pwd-repeat" required>
            <button class="w3-button w3-block w3-green w3-section w3-padding w3-round-large w3-center w3-hover-black" type="submit" name="signup_submit">Registar</button>
          </form>
        </div>
      </div>
    </div>

</body>

</html>
