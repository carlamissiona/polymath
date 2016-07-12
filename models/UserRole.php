<?php

class UserRole extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $usl_id;

    /**
     *
     * @var string
     */
    public $usl_name;

    /**
     *
     * @var string
     */
    public $usl_desc;

    /**
     *
     * @var string
     */
    public $usl_date_created;

    /**
     *
     * @var string
     */
    public $usl_date_modified;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user_role';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserRole[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserRole
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
