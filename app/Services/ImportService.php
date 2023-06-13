<?php

namespace App\Services;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportService
{


    /**
     * Function to import excel to db
     *
     * @return  bool
     */
    public function importExcel(Request $request): bool
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $import = new UsersImport;
        return Excel::import($import, $request->file('file')) ? true:false;
    }
}
