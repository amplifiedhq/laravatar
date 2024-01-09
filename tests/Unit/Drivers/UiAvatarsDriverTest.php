<?php

declare(strict_types=1);

namespace AmplifiedHQ\Laravatar\Tests;

use AmplifiedHQ\Laravatar\Drivers\UiAvatars;
use AmplifiedHQ\Laravatar\Tests\TestCase;

uses(TestCase::class)->in('Unit');

it('should return a UiAvatars URL', function () {
    $uiAvatars = new UiAvatars('jane@example.com');
    $result = $uiAvatars->getUrl();
    expect($result)->toBeString();
});

it('should return a UiAvatars URL with a correct size', function () {
    $uiAvatars = new UiAvatars('john.doe@example.com');
    $uiAvatars->setSize(32);
    $result = $uiAvatars->getUrl();
    expect($result)->toContain('size=32');
});

it('should return a UiAvatars URL with a correct background color', function () {
    $uiAvatars = new UiAvatars('jane@example.com');
    $uiAvatars->setBackground('blue');
    $result = $uiAvatars->getUrl();
    expect($result)->toContain('background=blue');
});

it('should return a UiAvatars URL with a correct color', function () {
    $uiAvatars = new UiAvatars('john.doe@example.com');
    $uiAvatars->setColor('white');
    $result = $uiAvatars->getUrl();
    expect($result)->toContain('white');
});

it('should return a UiAvatars URL with a correct format', function () {
    $uiAvatars = new UiAvatars('john.doe@example.com');
    $uiAvatars->setFormat('png');
    $result = $uiAvatars->getUrl();
    expect($result)->toContain('format=png');
});

it('should return a UiAvatars URL with a boolean for roundedness', function () {
    $uiAvatars = new UiAvatars('john.doe@example.com');
    $uiAvatars->setRounded(true);
    $result = $uiAvatars->getUrl();
    expect($result)->toContain('rounded='.true);
});