<?php

class User
{
    public function __construct
    (
        protected string $username,
        protected string $password,
        protected string $role,
        protected int    $ID
    )
    {
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getID(): int
    {
        return $this->ID;
    }

}

class Order
{
    public function __construct(
        protected string $type,
        protected string $data,
        protected int    $ID
    )
    {

    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getId(): int
    {
        return $this->ID;
    }
}

class File
{
    public function __construct
    (
        protected string $filename,
        protected string $data
    )
    {
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getData(): string
    {
        return $this->data;
    }
}

interface FileProcessor
{
    public function fileMethod(File $file): string;

}

interface AuthenticateProcessor
{
    public function processAuthenticate(User $user): string;
}

interface OrderProcessor
{
    public function processOrder(Order $order): string;
}

interface ReportProcessor
{
    public function processReport(Order $order): string;
}

interface DisplayProcessorOrder
{
    public function processDisplay(Order $order): string;
}

interface DisplayProcessorUser
{
    public function processDisplay(User $user): string;
}

class TypeEXT implements FileProcessor
{

    public function fileMethod(File $file): string
    {
        return 'Визначення розширення';
    }
}

class ReadCSV implements FileProcessor
{

    public function fileMethod(File $file): string
    {
        return 'Читання запису файлів типу csv';
    }
}

class ReadTXT implements FileProcessor
{

    public function fileMethod(File $file): string
    {
        return 'Читання запису файлів типу txt';
    }
}

class WriteTXT implements FileProcessor
{
    public function fileMethod(File $file): string
    {
        return 'Функціонал запису файлів типу txt';
    }
}

class WriteCSV implements FileProcessor
{
    public function fileMethod(File $file): string
    {
        return 'Функціонал запису файлів типу csv';
    }
}

class DisplayUser implements DisplayProcessorUser
{

    public function processDisplay(User $user): string
    {
        return 'Відображення профілю користувача';
    }
}

class ProcAutUser implements AuthenticateProcessor
{

    public function processAuthenticate(User $user): string
    {
        return 'Логіка аутентифікації користувача';
    }
}

class DisplayData implements DisplayProcessorOrder
{

    public function processDisplay(Order $order): string
    {
        return 'Відображення даних на веб-сторінці';
    }
}

class SaveData implements OrderProcessor
{

    public function processOrder(Order $order): string
    {
        return 'Збереження даних в базі даних';
    }
}


class ProcessProduct implements OrderProcessor
{
    public function processOrder(Order $order): string
    {
        return 'Обробка замовлення на товар';
    }
}

class ProcessService implements OrderProcessor
{
    public function processOrder(Order $order): string
    {
        return 'Обробка замовлення на послугу';
    }
}

class ProcessDelivery implements OrderProcessor
{
    public function processOrder(Order $order): string
    {
        return 'Обробка замовлення на доставку';
    }
}

class ReportPdf implements ReportProcessor
{
    public function processReport(Order $order): string
    {
        return 'Логіка генерації звіту у форматі PDF';
    }
}

class ReportCsv implements ReportProcessor
{
    public function processReport(Order $order): string
    {
        return 'Логіка генерації звіту у форматі CSV';
    }
}

class DisplayOrder implements DisplayProcessorOrder
{
    public function processDisplay(Order $order): string
    {
        return 'Відображення інформації про замовлення';
    }
}

class OrderNew
{
    public function makeOrder(OrderProcessor $order, ReportProcessor $report, Order $objOrder): string

    {
        return $order->processOrder($objOrder) . ', ' . $report->processReport($objOrder);
    }
}

class DisplayNew
{
    public function makeDisplay(DisplayProcessorOrder $display, Order $objOrder): string

    {
        return $display->processDisplay($objOrder) . ' - ' . $objOrder->getId();
    }
}

//тест
$test = new Order('Сервіс', 'Info', 1);
$newOrd = new OrderNew();
$newDis = new DisplayNew();
echo $newOrd->makeOrder(new processService(), new ReportCsv(), $test) . PHP_EOL;
echo $newDis->makeDisplay(new DisplayOrder(), $test);
