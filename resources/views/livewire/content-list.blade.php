<div class="max-w-7xl mx-auto px-6">
    <h2 class="font-semibold text-xl leading-tight">
        【保険内容登録】
    </h2>
    @if (session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message') }}
        </div>
    @endif

    <form method="post" action="{{ route('content.store') }}">
        @csrf
        @method('patch')

        <div class="mt-8">
            <div class="w- flex flex-col">
                <label for="name" class="font-semibold mt-4">保険名</label>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <input type="text" name="name" class="w-atuo p-2 border border-gray-300 rounded-md"
                    id="name">
            </div>
        </div>
        <flux:button variant="primary" type="submit" class="w-full mt-4 cursor-pointer">
            追加する
        </flux:button>
    </form>



    <div class="mt-4">
            　
    </div>

    <table class="w-full text-left border">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">保険名</th>
                <th class="px-4 py-2">編集</th>
                <th class="px-4 py-2">削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $content->id }}</td>
                    <td class="px-4 py-2">{{ $content->name }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('content.edit', $content->id) }}">
                        <flux:button variant="primary" class="cursor-pointer">
                            編集
                        </flux:button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('content.delete', $content->id) }}">
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
