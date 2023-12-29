<?php

declare(strict_types=1);

namespace AmplifiedHQ\Laravatar\Tests;

use AmplifiedHQ\Laravatar\Drivers\Gravatar;
use AmplifiedHQ\Laravatar\Tests\TestCase;

uses(TestCase::class)->in('Unit');

it('should return a Gravatar URL', function () {
    $gravatar = new Gravatar('jane@example.com');
    $result = $gravatar->getUrl();
    expect($result)->toBeString();
});

it('should return a Gravatar URL with a the correct hash', function () {
    $gravatar = new Gravatar('jane@example.com');
    $gravatar->setSize(200);
    $result = $gravatar->getUrl();
    expect($result)->toContain(md5(strtolower(trim('jane@example.com'))));
});

it('should return a Gravatar URL with a the correct size', function () {
    $gravatar = new Gravatar('john.doe@example.com');
    $gravatar->setSize(200);
    $result = $gravatar->getUrl();
    expect($result)->toContain('s=200');
});