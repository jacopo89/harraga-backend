<?php

namespace App\Repository;

use App\Entity\RelazioneAssistenteSociale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RelazioneAssistenteSociale>
 *
 * @method RelazioneAssistenteSociale|null find($id, $lockMode = null, $lockVersion = null)
 * @method RelazioneAssistenteSociale|null findOneBy(array $criteria, array $orderBy = null)
 * @method RelazioneAssistenteSociale[]    findAll()
 * @method RelazioneAssistenteSociale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RelazioneAssistenteSocialeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RelazioneAssistenteSociale::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(RelazioneAssistenteSociale $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(RelazioneAssistenteSociale $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return RelazioneAssistenteSociale[] Returns an array of RelazioneAssistenteSociale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RelazioneAssistenteSociale
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
