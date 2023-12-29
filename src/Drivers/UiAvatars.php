<?php

/**
 * UiAvatar class for generating UiAvatar URLs.
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

class UiAvatars extends BaseAvatar
{
    /** @var string UiAvatar API URL */
    protected string $apiUrl = 'https://ui-avatars.com';

    /** @var array Avatar formats */
    protected array $formats = ['png', 'svg'];

    /** @var bool Rounded avatar */
    protected bool $rounded = false;

    /** @var array Avatar size range */
    protected array $sizeRange = [16, 512];

    /** @var string Avatar background color */
    protected string $background;

    /** @var string Avatar text color */
    protected string $color;

    /** @var string Avatar format (e.g., png or jpg) */
    protected string $format = 'png';

    /**
     * UiAvatar constructor.
     * 
     * @param string $column The column to generate the avatar from. <email|name>
     */
    public function __construct(string $column)
    {
        $this->background = generate_color('hex');
        $this->color = generate_color('hex');
        parent::__construct($column);
    }

    /**
     * Generate a new avatar.
     * 
     * @return void
     */
    protected function generate(): void
    {
        $this->url = "{$this->apiUrl}/api/?name=" . urlencode($this->column) . "&size={$this->size}&background={$this->background}&color={$this->color}&rounded={$this->rounded}&format={$this->format}";
    }

    /**
     * Set the avatar size.
     * 
     * @param int $size
     * @return self
     */
    public function setSize(int $size): self
    {
        if ($size < $this->sizeRange[0] || $size > $this->sizeRange[1]) {
            throw new InvalidSizeException("Avatar size must be between {$this->sizeRange[0]} and {$this->sizeRange[1]}.");
        }
        $this->size = $size;

        $this->generate();

        return $this;
    }

    /**
     * Set the avatar background color.
     * 
     * @param string $color
     * @return self
     */
    public function setBackground(string $color): self
    {
        $this->background = $color;

        $this->generate();

        return $this;
    }

    /**
     * Set the avatar text color.
     * 
     * @param string $color
     * @return self
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

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

    /**
     * Set the avatar to be rounded.
     * 
     * @param bool $rounded
     * @return self
     */
    public function setRounded(bool $rounded): self
    {
        $this->rounded = $rounded;

        $this->generate();

        return $this;
    }
}
