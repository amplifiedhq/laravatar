<?php

namespace AmplifiedHQ\Laravatar\Exceptions;

use Exception;

final class MissingPropertyException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @param string $message
     * @return \AmplifiedHQ\Laravatar\Exceptions\MissingPropertyException
     */
    public function __construct(string $message = 'Missing property.')
    {
        parent::__construct($message);
    }
}