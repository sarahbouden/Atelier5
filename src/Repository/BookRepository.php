<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 *
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }
    public function SearchByref($id){
        return $this->createQueryBuilder('b')
        ->where('b.ref LIKE :ref')
        ->setParameter('ref',$id)
        ->getQuery()
        ->getResult();
    }
    public function orderByauthor(){
        return $this->createQueryBuilder('b')
        ->join('b.Authors','a')
        ->addSelect('a')
        ->orderBy('a.Username','ASC')
        ->getQuery()
        ->getResult();
    }
    public function orderByYearAndNbr(){
        return $this->createQueryBuilder('b')
        ->join('b.Authors','a')
        ->addSelect('a')
        ->where('a.nbrlibre OVER :nbrlivre')
        ->setParameter('nbrlivre',35)
        ->getQuery()
        ->getResult();
    }
//    /**
//     * @return Book[] Returns an array of Book objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Book
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
