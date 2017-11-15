<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Maatwebsite\Excel\Facades\Excel;
use App\ValidateCSV;

class ValidateTest extends TestCase
{

    public function testAdata()
    {

        $csvFile = storage_path('imports/testA.csv');
        $testData = Excel::load($csvFile)->get();

        $dataValidateClass = new ValidateCSV($testData);
        $dataValidated = $dataValidateClass->getValidatedData();

        $this->assertArrayNotHasKey('failed', $dataValidated);

        $this->assertArrayHasKey('validated', $dataValidated);

        $this->assertArrayHasKey('strProductName', $dataValidated['validated'][0]);
        $this->assertArrayHasKey('strProductDesc', $dataValidated['validated'][0]);
        $this->assertArrayHasKey('strProductCode', $dataValidated['validated'][0]);
        $this->assertArrayHasKey('dtmAdded', $dataValidated['validated'][0]);
        $this->assertArrayHasKey('dtmDiscontinued', $dataValidated['validated'][0]);
        $this->assertArrayHasKey('fProductStock', $dataValidated['validated'][0]);
        $this->assertArrayHasKey('fProductCost', $dataValidated['validated'][0]);

        $this->assertCount(1, $dataValidated);
        $this->assertCount(10, $dataValidated['validated']);
    }

    public function testBdata()
    {

        $csvFile = storage_path('imports/testB.csv');
        $testData = Excel::load($csvFile)->get();

        $dataValidateClass = new ValidateCSV($testData);
        $dataValidated = $dataValidateClass->getValidatedData();

        $this->assertArrayNotHasKey('validated', $dataValidated);

        $this->assertArrayHasKey('failed', $dataValidated);

        $this->assertArrayHasKey('strProductName', $dataValidated['failed'][0]);
        $this->assertArrayHasKey('strProductDesc', $dataValidated['failed'][0]);
        $this->assertArrayHasKey('strProductCode', $dataValidated['failed'][0]);
        $this->assertArrayHasKey('dtmAdded', $dataValidated['failed'][0]);
        $this->assertArrayHasKey('dtmDiscontinued', $dataValidated['failed'][0]);
        $this->assertArrayHasKey('fProductStock', $dataValidated['failed'][0]);
        $this->assertArrayHasKey('fProductCost', $dataValidated['failed'][0]);

        $this->assertCount(1, $dataValidated);
        $this->assertCount(10, $dataValidated['failed']);
    }
}
