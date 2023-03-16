<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Requisição de Hardware ESA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/logo_ageal_icon.png">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
  <!-- BARRA DE NAVEGAÇÂO -->
  <div class="w3-top">
    <div class="w3-bar w3-light-blue">
      <a href="index.php">
      <span id="home-button-logo" class="branding w3-light-blue w3-bar-item w3-button w3-mobile w3-hover-white">
        <img src="img/logo_ageal.png" height="41px">&nbsp;&nbsp;&nbsp;
        <span class="fa fa-home"></span>&nbsp;&nbsp;&nbsp;Bem-vindo à Requisição de Hardware ESA
          <?php echo (!empty($_SESSION ['userFirstName'])) ? $_SESSION ['userFirstName'] : '';
                echo '&nbsp;';
                echo (!empty($_SESSION ['userLastName'])) ? $_SESSION ['userLastName'] : '';
          ?>!&nbsp;&nbsp;&nbsp;&nbsp;
      </span>
    </a>

      <span class="w3-mobile">
        <?php
          if (isset($_SESSION['userId'])) {
            echo '<form action="includes/logout.inc.php" method="post">
                    <button class="w3-bar-item w3-red branding w3-hover-white w3-button w3-right w3-mobile"><span class="fas fa-sign-out-alt"></span>&nbsp;&nbsp;Logout</button>
                  </form>';
            echo '<a onclick="document.getElementById(';
            echo "'open_requisicao').style.display='block'";
            echo '" class="w3-bar-item w3-orange branding w3-hover-white w3-button w3-right w3-mobile" href="#requisicao"><span class="fa fa-desktop"></span>&nbsp;&nbsp;Requisitar Agora!</a>';
          }
          else {
            echo '<a onclick="document.getElementById(';
            echo "'open_login').style.display='block'";
            echo '" class="branding w3-bar-item w3-button w3-mobile w3-green w3-hover-white w3-right w3-mobile" href="#login"><span class="fa fa-sign-in-alt"></span>&nbsp;&nbsp;Login do Aluno</a>';
          }

          if (isset($_GET['erro'])) {
            if ($_GET['erro'] == 'password1' || $_GET['erro'] == 'password2') {
              echo '<button class="w3-bar-item w3-red branding w3-right w3-mobile w3-margin-right">Password incorreta!</button>';
            }
            else if ($_GET['erro'] == 'utilizador') {
              echo '<button class="w3-bar-item w3-red branding w3-right w3-mobile w3-margin-right">Utilizador incorreto!</button>';
            }
            else if ($_GET['erro'] == 'nome_invalido') {
              echo '<button class="w3-bar-item w3-red branding w3-right w3-mobile w3-margin-right">Nome(s) inválido!</button>';
            }
            else if ($_GET['erro'] == 'email_invalido') {
              echo '<button class="w3-bar-item w3-red branding w3-right w3-mobile w3-margin-right">E-mail inválido!</button>';
            }
            else if ($_GET['erro'] == 'aluno_nao_corresponde') {
              echo '<button class="w3-bar-item w3-red branding w3-right w3-mobile w3-margin-right">Número de aluno não corresponde!</button>';
            }
            else if ($_GET['erro'] == 'ja_requisitou') {
              echo '<button class="w3-bar-item w3-yellow branding w3-right w3-mobile w3-margin-right">Já atingiu o número máxmo de requisições!</button>';
            }
          }
          if (isset($_GET['sucesso'])) {
            if ($_GET['sucesso'] == 'login') {
              echo '<button class="w3-bar-item w3-green branding w3-right w3-mobile w3-margin-right">Login com sucesso!</button>';
            }
            else if ($_GET['sucesso'] == 'logout') {
              echo '<button class="w3-bar-item w3-yellow branding w3-right w3-mobile w3-margin-right">Logout com sucesso!</button>';
            }
            else if ($_GET['sucesso'] == 'envio') {
              echo '<button class="w3-bar-item w3-blue branding w3-right w3-mobile w3-margin-right">Envio com sucesso!</button>';
            }
            else if ($_GET['sucesso'] == 'requisicao') {
              echo '<button class="w3-bar-item w3-green branding w3-right w3-mobile w3-margin-right">Requisição com sucesso!</button>';
            }
          }
        ?>
      </span>
    </div>
  </div>

  <!-- APRESENTAÇÂO INICIAL -->

  <section class="showcase">
    <div class="w3-container w3-center">
      <h1 class="w3-animate-opacity">Requisição de material informático ESA</h1>
      <hr id="thick_hr">
      <p>Bem-vindo ao website de requisição de material informático da Escola Secundária de Alcochete,
        onde todos os alunos da ESA têm a oportunidade de obter equipamento informático para satisfazerem
        as suas necessidades educativas.</p>

      <!-- SLIDESHOW -->
      <div id="slideshow" class="w3-content w3-section">
        <img id="slide" class="mySlides w3-animate-fading" src="img/computer_classroom1.jpg">
        <img id="slide" class="mySlides w3-animate-fading" src="img/computer_classroom2.jpg">
      </div>

      <script>
        var index = 0;
        autoslides();

        function autoslides() {
          var i;
          var x = document.getElementsByClassName("mySlides");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          index++;
          if (index > x.length) {
            index = 1
          }
          x[index - 1].style.display = "block";
          setTimeout(autoslides, 8000);
        }
      </script>
    </div>
  </section>

  <!-- FUNÇÂO ACCORDION -->
  <script>
    function accordionFunction(id) {
      var x = document.getElementById(id);
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }
  </script>

  <!-- SECçÂO 1 -->
  <section class="section w3-mobile">
    <div class="w3-container">

      <!-- BOTÕES ACCORDION -->
      <div class="w3-col m6" id="coluna_accordion">
        <div>
          <button onclick="accordionFunction('quem')" class="w3-button w3-large w3-mobile w3-light-blue w3-round-xlarge w3-card-4 w3-hover-black" width="20px">Quem pode requisitar?</button>
          <div id="quem" class="w3-container w3-hide w3-white w3-animate-top w3-round-xlarge">
            <p>A requisição de material informático ESA está disponível
              para qualquer aluno que frequente a "Escola Secundária de Alcochete".</p>
            <p>O equipamento informático só pode ser requisitado e usado por alunos da "Escola
              Secundária de Alcochete".
          </div>
        </div>

        <div>
          <button onclick="accordionFunction('como')" class="w3-button w3-large w3-mobile w3-light-blue w3-round-xlarge w3-card-4 w3-hover-black">Como requisitar?</button>
          <div id="como" class="w3-container w3-hide w3-white w3-animate-top w3-round-xlarge">
            <ol>
              <li>Dirigi-te ao balcão do PBX da ESA e pede que te registem no site, fornece os teus dados:
                <ul>
                  <li>Apresentação do cartão da escola;</li>
                  <li>Primeiro Nome;</li>
                  <li>Último Nome;</li>
                  <li>E-mail;</li>
                  <li>Password pretendida.</li>
                </ul>
              </li>
              <li>Após o PBX enviar um e-mail de confirmação de registo, pode entrar no site com o número de aluno e password;</li>
              <li>Após o login, aceda ao formulário de requisição a partir do botão laranja no topo direito do site ("Requisitar Agora!");</li>
              <li>Quando ler as características e decidir qual o Pack ideal, escolha 1 dos 3 na lista, reinsira o número de aluno no campo pedido e clique no botão verde ("Requisitar!").</li>
              <li>A escola irá enviar um email com a confirmação e instruções de recolha da requisição nas próximas 24 horas após verificar o stock do "Pack" pretendido;</li>
            </ol>
          </div>
        </div>

        <div>
          <button onclick="accordionFunction('regras')" class="w3-button w3-large w3-mobile w3-light-blue w3-round-xlarge w3-card-4 w3-hover-black">Regras de requisição</button>
          <div id="regras" class="w3-container w3-hide w3-white w3-animate-top w3-round-xlarge">
            <ol>
              <li>O material só pode ser requisitado por alunos da ESA;</li>
              <li>O material requisitado só pode ser usado por alunos da ESA;</li>
              <li>O material requisitado só será entregue ao aluno após o pagamento da caução;</li>
              <li>O aluno que requisitar material informático ESA tem um prazo máximo de devolução do 120 dias após a recolha da requisição;</li>
              <li>O material informático terá de ser devolvido exatamente no mesmo estado em que foi requisitado;</li>
              <li>O não cumprimento de qualquer uma das regras acima pode resultar na perda da caução!</li>
            </ol>
          </div>
        </div>
      </div>

      <!-- CONTACTO -->

      <div id="contacto" class="w3-col m6 w3-card-4 w3-light-blue w3-round-xlarge">
        <form class="w3-container w3-text-black" action="includes/contact.inc.php"  method="post">
          <h2 id="titulo_contacto" class="w3-center">Contacte-nos!</h2>

          <div class="w3-row w3-section">
            <div id="icone_contacto" class="w3-col w3-center" style="width:45px"><i class="w3-xxlarge fas fa-user-edit">&nbsp;&nbsp;</i></div>
            <div class="w3-rest">
              <input class="w3-input w3-border w3-round-large" name="pnomeContacto" type="text" placeholder="Primeiro Nome" required>
            </div>
          </div>

          <div class="w3-row w3-section">
            <div id="icone_contacto" class="w3-col w3-center" style="width:45px">&nbsp;</div>
            <div class="w3-rest">
              <input class="w3-input w3-border w3-round-large w3-margin-bottom" name="unomeContacto" type="text" placeholder="Último Nome" required>
            </div>
          </div>

          <div class="w3-row w3-section">
            <div id="icone_contacto" class="w3-col w3-center" style="width:45px"><i class="w3-xxlarge fas fa-at">&nbsp;</i></div>
            <div class="w3-rest">
              <input class="w3-input w3-border w3-round-large w3-margin-bottom" name="emailContacto" type="text" placeholder="E-mail" required>
            </div>
          </div>

          <div class="w3-row w3-section">
            <div id="icone_contacto" class="w3-col w3-center" style="width:45px"><i class="w3-xxlarge fas fa-comment-alt">&nbsp;</i></div>
            <div class="w3-rest">
              <input class="w3-input w3-border w3-round-large" name="assuntoContacto" type="text" placeholder="Assunto" required>
            </div>
          </div>

          <div class="w3-section">
            <div id="icone_contacto" class="w3-col w3-center" style="width:45px"><i class="w3-xxlarge fas fa-edit">&nbsp;</i></div>
            <div class="w3-rest">
              <textarea maxlength="500" rows="8" cols="50" input class="w3-input w3-border w3-round-large" name="mensagemContacto" type="text" placeholder="Escreva a sua mensagem" required></textarea>
            </div>
          </div>
          <button type="submit" name="contacto_submit" class="w3-button w3-orange w3-hover-black w3-large"><i class="fas fa-paper-plane">&nbsp;</i>Enviar</button>
        </form>
      </div>
    </div>
  </section>

  <footer class="w3-container w3-light-blue w3-center">
    <a class="w3-col m4" href="http://agrupamento.aealcochete.edu.pt/" target="_blank" style="margin-top:19px">Site Oficial ESA</a>
    <p class="w3-col m4">RH ESA 2019 &copy;</p>
    <div class="w3-col m4">
      <p>Site by Pedro Cantante - p.cantante@gmail.com</p>
    </div>
  </footer>

  <!-- LOGIN -->

  <div class="w3-container">
    <div id="open_login" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-top w3-light-blue w3-round-large" style="max-width:600px">

        <div class="w3-center"><br>
          <span onclick="document.getElementById('open_login').style.display='none'" class="w3-button w3-red w3-display-topright w3-hover-white" title="Fechar Login">&times;</span>
          <h2 id="titulo_modal">Login do Aluno</h2>
        </div>

        <div class="w3-section">
          <form class="w3-container" action="includes/login.inc.php" method="post">
            <label><b>Número de Aluno (ESA)</b></label>
            <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" name="mailuid" placeholder="#Aluno" required>
            <label><b>Password</b></label>
            <input class="w3-input w3-border w3-round-large" type="password" placeholder="************" name="pwd" required>
            <button class="w3-button w3-block w3-green w3-section w3-padding w3-round-large w3-hover-white" type="submit" name="login_submit">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- REQUISIÇÂO -->

  <div class="w3-container">
    <div id="open_requisicao" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-top w3-light-blue w3-round-large">
        <div class="w3-center" id="close_modal"><br>
          <span onclick="document.getElementById('open_requisicao').style.display='none'" class="w3-button w3-red w3-display-topright w3-hover-white" title="Fechar Requisição">&times;</span>
          <h2 id="titulo_modal">Requisição</h2>
        </div>

        <div class="w3-section">

          <div class="w3-row-padding" style="margin:0">

            <div class="w3-third">
              <div class="w3-card-4 w3-white w3-container w3-margin-bottom">
                <img class="w3-margin-top w3-margin-bottom" src="img/pack_lite.jpg" style="width:100%">
                <label><b>Pack Lite:</b></label>
                <ul>
                  <li>Sistema Operativo: Windows 7</li>
                  <li>Tamanho do monitor: 14"</li>
                  <li>Software: Base</li>
                  <li>Periféricos: Rato/Teclado HP</li>
                  <li><strong>Caução: 40€</strong></li>
                </ul>
              </div>
            </div>

            <div class="w3-third">
              <div class="w3-card-4 w3-white w3-container w3-margin-bottom">
                <img class="w3-margin-top w3-margin-bottom" src="img/pack_base.jpg" style="width:100%">
                <label><b>Pack Base:</b></label>
                <ul>
                  <li>Sistema Operativo: Windows 8.1</li>
                  <li>Tamanho do monitor: 16"</li>
                  <li>Software: Office 365</li>
                  <li>Periféricos: Rato/Teclado ACER</li>
                  <li><strong>Caução: 55€</strong></li>
                </ul>
              </div>
            </div>

            <div class="w3-third">
              <div class="w3-card-4 w3-white w3-container">
                <img class="w3-margin-top w3-margin-bottom" src="img/pack_performance.jpg" style="width:100%">
                <label class="w3-margin-bottom"><b>Pack Performance:</b></label>
                <ul>
                  <li>Sistema Operativo: Windows 10</li>
                  <li>Tamanho do monitor: 22"</li>
                  <li>Software: Office 365, Photoshop, Cinema 4D</li>
                  <li>Periféricos: Rato/Teclado ASUS</li>
                  <li><strong>Caução: 70€</strong></li>
                </ul>
              </div>
            </div>

          </div>

          <form class="w3-container" action="includes/requisitar.inc.php" method="post">
            <label><b>Escolhe o pack:</b></label>
            <select class="w3-input w3-border w3-round-large w3-margin-bottom" name="packSelected">
              <option selected="selected" value="Lite" type="integer">Pack Lite</option>
              <option value="Base" type="integer">Pack Base</option>
              <option value="Performance" type="integer">Pack Performance</option>
            </select>

            <label><b>Reintroduz o teu número de aluno (ESA)</b></label>
            <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" name="uidRepeat" placeholder="#Aluno" required>

            <button class="w3-button w3-block w3-orange w3-section w3-padding w3-round-large w3-hover-green" type="submit" name="requisitar_submit">Resquisitar!</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
