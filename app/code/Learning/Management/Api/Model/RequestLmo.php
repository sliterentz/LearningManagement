<?php

namespace Learning\Management\Api\Model;

use Learning\Management\Api\RequestLmoInterface;
use Magento\Framework\DataObject;

/**
 * Class RequestLmo
 */
class RequestLmo extends DataObject implements RequestLmoInterface
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_getData(self::DATA_ID);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_getData(self::DATA_DESCRIPTION);
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        return $this->setData(self::DATA_ID, $id);
    }
}
