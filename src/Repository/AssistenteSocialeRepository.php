<?php

namespace App\Repository;

use App\Entity\AssistenteSociale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AssistenteSociale>
 *
 * @method AssistenteSociale|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssistenteSociale|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssistenteSociale[]    findAll()
 * @method AssistenteSociale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssistenteSocialeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssistenteSociale::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AssistenteSociale $entity, bool $flush = true): void
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
    public function remove(AssistenteSociale $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AssistenteSociale[] Returns an array of AssistenteSociale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AssistenteSociale
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
