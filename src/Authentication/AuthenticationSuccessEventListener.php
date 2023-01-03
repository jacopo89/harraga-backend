<?php


namespace App\Authentication;

use App\Encryption\UserEncryptionService;
use App\Entity\ConsulenteLegale;
use App\Entity\ConsulenteStudio;
use App\Entity\Staff;
use App\Entity\Utente;
use App\Repository\UtenteRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\User\InMemoryUser;

class AuthenticationSuccessEventListener
{
    private RequestStack $requestStack;
    private UtenteRepository $utenteRepository;

    public function __construct(RequestStack $requestStack,UtenteRepository $utenteRepository)
    {
        $this->requestStack = $requestStack;
        $this->utenteRepository = $utenteRepository;
    }

    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(JWTCreatedEvent $event)
    {
        $data = $event->getData();
        /**
         * @var Utente $user
         */
        $user = $event->getUser();
        //Il refresh token genera un InMemoryUser
        $data["id"] = $user->getId();

        $event->setData($data);
    }
}
