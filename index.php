<?php
//session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="StyleSheet" href="styles.css">
  <title>Dicionario de TI</title>
</head>
<body>
  <div><a class="home" href="index.php"> Retornar ao inicio </a></div>
  <div class="form-container">
   <h1>Palavras do dicionario:</h1>
  <?php
  if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }

  ?>

  <form action="processa_cadastro_1.php" method="POST">
    <label>id:</label>
    <input type="number" name="id" placeholder="Número:"><br><br>

    <label>Palavra:</label>
    <input type="text" name="palavra" placeholder="Informe a palavra:"><br><br>

    <label>Significado:</label>
    <input type="text" name="significado" placeholder="Informe o significado:"><br><br>

    <input class="buttom" name="CadSentenca" type="submit" value="Cadastrar">
    <input class="buttom" name="AltSentenca" type="submit" value="Alterar">
    <input class="buttom" name="DelSentenca" type="submit" value="Excluir">
    <input class="buttom" name="VerSentenca" type="submit" value="Lista por Número">
    <input class="buttom" name="ListaSentenca" type="submit" value="Lista Todas">

  </form>
  </div>
  <script>
        
  </script>

</body>
</html>
