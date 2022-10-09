<?php

namespace App\Repository;

use App\Entity\ProvvedimentoGiudiziario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProvvedimentoGiudiziario>
 *
 * @method ProvvedimentoGiudiziario|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProvvedimentoGiudiziario|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProvvedimentoGiudiziario[]    findAll()
 * @method ProvvedimentoGiudiziario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProvvedimentoGiudiziarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProvvedimentoGiudiziario::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProvvedimentoGiudiziario $entity, bool $flush = true): void
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
    public function remove(ProvvedimentoGiudiziario $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProvvedimentoGiudiziario[] Returns an array of ProvvedimentoGiudiziario objects
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
    public function findOneBySomeField($value): ?ProvvedimentoGiudiziario
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
