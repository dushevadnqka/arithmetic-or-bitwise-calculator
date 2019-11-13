<?php

namespace App\Tests\App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorControllerTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/calculator');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h3', 'The result is:');
    }
}
