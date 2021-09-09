<?php

namespace Learning\Management\Api;

interface LmoRepositoryInterface
{
    /**
     * Return a list of the filtered learning object.
     *
     * @return \Learning\Management\Api\LmoRepositoryInterface[]
     */
    public function getList();

    /**
     * Return a filtered learning object.
     *
     * @param int $id
     * @return \Learning\Management\Api\ResponseLmoInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getItem(int $id);
}
