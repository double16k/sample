<div class="max-w-7xl mx-auto px-6">
    <h2 class="font-semibold text-xl leading-tight">
        【管理カレンダー】
    </h2>

    {{--余白--}}
    <div class="mt-5">
        　
    </div>


    {{--<form method="post" action="{{ route('kanrical.save') }}">
    <form wire:submit.prevent="save">
        @csrf
        @method('patch')

        <div class="mt-8">
            <div class="w- flex flex-col">
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="10:00"> 10:00 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="10:30"> 10:30 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="11:00"> 11:00 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="11:30"> 11:30 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="12:00"> 12:00 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="12:30"> 12:30 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="13:00"> 13:00 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="13:30"> 13:30 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="14:00"> 14:00 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="14:30"> 14:30 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="15:00"> 15:00 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="15:30"> 15:30 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="16:00"> 16:00 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="16:30"> 16:30 ～
                </div>
                <div class="mt-8" style="margin:3px;">
                <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="17:00"> 17:00 ～
                </div>     
            </div>
        </div>
        <flux:button variant="primary" type="submit" class="mt-4 cursor-pointer" style="margin:20px;">
            追加する
        </flux:button>
    </form>--}}



<form wire:submit.prevent="save">
    @csrf
    <div class="mt-8">
        <div class="w- flex flex-col">
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="10:00"> 10:00 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="10:30"> 10:30 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="11:00"> 11:00 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="11:30"> 11:30 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="12:00"> 12:00 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="12:30"> 12:30 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="13:00"> 13:00 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="13:30"> 13:30 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="14:00"> 14:00 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="14:30"> 14:30 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="15:00"> 15:00 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="15:30"> 15:30 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="16:00"> 16:00 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="16:30"> 16:30 ～
            </div>
            <div class="mt-8" style="margin:3px;">
            <input type="checkbox" wire:model="room1" class="w-atuo p-2 border border-gray-300 rounded-md" value="17:00"> 17:00 ～
            </div>  
        </div> 
    </div>
    <flux:button variant="primary" type="submit" class="mt-4 cursor-pointer" style="margin:20px;">
        変更する
    </flux:button>
</form>

<p>選択中: {{ implode(', ', $room1) }}</p>

</div>