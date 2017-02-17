<?php

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Phalcon\Validation\Validator\PresenceOf;

class Users extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    public $user_id;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $first_name;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $last_name;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $email;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=false)
     */
    public $gender;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $education;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $skill;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            "first_name",
            new PresenceOf(
                    [
                        "message" => "First name is required",
                    ]
                )
            );
         $validator->add(
            "last_name",
            new PresenceOf(
                    [
                        "message" => "Last name is required",
                    ]
                )
            );
         $validator->add(
            'email',
            new PresenceOf(
                    [
                        "message" => "Email is required",
                    ]
                )
            );
         $validator->add(
            "skills",
            new PresenceOf(
                    [
                        "message" => "Skills are required",
                    ]
                )
            );
       
        return $validator->validate($_POST);

    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("users");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     * @param mixed $parameters
     * @return Users
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
    /**
     * Allows to check duplicate emails
     * @param $email
     * @return boolean
     */
    public function check_email($email)
    {
        $sql = "SELECT user_id from users where email='".$email."'";
        $result = $this->getDi()->getShared('db')->query($sql)->numRows();
        return ($result>0)?true:false;
    }
}
