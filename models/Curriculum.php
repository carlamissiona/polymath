<?php

class Curriculum extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $crm_id;

    /**
     *
     * @var string
     */
    public $crm_name;

    /**
     *
     * @var string
     */
    public $crm_desc;

    /**
     *
     * @var string
     */
    public $crm_isActive;

    /**
     *
     * @var string
     */
    public $crm_date_created;

    /**
     *
     * @var string
     */
    public $crm_date_modified;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'curriculum';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Curriculum[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Curriculum
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
