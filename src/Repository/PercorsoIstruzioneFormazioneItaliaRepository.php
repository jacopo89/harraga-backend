<?php

namespace App\Repository;

use App\Entity\PercorsoIstruzioneFormazioneItalia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PercorsoIstruzioneFormazioneItalia>
 *
 * @method PercorsoIstruzioneFormazioneItalia|null find($id, $lockMode = null, $lockVersion = null)
 * @method PercorsoIstruzioneFormazioneItalia|null findOneBy(array $criteria, array $orderBy = null)
 * @method PercorsoIstruzioneFormazioneItalia[]    findAll()
 * @method PercorsoIstruzioneFormazioneItalia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PercorsoIstruzioneFormazioneItaliaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PercorsoIstruzioneFormazioneItalia::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PercorsoIstruzioneFormazioneItalia $entity, bool $flush = true): void
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
    public function remove(PercorsoIstruzioneFormazioneItalia $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PercorsoIstruzioneFormazioneItalia[] Returns an array of PercorsoIstruzioneFormazioneItalia objects
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
    public function findOneBySomeField($value): ?PercorsoIstruzioneFormazioneItalia
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
