<?php

namespace Learning\Management\Api;

/**
 * Interface ResponseLmoInterface
 *
 * @api
 */
interface ResponseLmoInterface
{
    const DATA_ID = 'id';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getSku();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string|null
     */
    public function getDescription();

    // optional setters:

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id);
}
