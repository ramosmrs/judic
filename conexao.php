<?php
    define('HOST', '127.0.0.1');
    define('USUARIO', 'judic');
    define('SENHA', 'judicc');
    define('DB', 'judic');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
?>