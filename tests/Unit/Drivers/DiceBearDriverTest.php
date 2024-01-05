<?php

declare(strict_types=1);

namespace AmplifiedHQ\Laravatar\Tests;

use AmplifiedHQ\Laravatar\Drivers\DiceBear;
use AmplifiedHQ\Laravatar\Tests\TestCase;

uses(TestCase::class)->in('Unit');

it('should return a DiceBear URL', function () {
    $diceBear = new DiceBear('jane@example.com');
    $result = $diceBear->getUrl();
    expect($result)->toBeString();
});

it('should return a DiceBear URL with a correct style', function () {
    $diceBear = new DiceBear('jane@example.com');
    $diceBear->setStyle('croodles');
    $result = $diceBear->getUrl();
    expect($result)->toContain('croodles');
});

it('should return a DiceBear URL with a correct size', function () {
    $diceBear = new DiceBear('john.doe@example.com');
    $diceBear->setSize(32);
    $result = $diceBear->getUrl();
    expect($result)->toContain('size=32');
});

it('should return a DiceBear URL with a correct format', function () {
    $diceBear = new DiceBear('john.doe@example.com');
    $diceBear->setFormat('png');
    $result = $diceBear->getUrl();
    expect($result)->toContain('png');
});