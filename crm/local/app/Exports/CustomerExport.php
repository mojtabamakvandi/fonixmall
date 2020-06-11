<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection , WithHeadings
{
    public function collection()
    {
        return Customer::all();
    }

    public function headings(): array
    {
        return ["شناسه","نام","نام خانوادگی","کد ملی","تاریخ تولد","ایمیل","همراه","رمز عبور","گروه","امتیاز","تاریخ ثبت نام","زمان ثبت نام"];
    }

}
