<?php

namespace App\Http\Controllers;
use App\Exports\HPExport;
use App\Imports\HPImport;
use Excel;
use App\Exports\ProductExport;
use App\Exports\SalesExport;
use App\Imports\ProductImport;
use App\Exports\HyperProductExport;
use App\Imports\HyperProductImport;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function importExportView()
    {
        return view('import');
    }

    public function export()
    {
        return Excel::download(new CustomerExport(), 'customers.xlsx');
    }

    public function productExport()
    {
        return Excel::download(new ProductExport(), 'products.xlsx');
    }

    public function HyperProductExport()
    {
        return Excel::download(new HPExport(), 'HyperProducts.xlsx');
    }

    public function SaleExport()
    {
        return Excel::download(new SalesExport(), 'Sales.xlsx');
    }

    public function import()
    {
        Excel::import(new CustomerImport(),request()->file('file'));
        return back();
    }

    public function productImport()
    {
        Excel::import(new ProductImport(),request()->file('file'));
        return back();
    }

    public function HyperProductImport()
    {
        Excel::import(new HPImport(),request()->file('file'));
        return back();
    }


}
