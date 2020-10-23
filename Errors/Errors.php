<?php
namespace App\Errors;
use App\Messages\NegativeMessage;
use App\Conf\Redirect;
/**
 * Errors base class
 */
abstract class Errors
{
    protected $url;
    protected $ajax;

    public function __construct($ajax, $url)
    {
        $this->url = $url;
        $this->ajax = $ajax;
    }

    public function error($nameInvalidData = '', $requirementData = '')
    {
        $message = $this->buildMessage($nameInvalidData, $requirementData);
        $this->sendMessage($message);
    }

    protected function buildMessage($nameInvalidData, $requirementData)
    {
        $requirementStr = $this->implode($requirementData);
        return ucfirst($nameInvalidData) . $this->messageBase . $requirementStr;
    }

    protected function implode($requirementData)
    {
        if ($requirementData and gettype($requirementData) == 'array') {
            return implode(', ', $requirementData);
        }
        return $requirementData;
    }

    protected function sendMessage($message)
    {
        if ($this->ajax) {
            $this->echo($message);
        }
        else {
            $this->session($message);
        }
    }

    protected function session($message)
    {
        NegativeMessage::send($message);

        $this->redirect();
    }

    protected function echo($message)
    {
        NegativeMessage::send($message, $this->ajax);

        exit;
    }

    protected function redirect()
    {
        $redirect = new Redirect($this->url);
        $redirect->redirectTo();
    }

}
