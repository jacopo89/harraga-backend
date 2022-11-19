<?php

namespace App\Utilities;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationList;

class FormViolationResponse extends GeneralResponse
{
    protected $statusCode = Response::HTTP_BAD_REQUEST;
    const TYPE = "FORM_VIOLATION";

    static public function createFromViolationList(ConstraintViolationList $constraintViolationList){
        $violations = [];
        foreach($constraintViolationList as $violation){

            $violations[$violation->getPropertyPath()]= $violation->getMessage();
        }
        return static::createResponse($violations);
    }
}
