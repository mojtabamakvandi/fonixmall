<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection,WithHeadings
{
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return ['شناسه','فعال','قیمت','نام محصول','تاریخ ثبت','زمان ثبت','ثبت کننده','زیر دسته بندی','توضیحات','تخفیف','شناسه برند','گارانتی'];
    }
}
