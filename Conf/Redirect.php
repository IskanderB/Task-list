<?php
namespace App\Conf;

/**
 * Redirect class
 */
class Redirect
{
    const DEFAULT_REDIRECT_PATH = '/';
    private $paths = [
        '/users/login' => 'http://testtask1.ru/users',
    ];
    private $url;

    function __construct($url)
    {
        $this->url = $url;
    }

    public function redirectTo()
    {
        if (isset($this->paths[$this->url])) {
            header('Location: ' . $this->paths[$this->url]);
            exit();
        }
        header('Location: ' . self::DEFAULT_REDIRECT_PATH);
        exit();
    }
}
