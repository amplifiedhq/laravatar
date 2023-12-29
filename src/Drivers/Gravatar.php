<?php

/**
 * Gravatar class for generating Gravatar URLs.
 *
 * @package Laravatar
 * @license MIT License
 * @since 1.0.0
 * @see https://github.com/amplifiedhq/laravatar
 */

namespace AmplifiedHQ\Laravatar\Drivers;

use AmplifiedHQ\Laravatar\Abstracts\BaseAvatar;

class Gravatar extends BaseAvatar
{
    /** @var string Gravatar API URL */
    protected string $apiUrl = 'https://www.gravatar.com/avatar';

    /**
     * Gravatar constructor.
     *
     * @param string $column The column to generate the avatar from. <email|name>
     */
    public function __construct(string $column)
    {
        $this->column = $column;
        $this->generate();
    }

    /**
     * Generate a new avatar URL.
     *
     * @return void
     */
    protected function generate(): void
    {
        $this->url = "{$this->apiUrl}/" . md5(strtolower(trim($this->column))) . "?s={$this->size}";
    }

    /**
     * Set the avatar size.
     *
     * @param int $size Avatar size
     * @return self
     */
    public function setSize(int $size): self
    {
        $this->size = $size;
        $this->generate();
        return $this;
    }
}
