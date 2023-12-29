<?php

namespace AmplifiedHQ\Laravatar\Exceptions;

use Exception;

final class InvalidFormatException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @param string $message
     * @return \AmplifiedHQ\Laravatar\Exceptions\InvalidFormatException
     */
    public function __construct(string $message = 'Invalid format.')
    {
        parent::__construct($message);
    }
}