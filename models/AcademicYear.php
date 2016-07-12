<?php

class AcademicYear extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $acd_id;

    /**
     *
     * @var string
     */
    public $acd_name;

    /**
     *
     * @var string
     */
    public $acd_date_start;

    /**
     *
     * @var string
     */
    public $acd_date_end;

    /**
     *
     * @var string
     */
    public $acd_isActive;

    /**
     *
     * @var string
     */
    public $acd_date_created;

    /**
     *
     * @var string
     */
    public $acd_date_modified;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'academic_year';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AcademicYear[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AcademicYear
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
