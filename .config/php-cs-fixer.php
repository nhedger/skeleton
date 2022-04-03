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
    ]
]);

return $config
    ->setCacheFile(__DIR__ . '/../.build/php-cs-fixer/cache')
    ->setRiskyAllowed(true)
    ->setFinder($finder);
