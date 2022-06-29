<?php
namespace Unit2\RouterDash\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;

class Router implements RouterInterface
{
    /**
     * @var ActionFactory
     */
    private $actionPath;

    /**
     * @param ActionFactory $actionFactory
     */
    public function __construct(ActionFactory $actionFactory)
    {
         $this->actionPath = $actionFactory;
    }

    /**
     * Checking the request url pattern
     *
     * @param RequestInterface $request
     * @return ActionInterface|null
     */
    public function match(RequestInterface $request): ?ActionInterface
    {
         $testCategory = 'id/6';
         $info = $request->getPathInfo();
        if (preg_match("%^/(.*?)-(.*?)-(.*?)$%", $info, $m)) {
             $request->setPathInfo(sprintf("/%s/%s/%s/%s", $m[1], $m[2], $m[3], $testCategory));
             return $this->actionPath->create(Magento\Framework\App\Action\Forward::class, ['request' => $request]);
        }
        return null;
    }
}
