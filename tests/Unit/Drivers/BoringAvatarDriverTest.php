<?php

declare(strict_types=1);

namespace AmplifiedHQ\Laravatar\Tests;

use AmplifiedHQ\Laravatar\Drivers\BoringAvatar;
use AmplifiedHQ\Laravatar\Tests\TestCase;

uses(TestCase::class)->in('Unit');

it('should return a BoringAvatar URL', function () {
    $boringAvatar = new BoringAvatar('jane@example.com');
    $result = $boringAvatar->getUrl();
    expect($result)->toBeString();
});

it('should return a BoringAvatar URL with the correct variant', function () {
    $boringAvatar = new BoringAvatar('jane@example.com');
    $boringAvatar->setVariant('sunset');
    $result = $boringAvatar->getUrl();
    expect($result)->toContain('variant=sunset');
});

it('should return a BoringAvatar URL with boolean for squareness', function () {
    $boringAvatar = new BoringAvatar('jane@example.com');
    $boringAvatar->setSquared(false);
    $result = $boringAvatar->getUrl();
    expect($result)->toContain('square='.false);
});

it('should return a BoringAvatar URL with the correct size', function () {
    $boringAvatar = new BoringAvatar('john.doe@example.com');
    $boringAvatar->setSize(200);
    $result = $boringAvatar->getUrl();
    expect($result)->toContain('size=200');
});

it('should return a BoringAvatar URL with the correct name/email', function () {
    $boringAvatar = new BoringAvatar('jane@example.com');
    $result = $boringAvatar->getUrl();
    expect($result)->toContain('name='.urlencode('jane@example.com'));
});

// it('should return a BoringAvatar URL with correct colors', function () {
//     $boringAvatar = new BoringAvatar('jane@example.com');
//     $boringAvatar->setColors('lilac');
//     $result = $boringAvatar->getUrl();
//     expect($result)->toContain('lilac');
// });