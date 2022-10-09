<?php

namespace App\Repository;

use App\Entity\SpecificaDisabilita;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SpecificaDisabilita>
 *
 * @method SpecificaDisabilita|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecificaDisabilita|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecificaDisabilita[]    findAll()
 * @method SpecificaDisabilita[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecificaDisabilitaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecificaDisabilita::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SpecificaDisabilita $entity, bool $flush = true): void
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
    public function remove(SpecificaDisabilita $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return SpecificaDisabilita[] Returns an array of SpecificaDisabilita objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpecificaDisabilita
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
