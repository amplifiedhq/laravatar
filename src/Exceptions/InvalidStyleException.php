<?php

namespace AmplifiedHQ\Laravatar\Exceptions;

use Exception;

final class InvalidStyleException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @param string $message
     * @return \AmplifiedHQ\Laravatar\Exceptions\InvalidStyleException
     */
    public function __construct(string $message = 'Invalid style.')
    {
        parent::__construct($message);
    }
}