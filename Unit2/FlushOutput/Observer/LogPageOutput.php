<?php
namespace Unit2\FlushOutput\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LogPageOutput implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    private $_logger = null;

    /**
     * @param LoggerInterface $logger
     **/
    public function __construct(LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    /**
     * Log page content
     *
     * @param Observer $observer
     * @return void
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     **/
    public function execute(Observer $observer)
    {
        $response = $observer->getEvent()->getData('response');
        $body = $response->getBody();
        $body = substr($body, 0, 1000);
        $this->_logger->info("--------\n\n\n BODY \n\n\n ". $body, []);
    }
}
