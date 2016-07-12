<?php

class Department extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $dpt_d;

    /**
     *
     * @var string
     */
    public $dpt_name;

    /**
     *
     * @var integer
     */
    public $dpt_head;

    /**
     *
     * @var string
     */
    public $dpt_desc;

    /**
     *
     * @var string
     */
    public $dpt_date_created;

    /**
     *
     * @var string
     */
    public $dpt_date_modified;
     public function initialize()
    {
        $this->belongsTo("dpt_head", "User", "usr_id");  
    }
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'department';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Department[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Department
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
