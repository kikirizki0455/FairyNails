<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    protected $transactions;

    public function __construct(Collection $transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return $this->transactions;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Pelanggan',
            'Total',
            'Voucher',
            'Point',
            'Status Pembayaran',
            'Tanggal',
        ];
    }

    /**
     * @param Transaction $transaction
     * @return array
     */
    public function map($transaction): array
    {
        return [
            '#' . $transaction->id,
            $transaction->user->name ?? 'N/A',
            'Rp ' . number_format($transaction->total_amount, 0, ',', '.'),
            ucfirst(str_replace('_', ' ', $transaction->userVoucher?->voucher?->type ?? 'Tanpa Voucher')),
            $transaction->points_earned . ' pts',
            ucfirst($transaction->payment_status),
            $transaction->created_at->format('d M Y H:i'),
        ];
    }

    /**
     * @param Worksheet $sheet
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}