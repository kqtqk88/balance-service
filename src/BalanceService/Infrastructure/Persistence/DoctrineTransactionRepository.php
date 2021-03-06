<?php
declare(strict_types=1);

namespace Iqoption\BalanceService\Infrastructure\Persistence;

use Doctrine\ORM\EntityRepository;
use Iqoption\BalanceService\Domain\Transaction\Transaction;
use Iqoption\BalanceService\Domain\Transaction\TransactionRepostory;

class DoctrineTransactionRepository extends EntityRepository implements TransactionRepostory
{
    public function add(Transaction $transaction): void
    {
        $this->getEntityManager()->persist($transaction);
    }
}
