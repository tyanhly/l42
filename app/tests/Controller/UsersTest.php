<?php

class UsersTest extends TestCase {


    public function _setUp(){
        $user = new User();
        $user->username = 'tyanhly0';
        $user->email = 'tyanhly0@gmail.com';
        $user->password = '123456';
        $user->password_confirmation = "123456";
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = 1;
        $this->be($user); //You are now authenticated
    }
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testIndexResponseOk()
    {
        $this->_setUp();
        $crawler = $this->client->request('GET', '/users');
        $this->assertResponseOk();
        $this->assertViewHas('users');
    }
    
    public function testLoginResponseOk()
    {
        $crawler = $this->client->request('GET', '/users/login');
        $this->assertResponseOk();
    }

    public function testSignupResponseOk()
    {
        $crawler = $this->client->request('GET', '/users/create');
        $this->assertResponseOk();
    }

    public function testForgotPassResponseOk()
    {
        $crawler = $this->client->request('GET', '/users/forgot_password');
        $this->assertResponseOk();
    }
    

    public function testResetPassResponseOk()
    {
        $crawler = $this->client->request('GET', '/users/reset_password/dfdfdfdfdfdf343');
        $this->assertResponseOk();
    }
}
