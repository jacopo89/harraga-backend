<?php

namespace App\Repository;

use App\Entity\AttivitaSportiva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AttivitaSportiva>
 *
 * @method AttivitaSportiva|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttivitaSportiva|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttivitaSportiva[]    findAll()
 * @method AttivitaSportiva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttivitaSportivaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttivitaSportiva::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AttivitaSportiva $entity, bool $flush = true): void
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
    public function remove(AttivitaSportiva $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AttivitaSportiva[] Returns an array of AttivitaSportiva objects
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
    public function findOneBySomeField($value): ?AttivitaSportiva
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
