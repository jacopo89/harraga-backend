<?php

namespace App\Repository;

use App\Entity\MedicoCurante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MedicoCurante>
 *
 * @method MedicoCurante|null find($id, $lockMode = null, $lockVersion = null)
 * @method MedicoCurante|null findOneBy(array $criteria, array $orderBy = null)
 * @method MedicoCurante[]    findAll()
 * @method MedicoCurante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicoCuranteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MedicoCurante::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(MedicoCurante $entity, bool $flush = true): void
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
    public function remove(MedicoCurante $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return MedicoCurante[] Returns an array of MedicoCurante objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MedicoCurante
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
