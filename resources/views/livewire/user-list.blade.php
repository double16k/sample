<div class="p-4">
    <h1 class="text-xl font-bold mb-4">【社員一覧】</h1>

    <table class="w-full text-left border">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">名前</th>
                <th class="px-4 py-2">メールアドレス</th>
                <th class="px-4 py-2">編集</th>
                <th class="px-4 py-2">削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $user->id }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('users.edit', $user->id) }}">
                        <flux:button variant="primary" class="cursor-pointer">
                            編集
                        </flux:button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('users.delete', $user->id) }}">
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
