<?php

namespace LaborAndHealthCalculator;

class LaborInsurance
{
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function calculate($actualSalary, $year)
    {
        $settings = $this->config[$year];

        $insuredSalary = max(
            $settings['min_insured_salary'],
            min($actualSalary, $settings['max_insured_salary'])
        );

        $employeeFee = $insuredSalary * $settings['labor_insurance_rate'] * $settings['employee_ratio'];
        $employerFee = $insuredSalary * $settings['labor_insurance_rate'] * $settings['employer_ratio'];

        return [
            'insured_salary' => $insuredSalary,
            'employee_fee' => min($employeeFee, $settings['employee_limit']),
            'employer_fee' => min($employerFee, $settings['employer_limit']),
        ];
    }
}