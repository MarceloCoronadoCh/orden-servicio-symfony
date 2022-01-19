<?php

namespace App\Repository;

use App\Entity\EquipoMarca;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EquipoMarca|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipoMarca|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipoMarca[]    findAll()
 * @method EquipoMarca[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipoMarcaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipoMarca::class);
    }

    // /**
    //  * @return EquipoMarca[] Returns an array of EquipoMarca objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EquipoMarca
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
