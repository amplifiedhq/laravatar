<?php

namespace AmplifiedHQ\Laravatar\Exceptions;

use Exception;

final class InvalidVariantException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @param string $message
     * @return \AmplifiedHQ\Laravatar\Exceptions\InvalidVariantException
     */
    public function __construct(string $message = 'Invalid variant.')
    {
        parent::__construct($message);
    }
}