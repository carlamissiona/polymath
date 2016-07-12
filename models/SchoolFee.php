<?php

class SchoolFee extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $scf_id;

    /**
     *
     * @var string
     */
    public $scf_name;

    /**
     *
     * @var string
     */
    public $scf_desc;

    /**
     *
     * @var string
     */
    public $scf_isActive;

    /**
     *
     * @var string
     */
    public $scf_due;

    /**
     *
     * @var string
     */
    public $scf_date_created;

    /**
     *
     * @var string
     */
    public $scf_date_modified;
     
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'school_fee';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SchoolFee[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SchoolFee
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
