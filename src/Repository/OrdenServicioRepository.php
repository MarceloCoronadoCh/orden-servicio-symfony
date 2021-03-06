<?php

namespace App\Repository;

use App\Entity\OrdenServicio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrdenServicio|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrdenServicio|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrdenServicio[]    findAll()
 * @method OrdenServicio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdenServicioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrdenServicio::class);
    }

    public function valuesGroupingCliente():array
    {
        return $this ->createQueryBuilder('ordenServicio')
            ->select('clienteOrden.nombre as clienteNombre')
            ->select('clienteOrden.apellidos as clienteApellidos')
            ->addSelect('SUM(ordenServicio.precio) as totalPrecio')
            ->join('ordenServicio.clienteOrden', 'clienteOrden')
            ->groupBy('clienteOrden.id')
            ->orderBy('clienteOrden.apellidos', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function valuesGroupingTecnico():array
    {
        return $this ->createQueryBuilder('ordenServicio')
            ->select('tecnicoOrden.nombreTecnico as tecnicoNombre')
            ->addselect(' tecnicoOrden.apellidosTecnico as tecnicoApellidos')
            ->addSelect('SUM(ordenServicio.precio) as totalPrecio')
            ->join('ordenServicio.tecnicoOrden', 'tecnicoOrden')
            ->groupBy('tecnicoOrden.id')
            ->orderBy('tecnicoOrden.apellidosTecnico', 'DESC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return OrdenServicio[] Returns an array of OrdenServicio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrdenServicio
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
