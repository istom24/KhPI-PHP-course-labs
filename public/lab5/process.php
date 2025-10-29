<?php
    interface AccountInterface
    {
        public function deposit($amount);
        public function withdraw($amount);
        public function getBalance();
    }
class BankAccount implements AccountInterface
{
    public const MIN_BALANCE = 0;
    protected float $balance;
    protected string $currency;

    public function __construct(string $currency)
    {
        $this->balance = self::MIN_BALANCE;
        $this->currency = $currency;
    }

    public function deposit($amount) : void
    {
        if ($amount <= 0) {
            throw new Exception("Некоректна сума для поповнення");
        }
        $this->balance += $amount;
    }

    public function withdraw($amount) : void
    {
        if ($amount <= 0) {
            throw new Exception("Некоректна сума для зняття");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів");
        }
        $this->balance -= $amount;
    }

    public function getBalance() : float
    {
        return $this->balance;
    }
}
//Крок 3: Спадкування та статичні властивості
//1. Створіть клас SavingsAccount, який успадковує
//BankAccount.
//● Додайте статичну властивість interestRate, яка
//визначає відсоткову ставку для накопичувального
//рахунку.
//● Реалізуйте метод applyInterest(), який додає до
//балансу відсоток від поточного балансу відповідно до
//відсоткової ставки.
class SavingsAccount extends BankAccount
{
    public static float $interestRate = 0.5;
    public static function  setInterestRate(float $rate) : void
    {
        self::$interestRate = $rate;
    }

    public function applyInterest() : void
    {
        $interest = $this->balance * (self::$interestRate / 100);
        $this->balance += $interest;
    }
}
//Крок 4: Тестування та обробка винятків
//1. Створіть кілька об'єктів класу BankAccount та
//SavingsAccount і протестуйте їх функціонал:
//● Поповнення рахунку.
//● Зняття коштів.
//● Використання методу applyInterest() для
//накопичувального рахунку.
//2. Обробіть всі винятки, які можуть виникнути під час
//операцій з рахунками, і виведіть відповідні повідомлення
//про помилки.
try {
    $client1 = new BankAccount("USD");
    $client1->deposit(1000);
    $client1->withdraw(200);
    echo "Рахунок: " . $client1->getBalance() . "<br>";

    $client2 = new SavingsAccount("USD");
    SavingsAccount::setInterestRate(10);
    $client2->deposit(10);
    $client2->applyInterest();
    echo "Накопичувальний рахунок: " . $client2->getBalance() . "<br>";

} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "<br>";
}

try {
    $client3 = new BankAccount("EUR");
    $client3->deposit(-100);
} catch (Exception $e) {
    echo "Помилка при поповненні: " . $e->getMessage() . "<br>";
}

try {
    $client4 = new BankAccount("UAH");
    $client4->deposit(100);
    $client4->withdraw(200);
} catch (Exception $e) {
    echo "Помилка при знятті: " . $e->getMessage() . "<br>";
}
?>

