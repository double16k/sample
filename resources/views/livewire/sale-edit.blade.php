<div class="max-w-7xl mx-auto px-6">

    <h2>
        【件名・金額 - 編集】
    </h2>


    @if (session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message') }}
        </div>
    @endif    

    <form method="post" action="{{ route('sale.update', $saleID) }}">
        @csrf
        @method('patch')

        <div class="p-4">
            <div class="flex flex-col">

                <table class="w-full text-center border">
                <thead>

                    <tr>
                        <th>
                            <div class="mt-8">
                                <div class="w-full flex flex-col">
                                    社員名　：　{{ $user->name }}
                                </div>
                            </div>

                        </th>
                        <th>
                            <div class="mt-8">
                                <div class="w-full flex flex-col">
                                    保険会社名　：　{{ $insurance->name }}
                                </div>
                            </div>

                        </th>
                        <th>
                            <div class="mt-8">
                                <div class="w-full flex flex-col">
                                    保険名　：　{{ $content->name }}
                                </div>
                            </div>

                        </th>
                        <th>

                            <div class="p-4" style="width: 260px;">
                                <div class="flex gap-3">
                                日付　：　{{ $sale->date }}
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
                                        inputmode="numeric" pattern="[0-9]*" title="半角数字のみ入力可能です" name="m_number"
                                        style="width: 6ch;text-align: right;" wire:model="m_number" value="{{ old('m_number', $sale->m_number) }}">　件
                                </div>
                            </div>
                        </th>
                        <th>
                            <div>
                                <div>
                                <div class="text-red-600 font-bold">@error('f_number') {{ $message }} @enderror</div>
                                    <label for="f_number" class="font-semibold mt-4">女性売り上げ件数</label><br>
                                    <input type="text" class="w-atuo p-2 border border-gray-300 rounded-md"
                                        inputmode="numeric" pattern="[0-9]*" title="半角数字のみ入力可能です" name="f_number"
                                        id="f_number" style="width: 6ch;text-align: right" wire:model="f_number" value="{{ old('f_number', $sale->f_number) }}">　件
                                </div>
                            </div>
                        </th>
                        <th>
                            <div>
                                <div>
                                    <div class="text-red-600 font-bold">@error('amount') {{ $message }} @enderror</div>
                                    <label for="amount" class="font-semibold mt-4">売上</label><br>
                                    <input type="text" class="w-atuo p-2 border border-gray-300 rounded-md"
                                        inputmode="numeric" pattern="[0-9]*" title="半角数字のみ入力可能です" name="amount"
                                        id="amount" style="width: 16ch;text-align: right" wire:model="amount" value="{{ old('amount', $sale->amount) }}">　円
                                </div>
                            </div>
                            
                        </th>
                        
                    </tr>

                </thead>
                </table>
            </div>
        </div>

        <flux:button variant="primary" type="submit" class="w-full mt-4 cursor-pointer">
            変更する
        </flux:button>
    </form>


    <br><br>
    <a href="{{ route('sale.list') }}">
    <flux:button variant="primary" class="cursor-pointer">
        戻る
    </flux:button>
    </a>
</div>




