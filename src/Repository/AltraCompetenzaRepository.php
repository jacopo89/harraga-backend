<?php

namespace App\Repository;

use App\Entity\AltraCompetenza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AltraCompetenza>
 *
 * @method AltraCompetenza|null find($id, $lockMode = null, $lockVersion = null)
 * @method AltraCompetenza|null findOneBy(array $criteria, array $orderBy = null)
 * @method AltraCompetenza[]    findAll()
 * @method AltraCompetenza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AltraCompetenzaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AltraCompetenza::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AltraCompetenza $entity, bool $flush = true): void
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
    public function remove(AltraCompetenza $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AltraCompetenza[] Returns an array of AltraCompetenza objects
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
    public function findOneBySomeField($value): ?AltraCompetenza
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
