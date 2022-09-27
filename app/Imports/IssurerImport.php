<?php

namespace App\Imports;

use App\Models\IssurerModel;
use Maatwebsite\Excel\Concerns\ToModel;

class IssurerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new IssurerModel([
            'name'     => $row[0],
            'init'    => $row[1],
            'ordinal'    => $row[2]
        ]);
    }
}
