@foreach ($transaction->transactionDetails as $detail)
    <div class="flex flex-col md:flex-row border-b pb-4 last:border-0 last:pb-0 md:items-center">
        <div class="ml-0 md:ml-4 flex-grow">
            <h3 class="font-medium text-lg md:text-base">{{ $detail->product->name }}</h3>
            <p class="text-sm text-gray-500">{{ $detail->product->category }}</p>
            <div class="flex flex-col md:flex-row justify-between mt-1 text-sm">
                <span>{{ $detail->quantity }} x Rp {{ number_format($detail->price, 0, ',', '.') }}</span>
                <span class="font-medium">Rp {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
@endforeach
