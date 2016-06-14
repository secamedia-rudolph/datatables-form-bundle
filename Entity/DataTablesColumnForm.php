<?php

namespace Sm\DatatablesFormBundle\Entity;

/**
 * Represents one column definition from DataTables.
 *
 * @author Thomas Rudolph <rudolph@secamedia.de>
 * @since 1.0
 */
class DataTablesColumnForm
{
    /**
     * Data name.
     *
     * @var string
     */
    private $data;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * Is the column orderable?
     *
     * @var boolean
     */
    private $orderable;

    /**
     * Search value for the column.
     *
     * @var DataTablesSearchForm
     */
    private $search;

    /**
     * Is the column searchable?
     *
     * @var boolean
     */
    private $searchable;

    /**
     * Get the data name.
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the search from the column.
     *
     * @return DataTablesSearchForm
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * Get if the column is orderable.
     *
     * @return boolean
     */
    public function isOrderable()
    {
        return $this->orderable;
    }

    /**
     * Get if the column is searchable.
     *
     * @return boolean
     */
    public function isSearchable()
    {
        return $this->searchable;
    }

    /**
     * Set the data name.
     *
     * @param string $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Set the name.
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set if the column is orderable.
     *
     * @param boolean $orderable
     * @return $this
     */
    public function setOrderable($orderable)
    {
        if ('false' === $orderable) {
            $orderable = false;
        } elseif ('true' === $orderable) {
            $orderable = true;
        }
        $this->orderable = (bool)$orderable;

        return $this;
    }

    /**
     * Set the search from the column.
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
     * Set if the column is searchable.
     *
     * @param boolean $searchable
     * @return $this
     */
    public function setSearchable($searchable)
    {
        if ('false' === $searchable) {
            $searchable = false;
        } elseif ('true' === $searchable) {
            $searchable = true;
        }
        $this->searchable = (bool)$searchable;

        return $this;
    }
}
