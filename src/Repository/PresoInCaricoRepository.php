<?php

namespace App\Repository;

use App\Entity\PresoInCarico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PresoInCarico>
 *
 * @method PresoInCarico|null find($id, $lockMode = null, $lockVersion = null)
 * @method PresoInCarico|null findOneBy(array $criteria, array $orderBy = null)
 * @method PresoInCarico[]    findAll()
 * @method PresoInCarico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresoInCaricoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PresoInCarico::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PresoInCarico $entity, bool $flush = true): void
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
    public function remove(PresoInCarico $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PresoInCarico[] Returns an array of PresoInCarico objects
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
    public function findOneBySomeField($value): ?PresoInCarico
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
