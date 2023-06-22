<?php
class Transport
{
    public function __construct
    (
        private string $name,
        private int $speed,
        private string $unitOfSpeed,
    ){}

    public function getInfo() : string
    {
        return 'Назва: ' . $this->getName() . ', Швидкість: ' . $this->getSpeed()  . $this->getUnitOfSpeed();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUnitOfSpeed(): string
    {
        return $this->unitOfSpeed;
    }

    /**
     * @param string $unitOfSpeed
     * @return Transport
     */
    public function setUnitOfSpeed(string $unitOfSpeed): Transport
    {
        $this->unitOfSpeed = $unitOfSpeed;
        return $this;
    }

    /**
     * @param string $name
     * @return Transport
     */
    public function setName(string $name): Transport
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     * @return Transport
     */
    public function setSpeed(int $speed): Transport
    {
        $this->speed = $speed;
        return $this;
    }


}
class Car extends Transport
{
    public function __construct(string $name, int $speed, string $unitOfSpeed, private int $numDors)
    {
        parent::__construct($name, $speed, $unitOfSpeed);
    }

    public function getInfo(): string
    {

        return parent::getInfo() . ' у мене ' . $this->getNumDors() . ' дверей' . ' і я роблю ' . $this->startEngine();
    }
    public function startEngine(): string
    {
        return 'Вжинь';
    }

    /**
     * @return int
     */
    public function getNumDors(): int
    {
        return $this->numDors;
    }

    /**
     * @param int $numDors
     * @return Car
     */
    public function setNumDors(int $numDors): Car
    {
        $this->numDors = $numDors;
        return $this;
    }
}
class Bicycle extends Transport
{
    public function __construct(string $name, int $speed, string $unitOfSpeed, private int $numGears)
    {
        parent::__construct($name, $speed, $unitOfSpeed);
    }

    public function getInfo(): string
    {

        return parent::getInfo() . ' у мене ' . $this->getNumGears() . ' швидкостей' . ' і я роблю ' . $this->ringBell();
    }

    public function ringBell(): string
    {
        return 'Дзинь';
    }

    /**
     * @return int
     */
    public function getNumGears(): int
    {
        return $this->numGears;
    }

    /**
     * @param int $numGears
     * @return Bicycle
     */
    public function setNumGears(int $numGears): Bicycle
    {
        $this->numGears = $numGears;
        return $this;
    }
}

class Boat extends Transport
{
    public function __construct(string $name, int $speed, string $unitOfSpeed, private int $numLifeVest)
    {
        parent::__construct($name, $speed, $unitOfSpeed);
    }

    public function getInfo(): string
    {

        return parent::getInfo() . ' у мене ' . $this->getNumLifeVest() . ' рятувальних жилетів' . ' і я роблю ' . $this->Spray();
    }
    public function Spray(): string
    {
        return 'Плюх';
    }

    /**
     * @return int
     */
    public function getNumLifeVest(): int
    {
        return $this->numLifeVest;
    }

    /**
     * @param int $numLifeVest
     * @return Boat
     */
    public function setNumLifeVest(int $numLifeVest): Boat
    {
        $this->numLifeVest = $numLifeVest;
        return $this;
    }


}

$t1 = new Bicycle('Ластівка', 5, 'км/г', 4);
$t2 = new Car('Mazda', 100, 'км/г', 5);
$t3 = new Boat('Razor', 30, 'вузлів', 5);

$transports = [$t1, $t2, $t3];

function getAllInfo(array $transports)
{
    foreach ($transports as $transport) {
        echo $transport->getInfo() . PHP_EOL;
    }
}

getAllInfo($transports);
