
    <div class="max-w-7xl mx-auto px-6">
        <h2>
            【社員 - 編集】
        </h2>


        @if (session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
 


        <form method="post" action="{{ route('users.update', $userID) }}">
            @csrf
            @method('patch')
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="name" class="font-semibold mt-4">名前</label>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <input type="text" name="name" class="w-auto p-2 border border-gray-300 ruonded-md"
                        id="name" value="{{ old('name', $name) }}">
                </div>
            </div>
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="email" class="font-semibold mt-4">メールアドレス</label>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <input type="text" name="email" class="w-auto p-2 border border-gray-300 ruonded-md"
                        id="email" value="{{ old('email', $email) }}">
                </div>
            </div>
            <flux:button variant="primary" type="submit" class="w-full mt-4 cursor-pointer">
                変更する
            </flux:button>
        </form>


        <br><br>
        <a href="{{ route('users.list') }}">
        <flux:button variant="primary" class="cursor-pointer">
            戻る
        </flux:button>
        </a>
    </div>

