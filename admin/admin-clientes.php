<?php include "admin-header.php"; ?>
<?php include "admin-sidebar.php"; ?>
<?php
$arquivo = __DIR__ . '/../horarios.json';
$conteudo = file_get_contents($arquivo);
$agenda = json_decode($conteudo, true);
$clientes = [];

foreach ($agenda as $data => $horarios) {
    foreach ($horarios as $hora => $info) {

        $cpf = $info['cpf'];
        if (!isset($clientes[$cpf])) {
            $clientes[$cpf] = [
                "nome" => $info["nome"],
                "cpf" => $info["cpf"],
                "telefone" => $info["telefone"],
                "total" => 0
            ];
        }

        // Soma agendamentos
        $clientes[$cpf]["total"]++;
    }
}
?>


<main class="flex-1 p-10">
    <h1 class="text-3xl font-bold text-blue-900 mb-6">Clientes</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

    <?php foreach ($clientes as $cliente): ?>
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition">

                <h3 class="text-xl font-bold text-blue-700 mb-2">
                    <?php echo htmlspecialchars($cliente["nome"]) ?>
                </h3>

                <p><span class="font-semibold text-blue-600">CPF:</span> <?php echo htmlspecialchars($cliente["cpf"]) ?></p>
                <p><span class="font-semibold text-blue-600">Telefone:</span> <?php echo htmlspecialchars($cliente["telefone"]) ?></p>

                <p class="mt-3">
                    <span class="font-semibold text-blue-600">Agendamentos:</span>
                    <?php echo $cliente["total"] ?>
                </p>

            </div>
        <?php endforeach; ?>
</div>
</main>

</div>
</body>
</html>
