<?php
namespace App\Messages;

/**
 * Basic message class
 */
abstract class Message
{
    public static function send($text, $ajax = '')
    {
        if ($ajax) {
            static::sendToJS($text);
        }
        else {
            static::sendToSession($text);
        }
    }

    protected static function sendToSession($text)
    {
        $_SESSION['message'] = $text;
        $_SESSION['error'] = static::checkError();
    }

    protected static function sendToJS($text)
    {
        $response = json_encode([
            'message' => $text,
            'error' => static::checkError(),
        ]);

        echo $response;
    }
}
