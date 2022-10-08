<?php

namespace App\Repository;

use App\Entity\PolizzaAssicurativa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PolizzaAssicurativa>
 *
 * @method PolizzaAssicurativa|null find($id, $lockMode = null, $lockVersion = null)
 * @method PolizzaAssicurativa|null findOneBy(array $criteria, array $orderBy = null)
 * @method PolizzaAssicurativa[]    findAll()
 * @method PolizzaAssicurativa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PolizzaAssicurativaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PolizzaAssicurativa::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PolizzaAssicurativa $entity, bool $flush = true): void
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
    public function remove(PolizzaAssicurativa $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PolizzaAssicurativa[] Returns an array of PolizzaAssicurativa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PolizzaAssicurativa
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
