<?php

namespace App\Exports;

use App\Models\Employess;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployessExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employess::all();
    }
}
