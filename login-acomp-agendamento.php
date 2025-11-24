<main class="flex-grow flex justify-center items-start mt-16 mb-20">

        <form action="?pg=acompanhar-agendamento" method="post"
              class="w-full max-w-lg bg-white shadow-2xl rounded-3xl p-10 border border-gray-100">

            <h2 class="text-2xl font-extrabold text-blue-700 mb-6 text-center">
                Acompanhar Agendamento
            </h2>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Nome</label>
                <input type="text" name="nome-login" required
                       class="w-full px-4 py-3 rounded-xl border border-gray-300
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                              shadow-sm">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">CPF</label>
                <input type="text" name="cpf-login" required
                       class="w-full px-4 py-3 rounded-xl border border-gray-300
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                              shadow-sm">
            </div>

            <div class="flex justify-center">
                <input type="submit" value="Enviar"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold
                              px-8 py-3 rounded-xl shadow-lg transition transform hover:scale-[1.02] cursor-pointer">
            </div>

        </form>

    </main>