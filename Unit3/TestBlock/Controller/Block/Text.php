<?php

namespace Unit3\TestBlock\Controller\Block;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Text extends Action
{

    /**
     * @var PageFactory
     */
    private $_pageFactory;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * Execute method
     *
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $block = $this->_pageFactory->create()->getLayout()->createBlock(Magento\Framework\View\Element\Text::class);
        $block->setText("Hello World From a New Module!");
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents($block->toHtml());
        return $result;
    }
}
