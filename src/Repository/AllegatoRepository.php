<?php

namespace App\Repository;

use App\Entity\Allegato;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use FileHandler\Bundle\FileHandlerBundle\Repository\FileRepository;

/**
 * @extends ServiceEntityRepository<Allegato>
 *
 * @method Allegato|null find($id, $lockMode = null, $lockVersion = null)
 * @method Allegato|null findOneBy(array $criteria, array $orderBy = null)
 * @method Allegato[]    findAll()
 * @method Allegato[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllegatoRepository extends FileRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Allegato::class);
    }

    // /**
    //  * @return Allegato[] Returns an array of Allegato objects
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
    public function findOneBySomeField($value): ?Allegato
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
