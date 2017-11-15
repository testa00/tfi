<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\GetCSV;
use App\ValidateCSV;
use App\ShowResult;
use App\Import;

class IndexController extends Controller
{

    public function index()
    {

        $tableInsert = (isset($_SERVER['argv'][1]) && $_SERVER['argv'][1] == 'test') ? false : true;

        $csvImport = (new GetCSV())->getData();

        if ($csvImport) {
            $dataValidated = (new ValidateCSV($csvImport))->getValidatedData();

            if ($tableInsert && count($dataValidated['validated'])) {
                $affected = (new Import($dataValidated['validated']))->handle();
            } else {
                $affected = false;
            }

        } else {
            $dataValidated = false;
            $affected = false;
        }

        (new ShowResult($dataValidated, $affected))->show();
    }

}
