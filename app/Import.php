<?php

namespace App;

use App\tblProductData;

class Import
{

    private $data;

    public function __construct($dataValidated)
    {
        $this->data = $dataValidated;
    }

    public function handle()
    {

        $affected = tblProductData::insertOnDuplicateKey($this->data, ['fProductStock','fProductCost']);

        return $affected;
    }
}
