<?php

namespace App\AccountBundle\Domain\Service;

interface AccountPasswordHasherInterface
{
    /**
     * Хеширует пароль.
     *
     * @param string $plainPassword Пароль в чистом виде.
     * @return string Хешированный пароль.
     */
    public function hash(string $plainPassword): string;

    /**
     * Проверяет соответствие пароля хешу.
     *
     * @param string $hashedPassword Хешированный пароль.
     * @param string $plainPassword Пароль в чистом виде.
     * @return bool Верно ли соответствует пароль хешу.
     */
    public function verify(string $hashedPassword, string $plainPassword): bool;
}