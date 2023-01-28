<body>
<?php require_once("index.php");?>

<table>
  <tr class="cabecalho">
    <td><strong>NUMERO</strong></td>
    <td><strong>PALAVRA</strong></td>
    <td><strong>SIGNIFICADO</strong></td> 
  </tr>

<?php

require_once("conexao.php");

$sql = $conn->query("SELECT * FROM dicionario order by id asc");

$result = $sql->fetchAll();

foreach($result as $values){?>
  <tr>
    <td><?=$values['id']?></td>
    <td><?=$values['palavra']?></td>
    <td><?=$values['significado']?></td>
<?php  }?>

</table>
</body>

