<?php

namespace App\Repository;

use App\Entity\ValutazioneMultidisciplinare;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ValutazioneMultidisciplinare>
 *
 * @method ValutazioneMultidisciplinare|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValutazioneMultidisciplinare|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValutazioneMultidisciplinare[]    findAll()
 * @method ValutazioneMultidisciplinare[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValutazioneMultidisciplinareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValutazioneMultidisciplinare::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ValutazioneMultidisciplinare $entity, bool $flush = true): void
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
    public function remove(ValutazioneMultidisciplinare $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ValutazioneMultidisciplinare[] Returns an array of ValutazioneMultidisciplinare objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ValutazioneMultidisciplinare
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
