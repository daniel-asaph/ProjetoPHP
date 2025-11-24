<?php include "admin-header.php"; ?>
<?php include "admin-sidebar.php"; ?>
<?php
$arquivo = __DIR__ . '/../contatos.json';
$conteudo = file_get_contents($arquivo);
$contatos = json_decode($conteudo, true);
?>

<main class="flex-1 p-10">
    <h1 class="text-3xl font-bold text-blue-900 mb-6">Contatos</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

<?php foreach ($contatos as $contato): ?>

        <div class="w-full max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-6 mb-6 border border-gray-100">

            <div class="flex-col items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-blue-700">
                    <?= htmlspecialchars($contato["nome"]) ?>
                </h3>
            <p><span class="font-semibold text-blue-600">ID:</span> <?= htmlspecialchars($contato["id"]) ?></p>
            <p><span class="font-semibold text-blue-600">Telefone:</span> <?= htmlspecialchars($contato["telefone"]) ?></p>
            <p><span class="font-semibold text-blue-600">Email:</span> <?= htmlspecialchars($contato["email"]) ?></p>
            <p><span class="font-semibold text-blue-600">Mensagem:</span> <?= htmlspecialchars($contato["mensagem"]) ?></p>
            </div>

        </div>
<?php endforeach; ?>

</div>
</main>

</div>
</body>
</html>