<?php

class EducationalLevel extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $edl_id;

    /**
     *
     * @var string
     */
    public $edl_name;

    /**
     *
     * @var string
     */
    public $edl_desc;

    /**
     *
     * @var string
     */
    public $edl_date_created;

    /**
     *
     * @var string
     */
    public $edl_date_modified;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'educational_level';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return EducationalLevel[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return EducationalLevel
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
