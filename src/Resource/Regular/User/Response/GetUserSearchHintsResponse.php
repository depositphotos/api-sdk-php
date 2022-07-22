<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Response;

use Depositphotos\SDK\Resource\Regular\User\Response\GetUserSearchHints\Hint;
use Depositphotos\SDK\Resource\ResponseObject;

class GetUserSearchHintsResponse extends ResponseObject
{
    /**
     * @return Hint[]
     */
    public function getHints(): array
    {
        return (array) $this->getProperty('hints', Hint::class);
    }
}
