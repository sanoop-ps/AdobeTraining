<?php
namespace Unit1\LogPathInfo\Observer;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class Log implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    private $_logger;
    /**
     * @var RequestInterface
     */
    private $_request;

    /**
     * constructor
     *
     * @param LoggerInterface $logger
     * @param RequestInterface $request
     */
    public function __construct(LoggerInterface $logger, RequestInterface $request)
    {
         $this->_logger = $logger;
         $this->_request = $request;
    }

    /**
     * Return value in logger
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $this->_logger->critical('Request URI: ' . $this->_request->getPathInfo());
    }
}
