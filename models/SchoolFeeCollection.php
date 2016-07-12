<?php

class SchoolFeeCollection extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $sfc_id;

    /**
     *
     * @var integer
     */
    public $sfc_fee_id;

    /**
     *
     * @var integer
     */
    public $sfc_student_id;

    /**
     *
     * @var string
     */
    public $sfc_status;

    /**
     *
     * @var string
     */
    public $sfc_date_created;

    /**
     *
     * @var string
     */
    public $sfc_date_modified;

     public function initialize()
    {
        $this->belongsTo("sfc_fee_id", "School_fee", "scf_id"); 
    }
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'school_fee_collection';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SchoolFeeCollection[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SchoolFeeCollection
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
