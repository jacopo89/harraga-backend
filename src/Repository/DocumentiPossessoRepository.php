<?php

namespace App\Repository;

use App\Entity\DocumentiPossesso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DocumentiPossesso>
 *
 * @method DocumentiPossesso|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentiPossesso|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentiPossesso[]    findAll()
 * @method DocumentiPossesso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentiPossessoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentiPossesso::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(DocumentiPossesso $entity, bool $flush = true): void
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
    public function remove(DocumentiPossesso $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return DocumentiPossesso[] Returns an array of DocumentiPossesso objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentiPossesso
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
