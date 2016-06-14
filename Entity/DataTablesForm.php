<?php

namespace Sm\DatatablesFormBundle\Entity;

/**
 * Represents all DataTables data from a ajax request.
 *
 * @author Thomas Rudolph <rudolph@secamedia.de>
 * @since 1.0
 */
class DataTablesForm
{
    /**
     * Column definitions.
     *
     * @var DataTablesColumnForm[]
     */
    private $columns;

    /**
     * Number of the draw cycle.
     *
     * @var int
     */
    private $draw;

    /**
     * Amount of results to return.
     *
     * @var int
     */
    private $length;

    /**
     * Order definitions.
     *
     * @var DataTablesOrderForm[]
     */
    private $order;

    /**
     * Search value.
     *
     * @var DataTablesSearchForm
     */
    private $search;

    /**
     * Offset for results.
     *
     * @var int
     */
    private $start;

    /**
     * Initiate the column defintions array.
     */
    public function __construct()
    {
        $this->columns = [];
    }

    /**
     * Add a column defintion.
     *
     * @param DataTablesColumnForm $column
     * @return $this
     */
    public function addColumn(DataTablesColumnForm $column)
    {
        $this->columns[] = $column;

        return $this;
    }

    /**
     * Return all column defintions.
     *
     * @return DataTablesColumnForm[]
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Return the number of the draw cycle.
     *
     * @return int
     */
    public function getDraw()
    {
        return $this->draw;
    }

    /**
     * Return the number of results.
     *
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Return the order definitions.
     *
     * @return DataTablesOrderForm[]
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Return the search value.
     *
     * @return DataTablesSearchForm
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * Return the offset for the results.
     *
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Remove a column defintion.
     *
     * @param DataTablesColumnForm $column
     * @return bool
     */
    public function removeColumn(DataTablesColumnForm $column)
    {
        $key = array_search($column, $this->columns, true);

        if (false !== $key)
        {
            unset($this->columns[$key]);

            return true;
        }

        return false;
    }

    /**
     * Set all column defintions.
     *
     * @param DataTablesColumnForm[] $columns
     * @return $this
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;

        return $this;
    }

    /**
     * Set the number of the draw cycle.
     *
     * @param int $draw
     * @return $this
     */
    public function setDraw($draw)
    {
        $this->draw = $draw;

        return $this;
    }

    /**
     * Set the amount of results.
     *
     * @param int $length
     * @return $this
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Set the order defintions.
     *
     * @param DataTablesOrderForm[] $order
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Set the search value.
     *
     * @param DataTablesSearchForm $search
     * @return $this
     */
    public function setSearch($search)
    {
        $this->search = $search;

        return $this;
    }

    /**
     * Set the offset for the results.
     *
     * @param int $start
     * @return $this
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }
}
