<?php

namespace App\Repository;

use App\Entity\RevocaTutela;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RevocaTutela>
 *
 * @method RevocaTutela|null find($id, $lockMode = null, $lockVersion = null)
 * @method RevocaTutela|null findOneBy(array $criteria, array $orderBy = null)
 * @method RevocaTutela[]    findAll()
 * @method RevocaTutela[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RevocaTutelaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RevocaTutela::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(RevocaTutela $entity, bool $flush = true): void
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
    public function remove(RevocaTutela $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return RevocaTutela[] Returns an array of RevocaTutela objects
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
    public function findOneBySomeField($value): ?RevocaTutela
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
