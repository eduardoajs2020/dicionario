<?php

//VERIFICA SE O USUÁRIO CLICOU NO BOTÃO DO FORMULARIO
$MostraSentenca = filter_input(INPUT_POST, 'MostraSentenca');

if(isset($MostraSentenca)){

        $palavra = filter_input(INPUT_POST, 'palavra');
        $significado = filter_input(INPUT_POST, 'significado');
        $id = filter_input(INPUT_POST, 'id');

if(isset($palavra)){

  if(!empty($_POST['palavra'])){

    $data = $_POST['palavra'];

  //  $sql = "SELECT * FROM dicionario 
  //          WHERE id LIKE '%data%' or 
  //          palavra LIKE '%data%' or
  //          significado LIKE '%data%' 
  //          ORDER BY palavra ASC"; 
    
 // }else{
    
    //MOSTRANDO OS DADOS DO BANCO DE DADOS

    $limit =1;

     $result_msg = "SELECT * FROM dicionario 
                    WHERE id LIKE '%data%' or 
                    palavra LIKE '%data%' or
                    significado LIKE '%data%' 
                    ORDER BY palavra ASC"; 

    //$result_msg = "SELECT * FROM dicionario WHERE palavra = :palavra LIMIT :limit" ;

    $insert_msg = $conn->prepare($result_msg);

    $insert_msg-> bindParam(":id", $id, PDO::PARAM_INT);
    $insert_msg-> bindParam(":palavra", $palavra, PDO::PARAM_STR);
    $insert_msg-> bindParam(":significado", $significado, PDO::PARAM_STR);

    $insert_msg-> bindParam(":limit", $limit, PDO::PARAM_INT);

    $insert_msg-> execute();

    $result = $insert_msg->fetchAll(PDO::FETCH_ASSOC);

    /*foreach ($result as $value);*/

    if($value){

    require_once('index.php');

     // CABEÇALHO DA TABELA
     print_r("<table>");
     print_r("<tr>");
     print_r("<th><strong>NUMERO</strong></th>");
     print_r("<th><strong>PALAVRA</strong></th>");
     print_r("<th><strong>SIGNIFICADO</strong></th>");
     print_r("</tr>");

     //VALORES DA TABELA

    $id = $value['id'];
    $palavra = $value['palavra'];
    $significado = $value['significado'];

    //TABELA
     print_r("<tr>");
     print_r("<td>$id</td>");
     print_r("<td>$palavra</td>");
     print_r("<td>$significado</td>");
     print_r("</tr>");
     print_r("</table>");
    }

  }
}
  else{
    header("Location: errorid.php");
  }
}

?>
