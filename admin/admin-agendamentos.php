<?php include "admin-header.php"; ?>
<?php include "admin-sidebar.php"; ?>
<?php
$arquivo = __DIR__ . '/../horarios.json';
$conteudo = file_get_contents($arquivo);
$agenda = json_decode($conteudo, true);
?>
<main class="flex-1 p-10">
    <h1 class="text-3xl font-bold text-blue-900 mb-6">Agendamentos</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

<?php foreach ($agenda as $data => $horarios): ?>
    <?php foreach ($horarios as $hora => $info): ?>

        <div class="w-full max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-6 mb-6 border border-gray-100">

            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-blue-700">
                    <?= htmlspecialchars($info["nome"]) ?>
                </h3>

                <span class="text-sm font-semibold text-gray-500">
                    <?= htmlspecialchars($data) ?> às <?= htmlspecialchars($hora) ?>
                </span>
            </div>

            <p><span class="font-semibold text-blue-600">CPF:</span> <?= htmlspecialchars($info["cpf"]) ?></p>
            <p><span class="font-semibold text-blue-600">Telefone:</span> <?= htmlspecialchars($info["telefone"]) ?></p>
            <p><span class="font-semibold text-blue-600">Investimento:</span> <?= htmlspecialchars($info["investimento"]) ?></p>

        </div>

    <?php endforeach; ?>
<?php endforeach; ?>

</div>
</main>

</div>
</body>
</html>