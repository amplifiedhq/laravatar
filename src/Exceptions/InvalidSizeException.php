<?php

namespace AmplifiedHQ\Laravatar\Exceptions;

use Exception;

final class InvalidSizeException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @param string $message
     * @return \AmplifiedHQ\Laravatar\Exceptions\InvalidSizeException
     */
    public function __construct(string $message = 'Invalid size.')
    {
        parent::__construct($message);
    }
}