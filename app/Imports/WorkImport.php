<?php

namespace App\Imports;

use App\Models\WorkModel;
use Maatwebsite\Excel\Concerns\ToModel;

class WorkImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new WorkModel([
            'name'     => $row[0],
            'init'    => $row[1],
            'ordinal'    => $row[2]
        ]);
    }
}
