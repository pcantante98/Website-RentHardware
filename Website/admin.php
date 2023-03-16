<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>(ADMIN) Requisição de Hardware ESA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/logo_ageal_icon.png">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>

  <a onclick="document.getElementById('open_registo').style.display='block'" class="section branding w3-button w3-mobile w3-green w3-hover-white w3-mobile" style="width:100%"><span class="fa fa-user-plus"></span>&nbsp;&nbsp;Registar Aluno</a>

  <a onclick="document.getElementById('open_requisicoes').style.display='block'" class="section branding w3-button w3-mobile w3-orange w3-hover-white w3-mobile" style="width:100%"><span class="fa fa-box-open"></span>&nbsp;&nbsp;Listar requisições</a>

  <a onclick="document.getElementById('open_comentarios').style.display='block'" class="section branding w3-button w3-mobile w3-black w3-hover-white w3-mobile" style="width:100%"><span class="fa fa-envelope"></span>&nbsp;&nbsp;Listar comentários</a>

  <?php
  if (isset($_GET['erro'])) {
    if ($_GET['erro'] == 'mail_numAluno_invalidos') {
      echo '<div class="section branding w3-center w3-margin-top w3-pale-red w3-mobile">E-mail e número de aluno inválidos!</div>';
    }
    else if ($_GET['erro'] == 'email_invalido') {
      echo '<div class="section branding w3-center w3-margin-top w3-pale-red w3-mobile">E-mail inválido!</div>';
    }
    else if ($_GET['erro'] == 'numAluno_invalido') {
      echo '<div class="section branding w3-center w3-margin-top w3-pale-red w3-mobile">Número de aluno inválido!</div>';
    }
    else if ($_GET['erro'] == 'password_nao_corresponde') {
      echo '<div class="section branding w3-center w3-margin-top w3-pale-red w3-mobile">Password não corresponde!</div>';
    }
    else if ($_GET['erro'] == 'utilizador_em_uso') {
      echo '<div class="section branding w3-center w3-margin-top w3-pale-red w3-mobile">Utilizador em uso!</div>';
    }
  }
  if (isset($_GET['sucesso'])) {
    if ($_GET['sucesso'] == 'registo') {
      echo '<div class="section branding w3-center w3-margin-top w3-pale-green w3-mobile" style="width:100%">Registo com sucesso!</div>';
    }
  }
  ?>

  <!-- REGISTO -->

    <div id="open_registo" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-top w3-light-blue w3-round-large">
        <div class="w3-center" id="close_modal"><br>
          <span onclick="document.getElementById('open_registo').style.display='none'" class="w3-button w3-red w3-display-topright w3-hover-white" title="Fechar Registo">&times;</span>
            <h2 id="titulo_modal">Registar Aluno</h2>
        </div>
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

  <!-- REQUISIÇÕES -->

      <div id="open_requisicoes" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-top w3-light-blue w3-round-large"  style="width:20%">
          <div class="w3-center" id="close_modal"><br>
            <span onclick="document.getElementById('open_requisicoes').style.display='none'" class="w3-button w3-red w3-display-topright w3-hover-white" title="Fechar Requisições">&times;</span>
              <h2 id="titulo_modal" class="w3-center">Requisições</h2>
          </div>
            <div class="w3-section">
              <table class="w3-table-all">
                <thead>
                  <tr class="w3-black">
                    <th>Número do aluno</th>
                    <th>Tipo de Pack</th>
                  </tr>
                </thead>

                <?php
                require 'includes/dbh.inc.php';

                $sql = "SELECT numAluno, tipoPack FROM requisicoes";
                $result = $conn-> query($sql);

                if ($result-> num_rows > 0) {
                  while ($row = $result-> fetch_assoc()) {
                    echo "<tr><td>". $row["numAluno"] ."</td><td>". $row["tipoPack"] ."</td><tr>";
                  }
                  echo "</table>";
                }
                else {
                  echo '<h3 class="w3-center">(Vazio)<h3></table>';
                }
                $conn-> close();
                ?>

            </div>
          </div>
        </div>

  <!-- COMENTÁRIOS -->

  <div class="w3-container">
    <div id="open_comentarios" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-top w3-light-blue w3-round-large"  style="width:85%">
        <div class="w3-center" id="close_modal"><br>
          <span onclick="document.getElementById('open_comentarios').style.display='none'" class="w3-button w3-red w3-display-topright w3-hover-white" title="Fechar Comentários">&times;</span>
          <h2 id="titulo_modal" class="w3-center">Comentários</h2>
        </div>
        <div class="w3-section">
          <table class="w3-table-all">
            <thead>
              <tr class="w3-black">
                <th>Primeiro Nome</th>
                <th>Último Nome</th>
                <th>E-mail</th>
                <th>Assunto</th>
                <th>Mensagem</th>
              </tr>
            </thead>

            <?php
            require 'includes/dbh.inc.php';

            $sql = "SELECT firstNameContact, lastNameContact, mailContact, subjectContact, messageContact FROM contactos";
            $result = $conn-> query($sql);

            if ($result-> num_rows > 0) {
              while ($row = $result-> fetch_assoc()) {
                echo "<tr><td>". $row["firstNameContact"] ."</td><td>". $row["lastNameContact"] ."</td><td>". $row["mailContact"] ."</td><td>". $row["subjectContact"] ."</td><td>". $row["messageContact"] ."</td><tr>";
              }
              echo "</table>";
            }
            else {
              echo '<h3 class="w3-center">(Vazio)<h3></table>';
            }
            $conn-> close();
            ?>

          </div>
        </div>
      </div>
    </div>

</body>

</html>
