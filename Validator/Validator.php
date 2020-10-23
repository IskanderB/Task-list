<?php
namespace App\Validator;
use App\Traits\{ValidPersonalRequirementsTrait, ValidCheckTrait};

/**
 * Validator
 */
class Validator
{
    use ValidPersonalRequirementsTrait;
    use ValidCheckTrait;

    private $request;
    private $url;

    public function __construct($request, $url)
    {
        $this->request = $request;
        $this->url = $url;
    }

    public function check()
    {
        $this->checkData($this->request['_GET']);
        $this->checkData($this->request['_POST']);
        // print_r($this->requirements);
        // print_r($this->request);
        // die;
    }

    private function checkData($data)
    {
        foreach ($data as $dataKey => $dataValue) {
            $dataValue = trim($dataValue);
            if (!empty($this->personalRequirements[$dataKey])) {
                foreach ($this->personalRequirements[$dataKey] as $requirementsKey => $requirementsValue) {
                    $check = $this->$requirementsKey($dataValue, $requirementsValue);
                    if (!$check) {
                        $errorType = "App\Errors\\" . ucfirst($requirementsKey) . 'Errors';
                        
                        $error = new $errorType($data['ajax'], $this->url);
                        $error->error($dataKey, $requirementsValue);
                    }
                }
            }
        }
    }
}
