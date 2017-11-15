<?php

namespace App;

class ValidateCSV
{

    private $csv;

    public function __construct($data)
    {
        $this->csv = $data;
    }

    public function getValidatedData()
    {

        $result = array();

        $this->csv->each(function ($item, $key) use (&$result) {

            $result[$key]['strProductName'] = $item['product_name'];
            $result[$key]['strProductDesc'] = $item['product_description'];
            $result[$key]['strProductCode'] = $item['product_code'];

            $result[$key]['dtmAdded'] = '';
            $result[$key]['dtmDiscontinued'] = '';

            $result[$key]['fProductStock'] = $item['stock'];
            $result[$key]['fProductCost'] = $item['cost_in_gbp'];

            if (!is_numeric($item['cost_in_gbp']) || !is_numeric($item['stock']) ||
                empty($item['product_name']) || empty($item['product_description']) || empty($item['product_code'])) {

                $result[$key]['valid'] = 'failed';

            } else {
                if ($item['discontinued'] == 'yes') {
                    $result[$key]['dtmAdded'] = date('Y-m-d H:i:s');
                    $result[$key]['dtmDiscontinued'] = date('Y-m-d H:i:s');
                    $result[$key]['valid'] = 'validated';
                } elseif (($item['cost_in_gbp'] < 5 && $item['stock'] < 10) || $item['cost_in_gbp'] > 1000) {
                    $result[$key]['valid'] = 'failed';
                } else {
                    $result[$key]['dtmAdded'] = date('Y-m-d H:i:s');
                    $result[$key]['valid'] = 'validated';
                }
            }
        });

        $validated = collect($result)->groupBy('valid');

        $validatedCSV = $this->clearForInsert($validated);

        return $validatedCSV;
    }

    public function clearForInsert($validated)
    {

        $result = array();

        if (!empty($validated['validated'])) {
            $validated['validated']->each(function (&$item) use (&$result) {
                unset($item['valid']);
                $result['validated'][] = $item;
            });
        }

        if (!empty($validated['failed'])) {
            $validated['failed']->each(function (&$item) use (&$result) {
                unset($item['valid']);
                $result['failed'][] = $item;
            });
        }

        return $result;
    }
}
