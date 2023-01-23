<?php

  include("conexao.php");

  $sql = "SELECT P.nrsei, P.numfunc, P.redmine, P.nome, F.nome AS ASSESSOR, S.descricao AS STATUS, A.descricao AS ASSUNTO, P.data_ini 
            FROM processo P, FUNCIONARIO F, STATUS S, ASSUNTO A 
          WHERE P.assunto_id = A.id 
            AND P.funcionario_id = F.id 
            AND P.status_id = S.id";

  echo $sql;
  $conexao->query($sql);
  $conexao->close();

?>