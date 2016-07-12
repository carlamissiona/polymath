<?php

class Class extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $cls_id;

    /**
     *
     * @var string
     */
    public $cls_name;

    /**
     *
     * @var integer
     */
    public $cls_level_id;

    /**
     *
     * @var integer
     */
    public $cls_adviser;

    /**
     *
     * @var integer
     */
    public $cls_subject;

    /**
     *
     * @var integer
     */
    public $cls_room_no;

    /**
     *
     * @var string
     */
    public $cls_date_created;

    /**
     *
     * @var string
     */
    public $cls_date_modified;

 public function initialize()
    {
        $this->belongsTo("cls_level_id", "Educational_level", "edl_id"); 
        $this->belongsTo("cls_adviser", "User", "usr_id"); 
        $this->belongsTo("cls_room_no", "Room", "rm_id"); 
        $this->belongsTo("cls_subject", "Subject", "sbj_id"); 
    }
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'class';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Class[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Class
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
