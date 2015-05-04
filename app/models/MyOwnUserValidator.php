<?php
class MyOwnUserValidator implements Zizaco\Confide\UserValidatorInterface
{


    /**
     * Validation rules for this Validator.
     *
     * @var array
     */
    public $rules = [
        'create' => [
            'username' => 'required|alpha_dash',
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ],
        'update' => [
            'username' => 'required|alpha_dash',
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]
    ];

    /**
     * Validates the given user. Should check if all the fields are correctly.
     *
     * @param ConfideUserInterface $user Instance to be tested.
     *
     * @return boolean True if the $user is valid.
     */
    public function validate(Zizaco\Confide\ConfideUserInterface $user, $ruleset = 'create')
    {
        // Set the $repo as a ConfideRepository object
        $this->repo = App::make('confide.repository');

        // Validate object
        $result = $this->validateAttributes($user, $ruleset) ? true : false;
        $result = ($this->validatePassword($user) && $result) ? true : false;
        $result = ($this->validateIsUnique($user) && $result) ? true : false;
        
        return $result;
    }

    /**
     * Validates the password and password_confirmation of the given user.
     *
     * @param ConfideUserInterface $user
     *
     * @return boolean True if password is valid.
     */
    public function validatePassword(Zizaco\Confide\ConfideUserInterface $user)
    {
        $hash = App::make('hash');
//         die('dfdf');
        if ($user->getOriginal('password') != $user->password) {
            if ($user->password === $user->password_confirmation) {
//                 die('dfdf');
                // Hashes password and unset password_confirmation field
                $user->password = $hash->make($user->password);
//                 dd($user);
            } else {
                $this->attachErrorMsg(
                    $user,
                    'confide::confide.alerts.password_confirmation',
                    'password_confirmation'
                );
                return false;
            }
        }

        unset($user->password_confirmation);

        return true;
    }

    /**
     * Validates if the given user is unique. If there is another
     * user with the same credentials but a different id, this
     * method will return false.
     *
     * @param ConfideUserInterface $user
     *
     * @return boolean True if user is unique.
     */
    public function validateIsUnique(Zizaco\Confide\ConfideUserInterface $user)
    {
        $identity = [
            'email' => $user->email,
            'username' => $user->username,
        ];

        $identity = array_filter($identity);

        foreach ($identity as $attribute => $value) {

            $similar = $this->repo->getUserByIdentity([$attribute => $value]);

            if (!$similar || $similar->getKey() == $user->getKey()) {
                unset($identity[$attribute]);
            } else {
                $this->attachErrorMsg(
                    $user,
                    'confide::confide.alerts.duplicated_credentials',
                    $attribute
                );
            }

        }

        if (empty($identity)) {
            return true;
        }

        return false;
    }

    /**
     * Uses Laravel Validator in order to check if the attributes of the
     * $user object are valid for the given $ruleset.
     *
     * @param ConfideUserInterface $user
     * @param string               $ruleset The name of the key in the UserValidator->$rules array
     *
     * @return boolean True if the attributes are valid.
     */
    public function validateAttributes(Zizaco\Confide\ConfideUserInterface $user, $ruleset = 'create')
    {
        $attributes = $user->toArray();

        // Force getting password since it may be hidden from array form
        $attributes['password'] = $user->getAuthPassword();

        $rules = $this->rules[$ruleset];

        $validator = App::make('validator')
            ->make($attributes, $rules);
//         dd($attributes);
//         dd($rules);
        // Validate and attach errors
        if ($validator->fails()) {
            $user->errors = $validator->errors();
//             dd($user->errors);
            return false;
        } else {
            return true;
        }
    }

    /**
     * Creates a \Illuminate\Support\MessageBag object, add the error message
     * to it and then set the errors attribute of the user with that bag.
     *
     * @param ConfideUserInterface $user
     * @param string               $errorMsg The error message.
     * @param string               $key      The key if the error message.
     */
    public function attachErrorMsg(Zizaco\Confide\ConfideUserInterface $user, $errorMsg, $key = 'confide')
    {
        $messageBag = $user->errors;

        if (! $messageBag instanceof MessageBag) {
            $messageBag = App::make('Illuminate\Support\MessageBag');
        }

        $messageBag->add($key, Lang::get($errorMsg));
        $user->errors = $messageBag;
    }
}