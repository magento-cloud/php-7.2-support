<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Json;

/**
 * @deprecated 100.2.0 @see \Magento\Framework\Serialize\Serializer\Json::serialize
 */
class Encoder implements EncoderInterface
{
    /**
     * Translator
     *
     * @var \Magento\Framework\Translate\InlineInterface
     */
    protected $translateInline;

    /**
     * @var \Magento\Framework\Serialize\Serializer\Json
     */
    private $jsonSerializer;

    /**
     * @param \Magento\Framework\Translate\InlineInterface $translateInline
     * @param \Magento\Framework\Serialize\Serializer\Json $jsonSerializer
     */
    public function __construct(
        \Magento\Framework\Translate\InlineInterface $translateInline,
        \Magento\Framework\Serialize\Serializer\Json $jsonSerializer
    ) {
        $this->translateInline = $translateInline;
        $this->jsonSerializer = $jsonSerializer;
    }

    /**
     * Encode the mixed $data into the JSON format.
     *
     * Return the string 'null' if encoding fails in order to emulate the behavior of previous Zend_Json encoder.
     *
     * @param mixed $data
     * @return string
     */
    public function encode($data)
    {
        $this->translateInline->processResponseBody($data);
        try {
            return $this->jsonSerializer->serialize($data);
        } catch (\InvalidArgumentException $e) {
            return 'null';
        }
    }
}
