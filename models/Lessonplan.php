<?php

class Lessonplan extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $lsp_id;

    /**
     *
     * @var string
     */
    public $lsp_title;

    /**
     *
     * @var integer
     */
    public $lsp_usrid;

    /**
     *
     * @var string
     */
    public $lsp_desc;

    /**
     *
     * @var integer
     */
    public $lsp_class_id;

    /**
     *
     * @var integer
     */
    public $lsp_subj_id;

    /**
     *
     * @var string
     */
    public $lsp_requires_approval;

    /**
     *
     * @var integer
     */
    public $lsp_requested_by;

    /**
     *
     * @var string
     */
    public $lsp_istemplate;

    /**
     *
     * @var integer
     */
    public $lsp_templateused;

    /**
     *
     * @var string
     */
    public $lsp_content;

    /**
     *
     * @var integer
     */
    public $lsp_notedby;

    /**
     *
     * @var string
     */
    public $lsp_date_published;

    /**
     *
     * @var string
     */
    public $lsp_status;

    /**
     *
     * @var string
     */
    public $lsp_datecreated;

    /**
     *
     * @var string
     */
    public $lsp_datemodified;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    
    public function initialize()
    {
        $this->belongsTo("lsp_class_id", "Class", "cls_id");
        $this->belongsTo("lsp_usrid", "User", "usr_id");
        $this->belongsTo("lsp_subj_id", "Subject", "sbj_id");
    }
    public function getSource()
    {
        return 'lessonplan';
    }
  
    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Lessonplan[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Lessonplan
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
