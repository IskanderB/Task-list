<?php
namespace App\Messages;

/**
 * Positive message class
 */
class PositiveMessage extends Message
{
    protected static function checkError()
    {
        return false;
    }
}
