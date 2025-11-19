<?php

    $arquivo_json = "contatos.json";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    $telefone = $_POST['telefone'];

    if(file_exists($arquivo_json)){
        $json = file_get_contents($arquivo_json);
        $contatos = json_decode($json, true);

        if($contatos === null || !is_array($contatos)){
            $contatos = [];
        }
    }else{
        $contatos = [];
    }

    $novo_id = count($contatos) + 1;
    $novo_contato = [
        "id" => $novo_id,
        "nome" => $nome,
        "email" => $email,
        "mensagem" => $mensagem,
        "telefone" => $telefone
    ];

    $contatos[] = $novo_contato;

    $novo_conteudo = json_encode($contatos, JSON_UNESCAPED_UNICODE);

    if(file_put_contents($arquivo_json, $novo_conteudo)) {
        echo "<p>Obrigado pelo contato, $nome</p>";
        echo "<p>Em breve enviaremos uma resposta para $email</p>";
    }else{
        echo "<h2>Erro ao enviar o fomrulário.</h2>";
    }