<?php include "admin-header.php"; ?>
<?php include "admin-sidebar.php"; ?>
<?php 
$arquivo = __DIR__ . '/../horarios.json';
date_default_timezone_set('America/Sao_Paulo');
$hoje = date("Y-m-d");
$conteudo = file_get_contents($arquivo);
$agenda = json_decode($conteudo, true);
$agendamentos = isset($agenda[$hoje]) ? count($agenda[$hoje]) : 0;
$clientes= [];
$servicosAtivos= 0;

foreach ($agenda as $data => $horarios) {
    $servicosAtivos += count($horarios);
    foreach ($horarios as $hora => $info) {
        if (!empty($info['nome'])) {
            $nome = trim($info['nome']);
            $clientes[$nome] = true;
        }
    }
}

$totalClientes = count($clientes);

?>

    <main class="flex-1 p-10">
        <h1 class="text-3xl font-bold text-blue-900 mb-6">
            Painel Administrativo
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

            <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <p class="text-gray-600">Agendamentos do dia</p>
                <h3 class="text-2xl font-bold text-blue-700"><?php echo $agendamentos ?></h3>
            </div>

            <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <p class="text-gray-600">Total de Clientes</p>
                <h3 class="text-2xl font-bold text-blue-700"><?php echo $totalClientes ?></h3>
            </div>

            <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <p class="text-gray-600">Serviços Ativos</p>
                <h3 class="text-2xl font-bold text-blue-700"><?php echo $servicosAtivos ?></h3>
            </div>

        </div>

        <p class="text-gray-700">
            Selecione uma das opções no menu à esquerda para gerenciar o sistema.
        </p>
    </main>


</div>
</body>
</html>