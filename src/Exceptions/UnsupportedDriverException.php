<?php

namespace AmplifiedHQ\Laravatar\Exceptions;

use Exception;

final class UnsupportedDriverException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @param string $message
     * @return \AmplifiedHQ\Laravatar\Exceptions\UnsupportedDriverException
     */
    public function __construct(string $message = 'Unsupported driver.')
    {
        parent::__construct($message);
    }
}