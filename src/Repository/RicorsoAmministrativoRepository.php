<?php

namespace App\Repository;

use App\Entity\RicorsoAmministrativo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RicorsoAmministrativo>
 *
 * @method RicorsoAmministrativo|null find($id, $lockMode = null, $lockVersion = null)
 * @method RicorsoAmministrativo|null findOneBy(array $criteria, array $orderBy = null)
 * @method RicorsoAmministrativo[]    findAll()
 * @method RicorsoAmministrativo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RicorsoAmministrativoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RicorsoAmministrativo::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(RicorsoAmministrativo $entity, bool $flush = true): void
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
    public function remove(RicorsoAmministrativo $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return RicorsoAmministrativo[] Returns an array of RicorsoAmministrativo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RicorsoAmministrativo
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
