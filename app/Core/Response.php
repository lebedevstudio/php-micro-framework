<?php

namespace App\Core;

class Response
{
    protected $body;

    protected $statusCode = 200;

    protected $headers = [];

    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function withStatus($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function withJson($body)
    {
        $this->withHeader('Content-Type', 'application/json');

        $this->body = json_encode($body);

        return $this;
    }

    public function withHeader($name, $value)
    {
        $this->headers[] = [$name, $value];

        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }
}