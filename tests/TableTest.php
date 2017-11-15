<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\tblProductData;

class TableTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testGetTableName()
    {
        $this->assertEquals('tblProductData', tblProductData::getTableName());
    }

    public function testGetPrimaryKey()
    {
        $this->assertEquals('intProductDataId', tblProductData::getPrimaryKey());
    }

    public function testDatabase()
    {
        $data = factory(App\tblProductData::class)->create(['dtmDiscontinued'=>'yes']);

        $this->seeInDatabase('tblProductData', ['strProductDesc' => $data->strProductDesc]);
    }
}
