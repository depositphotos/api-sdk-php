<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Response\GetUserSearchHints;

use Depositphotos\SDK\Resource\ResponseObject;

class Hint extends ResponseObject
{
    public function getSellerId(): int
    {
        return (int) $this->getProperty('sellerId');;
    }

    public function getOnlinePhotos(): int
    {
        return (int) $this->getProperty('onlinePhotos');
    }

    public function getOnlineFiles(): int
    {
        return (int) $this->getProperty('onlineFiles');
    }

    public function getAvatar(): string
    {
        return (string) $this->getProperty('avatar');
    }

    public function getPhraseMatched(): string
    {
        return (string) $this->getProperty('phraseMatched');
    }

    public function getPhraseSuggestion(): string
    {
        return (string) $this->getProperty('phraseSuggestion');
    }

    public function getPhrase(): string
    {
        return (string) $this->getProperty('phrase');
    }

    public function getSellerInfo(): string
    {
        return (string) $this->getProperty('sellerInfo');
    }

    public function getSellerUrl(): string
    {
        return (string) $this->getProperty('sellerUrl');
    }
}
