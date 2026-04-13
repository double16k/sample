<div class="container mx-auto p-4 text-black">
    <h1 class="text-2xl font-bold mb-4 text-center text-white">{{ $year }}年{{ $month }}月</h1>
    <div class="flex justify-between mb-4">
        <button wire:click="previousMonth" class="bg-blue-500 text-white px-4 py-2 rounded">前</button>
        <button wire:click="nextMonth" class="bg-blue-500 text-white px-4 py-2 rounded">次</button>
    </div>
    <table class="w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border border-gray-200 bg-gray-100">日</th>
                <th class="py-2 px-4 border border-gray-200 bg-gray-100">月</th>
                <th class="py-2 px-4 border border-gray-200 bg-gray-100">火</th>
                <th class="py-2 px-4 border border-gray-200 bg-gray-100">水</th>
                <th class="py-2 px-4 border border-gray-200 bg-gray-100">木</th>
                <th class="py-2 px-4 border border-gray-200 bg-gray-100">金</th>
                <th class="py-2 px-4 border border-gray-200 bg-gray-100">土</th>
            </tr>
        </thead>
        <tbody style="height: 400px;">
            @foreach ($calendar as $week)
                <tr>
                    @foreach ($week as $day)
                        @if (is_null($day))
                            <td class="py-2 px-4 border border-gray-200 text-center"></td>
                        @else
                            <td class="py-2 px-4 border border-gray-200 text-center">
                                {{ $day }}
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>