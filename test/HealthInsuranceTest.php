<?php

use LaborAndHealthCalculator\HealthInsurance;
use PHPUnit\Framework\TestCase;

class HealthInsuranceTest extends TestCase
{
    public function testCalculate()
    {
        $config = [
            '2025' => [
                'health_insurance_rate' => 0.0517, // 5.17%不變
                'health_employer_ratio' => 0.60,
                'health_employee_ratio' => 0.30,
                'health_gov_ratio' => 0.10,
                'avg_dependent_factor' => 1.57,    // 假設不變
                'min_wage_level' => 28590,         // 2025年最低投保薪資
            ]
        ];

        $calculator = new HealthInsurance($config);
        $result = $calculator->calculate(30300, 2, '2025');

        $this->assertEquals(30300, $result['insured_salary']);
        $this->assertEquals(465.3, $result['employee_fee']);
        $this->assertEquals(486.99, $result['employer_fee']);
    }
}