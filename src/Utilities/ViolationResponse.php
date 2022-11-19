<?php

namespace App\Utilities;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;

class ViolationResponse extends GeneralResponse
{
    protected $statusCode = Response::HTTP_BAD_REQUEST;
    const TYPE = "VIOLATION";

    static public function createFromViolationList(ConstraintViolationList $constraintViolationList){
        $violations = [];
        foreach($constraintViolationList as $violation){
            $violations[$violation->getPropertyPath()]= $violation->getMessage();
        }
        return static::createResponse($violations);
    }

    static public function createFromSingleViolation(ConstraintViolation $constraintViolation){
        $constraintViolationList = new ConstraintViolationList();
        $constraintViolationList->add($constraintViolation);
        return static::createFromViolationList($constraintViolationList);
    }
}
