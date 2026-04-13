<div class="max-w-7xl mx-auto px-6">
    <h2 class="font-semibold text-xl leading-tight">
        【売上登録】
    </h2>
    @if (session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message') }}
        </div>
    @endif


    <form wire:submit="regist">
    @csrf

        <div class="p-4">
            <div class="flex flex-col">

                <table class="w-full text-center border">
                <thead>

                    <tr>
                        <th>
                            <div class="text-red-600 font-bold">@error('selectUser') {{ $message }} @enderror</div>
                            <div class="mb-4" style="width: 160px;">
                                <label>社員 選択</label>
                                <select wire:model.live="selectUser" class="border rounded p-2 bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600">
                                    <option value="">選択してください</option>
                                    @foreach($selecteUsers as $key => $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>

                        </th>
                        <th>
                            <div class="text-red-600 font-bold">@error('selectInsurance') {{ $message }} @enderror</div>
                            <div class="mb-4" style="width: 160px;">
                                <label>保険会社名 選択</label>
                                <select wire:model.live="selectInsurance" class="border rounded p-2 bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600">
                                    <option value="">選択してください</option>
                                        @foreach($selectInsurances as $key => $insurance)
                                        <option value="{{ $insurance->id }}">{{ $insurance->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </th>
                        <th>
                            <div class="text-red-600 font-bold">@error('selectContent') {{ $message }} @enderror</div>
                            <div class="mb-4" style="width: 160px;">
                                <label>保険名 選択</label>
                                <select wire:model.live="selectContent" class="border rounded p-2 bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600">
                                    <option value="">選択してください</option>
                                        @foreach($selectContents as $key => $content)
                                        <option value="{{ $content->id }}">{{ $content->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </th>
                        <th>

                            <div class="p-4" style="width: 260px;">
                                <div class="flex gap-3">
                                    {{-- 年選択 --}}
                                    <select wire:model.live="year" class="border rounded p-2 bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600">
                                        @foreach($years as $y)
                                            <option value="{{ $y }}">{{ $y }}年</option>
                                        @endforeach
                                    </select>

                                    {{-- 月選択 --}}
                                    <select wire:model.live="month" class="border rounded p-2 bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600">
                                        @foreach($months as $m)
                                            <option value="{{ $m }}">{{ $m }}月</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3 text-lg font-bold">
                                    選択中の期間: {{ $year }}年{{ $month }}月
                                </div>
                            </div>
                            
                        </th>
                    </tr>

                    <tr>
                        <th colspan="2" class="px-4 py-2">
                            <div >
                                <div>
                                <div class="text-red-600 font-bold">@error('m_number') {{ $message }} @enderror</div>
                                    <label for="m_number" class="font-semibold mt-4">男性売り上げ件数</label><br>
                                    <input type="text" class="w-atuo p-2 border border-gray-300 rounded-md"
                                        inputmode="numeric" pattern="[0-9]*" title="半角数字のみ入力可能です"
                                        style="width: 6ch;text-align: right;" wire:model="m_number" value="{{ old('m_number') }}">　件
                                </div>
                            </div>
                        </th>
                        <th>
                            <div>
                                <div>
                                <div class="text-red-600 font-bold">@error('f_number') {{ $message }} @enderror</div>
                                    <label for="f_number" class="font-semibold mt-4">女性売り上げ件数</label><br>
                                    <input type="text" class="w-atuo p-2 border border-gray-300 rounded-md"
                                        inputmode="numeric" pattern="[0-9]*" title="半角数字のみ入力可能です"
                                        id="f_number" style="width: 6ch;text-align: right" wire:model="f_number" value="{{ old('f_number') }}">　件
                                </div>
                            </div>
                        </th>
                        <th>
                            <div>
                                <div>
                                    <div class="text-red-600 font-bold">@error('amount') {{ $message }} @enderror</div>
                                    <label for="amount" class="font-semibold mt-4">売上</label><br>
                                    <input type="text" class="w-atuo p-2 border border-gray-300 rounded-md"
                                        inputmode="numeric" pattern="[0-9]*" title="半角数字のみ入力可能です"
                                        id="amount" style="width: 16ch;text-align: right" wire:model="amount" value="{{ old('amount') }}">　円
                                </div>
                            </div>
                        </th>
                        
                    </tr>

                </thead>
                <thead>
                        <tr>
                            <th class="px-4 py-6" colspan="4">
                            <flux:button wire:click="regist" variant="primary">
                                登録する
                            </flux:button>
                            </th>
                        </tr>
                </thead>
                </table>
            </div>
        </div>


        <div class="mt-5">
            　
        </div>

        <flux:button wire:click="search" variant="primary" class="w-full mt-4 cursor-pointer">
            検索する
        </flux:button>

    </form>



    <div class="mt-5">
        　
    </div>

    @if(!empty($Lists) && !empty($userData))
    <table class="w-full text-left border">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">社員名</th>
                <th class="px-4 py-2">登録日付</th>
                <th class="px-4 py-2">編集</th>
                {{--<th class="px-4 py-2">削除</th>--}}
            </tr>
        </thead>
        <tbody>
            @foreach ($Lists as $key=>$list)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $list->id }}</td>
                    <td class="px-4 py-2">{{ $userData[$key]->name }}</td>
                    <td class="px-4 py-2">{{ $list->date }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('sale.edit', $list->id) }}">
                        <flux:button variant="primary" class="cursor-pointer">
                            編集
                        </flux:button>
                        </a>
                    </td>
                    {{--
                    <td>
                        <a href="{{ route('sale.delete', $list->id) }}">
                        <flux:button variant="primary" class="cursor-pointer">
                            削除
                        </flux:button>
                        </a>
                    </td>--}}
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif











</div>