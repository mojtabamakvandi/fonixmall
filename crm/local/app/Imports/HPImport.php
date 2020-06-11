<?php

namespace App\Imports;

use App\HyperProduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class HPImport implements ToModel,WithStartRow
{
    public function model(array $row)
    {
        return new HyperProduct([
            'name'              => $row[7],
            'code'              => $row[3],
            'barcode'           => $row[5],
            'stoke_id'          => $row[1],
            'stoke_name'        => $row[2],
            'barcode2'          => $row[6],
            'category_id'       => $row[8],
            'category_name'     => $row[9],
            'unit'              => $row[11],
            'total_end'         => $row[21],
            'td_end'            => $row[23],
            'joz_end'           => $row[22],
            'last_fi_buy'       => $row[24],
            'last_cost_buy'     => $row[25],
            'last_fi_ended'     => $row[26],
            'last_cost_ended'   => $row[27],
            'last_fi_sale'      => $row[28],
            'last_cost_sale'    => $row[29],
            'fi_cost'           => $row[30],
            'fi_low'            => $row[31],
            'fi_hi'             => $row[32],
            'fi_off_percent'    => $row[33],
            'fi_benefit_percent'=> $row[34],
            'fi_khales'         => $row[35]
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
/*
    public function chunkSize(): int
    {
        return 20;
    }*/
}
