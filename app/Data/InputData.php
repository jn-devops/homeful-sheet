<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class InputData extends Data
{
    public function __construct(
        string $title,
        string $guideline,
        string $program,
        string $application_date,
        string $principal_borrower,
        string $birth_date,
        string $work_area,
        string $employment,
        string $pay_mode,
        string $type_of_development,
        string $project_type,
        string $housing_type,
        int $total_floor_number,
        int $total_floor_area,
        float $price_ceiling,
        string $lts_number,
        string $lts_date,
        float $selling_price,
        float $appraised_value_lot,
        float $appraised_value_house,
        float $desired_loan,
        float $gross_income_principal,
        string $repricing_period,
        int $loan_term
    ) {}

//    public static function fromArray(array $attribs)
//    {
//        return new self(
//            title: $attribs
//        );
//    }
}
