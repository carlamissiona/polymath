<?php

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $usr_id;

    /**
     *
     * @var string
     */
    public $usr_firstname;

    /**
     *
     * @var string
     */
    public $usr_middlename;

    /**
     *
     * @var string
     */
    public $usr_surname;

    /**
     *
     * @var string
     */
    public $usr_email;

    /**
     *
     * @var string
     */
    public $usr_secret;
    /**
     *
     * @var string
     */
    public $usr_address;

    /**
     *
     * @var string
     */
    public $usr_contactno;

    /**
     *
     * @var string
     */
    public $usr_mobileno;

    /**
     *
     * @var integer
     */
    public $usr_role;

    /**
     *
     * @var string
     */
    public $usr_lastlogin;

    /**
     *
     * @var string
     */
    public $usr_isloggedin;
    
    /**
     *
     * @var string
     */
    public $usr_temp_keys;

    /**
     *
     * @var string
     */
    public $usr_datemodified;

 public function initialize()
    {
        $this->belongsTo("usr_role", "User_role", "usl_id"); 
    }
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


}
