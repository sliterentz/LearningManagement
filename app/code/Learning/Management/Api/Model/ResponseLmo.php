<?php

namespace Learning\Management\Api;

use Learning\Management\Api\ResponseLmoInterface;
use Magento\Framework\DataObject;

/**
 * Class ResponseLmo
 */
class ResponseLmo extends DataObject implements ResponseLmoInterface
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_getData(self::DATA_ID);
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
