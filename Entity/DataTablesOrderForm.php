<?php

namespace Sm\DatatablesFormBundle\Entity;

/**
 * Represents an order entry.
 *
 * @author Thomas Rudolph <rudolph@secamedia.de>
 * @since 1.0
 */
class DataTablesOrderForm
{
    /**
     * Column index.
     *
     * @var integer
     */
    private $column;

    /**
     * Sort direction.
     *
     * @var string
     */
    private $dir;

    /**
     * Return the column index.
     *
     * @return int
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * Return the sort direction.
     *
     * Values are `asc` or `desc`.
     *
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * Set the column index.
     *
     * @param int $column
     * @return $this
     */
    public function setColumn($column)
    {
        $this->column = $column;

        return $this;
    }

    /**
     * Set the order direction.
     *
     * Values are `asc` or `desc`.
     *
     * @param string $dir
     * @return $this
     */
    public function setDir($dir)
    {
        $this->dir = $dir;

        return $this;
    }
}
