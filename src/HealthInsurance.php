<?php

namespace LaborAndHealthCalculator;

class HealthInsurance
{
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function calculate($actualSalary, $dependents, $year)
    {
        $settings = $this->config[$year];

        $insuredSalary = max(
            $settings['min_insured_salary'],
            min($actualSalary, $settings['max_insured_salary'])
        );

        $familyCount = 1 + min($dependents, $settings['dependent_limit']);

        $employeeFee = $insuredSalary * $settings['health_insurance_rate'] * $settings['employee_ratio'] * $familyCount;
        $employerFee = $insuredSalary * $settings['health_insurance_rate'] * $settings['employer_ratio'] * $settings['average_dependents'];

        return [
            'insured_salary' => $insuredSalary,
            'employee_fee' => $employeeFee,
            'employer_fee' => $employerFee,
        ];
    }
}