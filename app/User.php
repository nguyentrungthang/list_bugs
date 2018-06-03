<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','first_name','last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param $data
     * @return mixed
     */
    public function getValidation($data)
    {
        $messages = [
            'username.required' => 'You need to enter user name',
            'username.max' => 'User name must be less than 32 characters',
            'email.required'=>'We need to know your e-mail address!',
            'last_name.required'=>'We need to know your last name !',
            'last_name.max'=>'last name must be less than 70 characters',
            'first_name.required'=>'We need to know your first name !',
            'first_name.max'=>'first name must be less than 70 characters',
            'password.required'=>'You need to enter a password ',
            'password.min'=>'Password of 8 characters minimum',
            'password.max'=>'Password must not exceed 20 characters',
        ];

        $validate = [
            'username' => 'required|max:32',
            'email' => 'required|email|max:255|unique:users',
            'last_name' => 'required|max:70',
            'first_name' => 'required|max:70',
            'password' => 'required|min:8|max:20',


        ];
//        confirmed

        $validator = Validator::make($data, $validate, $messages);
        return $validator;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function validate($data)
    {
        $validate = $this->getValidation($data);
        return $validate;
    }



}
