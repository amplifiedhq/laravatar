<?php

/**
 * DiceBear class for generating DiceBear URLs.
 *
 * @package Laravatar
 * @license MIT License
 * @since 1.0.0
 * @see https://github.com/amplifiedhq/laravatar
 */

namespace AmplifiedHQ\Laravatar\Drivers;

use AmplifiedHQ\Laravatar\Abstracts\BaseAvatar;
use AmplifiedHQ\Laravatar\Exceptions\InvalidFormatException;
use AmplifiedHQ\Laravatar\Exceptions\InvalidSizeException;
use AmplifiedHQ\Laravatar\Exceptions\InvalidStyleException;

class DiceBear extends BaseAvatar
{
    /** @var string Avatar API URL */
    protected string $apiUrl = 'https://api.dicebear.com';

    /** @var string Avatar version */
    protected string $version = '7.x';

    /** @var array Avatar styles */
    protected array $styles = [
        'adventurer', 'adventurer-neutral',
        'avataaars', 'avataaars-neutral',
        'big-ears', 'big-ears-neutral',
        'big-smile', 'bottts', 'bottts-neutral',
        'croodles', 'croodles-neutral',
        'fun-emoji', 'icons', 'identicon', 'initials',
        'lorelei', 'lorelei-neutral', 'micah', 'miniavs',
        'notionists', 'notionists-neutral', 'open-peeps',
        'personas', 'pixel-art', 'pixel-art-neutral',
        'shapes', 'thumbs'
    ];

    /** @var array Avatar formats */
    protected array $formats = ['svg', 'png', 'jpg'];

    /** @var array Avatar sizes */
    protected array $sizes = [32, 48, 64, 80, 96];

    /** @var string Avatar style */
    protected string $style = 'avataaars';

    /** @var string Avatar format */
    protected string $format = 'svg';

    /**
     * Generate a new avatar.
     * 
     * @return void
     */
    protected function generate(): void
    {
        $this->url = "{$this->apiUrl}/{$this->version}/{$this->style}/{$this->format}?size={$this->size}&seed={$this->column}";
    }

    /**
     * Set the avatar style.
     * 
     * @param string $style
     * @return self
     */
    public function setStyle(string $style): self
    {
        if (!in_array($style, $this->styles)) {
            throw new InvalidStyleException("Invalid style: {$style}");
        }

        $this->style = $style;
        $this->generate();
        return $this;
    }

    /**
     * Set the avatar size.
     * 
     * @param int $size
     * @return self
     */
    public function setSize(int $size): self
    {
        if (!in_array($size, $this->sizes)) {
            throw new InvalidSizeException('Invalid avatar size.');
        }

        $this->size = $size;
        $this->generate();
        return $this;
    }

    /**
     * Set the avatar format.
     * 
     * @param string $format
     * @return self
     */
    public function setFormat(string $format): self
    {
        if (!in_array($format, $this->formats)) {
            throw new InvalidFormatException("Invalid format: {$format}");
        }

        $this->format = $format;
        $this->generate();
        return $this;
    }
}
