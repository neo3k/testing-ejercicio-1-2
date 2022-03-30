<?php

declare(strict_types=1);

final class EmailHelper
{
    public static function isValidEmail(string $email): bool
    {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function getDomain(string $email): string
    {
        if( !self::isValidEmail($email) ) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                )
            );
        }

        return substr(strrchr($email, "@"), 1);
    }
}