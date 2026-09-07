<?php

namespace Http\Forms;

use Core\ValidationExpression;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct($attributes)
    {
        if(!Validator::email($attributes['email'])) {
            $this->errors['email'] = "Please provide valid email address";
        }

        if(!Validator::string($attributes['password'], 100)) {
            $this->errors['password'] = "Please provide a valid password!";
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);
        
        if($instance->failed()) {
            throw new ValidationExpression(); //fffgdfgfdfd
        }
        return $instance;
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}