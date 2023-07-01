<?php

abstract class DBManager
{
    //робота с БД
}

class UserRepository
{
    public function __construct
    (
        protected DBManager $db
    )
    {
    }
}

interface RegisterProcessor
{
    public function register(UserRepository $useData): bool;
}

interface SenderProcessor
{
    public function sendMsg(UserRepository $useData): bool;
}

class RegisterUser implements RegisterProcessor
{

    public function register(UserRepository $useData): bool
    {
        // Реєстрація користувача в базі даних
        return true;
    }
}

class EmailService implements SenderProcessor
{

    public function sendMsg(UserRepository $useData): bool
    {
        // Відправка ласкаво просимо повідомлення електронною поштою

        return true;
    }
}

class SMSService implements SenderProcessor
{

    public function sendMsg(UserRepository $useData): bool
    {
        // Відправка повідомлення на мобільний телефон

        return true;
    }
}




