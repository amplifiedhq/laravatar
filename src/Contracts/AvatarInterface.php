<?php

/**
 * Copyright (c) AmplifiedHQ
 * 
 * @package Laravatar
 * @license MIT License
 * 
 * For the full license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * @since 1.0.0
 * @see https://github.com/amplifiedhq/laravatar
 */

namespace  AmplifiedHQ\Laravatar\Contracts;

interface AvatarInterface
{
    /**
     * Set the avatar size.
     * 
     * @param int $size
     * @return self
     */
    public function setSize(int $size): self;

    /**
     * Get the avatar url.
     * 
     * @return string
     */
    public function getUrl(): string;
}