<?php

namespace App\Imports;

use App\Models\ProjectModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ProjectImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ProjectModel([
            'name'     => $row[0],
            'init'    => $row[1],
            'ordinal'    => $row[2]
        ]);
    }
}
