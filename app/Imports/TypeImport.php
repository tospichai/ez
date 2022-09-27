<?php

namespace App\Imports;

use App\Models\TypeModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class TypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TypeModel([
            'name'     => $row[0],
            'init'    => $row[1],
            'ordinal'    => $row[2]
        ]);
    }
}
