<?php

namespace Learning\Management\Model\Api;

use Learning\Management\Api\LmoRepositoryInterface;
use Learning\Management\Model\PostFactory;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class LmoRepositoryModel
 */
class LmoRepository implements LmoRepositoryInterface
{

    /**
     * @var \Learning\Management\Model\PostFactory
     */
    private $postFactory;

    /**
     * @param \Learning\Management\Model\PostFactory $postFactory
     * @param \Learning\Management\Api\RequestLmoInterfaceFactory $requestItemFactory
     * @param \Learning\Management\Api\ResponseLmoInterfaceFactory $responseItemFactory
     */
    public function __construct(
        PostFactory $postFactory
    ) {
        $this->postFactory = $postFactory;
    }

    /**
     * {@inheritDoc}
     *
     * @param int $id
     * @return \Learning\Management\Api\ResponseLmoInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getItem(int $id)
    {
        $collection = $this->getProductCollection()
            ->addAttributeToFilter('post_id', ['eq' => $id]);

        /** @var \Magento\Catalog\Api\Data\ProductInterface $product */
        $product = $collection->getFirstItem();
        if (!$product->getId()) {
            throw new NoSuchEntityException(__('Learning object not found'));
        }

        return json_encode($product);
    }

    /**
     * {@inheritDoc}
     *
     * @return \Learning\Management\Api\ResponseLmoInterface[]
     */
    public function getList()
    {
        $collection = $this->getProductCollection();

        $result = [];
        /** @var \Magento\Catalog\Api\Data\ProductInterface $product */
        foreach ($collection->getItems() as $product) {
            $result[] = $product;
        }

        return json_encode($result);
    }

    /**
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    private function getProductCollection()
    {
        /** @var \Magento\Catalog\Model\ResourceModel\Product\Collection $collection */
        $collection = $this->postFactory->create();

        // $collection
        //     ->addAttributeToSelect(
        //         [
        //             'post_id',
        //             'title',
        //             'summary',
        //             'image',
        //             'detail'
        //         ],
        //         'left'
        //     );

        return $collection;
    }
}
