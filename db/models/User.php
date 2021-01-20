<?php

include_once "inc/utils.php";
include_once "db/utils.php";

class User
{
    public $firstname;
    public $lastname;
    public $email;
    private $picture;
    private $password;

    public function __construct($index=null)
    {
        $user = get_user($index);

        $this->firstname = $user['firstname'] ?? 'guest';
        $this->lastname = $user['lastname'] ?? '';
        $this->email = $user['email'] ?? '';
        $this->picture = $user['picture'] ?? '';
        $this->password = $user['password'] ?? '';
    }

    public function get_picture_path()
    {
        return $this->picture;
    }

    public function get_all()
    {
        return get_users();
    }

    public function store_in_db()
    {
        // store user in db
    }

    public function set_password()
    {
        // set password
    }

    public function set_picture()
    {
        // set picture
    }
}
