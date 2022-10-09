<?php

namespace App\Repository;

use App\Entity\PercorsoIstruzioneOrigine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PercorsoIstruzioneOrigine>
 *
 * @method PercorsoIstruzioneOrigine|null find($id, $lockMode = null, $lockVersion = null)
 * @method PercorsoIstruzioneOrigine|null findOneBy(array $criteria, array $orderBy = null)
 * @method PercorsoIstruzioneOrigine[]    findAll()
 * @method PercorsoIstruzioneOrigine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PercorsoIstruzioneOrigineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PercorsoIstruzioneOrigine::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PercorsoIstruzioneOrigine $entity, bool $flush = true): void
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
    public function remove(PercorsoIstruzioneOrigine $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PercorsoIstruzioneOrigine[] Returns an array of PercorsoIstruzioneOrigine objects
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
    public function findOneBySomeField($value): ?PercorsoIstruzioneOrigine
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
