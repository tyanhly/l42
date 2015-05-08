<?php

class NerdsTest extends TestCase
{

    public function setUp(){
        $i=100;
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
    public function testIndexResponseOk () {
        $this->call('GET', '/nerds');
        $this->assertResponseOk();
        $this->assertViewHas('nerds');
    }

    public function testCreateResponseOk () {
        $this->call('GET', '/nerds/create');
        $this->assertResponseOk();
    }

    public function testEditResponseOk () {
        $this->call('GET', '/nerds/100/edit');
        $this->assertResponseOk();
    }

    public function testDeleteNerdOk () {
        $id = 100;
        $this->call('DELETE', "/nerds/$id");
        $this->assertRedirectedTo('/nerds');
        
    }

    public function testIndexWithWrongParamsResponseOk () {
        $this->setExpectedException(
                'Symfony\Component\HttpKernel\Exception\NotFoundHttpException');
        $this->call('GET', '/nerds?page=a');
    
    }

    public function testIndexWithWrongSearchKeywordExist () {
        $this->call('GET', '/nerds?keywords=a');
        $this->assertResponseOk();
        $this->assertViewHas('nerds');
    }
}
