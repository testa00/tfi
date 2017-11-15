<?php

namespace App;

class ShowResult
{

    private $data;
    private $affected;

    public function __construct($dataValidated, $affected)
    {
        $this->data = $dataValidated;
        $this->affected = $affected;
    }

    public function show()
    {

        if (!$this->data) {
            echo "Обработки данных не состоялось.\n";
        } else {
            echo "Из файла CSV было обработано " . (count($this->data['validated']) + count($this->data['failed'])) . " элементов.\n";

            if (count($this->data['validated']))
                echo "Успешно обработано " . count($this->data['validated']) . ".\n";

            if (count($this->data['failed']))
                echo "Не прошли " . count($this->data['failed']) . ".\n";

            if (count($this->data['failed'])) {
                echo "-------------- \n";

                foreach($this->data['failed'] as $key => $item) {
                    echo ++$key . "\n";
                    echo "ProductName  : $item[strProductName] \n";
                    echo "ProductDesc  : $item[strProductDesc] \n";
                    echo "ProductCode  : $item[strProductCode] \n";
                    echo "ProductStock : $item[fProductStock] \n";
                    echo "ProductCost  : $item[fProductCost] \n";
                    echo "-------------- \n";
                }
            }
        }
    }
}
