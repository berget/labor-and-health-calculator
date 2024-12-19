<?php

use LaborAndHealthCalculator\LaborInsurance;
use PHPUnit\Framework\TestCase;

class LaborInsuranceTest extends TestCase
{
    public function testCalculate()
    {
        $config = [
            '2025' => [
                'min_insured_salary' => 28590,
                'max_insured_salary' => 45800,
                'labor_insurance_rate' => 0.125,
                'employee_ratio' => 0.2,
                'employer_ratio' => 0.7,
                'employee_limit' => 1145,
                'employer_limit' => 4008,
            ]
        ];

        $calculator = new LaborInsurance($config);
        $result = $calculator->calculate(30300, '2025');

        $this->assertEquals(30300, $result['insured_salary']);
        $this->assertEquals(750, $result['employee_fee']);
        $this->assertEquals(2625, $result['employer_fee']);
    }
}