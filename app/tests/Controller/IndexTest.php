<?php

class IndexTest extends TestCase {

    public function setUp(){
        parent::setUp();
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
     *
     * @return void
     */
    public function testIndexResponseOk()
    {
        $crawler = $this->client->request('GET', '/');
        $this->assertResponseOk();
    }
    /**
     *
     * @return void
     */
    public function testAboutResponseOk()
    {
        $crawler = $this->client->request('GET', '/about');
        $this->assertResponseOk();
    }
    /**
     *
     * @return void
     */
    public function testProfileResponseOk()
    {
        $crawler = $this->client->request('GET', '/profile');
        $this->assertResponseOk();
    }
    
}
