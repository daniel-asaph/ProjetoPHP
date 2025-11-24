<?php

$arquivo_json = "contatos.json";

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$telefone = $_POST['telefone'];

if (file_exists($arquivo_json)) {
    $json = file_get_contents($arquivo_json);
    $contatos = json_decode($json, true);

    if ($contatos === null || !is_array($contatos)) {
        $contatos = [];
    }
} else {
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

$salvou = file_put_contents($arquivo_json, $novo_conteudo);
?>

<main class="flex-grow flex justify-center items-start mt-16 mb-20">

    <div class="w-full max-w-2xl bg-white shadow-2xl rounded-3xl p-12 text-center border border-gray-100">

        <?php if ($salvou): ?>

            <h2 class="text-3xl font-extrabold text-blue-900 mb-4">
                Contato enviado com sucesso!
            </h2>

            <p class="text-gray-700 text-lg mb-6">
                Obrigado pelo contato, <span class="font-semibold text-blue-900"><?= htmlspecialchars($nome) ?></span>.
            </p>

            <p class="text-gray-600 mb-8">
                Em breve retornaremos para <span class="font-semibold"><?= htmlspecialchars($email) ?></span>.
            </p>

            <a href="?pg=fale-conosco"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl shadow-lg transition transform hover:scale-[1.02]">
                Voltar ao formulário
            </a>

        <?php else: ?>

            <h2 class="text-3xl font-extrabold text-blue-900 mb-4">
                Erro ao enviar o formulário
            </h2>

            <p class="text-gray-600 mb-8 text-lg">
                Ocorreu um problema ao salvar as informações. Tente novamente mais tarde.
            </p>

            <a href="?pg=fale-conosco"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl shadow-lg transition transform hover:scale-[1.02]">
                Tentar novamente
            </a>

        <?php endif; ?>

    </div>

</main>