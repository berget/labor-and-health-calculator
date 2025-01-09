# 勞保與健保計算套件

一個用於計算台灣各年份勞保與健保費用的 PHP 函式庫。

## 安裝方式

執行 `composer install` 安裝相關依賴套件。

## 使用方式

```php
require 'vendor/autoload.php';

use LaborAndHealthCalculator\LaborInsurance;
use LaborAndHealthCalculator\HealthInsurance;

$config = [
    '2025' => [
        'min_insured_salary' => 28590,
        'max_insured_salary' => 45800,
        'labor_insurance_rate' => 0.125,
        'employee_ratio' => 0.2,
        'employer_ratio' => 0.7,
        'employee_limit' => 1145,
        'employer_limit' => 4008,
        'health_insurance_rate' => 0.0517,
        'dependent_limit' => 3,
        'average_dependents' => 1.57,
    ]
];

$laborInsurance = new LaborInsurance($config);
$result = $laborInsurance->calculate(30000, '2025');
print_r($result);

$healthInsurance = new HealthInsurance($config);
$result = $healthInsurance->calculate(30000, 2, '2025');
print_r($result);
```