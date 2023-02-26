<body>
<?php 
require_once("index.php");
require_once("conexao.php");
require_once("pagination.php");
?>

<table>
  <tr class="cabecalho">
    <!--<td><strong>NUMERO</strong></td>-->
    <td><strong>PALAVRA</strong></td>
    <td><strong>SIGNIFICADO</strong></td> 
  </tr>

<?php

$sql = $conn->query("SELECT * FROM dicionario 
                    ORDER BY palavra ASC  
                    LIMIT $start, $limit               
                    " );

$sql->bindValue(":status", 1);                    

$result = $sql->fetchAll();

foreach($result as $values){?>
  <tr>
    <!--<td><?=$values['id']?></td>-->
    <td><?=$values['palavra']?></td>
    <td><?=$values['significado']?></td>
<?php  }?>

</table>

<?php 



//PAGINADOR

$sqlNav = $conn->query("SELECT * FROM dicionario 
                    ORDER BY palavra ASC 
                    LIMIT $start, $limit               
                    " );

$sqlNav->bindValue(":status", 1);                    

$resultNav = $sqlNav->fetchAll();

$linesNav = $sqlNav->rowCount();

if($pg <= 0){

  return false;

}

$quantia = ceil($linesNav / $limit);


echo "<ul id = 'paginacao'>";

//VERIFICA A NAVEGAÇÃO DA PÁGINA ANTERIOR

  if($pg == 1){

    $undo = 1;

  }else{

    $undo = $pg - 1;
  }

//VERIFICA A NAVEGAÇÃO DA PROXIMA PÁGINA

if($pg == $quantia){

    $forward = $quantia + 1;

  }else{

    $forward = $pg + 1;

  }
echo "<li class='paginator'><a href='show.php?pg={$undo}'><<</a></li>";

//Indices limitando a 4 indices anteriores ao ativo

for($i = $pg - 4; $i <= $pg; $i++){

  if($i >= 1){

  echo "<li class='paginator'><href='show.php?pg={$i}'>{$i}</a></li>";

  }
}

//Indices limitando a 4 indices anteriores ao ativo


for($e = $pg + 1; $e <= $pg + 4; $e++){

  if($e <= $quantia){

    echo "<li class='paginator'><href='show.php?pg={$e}'>{$e}</a></li>";

  }
}

echo "<li class='paginator'><a href='show.php?pg={$forward}'>>></a></li>";

echo "</ul>";

?>
</body>

