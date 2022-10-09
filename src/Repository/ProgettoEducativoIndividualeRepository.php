<?php

namespace App\Repository;

use App\Entity\ProgettoEducativoIndividuale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProgettoEducativoIndividuale>
 *
 * @method ProgettoEducativoIndividuale|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProgettoEducativoIndividuale|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProgettoEducativoIndividuale[]    findAll()
 * @method ProgettoEducativoIndividuale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgettoEducativoIndividualeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProgettoEducativoIndividuale::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProgettoEducativoIndividuale $entity, bool $flush = true): void
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
    public function remove(ProgettoEducativoIndividuale $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProgettoEducativoIndividuale[] Returns an array of ProgettoEducativoIndividuale objects
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
    public function findOneBySomeField($value): ?ProgettoEducativoIndividuale
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
