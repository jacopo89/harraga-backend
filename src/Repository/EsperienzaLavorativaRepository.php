<?php

namespace App\Repository;

use App\Entity\EsperienzaLavorativa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EsperienzaLavorativa>
 *
 * @method EsperienzaLavorativa|null find($id, $lockMode = null, $lockVersion = null)
 * @method EsperienzaLavorativa|null findOneBy(array $criteria, array $orderBy = null)
 * @method EsperienzaLavorativa[]    findAll()
 * @method EsperienzaLavorativa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EsperienzaLavorativaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EsperienzaLavorativa::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(EsperienzaLavorativa $entity, bool $flush = true): void
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
    public function remove(EsperienzaLavorativa $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return EsperienzaLavorativa[] Returns an array of EsperienzaLavorativa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EsperienzaLavorativa
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
