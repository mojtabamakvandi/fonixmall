<?php

namespace App\Imports;

use App\HyperProduct;
use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    public function model(array $row)
    {
        return new HyperProduct([
            //
        ]);
    }
}
