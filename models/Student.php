<?php


class Student extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $stn_id;

    /**
     *
     * @var string
     */
    public $stn_firstname;

    /**
     *
     * @var string
     */
    public $stn_middlename;

    /**
     *
     * @var string
     */
    public $stn_lastname;

    /**
     *
     * @var string
     */
    public $stn_gender;

    /**
     *
     * @var string
     */
    public $stn_bdate;

    /**
     *
     * @var string
     */
    public $stn_address;

    /**
     *
     * @var string
     */
    public $stn_email;

    /**
     *
     * @var string
     */
    public $stn_mobile_nos;

    /**
     *
     * @var string
     */
    public $stn_emergency_no;

    /**
     *
     * @var integer
     */
    public $stn_class_id;

    /**
     *
     * @var string
     */
    public $stn_mothers_firstname;

    /**
     *
     * @var string
     */
    public $stn_mothers_middlename;

    /**
     *
     * @var string
     */
    public $stn_mothers_maidenname;

    /**
     *
     * @var string
     */
    public $stn_fathers_firstname;

    /**
     *
     * @var string
     */
    public $stn_fathers_middlename;

    /**
     *
     * @var string
     */
    public $stn_fathers_lastname;

    /**
     *
     * @var string
     */
    public $stn_citizenship;

    /**
     *
     * @var string
     */
    public $stn_birthplace;

    /**
     *
     * @var string
     */
    public $stn_civilstatus;

    /**
     *
     * @var string
     */
    public $stn_date_created;

    /**
     *
     * @var string
     */
    public $stn_date_modified;
 /*
  public function validation()
    {
        // Type must be: droid, mechanical or virtual
        $this->validate(
            new InclusionIn(
                array(
                    "field"  => "type",
                    "domain" => array(
                        "droid",
                        "mechanical",
                        "virtual"
                    )
                )
            )
        );

        // Robot name must be unique
        $this->validate(
            new Uniqueness(
                array(
                    "field"   => "name",
                    "message" => "The robot name must be unique"
                )
            )
        );

        // Year cannot be less than zero
        if ($this->year < 0) {
            $this->appendMessage(new Message("The year cannot be less than zero"));
        }

        // Check if any messages have been produced
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }
 */
 public function initialize()
    {
        $this->belongsTo("stn_class_id", "Class", "cls_id"); 
    }
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'student';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Student[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Student
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
