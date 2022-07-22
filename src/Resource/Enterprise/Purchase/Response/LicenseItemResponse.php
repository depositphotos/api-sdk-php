<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Purchase\Response;

use Depositphotos\SDK\Resource\Enterprise\Purchase\Response\LicenseItem\Error;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Response\LicenseItem\Success;
use Depositphotos\SDK\Resource\ResponseObject;

class LicenseItemResponse extends ResponseObject
{
    public function getResult(): array
    {
        $result = [];

        foreach ($this->data as $itemId => $raw) {
            $resultType = $raw['result'] ?? null;

            if ($resultType === 'success') {
                $result[] = new Success($raw);
            } elseif ($resultType === 'error') {
                $errors = $raw['errors'] ?? [];
                $result[] = new Error((int) $itemId, (string) $errors[0]['error_message'], (int) $errors[0]['error_code']);
            }
        }

        return $result;
    }
}
