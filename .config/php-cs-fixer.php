<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/../src')
    ->in(__DIR__ . '/../tests');

$config = new PhpCsFixer\Config();

$config->setRules([
    '@PSR12' => true,
    '@PSR12:risky' => true,
    '@PhpCsFixer' => true,
    '@PhpCsFixer:risky' => true,
    'declare_strict_types' => true,
    'php_unit_test_case_static_method_calls' => [
        'call_type' => 'this'
    ],
    'php_unit_method_casing' => [
        'case' => 'snake_case'
    ],
    'yoda_style' => [
        'equal' => false,
        'identical' => false,
        'less_and_greater' => false,
    ],
    'blank_line_after_opening_tag' => false,
    'linebreak_after_opening_tag' => false,
]);

return $config
    ->setCacheFile(__DIR__ . '/../.build/php-cs-fixer/cache')
    ->setRiskyAllowed(true)
    ->setFinder($finder);
