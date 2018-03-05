<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Json;

use Magento\Framework\Serialize\Serializer\Json;

/**
 * @deprecated 100.2.0 @see \Magento\Framework\Serialize\Serializer\Json::unserialize
 */
class Decoder implements DecoderInterface
{
    /**
     * @var Json
     */
    private $jsonSerializer;

    /**
     * @param Json $jsonSerializer
     */
    public function __construct(Json $jsonSerializer) {
        $this->jsonSerializer = $jsonSerializer;
    }


    /**
     * Decodes the given $data string which is encoded in the JSON format.
     *
     * @param string $data
     * @return mixed
     */
    public function decode($data)
    {
        return $this->jsonSerializer->unserialize($data);
    }
}
