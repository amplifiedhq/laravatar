<?php

namespace AmplifiedHQ\Laravatar;

use AmplifiedHQ\Laravatar\Laravatar;

trait HasAvatar
{
    /**
     * @mixin \Illuminate\Database\Eloquent\Model
     *
     * Boot the HasAvatar trait for the model.
     * @return void
     */
    public static function bootHasAvatar()
    {
        static::creating(function ($model) {
            $model->generateAndSaveAvatar();
        });
    }


    /**
     * Get the column to generate the avatar from.
     * 
     * @return string
     */
    public function getAvatarColumn(): string
    {
        return $this->avatarColumn ?? 'email';
    }

    /**
     * Get the column where the avatar is stored.
     * 
     * @return string
     */ 
    public function getAvatarStorageColumn(): string
    {
        return $this->avatarStorageColumn ?? 'avatar';
    }

     /**
     * Generate and save the Avatar URL for the model.
     * 
     * @return void
     */
    public function generateAndSaveAvatar(): void
    {
        $avatarColumn = $this->getAvatarColumn();
        $avatarStorageColumn = $this->getAvatarStorageColumn();

        if (!property_exists($this, $avatarColumn) || !property_exists($this, $avatarStorageColumn)) {
            throw new ("Both {$avatarColumn} and {$avatarStorageColumn} properties must be set in the model.");
        }

        $this->attributes[$avatarStorageColumn] = $this->getAvatarUrl();
    }

    /**
     * Get the avatar URL.
     * 
     * @return string
     */
    public function getAvatarUrl(): string
    {
        return (new Laravatar($this->{$this->getAvatarColumn()}))->getUrl();
    }
}