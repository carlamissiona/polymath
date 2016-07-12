<?php

class Subject extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $sbj_id;

    /**
     *
     * @var integer
     */
    public $sbj_level_id;

    /**
     *
     * @var integer
     */
    public $sbj_curriculum_id;

    /**
     *
     * @var integer
     */
    public $sbj_class_id;

    /**
     *
     * @var string
     */
    public $sbj_name;

    /**
     *
     * @var string
     */
    public $sbj_date_created;

    /**
     *
     * @var string
     */
    public $sbj_date_modified;

   public function initialize()
    {
        $this->belongsTo("sbj_class_id", "Class", "cls_id"); 
        $this->belongsTo("sbj_curriculum_id", "Curriculum", "crm_id"); 
        $this->belongsTo("sbj_level_id", "Education_level", "edl_id"); 
    }


    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'subject';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Subject[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Subject
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
