<?php

interface DBManager
{
    //робота с БД
}

interface EmailProcessor
{
    public function sendEmail(UserRepository $useData): bool;
}

interface SmsProcessor
{
    public function sendSms(UserRepository $useData): bool;
}

abstract class UserRepository
{
    public function __construct
    (
        private DBManager $db,
    )
    {
    }

    public function reg(): bool
    {
        return true;
    }
}


class EmailService implements EmailProcessor
{
    public function sendEmail(UserRepository $useData): bool
    {
        // Відправка ласкаво просимо повідомлення електронною поштою
        return true;
    }
}

class SMSService implements SmsProcessor
{

    public function sendSms(UserRepository $useData): bool
    {
        // Відправка повідомлення на мобільний телефон
        return true;
    }
}

class Registration extends UserRepository
{
    public function __construct(DBManager $db)
    {
        parent::__construct($db);
    }

    public function reg(): bool
    {
        // Реєстрація користувача в базі даних
        return true;
    }
}

class NewUser
{
    public function __construct
    (
        private UserRepository $user,
        private EmailProcessor $email,
        private SmsProcessor   $sms,
    )
    {
    }

}


