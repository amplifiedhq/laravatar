<?php

namespace AmplifiedHQ\Laravatar\Tests;


use AmplifiedHQ\Laravatar\Laravatar;

test('it can be instantiated', function () {
    $laravatar = new Laravatar('Jane Doe');

    expect($laravatar)->toBeInstanceOf(Laravatar::class);
});