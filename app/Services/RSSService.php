<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class RSSService extends Service
{
    private $response;

    public function __construct(
        protected Client $client
    ) {}

    public function get(string $url): array
    {
        $this->response = $this->client
            ->get($url)
            ->getBody()
            ->getContents();

        return $this->parseXml();
    }

    public function simpleXmlToArray(\SimpleXMLElement $xml): array
    {
        return json_decode(
                json_encode($xml),
                true
            );
    }

    public function parseXml(): array
    {
        return $this->simpleXmlToArray(
            simplexml_load_string($this->response)
        );
    }
}
