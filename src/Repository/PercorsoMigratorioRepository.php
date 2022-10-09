<?php

namespace App\Repository;

use App\Entity\PercorsoMigratorio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PercorsoMigratorio>
 *
 * @method PercorsoMigratorio|null find($id, $lockMode = null, $lockVersion = null)
 * @method PercorsoMigratorio|null findOneBy(array $criteria, array $orderBy = null)
 * @method PercorsoMigratorio[]    findAll()
 * @method PercorsoMigratorio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PercorsoMigratorioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PercorsoMigratorio::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PercorsoMigratorio $entity, bool $flush = true): void
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
    public function remove(PercorsoMigratorio $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PercorsoMigratorio[] Returns an array of PercorsoMigratorio objects
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
    public function findOneBySomeField($value): ?PercorsoMigratorio
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
