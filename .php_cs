<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules(array(
        '@PSR2' => true,
        'short_array_syntax' => true,
    ))
    ->finder($finder)
;