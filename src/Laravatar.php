<?php

namespace AmplifiedHQ\Laravatar;

use AmplifiedHQ\Laravatar\Drivers\BoringAvatar;
use AmplifiedHQ\Laravatar\Drivers\DiceBear;
use AmplifiedHQ\Laravatar\Drivers\Gravatar;
use AmplifiedHQ\Laravatar\Drivers\UiAvatars;
use AmplifiedHQ\Laravatar\Exceptions\UnsupportedDriverException;
use Illuminate\Support\Facades\Log;

class Laravatar
{
    /** @var string defaultDriver */
    protected $defaultDriver;

    /** @var string $column value */
    protected $columnValue;

    protected $driver;
    
    /**
     * Create a new Laravatar instance.
     *
     * @return void
     */
    public function __construct(string $key = 'Jane Doe')
    {
        $this->defaultDriver = config('laravatar.default');
        $this->columnValue = $key;
        $this->getDriver();
    }

    /**
     * Get the driver instance.
     * 
     * @return void
     */
    protected function getDriver(): void
    {
        switch ($this->defaultDriver) {
            case 'boringavatar':
                $this->driver = new BoringAvatar($this->columnValue);
                break;
            case 'dicebear':
                $this->driver = new DiceBear($this->columnValue);
                break;
            case 'gravatar':
                $this->driver = new Gravatar($this->columnValue);
                break;
            case 'ui-avatars':
                $this->driver = new UiAvatars($this->columnValue);
                break;
            default:
                throw new UnsupportedDriverException("The driver {$this->defaultDriver} is not supported.");
        }
    }

    /**
     * Generate a new avatar URL.
     * 
     * @return void
     */
    public function generate(): void
    {
        switch ($this->defaultDriver) {
            case 'boringavatar':
                $this->driver->setVariant(config('laravatar.drivers.boringavatar.options.variant'));
                $this->driver->setSquared(config('laravatar.drivers.boringavatar.options.squared'));
                $this->driver->setSize(config('laravatar.drivers.boringavatar.options.size'));
                break;
            case 'dicebear':
                $this->driver->setStyle(config('laravatar.drivers.dicebear.options.style'));
                $this->driver->setFormat(config('laravatar.drivers.dicebear.options.format'));
                $this->driver->setSize(config('laravatar.drivers.dicebear.options.size'));
                break;
            case 'gravatar':
                Log::info('Laravatar: ' . config('laravatar.drivers.gravatar.options.size'));
                $this->driver->setSize(config('laravatar.drivers.gravatar.options.size'));
                break;
            case 'ui-avatars':
                $this->driver->setRounded(config('laravatar.drivers.ui-avatars.options.rounded'));
                $this->driver->setFormat(config('laravatar.drivers.ui-avatars.options.format'));
                $this->driver->setSize(config('laravatar.drivers.ui-avatars.options.size'));
                // $this->driver->setBackground(config('laravatar.drivers.ui-avatars.options.background'));
                // $this->driver->setColor(config('laravatar.drivers.ui-avatars.options.color'));
                break;
            default:
                throw new UnsupportedDriverException("The driver {$this->defaultDriver} is not supported.");
        }
    }

    /**
     * Get the avatar URL.
     * 
     * @return string
     */
    public function getUrl(): string
    {
        $this->generate();
        return $this->driver->getUrl();
    }
}
