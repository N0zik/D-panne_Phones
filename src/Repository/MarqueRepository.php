<?php

namespace App\Repository;

use App\Entity\Marque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Marque>
 */
class MarqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Marque::class);
    }
    public function findByType($type)
{
    return $this->createQueryBuilder('m')
        ->andWhere('m.type = :type')
        ->setParameter('type', $type)
        ->orderBy('m.id', 'ASC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult();
}

/* public function choisirMarque(string $type)
{
    $marques = $this->getDoctrine()->getRepository(Marque::class)->findByType($type);
    if (!$marques) {
        throw $this->createNotFoundException('Aucune marque trouvée pour le type sélectionné.');
    }

    return $this->render('appareils/choisir_marque.html.twig', [
        'marques' => $marques,
        'type' => $type,
    ]);
} */
//    /**
//     * @return Marque[] Returns an array of Marque objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Marque
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
