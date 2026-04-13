<div class="max-w-7xl mx-auto px-6">
    <h2 class="font-semibold text-xl leading-tight">
        【保険会社登録】
    </h2>
    @if (session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message') }}
        </div>
    @endif

    <form method="post" action="{{ route('insurance.store') }}">
        @csrf
        @method('patch')

        <div class="mt-8">
            <div class="w- flex flex-col">
                <label for="name" class="font-semibold mt-4">保険会社名</label>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <input type="text" name="name" class="w-atuo p-2 border border-gray-300 rounded-md"
                    id="name">
            </div>
        </div>
        <flux:button variant="primary" type="submit" class="w-full mt-4 cursor-pointer">
            追加する
        </flux:button>
    </form>



    <div class="mt-5">
        　
    </div>

    <table class="w-full text-left border">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">保険会社名</th>
                <th class="px-4 py-2">編集</th>
                <th class="px-4 py-2">削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($insurances as $insurance)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $insurance->id }}</td>
                    <td class="px-4 py-2">{{ $insurance->name }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('insurance.edit', $insurance->id) }}">
                        <flux:button variant="primary" class="cursor-pointer">
                            編集
                        </flux:button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('insurance.delete', $insurance->id) }}">
                        <flux:button variant="primary" class="cursor-pointer">
                            削除
                        </flux:button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
