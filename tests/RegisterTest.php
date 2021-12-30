<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $this->json('POST', '/api/register', [
            'name' => 'Test_user7',
            'email' => 'test_user47@mail.com',
            'password' => 123456
        ]);
        $this->assertResponseOk();
    }
}
