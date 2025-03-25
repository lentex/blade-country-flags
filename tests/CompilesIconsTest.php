<?php

declare(strict_types=1);

uses(Lentex\BladeCountryFlags\Tests\TestCase::class);

it('compiles a single anonymous component', function () {
    $result = svg('flag-4x3-be')->toHtml();

    expect($result)->toMatchSnapshot();
});

it('can add classes to icons', function () {
    $result = svg('flag-4x3-be', 'w-6')->toHtml();

    expect($result)->toMatchSnapshot();
});

it('can add styles to icons', function () {
    $result = svg('flag-4x3-be', ['style' => 'width: 1.5rem'])->toHtml();

    expect($result)->toMatchSnapshot();
});
