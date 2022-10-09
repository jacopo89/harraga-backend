<?php

namespace App\Repository;

use App\Entity\PercorsoIstruzioneItaliaConcluso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PercorsoIstruzioneItaliaConcluso>
 *
 * @method PercorsoIstruzioneItaliaConcluso|null find($id, $lockMode = null, $lockVersion = null)
 * @method PercorsoIstruzioneItaliaConcluso|null findOneBy(array $criteria, array $orderBy = null)
 * @method PercorsoIstruzioneItaliaConcluso[]    findAll()
 * @method PercorsoIstruzioneItaliaConcluso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PercorsoIstruzioneItaliaConclusoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PercorsoIstruzioneItaliaConcluso::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PercorsoIstruzioneItaliaConcluso $entity, bool $flush = true): void
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
    public function remove(PercorsoIstruzioneItaliaConcluso $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PercorsoIstruzioneItaliaConcluso[] Returns an array of PercorsoIstruzioneItaliaConcluso objects
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
    public function findOneBySomeField($value): ?PercorsoIstruzioneItaliaConcluso
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
