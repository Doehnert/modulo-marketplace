<?php
/* File: app/code/Atwix/OrderFeedback/Plugin/OrderRepositoryPlugin.php */

namespace Vexpro\Marketplace\Plugin;

use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderExtensionInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\Data\OrderSearchResultInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

/**
 * Class OrderRepositoryPlugin
 */
class OrderRepositoryPlugin
{
    /**
     * Order feedback field name
     */
    const NUMERO_NOTA = 'numero_nota';
    const CHAVE_NOTA = 'chave_nota';

    /**
     * Order Extension Attributes Factory
     *
     * @var OrderExtensionFactory
     */
    protected $extensionFactory;

    /**
     * OrderRepositoryPlugin constructor
     *
     * @param OrderExtensionFactory $extensionFactory
     */
    public function __construct(OrderExtensionFactory $extensionFactory)
    {
        $this->extensionFactory = $extensionFactory;
    }

    /**
     * @param OrderRepositoryInterface $subject
     * @param OrderInterface $order
     * @return array
     */
    public function beforeSave(
        OrderRepositoryInterface $subject,
        OrderInterface $order
    )
    {
        $total = 0;
        $order_id = $order->getEntityId();
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $order = $objectManager->create('\Magento\Sales\Model\OrderRepository')->get($order_id);
        $orderItems = $order->getAllItems();

        foreach($orderItems as $item)
        {
            $product_qty = $item->getQtyOrdered();
            $total += $item->getPoints()*$product_qty;
        }
        $extensionAttributes = $order->getExtensionAttributes() ?: $this->extensionFactory->create();
        if ($extensionAttributes !== null && $extensionAttributes->getNumeroNota() !== null) {
            $order->setNumeroNota($extensionAttributes->getNumeroNota());
            $order->setChaveNota($extensionAttributes->getChaveNota());
        }

        // Total do preço em pontos de todos os produtos pedidos
        $total = 0;


        return [$order];
    }

}