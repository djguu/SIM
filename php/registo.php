<?php
    include('../includes/db.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];

    if( !$username || !$password || !$password_confirm || !$name || !$surname || !$email || !$data_nascimento ){
    echo 'Tem de preencher todos os campos!';
    exit;
    }
    $password_final = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user_t(name, surname, username, email, password, data_nascimento, hash_confirm) VALUES ( '$name','$surname','$username','$email', '$password_final', '$data_nascimento', 'teste')";

    if($db->query($sql)){
        echo 'Sucesso';
    }
    else {
        echo 'Ocorreu um erro: '.mysqli_error($db);
    }

    $db->close();
//TODO comparar com codigo abaixo comentado, proteger contra sqlinjection
//TODO mudar tudo para funcionar na janela de login/registo
?>