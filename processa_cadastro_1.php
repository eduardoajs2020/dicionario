<?php
session_start();
require_once("conexao.php");


//VERIFICA SE O USUÁRIO CLICOU NO BOTÃO DO FORMULARIO
$CadSentenca = filter_input(INPUT_POST, 'CadSentenca');

if($CadSentenca){

      //RECEBENDO DADOS DO FORMULARIO
        $palavra = filter_input(INPUT_POST, 'palavra');
        $significado = filter_input(INPUT_POST, 'significado');
         $id = filter_input(INPUT_POST, 'id');


  //ALTERANDO OS DADOS NO BANCO DE DADOS

    $result_msg = ("INSERT INTO dicionario
                  (id,
                  palavra,
                  significado)VALUES
                  (:id,
                  :palavra,
                  :significado)");

    $insert_msg = $conn->prepare($result_msg);


    $insert_msg->bindParam(':id', $id);
    $insert_msg->bindParam(':palavra', $palavra);
    $insert_msg->bindParam(':significado', $significado);

    if($insert_msg->execute()){

      $_SESSION['msg'] = "<p style= 'color:green;'>Sentença cadastrada com sucesso!</p>";
      header("Location: index.php");

    }
    else{
      $_SESSION['msg'] = "<p style= 'color:red;'>ERRO: Sentença não foi cadastrada no dicionário!</p>";
      header("Location: index.php");

    }


}



//VERIFICA SE O USUÁRIO CLICOU NO BOTÃO DO FORMULARIO
$AltSentenca = filter_input(INPUT_POST, 'AltSentenca');

if($AltSentenca){

      //RECEBENDO DADOS DO FORMULARIO
        $palavra = filter_input(INPUT_POST, 'palavra');
        $significado = filter_input(INPUT_POST, 'significado');
        $id = filter_input(INPUT_POST, 'id');


  //ALTERANDO OS DADOS NO BANCO DE DADOS

    $result_msg = ("UPDATE dicionario SET
                    id = :id,
                    palavra = :palavra,
                    significado = :significado
                    WHERE id=:id");

    $insert_msg = $conn->prepare($result_msg);


    $insert_msg->bindParam(':id', $id);
    $insert_msg->bindParam(':palavra', $palavra);
    $insert_msg->bindParam(':significado', $significado);

    if($insert_msg->execute()){
      $_SESSION['msg'] = "<p style= 'color:green;'>Sentença alterada com sucesso!</p>";
      header("Location: index.php");

    }else{
      $_SESSION['msg'] = "<p style= 'color:red;'>ERRO: Sentença não foi alterada no dicionário!</p>";
      header("Location: index.php");

    }


}



//VERIFICA SE O USUÁRIO CLICOU NO BOTÃO DO FORMULARIO
$DelSentenca = filter_input(INPUT_POST, 'DelSentenca');

if($DelSentenca){

      //RECEBENDO DADOS DO FORMULARIO
        $palavra = filter_input(INPUT_POST, 'palavra');
        $significado = filter_input(INPUT_POST, 'significado');
        $id = filter_input(INPUT_POST, 'id');


  //ALTERANDO OS DADOS NO BANCO DE DADOS

    $result_msg = ("DELETE FROM dicionario
                    WHERE id=:id");

    $insert_msg = $conn->prepare($result_msg);


    $insert_msg->bindParam(':id', $id);


    if($insert_msg->execute()){
      $_SESSION['msg'] = "<p style= 'color:green;'>Sentença excluída com sucesso!</p>";
      header("Location: index.php");

    }else{
      $_SESSION['msg'] = "<p style= 'color:red;'>ERRO: Sentença não foi excluída do dicionário!</p>";
      header("Location: index.php");

    }


}


//VERIFICA SE O USUÁRIO CLICOU NO BOTÃO DO FORMULARIO
$VerSentenca = filter_input(INPUT_POST, 'VerSentenca');

if($VerSentenca){

      //RECEBENDO DADOS DO FORMULARIO
        $palavra = filter_input(INPUT_POST, 'palavra');
        $significado = filter_input(INPUT_POST, 'significado');
        $id = filter_input(INPUT_POST, 'id');


  //MOSTRANDO OS DADOS DO BANCO DE DADOS

    $result_msg = "SELECT * FROM dicionario WHERE id=:id";

    $insert_msg = $conn->prepare($result_msg);

    $insert_msg-> bindValue(":id", $id);

    $insert_msg-> execute();

    $result = $insert_msg->fetchAll();

    foreach ($result as $value)

    {
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


}else{
      $_SESSION['msg'] = "<p style= 'color:green;'>Sucesso!</p>";
      header("Location: index.php");
}




//VERIFICA SE O USUÁRIO CLICOU NO BOTÃO DO FORMULARIO
$ListaSentenca = filter_input(INPUT_POST, 'ListaSentenca');

if($ListaSentenca){

header("Location: show.php");

}
?>
