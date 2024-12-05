<?php

namespace App\AccountBundle\Domain\Service;

use App\AccountBundle\Domain\Model\Account;

interface AccountPasswordHasherInterface
{
    /**
     * Хеширует пароль.
     *
     * @param Account $account
     * @param string $plainPassword Пароль в чистом виде.
     * @return string Хешированный пароль.
     */
    public function hash(Account $account, string $plainPassword): string;

    /**
     * Проверяет соответствие пароля хешу.
     *
     * @param Account $account
     * @param string $plainPassword Пароль в чистом виде.
     * @return bool Верно ли соответствует пароль хешу.
     */
    public function verify(Account $account, string $plainPassword): bool;
}