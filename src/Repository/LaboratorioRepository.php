<?php

namespace App\Repository;

use App\Entity\Laboratorio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Laboratorio>
 *
 * @method Laboratorio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Laboratorio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Laboratorio[]    findAll()
 * @method Laboratorio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LaboratorioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Laboratorio::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Laboratorio $entity, bool $flush = true): void
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
    public function remove(Laboratorio $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Laboratorio[] Returns an array of Laboratorio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Laboratorio
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
