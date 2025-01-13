<?php

namespace J4k\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

/**
 * @see     https://vk.com/dev/fields
 *
 * @package J4k\OAuth2\Client\Provider
 */
class User implements ResourceOwnerInterface
{
    /**
     * @type array
     */
    protected array $response;

    /**
     * User constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->response = $response;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->response;
    }

    /**
     * @return integer
     */
    public function getId(): int
    {
        return (int)($this->getField('uid') ?: $this->getField('id'));
    }

    /**
     * Helper for getting user data
     *
     * @param string $key
     *
     * @return mixed|null
     */
    protected function getField($key): mixed
    {
        return !empty($this->response[$key]) ? $this->response[$key] : null;
    }

    /**
     * @return string|null DD.MM.YYYY
     */
    public function getBirthday(): ?string
    {
        return $this->getField('bdate');
    }

    /**
     * @return array [id =>, title => string]
     */
    public function getCity(): array
    {
        return $this->getField('city');
    }

    /**
     * @return array [id =>, title => string]
     */
    public function getCountry(): array
    {
        return $this->getField('country');
    }

    /**
     * Short address to user page
     *
     * @return string
     */
    public function getDomain(): string
    {
        return $this->getField('domain');
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->getField('first_name');
    }

    /**
     * @return int 0|1|2|3 => nobody|resquest_sent|incoming_request|friends
     */
    public function getFriendStatus(): int
    {
        return $this->getField('friend_Status');
    }

    /**
     * Has user avatar?
     *
     * @return bool
     */
    public function isHasPhoto(): bool
    {
        return (bool)$this->getField('has_photo');
    }

    /**
     * @return string
     */
    public function getHomeTown(): string
    {
        return $this->getField('home_town');
    }

    /**
     * Detect if current user is freind to this
     *
     * @return bool
     */
    public function isFriend(): bool
    {
        return (bool)$this->getField('is_friend');
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->getField('last_name');
    }

    /**
     * @return string
     */
    public function getMaidenName(): string
    {
        return $this->getField('maiden_name');
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->getField('nickname');
    }

    /**
     * It's square!
     *
     * @return string URL
     */
    public function getPhotoMax(): string
    {
        return $this->getField('photo_max');
    }

    /**
     * Any sizes
     *
     * @return string URL
     */
    public function getPhotoMaxOrig(): string
    {
        return $this->getField('photo_max_orig');
    }

    /**
     * @return string
     */
    public function getScreenName(): string
    {
        return $this->getField('screen_name');
    }

    /**
     * @return int 1|2 => woman|man
     */
    public function getSex(): int
    {
        return $this->getField('sex');
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->getField('email');
    }


}
