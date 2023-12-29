<?php

/**
 * BaseAvatar class for generating avatar URLs.
 *
 * @package Laravatar
 * @license MIT License
 * @since 1.0.0
 * @see https://github.com/amplifiedhq/laravatar
 */

namespace AmplifiedHQ\Laravatar\Abstracts;

use AmplifiedHQ\Laravatar\Contracts\AvatarInterface;

abstract class BaseAvatar implements AvatarInterface
{
    /** @var string Avatar URL */
    protected string $url;

    /** @var string Avatar column (e.g., email or name) */
    protected string $column;

    /** @var int Avatar size */
    protected int $size = 96;

    /**
     * BaseAvatar constructor.
     *
     * @param string $column The column to generate the avatar from. <email|name>
     */
    public function __construct(string $column)
    {
        $this->column = $column;
        $this->generate();
    }

    /**
     * Abstract method to generate a new avatar.
     *
     * @return void
     */
    abstract protected function generate(): void;

    /**
     * Abstract method to set the avatar size.
     * 
     * @param int $size
     * @return self
     */
    abstract public function setSize(int $size): self;

    /**
     * Get the avatar URL.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
