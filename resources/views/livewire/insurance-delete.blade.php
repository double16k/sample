<div class="max-w-7xl mx-auto px-6">
    <h2>
        【保険会社名 - 削除】
    </h2>


    @if (session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message') }}
        </div>
    @endif

    {{-- データが存在しない場合 --}}
    @if(!$error)
    <div class="mt-8">
        <div class="w-full flex flex-col">
            <label for="name" class="font-semibold mt-4">保険会社名　：　{{ $name }}</label>
            
        </div>
    </div>

    <a href="{{ route('insurance.delete.check', $insuranceID) }}">
    <flux:button variant="danger" class="w-full mt-4 cursor-pointer">
        削除確定する（完全に削除する）
    </flux:button>
    </a>
    @endif

    <div class="mt-5">
        　
    </div>

    <a href="{{ route('insurance.list') }}">
    <flux:button variant="primary" class="cursor-pointer">
        戻る
    </flux:button>
    </a>
</div>

