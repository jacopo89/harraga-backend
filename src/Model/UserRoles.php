<?php


namespace App\Model;


use ModelGenerator\Bundle\ModelGeneratorBundle\Enum\AbstractEnum;
use Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter;

class UserRoles extends AbstractEnum
{
    const ADMIN = 'ROLE_ADMIN';
    const USER = 'ROLE_USER';
    const AGENT = 'ROLE_AGENT';
    const GUEST = AuthenticatedVoter::IS_AUTHENTICATED_ANONYMOUSLY;
    const AUTHENTICATED = AuthenticatedVoter::IS_AUTHENTICATED_FULLY;
    const API = 'ROLE_API';
    const FINANCE = 'ROLE_FINANCE';
    const FINANCE_DIRECTOR = 'ROLE_FINANCE_DIRECTOR';
    const GENERAL_MANAGER = 'ROLE_GENERAL_MANAGER';
    const LETTINGS_MANAGER = 'ROLE_LETTINGS_MANAGER';
    const AFFILIATION = 'ROLE_AFFILIATION';

    protected const VALUES = [
        self::ADMIN => "Administrator",
        self::API => "User for API",
        self::USER => "Standard User",
        self::GENERAL_MANAGER => "General Manager",
        self::FINANCE => "Finance",
        self::FINANCE_DIRECTOR => "Finance Director",
        self::AGENT => "Agent",
        self::GUEST => "Guest",
        self::LETTINGS_MANAGER => "Lettings Manager",
        self::AFFILIATION => "Affiliation Programme"
    ];

    private int $value;

    public function getValue()
    {
        return $this->value;
    }

    public function getLabel()
    {
        return self::VALUES[$this->value];
    }
}
