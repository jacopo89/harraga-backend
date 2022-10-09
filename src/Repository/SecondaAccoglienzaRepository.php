<?php

namespace App\Repository;

use App\Entity\SecondaAccoglienza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SecondaAccoglienza>
 *
 * @method SecondaAccoglienza|null find($id, $lockMode = null, $lockVersion = null)
 * @method SecondaAccoglienza|null findOneBy(array $criteria, array $orderBy = null)
 * @method SecondaAccoglienza[]    findAll()
 * @method SecondaAccoglienza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecondaAccoglienzaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SecondaAccoglienza::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SecondaAccoglienza $entity, bool $flush = true): void
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
    public function remove(SecondaAccoglienza $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return SecondaAccoglienza[] Returns an array of SecondaAccoglienza objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SecondaAccoglienza
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
