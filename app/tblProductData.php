<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Yadakhov\InsertOnDuplicateKey;

class tblProductData extends Model
{
    use InsertOnDuplicateKey;

    protected $table = 'tblProductData';
    protected $primaryKey = 'intProductDataId';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'strProductName','strProductDesc','strProductCode','dtmAdded','dtmDiscontinued','fProductStock','fProductCost',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
