<?php

namespace Learning\Management\Api\Api;

/**
 * Interface RequestItemInterface
 *
 * @api
 */
interface RequestItemInterface
{
    const DATA_ID = 'id';
    const DATA_DESCRIPTION = 'description';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id);
}
