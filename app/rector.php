<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php71\Rector\FuncCall\RemoveExtraParametersRector;
use Rector\Php74\Rector\LNumber\AddLiteralSeparatorToNumberRector;
use Rector\Php80\Rector\FunctionLike\MixedTypeRector;
use Rector\Php81\Rector\Array_\FirstClassCallableRector;
use Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
//        __DIR__ . '/bootstrap',
        __DIR__ . '/config',
        __DIR__ . '/lang',
        __DIR__ . '/public',
        __DIR__ . '/resources',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
    ])
    ->withRules([
        AddVoidReturnTypeWhereNoReturnRector::class,
    ])
    ->withSkip([
        AddLiteralSeparatorToNumberRector::class, // do not add _ separator to integers
        NullToStrictStringFuncCallArgRector::class,
        MixedTypeRector::class, // do not remove doc comments
        RemoveExtraParametersRector::class, // do not remove parameters from factory in tests
        FirstClassCallableRector::class, // do not modify laravel routing (keep original mapping to classes) https://php.watch/versions/8.1/first-class-callable-syntax
    ])
    ->withSets([
        \RectorLaravel\Set\LaravelSetList::LARAVEL_100,
        \Rector\Set\ValueObject\LevelSetList::UP_TO_PHP_83
    ])->withoutParallel();
