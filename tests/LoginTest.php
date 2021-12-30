<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

/**
 *
 */
class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->json('POST', '/api/login', [
            'email' => 'test_user7@mail.com',
            'password' => '123456'
        ]);
        $this->assertResponseOk();
    }
}
