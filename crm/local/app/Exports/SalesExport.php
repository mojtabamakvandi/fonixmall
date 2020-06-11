<?php

namespace App\Exports;

use App\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesExport implements FromCollection,WithHeadings
{

    public function collection()
    {
        return Sale::where('productId','<>','NULL')->get();
    }

    public function headings(): array
    {
        return ['شناسه فاکتور',
                'شناسه سبد خرید',
                'قیمت',
                'شناسه مشتری',
                'تخفیف',
                'شناسه محصول',
                'شناسه گروه',
                'گروه',
                'نام مشتری',
                'نام خانوادگی مشتری',
                'همراه مشتری',
                'امتیاز مشتری',
                'تاریخ خرید',
                'ساعت خرید',
                'نام محصول',
                'توضیحات محصول',
            ];
    }
}
