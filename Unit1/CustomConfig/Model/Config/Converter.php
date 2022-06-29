<?php

namespace Unit1\CustomConfig\Model\Config;

use DOMDocument;
use DOMNode;
use DOMXPath;
use InvalidArgumentException;
use Magento\Framework\Config\ConverterInterface;

class Converter implements ConverterInterface
{
    /**
     * Convert dom node tree to array
     *
     * @param DOMDocument $source
     * @return array
     * @throws InvalidArgumentException
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function convert($source): array
    {
        $output = [];
        $xpath = new DOMXPath($source);
        $messages = $xpath->evaluate('/config/welcome_message');
        /** @var $messageNode DOMNode */
        foreach ($messages as $messageNode) {
            $storeId = $this->_getAttributeValue($messageNode, 'store_id');

            $data = [];
            /** @var $childNode DOMNode */
            foreach ($messageNode->childNodes as $childNode) {
                $data = ['message' => $childNode->nodeValue];
            }
            $output['messages'][$storeId] = $data;
        }

        return $output;
    }

    /**
     * Get attribute value
     *
     * @param DOMNode $input
     * @param string $attributeName
     * @param string|null $default
     * @return null|string
     */
    protected function _getAttributeValue(DOMNode $input, string $attributeName, string $default = null): ?string
    {
        $node = $input->attributes->getNamedItem($attributeName);
        return $node ? $node->nodeValue : $default;
    }
}
