<?php

namespace App\Utilities;

use Symfony\Component\HttpFoundation\Response;

class GeneralResponse extends Response
{
    protected $statusCode = Response::HTTP_BAD_REQUEST;
    const TYPE = "RESPONSE";

    protected function __construct(?string $content = '', int $status = 400, array $headers = [])
    {
        parent::__construct($content, $status, $headers);
    }

    public static function createResponse($content){
        return new self(json_encode([
            "type"=>static::TYPE,
            "content" => $content
        ]));
    }
}
