<?php

class Book extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $bk_id;

    /**
     *
     * @var string
     */
    public $bk_name;

    /**
     *
     * @var integer
     */
    public $bk_subj_id;

    /**
     *
     * @var string
     */
    public $bk_desc;

    /**
     *
     * @var string
     */
    public $bk_isSuplementary;

    /**
     *
     * @var string
     */
    public $bk_date_created;

    /**
     *
     * @var string
     */
    public $bk_date_modified;
    public function initialize()
    {
        $this->belongsTo("bk_subj_id", "Subject", "sbj_id"); 
    }
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'book';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Book[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Book
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
