<?php

namespace App\Imports;

use App\Models\employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new employee([
            //
            'name'     => $row[0],
            'companies_id' => $row[1],
            'email'    => $row[2], 
        ]);
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
