<?php

namespace App\Repository;

use App\Entity\PermessoSoggiorno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PermessoSoggiorno>
 *
 * @method PermessoSoggiorno|null find($id, $lockMode = null, $lockVersion = null)
 * @method PermessoSoggiorno|null findOneBy(array $criteria, array $orderBy = null)
 * @method PermessoSoggiorno[]    findAll()
 * @method PermessoSoggiorno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PermessoSoggiornoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PermessoSoggiorno::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PermessoSoggiorno $entity, bool $flush = true): void
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
    public function remove(PermessoSoggiorno $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PermessoSoggiorno[] Returns an array of PermessoSoggiorno objects
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
    public function findOneBySomeField($value): ?PermessoSoggiorno
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
