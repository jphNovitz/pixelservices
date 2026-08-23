<?php

namespace App\Tests\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class DashboardControllerTest extends WebTestCase
{
    public function testAdminDashboardExist(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin');

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
    }

    public function testLoginPageExist(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testAdminDashboardIsRedirectedToLogin(): void
    {
        $client = static::createClient([], [
            'HTTP_HOST' => 'localhost:8000',
        ] );
        // $client->followRedirects(true);
        $crawler = $client->request('GET', '/admin');
        $this->assertResponseRedirects('http://localhost:8000/login');
    }

    // public function testhomePageisSuccessfull(): void
    // {
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/admin');

    //     $this->assertResponseRedirects('/login');
    // }

    // public function testhomePageSuccesCodeIsOk(): void
    // {
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/admin');

    //     $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    // }

    // @Todo test Wrong Role

}
