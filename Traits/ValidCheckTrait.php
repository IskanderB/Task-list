<?php
namespace App\Traits;
/**
 * Check functions for validator
 */
trait ValidCheckTrait
{
    public function size($data, $limit)
    {
        $length = strlen($data);

        if ($length > $limit) {
            return false;
        }
        return true;
    }

    public function empty($data, $requirement)
    {
        if ($requirement and $data == '') {
            return false;
        }
        return true;
    }

    public function symbols($data, $requirement)
    {
        if ($requirement) {
            foreach ($requirement as $value) {
                if (strripos($data, $value) === false) {
                    return false;
                }
            }
            return true;
        }
        return true;
    }
}
