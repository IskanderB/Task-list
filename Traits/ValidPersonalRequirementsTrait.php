<?php
namespace App\Traits;
/**
 * ValidRequirementsTrait
 */
trait ValidPersonalRequirementsTrait
{

    private $personalRequirements = [
        'name'     => [
            'size' => ValidCommonRequirementsClass::DEFAULT_STR_SIZE,
            'empty' => true,
            'symbols' => false,
        ],
        'email'    => [
            'size' => ValidCommonRequirementsClass::DEFAULT_STR_SIZE,
            'empty' => true,
            'symbols' => ['@', '.'],
        ],
        'content'  => [
            'size' => ValidCommonRequirementsClass::DEFAULT_TEXT_SIZE,
            'empty' => true,
            'symbols' => false,
        ],
        'checkbox' => [
            'size' => ValidCommonRequirementsClass::DEFAULT_STR_SIZE,
            'empty' => true,
            'symbols' => false,
        ],
        'login' => [
            'size' => ValidCommonRequirementsClass::DEFAULT_STR_SIZE,
            'empty' => true,
            'symbols' => false,
        ],
        'password' => [
            'size' => ValidCommonRequirementsClass::DEFAULT_STR_SIZE,
            'empty' => true,
            'symbols' => false,
        ],
        'done' => [
            'size' => ValidCommonRequirementsClass::DEFAULT_STR_SIZE,
            'empty' => true,
            'symbols' => false,
        ],
    ];
}
