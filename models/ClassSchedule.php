<?php

class ClassSchedule extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $csd_id;

    /**
     *
     * @var string
     */
    public $csd_class_id;

    /**
     *
     * @var integer
     */
    public $csd_room_no;

    /**
     *
     * @var string
     */
    public $csd_day;

    /**
     *
     * @var string
     */
    public $csd_time_start;

    /**
     *
     * @var string
     */
    public $csd_time_end;

    /**
     *
     * @var string
     */
    public $csd_date_created;

    /**
     *
     * @var string
     */
    public $csd_date_modified;
     public function initialize()
    {
        $this->belongsTo("csd_class_id", "Class", "cls_id"); 
    }
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'class_schedule';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ClassSchedule[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ClassSchedule
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
