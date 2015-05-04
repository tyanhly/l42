<?php

// use Illuminate\Auth\UserTrait;
// use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableTrait;
// use Illuminate\Auth\Reminders\RemindableInterface;

// class User extends Eloquent implements UserInterface, RemindableInterface {

// 	use UserTrait, RemindableTrait;

// 	/**
// 	 * The database table used by the model.
// 	 *
// 	 * @var string
// 	 */
// 	protected $table = 'users';

// 	/**
// 	 * The attributes excluded from the model's JSON form.
// 	 *
// 	 * @var array
// 	 */
// 	protected $hidden = array('password', 'remember_token');

// }


use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface
{
    use ConfideUser;
	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');
}