<?php
class UsersTableSeeder extends Seeder {

    public function run()
    {
        for($i=0; $i<100;$i++){
            $user = new User;
            $user->username = 'tyanhly' . $i;
            $user->email = "tyanhly$i@gmail.com";
            $user->password = "123456";
            $user->password_confirmation = "123456";
            $user->confirmation_code = md5(uniqid(mt_rand(), true));
            $user->confirmed = 1;
            if(! $user->save()) {
                echo "add user $i fail\n";
                 print_r((array)$user->errors());
            } else {
                echo "add user $i success \n";
            }
        }
        echo "Add User Done!";
    }
}