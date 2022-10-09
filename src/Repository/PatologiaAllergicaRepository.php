<?php

namespace App\Repository;

use App\Entity\PatologiaAllergica;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PatologiaAllergica>
 *
 * @method PatologiaAllergica|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatologiaAllergica|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatologiaAllergica[]    findAll()
 * @method PatologiaAllergica[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatologiaAllergicaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatologiaAllergica::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PatologiaAllergica $entity, bool $flush = true): void
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
    public function remove(PatologiaAllergica $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PatologiaAllergica[] Returns an array of PatologiaAllergica objects
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
    public function findOneBySomeField($value): ?PatologiaAllergica
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
