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
        string $co_borrower_1,
        string $co_borrower_2,
        string $birth_date,
        string $birth_date_coborrower_1,
        string $birth_date_coborrower_2,
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
        float $gross_income_coborrower_1,
        float $gross_income_coborrower_2,
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
