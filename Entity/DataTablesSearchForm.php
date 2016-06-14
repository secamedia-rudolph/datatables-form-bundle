<?php

namespace Sm\DatatablesFormBundle\Entity;

/**
 * Represents a search value.
 *
 * @author Thomas Rudolph <rudolph@secamedia.de>
 * @since 1.0
 */
class DataTablesSearchForm
{
    /**
     * If the value is a regular expression.
     *
     * @var boolean
     */
    private $regex;

    /**
     * Search value.
     *
     * @var string
     */
    private $value;

    /**
     * Return the search value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Return if the search value is a regular expression.
     *
     * @return boolean
     */
    public function isRegex()
    {
        return $this->regex;
    }

    /**
     * Set if the search value is a regular expression.
     *
     * @param boolean $regex
     * @return $this
     */
    public function setRegex($regex)
    {
        if ('false' === $regex) {
            $regex = false;
        } elseif ('true' === $regex) {
            $regex = true;
        }
        $this->regex = (bool)$regex;

        return $this;
    }

    /**
     * Set the search value.
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
