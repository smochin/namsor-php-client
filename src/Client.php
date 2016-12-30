<?php

declare(strict_types=1);

namespace Smochin\Namsor;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Promise\PromiseInterface;
use Smochin\Namsor\Exception\UnknownGenderException;
use Smochin\Namsor\ValueObject\Gender;

class Client
{
    const BASE_URI = 'http://api.namsor.com/';
    const ONOMASTICS_ENDPOINT = '/onomastics/api/json/gendre/%s/%s';

    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct()
    {
        $this->client = new HttpClient(['base_uri' => self::BASE_URI]);
    }

    /**
     * @param string $first_name
     * @param string $last_name
     *
     * @return Gender
     */
    public function recognize(string $first_name, string $last_name): Gender
    {
        $response = $this->client->request('GET', sprintf(self::ONOMASTICS_ENDPOINT, $first_name, $last_name));
        $body = json_decode($response->getBody()->getContents(), true);
        if ($body['gender'] == 'unknown') {
            throw new UnknownGenderException('Unknown gender');
        }

        return new Gender($body['gender']);
    }

    /**
     * @param string $first_name
     * @param string $last_name
     *
     * @return PromiseInterface
     */
    public function recognizeAsync(string $first_name, string $last_name): PromiseInterface
    {
        return $this->client->requestAsync('GET', sprintf(self::ONOMASTICS_ENDPOINT, $first_name, $last_name));
    }
}
