<?php

namespace App\Repository;

use App\Entity\ProseguimentoAmministrativo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProseguimentoAmministrativo>
 *
 * @method ProseguimentoAmministrativo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProseguimentoAmministrativo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProseguimentoAmministrativo[]    findAll()
 * @method ProseguimentoAmministrativo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProseguimentoAmministrativoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProseguimentoAmministrativo::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProseguimentoAmministrativo $entity, bool $flush = true): void
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
    public function remove(ProseguimentoAmministrativo $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProseguimentoAmministrativo[] Returns an array of ProseguimentoAmministrativo objects
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
    public function findOneBySomeField($value): ?ProseguimentoAmministrativo
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
