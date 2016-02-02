<?php

namespace Customerio;

use Http\Client\HttpClient;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class CustomerioClient implements HttpClient
{

    /**
     * Sends a PSR-7 request.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws \Http\Client\Exception If an error happens during processing the request.
     * @throws \Exception             If processing the request is impossible (eg. bad configuration).
     */
    public function sendRequest(RequestInterface $request)
    {
        // TODO: Implement sendRequest() method.
    }
}
