<?php

/**
 * BoringAvatar class for generating BoringAvatar URLs.
 *
 * @package Laravatar
 * @license MIT License
 * @since 1.0.0
 * @see https://github.com/amplifiedhq/laravatar
 */

namespace AmplifiedHQ\Laravatar\Drivers;

use AmplifiedHQ\Laravatar\Abstracts\BaseAvatar;
use AmplifiedHQ\Laravatar\Exceptions\InvalidVariantException;

class BoringAvatar extends BaseAvatar
{
    /** @var string Avatar API URL */
    protected string $apiUrl = 'https://boring-avatars-api.vercel.app/api/avatar';

    /** @var array Avatar sizes */
    protected array $sizes = [16, 32, 48, 64, 96, 128, 256, 512];

    /** @var array Avatar variants */
    protected array $variants = ['marble', 'beam', 'pixel', 'sunset', 'ring', 'bauhaus'];

    /** @var string Avatar variant */
    protected string $variant = 'marble';

    /** @var bool Squared avatar */
    protected bool $squared = false;

    /**
     * Generate a new avatar.
     * 
     * @return void
     */
    protected function generate(): void
    {
        $this->url = "{$this->apiUrl}?size={$this->size}&variant={$this->variant}&name=" . urlencode($this->column) . "&square={$this->squared}";
    }

    /**
     * Set the avatar size.
     * 
     * @param int $size
     * @return self
     */
    public function setSize(int $size): self
    {
        $this->size = $size;
        $this->generate();
        return $this;
    }

    /**
     * Set the avatar variant.
     * 
     * @param string $variant
     * @return self
     */
    public function setVariant(string $variant): self
    {
        if (!in_array($variant, $this->variants)) {
            throw new InvalidVariantException("Invalid variant: {$variant}");
        }

        $this->variant = $variant;
        $this->generate();
        return $this;
    }

    /**
     * Set the avatar to be squared.
     * 
     * @param bool $squared
     * @return self
     */
    public function setSquared(bool $squared): self
    {
        $this->squared = $squared;
        $this->generate();
        return $this;
    }

    /**
     * Set the avatar colors.
     * 
     * @param string $colors
     * @return self
     */
    public function setColors(string $colors): self
    {
        $this->url .= "&colors={$colors}";
        $this->generate();
        return $this;
    }
}
