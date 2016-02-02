<?php

namespace Customerio;

use Customerio\API\Normalizer\NormalizerFactory;
use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

class Client
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    /**
     * @param HttpClient|null $httpClient
     * @param Serializer|null $serializer
     * @param MessageFactory|null $messageFactory
     */
    protected function __construct(
        HttpClient $httpClient,
        MessageFactory $messageFactory,
        Serializer $serializer = null

    ) {
        $this->httpClient = $httpClient;
        $this->messageFactory = $messageFactory;

        if ($serializer === null) {
            $serializer = new Serializer(
                NormalizerFactory::create(),
                [
                    new JsonEncoder(
                        new JsonEncode(),
                        new JsonDecode()
                    )
                ]
            );
        }

        $this->serializer = $serializer;
    }

    /**
     * @param array $config
     */
    public static function factory(array $config = [])
    {


        return new DefaultResource($client->httpClient, $client->messageFactory, $client->serializer);
    }
}
