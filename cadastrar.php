<?php
    include("conexao.php");

    $nrsei       = mysqli_real_escape_string($conexao, trim($_POST['nrsei']));
    $numfunc     = mysqli_real_escape_string($conexao, trim($_POST['numfunc']));
    $nome        = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $assunto_id  = mysqli_real_escape_string($conexao, trim($_POST['assunto_id']));
    $assessor_id = mysqli_real_escape_string($conexao, trim($_POST['assessor_id']));
    $status_id   = mysqli_real_escape_string($conexao, trim($_POST['status_id']));
    $redmine     = mysqli_real_escape_string($conexao, trim($_POST['redmine']));

    $sql = "INSERT INTO processo(nrsei, numfunc, nome, data_ini, assunto_id, status_id, funcionario_id, redmine) VALUES ('$nrsei' ,'$numfunc','$nome',NOW(),'$assunto_id','$status_id','$assessor_id','$redmine')";

    //echo $sql;
    $conexao->query($sql);
    $conexao->close();

    echo "<script language=javascript>";
    echo "document.location = 'index.php';";
    echo "</script>";

?>
