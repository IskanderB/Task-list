<?php
namespace App\Models;
use App\Conf\DB;
/**
 * Main model
 */
abstract class Model
{
    protected $db = null;

    function __construct()
    {
        $this->db = DB::connToDB();
    }
}
