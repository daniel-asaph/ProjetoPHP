<?php

$arquivo = __DIR__ . '/horarios.json';

if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([]));
}

$agenda = json_decode(file_get_contents($arquivo), true);
if (!is_array($agenda)) $agenda = [];

$nomeLogin = trim($_POST['nome-login'] ?? '');
$cpfLogin = trim($_POST['cpf-login'] ?? '');
$existecpf = false;
$agendado = false;
$agendamentosUsuario = [];

foreach ($agenda as $data => $horarios) {
    foreach ($horarios as $hora => $info) {

        if ($info["cpf"] == $cpfLogin && $info["nome"] == $nomeLogin) {
            $agendamentosUsuario[] = [
            "data" => $data,
            "hora" => $hora,
            "info" => $info
            ];
}

    }
    $quantasVezes= count($agendamentosUsuario);
}
?>

<main class="flex-1 max-w-5xl mx-auto p-6">

<section class="max-w-6xl mx-auto mt-16 mb-16 px-6">

<?php if ($quantasVezes > 0): ?>

<h2 class="text-3xl font-bold text-center text-blue-700 mb-10">
    Você tem <?= $quantasVezes ?> consultorias agendadas
</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

<?php foreach ($agendamentosUsuario as $consultoria): ?>
    <div class="w-full max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-6 mb-6 border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold text-blue-700">
                <?= htmlspecialchars($consultoria["info"]["nome"]) ?>
            </h3>

            <span class="text-sm font-semibold text-gray-500">
                <?= htmlspecialchars($consultoria["data"]) ?> às <?= htmlspecialchars($consultoria["hora"]) ?>
            </span>
        </div>

        <p><span class="font-semibold text-blue-600">CPF:</span> <?= htmlspecialchars($consultoria["info"]["cpf"]) ?></p>
        <p><span class="font-semibold text-blue-600">Telefone:</span> <?= htmlspecialchars($consultoria["info"]["telefone"]) ?></p>
        <p><span class="font-semibold text-blue-600">Investimento:</span> <?= htmlspecialchars($consultoria["info"]["investimento"]) ?></p>
    </div>
<?php endforeach; ?>

</div>

<?php else: ?>

<main class="flex-grow flex justify-center items-start mt-12 mb-24">
    <div class="w-full max-w-2xl bg-white shadow-2xl rounded-3xl p-12 text-center border border-gray-100">
        <h2 class="text-3xl font-extrabold text-blue-900 mb-3">Nenhum agendamento encontrado</h2>
        <p class="text-gray-600 mb-8 text-lg">CPF incorreto ou sem registros.</p>
        <a href="?pg=agendar"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl shadow-lg transition transform hover:scale-[1.02]">
            Agendar consultoria
        </a>
    </div>
</main>

<?php endif; ?>

</section>
</main>