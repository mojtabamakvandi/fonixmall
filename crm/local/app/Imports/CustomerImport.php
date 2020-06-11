<?php

namespace App\Imports;
use App\Customer;
use Hekmatinasser\Verta\Verta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CustomerImport implements ToModel,WithStartRow
{

    public static function GenerateId()
    {
        //ini_alter('date.timezone', 'Asia/Tehran');
        $now = new \DateTime();
        $now = $now->format('YmdHis');
        $microTime = microtime();
        $id = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microTime);
        $id = substr($id, 11, 1);
        $random = (rand(10000, 99999));
        $va_id = $now . $id . $random;
        return $va_id;
    }

    public function model(array $row)
    {
        $customer = Customer::create([
            'userId'        => $this->GenerateId(),
            'userName'      => $row[1],
            'userFamily'    => $row[2],
            'userNcode'     => $row[3],
            'userBday'      => $row[4],
            'userEmail'     => $row[5],
            'userPhonenumber'   => $row[6],
            'userPassword'  => \Hash::make("123456"),
            'group_id'      => $row[8],
            'score'         => $row[9],
            'userRegDate'   => $row[10],
            'userRegTime'   => $row[11],
        ]);
        return $customer;
    }

    public function startRow(): int
    {
        return 2;
    }
}
