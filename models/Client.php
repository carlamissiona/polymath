<?php
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\InclusionIn as InclusionInValidator;
use Phalcon\Mvc\Model\Behavior\SoftDelete;

class Client extends \Phalcon\Mvc\Model
{
  const DELETED = 'Deleted';
    //  @var integer
    public $cli_id;
//  @var string
    public $cli_schoolname;
//  @var string
    public $cli_address;
//  @var string
    public $cli_region;
//  @var string
    public $cli_country;
    //  @var integer
   public $cli_owner_id;
//  @var string
    public $cli_owner_firstname;
//  @var string
    public $cli_owner_middlename;
   //  @var string
    public $cli_owner_surname;
//  @var string
    public $cli_private;
//  @var string
    public $cli_type;
//  @var string
public $cli_isDeleted;
public $cli_modules;
//  @var string
public $cli_membership_date;
public $cli_date_created;
public $cli_date_modified;
//  @var string
 public $cli_license_due_date;

    public function initialize()
    {
        $this->belongsTo("cli_owner_id", "User", "usr_id"); 
        $this->addBehavior(
            new SoftDelete(array(
                    'field' => 'cli_isDeleted',
                    'value' =>  'Deleted'  
                ) ) );

    }
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
   public function validation() 
    {      
       $this->validate(new PresenceOf( array(
                    "field" => "cli_schoolname",   "message" => "The cli_schoolname  is required "  ) ));
       $this->validate(new PresenceOf( array(
                    "field" => "cli_owner_id",   "message" => "The cli_owner_id  is required "  ) ));
       $this->validate(new PresenceOf( array(
                    "field" => "cli_owner_middlename",   "message" => "The cli_owner_middlename  is required "  ) ));
       $this->validate(new PresenceOf( array(
                    "field" => "cli_owner_surname",   "message" => "The cli_owner_surname  is required "  ) ));
         $this->validate(new PresenceOf( array(
                    "field" => "cli_owner_firstname",   "message" => "The cli_owner_firstname   is required "  ) ));
        $this->validate(new PresenceOf( array(
                     "field" => "cli_address",  "message" => "The  cli_address  is required "   )));
         $this->validate(new InclusionInValidator(array(
                     "field" => "cli_private",  'domain' => array('True', 'False'), "message" => "The  cli_private must be True or False "    )));
        $this->validate(new InclusionInValidator(array(
                     "field" => "cli_modules",  'domain' => array('Basic', 'Plan'),"message" => "The  cli_modules must be Basic or Plan "   )));
        $this->validate(new InclusionInValidator(array(
                     "field" => "cli_type",  'domain' => array('Senior High School', 'K-12', 'Institute') , "message" => "The cli_type must be Senior High School,  K-12, or Institute  "  )));  
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }


    public function getSource()
    {
        return 'client';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Client[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Client
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
  

 

}
