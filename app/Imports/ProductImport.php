<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_id' => $row[2],
             'nama' => $row[3],
             'stock' => $row[4],
             'varian' => $row[5],
             'keterangan' => $row[6]
        ]);
    }
}


