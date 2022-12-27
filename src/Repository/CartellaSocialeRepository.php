<?php

namespace App\Repository;

use App\Entity\CartellaSociale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CartellaSociale|null find($id, $lockMode = null, $lockVersion = null)
 * @method CartellaSociale|null findOneBy(array $criteria, array $orderBy = null)
 * @method CartellaSociale[]    findAll()
 * @method CartellaSociale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartellaSocialeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CartellaSociale::class);
    }

    // /**
    //  * @return CartellaSociale[] Returns an array of CartellaSociale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CartellaSociale
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function save(CartellaSociale $cartella)
    {
        $this->_em->persist($cartella);
        $this->_em->flush();
    }

    public function persist(CartellaSociale $cartella)
    {
        $this->_em->persist($cartella);
    }

    public function flush(){
        $this->_em->flush();
    }
}
