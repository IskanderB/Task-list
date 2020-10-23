<?php
namespace App\Views;
/**
 * Main view
 */
class View
{
    public function render($tpl, $pageData)
    {
        require_once TPL_PATH . 'layout.tpl.php';
    }
}
