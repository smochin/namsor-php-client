<?php

declare(strict_types=1);

namespace Smochin\Namsor;

use Smochin\Namsor\ValueObject\Gender;
use GuzzleHttp\Promise\PromiseInterface;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Client
     */
    private $client;

    protected function setUp()
    {
        $this->client = new Client();
    }

    public function testRecognizeMale()
    {
        $gender = $this->client->recognize('Jamerson', 'Silva');
        $this->assertInstanceOf(Gender::class, $gender);
        $this->assertTrue($gender->isMale());
    }

    public function testRecognizeFemale()
    {
        $gender = $this->client->recognize('Maria', 'Fatima');
        $this->assertInstanceOf(Gender::class, $gender);
        $this->assertTrue($gender->isFemale());
    }

    /**
     * @expectedException \Smochin\Namsor\Exception\UnknownGenderException
     */
    public function testUnknownGenderException()
    {
        $this->client->recognize('a', 'b');
    }

    public function testRecognizeAsync()
    {
        $promise = $this->client->recognizeAsync('Andre', 'Henriques');
        $this->assertInstanceOf(PromiseInterface::class, $promise);
    }
}
