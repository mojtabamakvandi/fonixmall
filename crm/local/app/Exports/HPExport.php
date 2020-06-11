<?php

namespace App\Exports;

use App\HyperProduct;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HPExport implements FromCollection,WithHeadings
{
    public function collection()
    {
        return HyperProduct::all();
    }

    public function headings(): array
    {
        return ['شناسه',
            'نام کالا',
            'کد کالا',
            'بارکد',
            'کد انبار',
            'نام انبار',
            'بارکد 2',
            'کد دسته کالا',
            'دسته کالا',
            'واحد',
            'کل پایان دوره',
            'جز پایان دوره',
            'تعداد پایان دوره',
            'آخرین فی خرید',
            'آخرین مبلغ خرید',
            'آخرین فی بهای تمام شده',
            'آخرین مبلغ بهای تمام شده',
            'آخرین فی فروش',
            'آخرین مبلغ فروش',
            'فی مبلغ',
            'فی کف',
            'فی سقف',
            'درصد تخفیف',
            'درصد سود',
            'فی خالص'
        ];
    }
}
