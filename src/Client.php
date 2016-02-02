<?php

namespace Customerio;

use Customerio\API\Normalizer\NormalizerFactory;
use Customerio\API\Resource\DefaultResource;
use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
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
        HttpClient $httpClient = null,
        Serializer $serializer = null,
        MessageFactory $messageFactory = null
    ) {
        $this->httpClient = $httpClient ?: HttpClientDiscovery::find();
        $this->messageFactory = $messageFactory ?: MessageFactoryDiscovery::find();

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
     * @param HttpClient|null $httpClient
     * @param Serializer|null $serializer
     * @param MessageFactory|null $messageFactory
     * @return DefaultResource
     */
    public static function factory(
        HttpClient $httpClient = null,
        Serializer $serializer = null,
        MessageFactory $messageFactory = null
    ) {
        $client = new self($httpClient, $serializer, $messageFactory);

        return new DefaultResource($client->httpClient, $client->messageFactory, $client->serializer);
    }
}
