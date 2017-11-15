<?php

namespace App;

use Maatwebsite\Excel\Facades\Excel;

class GetCSV
{

    public function getData() {
        $csvFile = storage_path('imports/stock.csv');

        if (file_exists($csvFile)) {
            $csvImport = Excel::load($csvFile)->get();
        } else {
            $csvImport = false;
        }

        return $csvImport;
    }
}