<?php
require_once __DIR__ . "/config_agenda.php";

$escolhidoHora = isset($_POST['horario']) ? $_POST['horario'] : '';
$escolhidoInvestimento = isset($_POST['tipo_investimento']) ? $_POST['tipo_investimento'] : '';
?>

<div class="w-full max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-10 mt-10 mb-10">

    <h2 class="text-3xl font-bold text-blue-900 mb-8 text-center">
        Agendar horário
    </h2>

    <form method="POST" action="?pg=agendamento" class="space-y-6">

        <!-- Nome -->
        <div>
            <label class="block text-sm font-semibold text-gray-700">Nome:</label>
            <input type="text" name="nome" required
                   class="w-full mt-1 border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- CPF -->
        <div>
            <label class="block text-sm font-semibold text-gray-700">CPF (11 dígitos):</label>
            <input type="text" name="cpf" required
                   class="w-full mt-1 border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Telefone -->
        <div>
            <label class="block text-sm font-semibold text-gray-700">Telefone:</label>
            <input type="text" name="telefone" required
                   class="w-full mt-1 border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Data -->
        <div>
            <label class="block text-sm font-semibold text-gray-700">Data:</label>
            <input type="date" name="data" required
                   class="w-full mt-1 border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Horário -->
        <div>
            <label class="block text-sm font-semibold text-gray-700">Horário:</label>
            <select name="horario" required
                    class="w-full mt-1 border border-gray-300 rounded-lg p-3 bg-white focus:ring-2 focus:ring-blue-500">
                <option value="">-- selecione --</option>

                <?php foreach ($permitidos as $h): ?>
                    <option value="<?= htmlspecialchars($h) ?>"
                        <?= ($h === $escolhidoHora ? 'selected' : '') ?>>
                        <?= htmlspecialchars($h) ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>

        <!-- Tipo de investimento -->
        <div>
            <label class="block text-sm font-semibold text-gray-700">Tipo de investimento:</label>
            <select name="tipo_investimento" required
                    class="w-full mt-1 border border-gray-300 rounded-lg p-3 bg-white focus:ring-2 focus:ring-blue-500">

                <option value="">-- selecione --</option>

                <?php foreach ($tiposInvestimento as $t): ?>
                    <option value="<?= htmlspecialchars($t) ?>"
                        <?= ($t === $escolhidoInvestimento ? 'selected' : '') ?>>
                        <?= htmlspecialchars($t) ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>

        <!-- Botão -->
        <div class="text-center pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition">
                Agendar
            </button>
        </div>

    </form>

</div>
