<div class="max-w-7xl mx-auto px-6">
    <h2>
        【保険名 - 編集】
    </h2>


    @if (session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message') }}
        </div>
    @endif



    <form method="post" action="{{ route('content.update', $contentID) }}">
        @csrf
        @method('patch')
        <div class="mt-8">
            <div class="w-full flex flex-col">
                <label for="name" class="font-semibold mt-4">保険名</label>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <input type="text" name="name" class="w-auto p-2 border border-gray-300 ruonded-md"
                    id="name" value="{{ old('name', $name) }}">
            </div>
        </div>

        <flux:button variant="primary" type="submit" class="w-full mt-4 cursor-pointer">
            変更する
        </flux:button>
    </form>


    <br><br>
    <a href="{{ route('content.list') }}">
    <flux:button variant="primary" class="cursor-pointer">
        戻る
    </flux:button>
    </a>
</div>

