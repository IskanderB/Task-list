<?php
namespace App\Messages;

/**
 * Negative message class
 */
class NegativeMessage extends Message
{
    protected static function checkError()
    {
        return true;
    }
}
