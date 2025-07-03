<x-layout>
    <div class="text-center p-6 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-t-lg">
        <h1 class="text-3xl font-bold">Histórico de encomendas</h1>
        <p class="mt-4 text-lg">Cliente: {{ $customer->name }}</p>
    </div>

    {{-- Itens Enviados --}}
    <div class="max-w-full mt-8 mx-auto bg-white rounded-lg shadow-sm">
        <div class="text-center p-6">
            <h1 class="text-2xl font-semibold text-gray-800">Itens Enviados</h1>
        </div>
        <table class="w-full text-sm text-left">
            <thead>
                <tr class="border-b">
                    <th class="px-6 py-4 font-semibold text-gray-900">Código de Rastreamento</th>
                    <th class="px-6 py-4 font-semibold text-gray-900">Origem</th>
                    <th class="px-6 py-4 font-semibold text-gray-900">Destino</th>
                    <th class="px-6 py-4 font-semibold text-gray-900">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer->sent as $sent)
                    <tr class="hover:bg-gray-50 transition-colors border-b">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('tracking.trackings', ['tracker_code' => $sent->tracker_code]) }}" class="underline">{{ $sent->tracker_code }}</a>
                        </td>
                        <td class="px-6 py-4">{{ $sent->origin }}</td>
                        <td class="px-6 py-4">{{ $sent->destination }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 rounded-full bg-green-500 text-white">{{ $sent->status }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Itens Recebidos --}}
    <div class="max-w-full mt-8 mx-auto bg-white rounded-lg shadow-sm">
        <div class="text-center p-6">
            <h1 class="text-2xl font-semibold text-gray-800">Itens Recebidos</h1>
        </div>
        <table class="w-full text-sm text-left">
            <thead>
                <tr class="border-b">
                    <th class="px-6 py-4 font-semibold text-gray-900">Código de Rastreamento</th>
                    <th class="px-6 py-4 font-semibold text-gray-900">Origem</th>
                    <th class="px-6 py-4 font-semibold text-gray-900">Destino</th>
                    <th class="px-6 py-4 font-semibold text-gray-900">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer->received as $received)
                    <tr class="hover:bg-gray-50 transition-colors border-b">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('tracking.trackings', ['tracker_code' => $received->tracker_code]) }}" class="underline">{{ $received->tracker_code }}</a>
                        </td>
                        <td class="px-6 py-4">{{ $received->origin }}</td>
                        <td class="px-6 py-4">{{ $received->destination }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 rounded-full bg-green-500 text-white">{{ $received->status }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
