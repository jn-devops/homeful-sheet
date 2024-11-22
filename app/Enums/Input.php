<?php

namespace App\Enums;

enum Input: string
{
    case title = 'TITLE';
    case guideline = 'GUIDELINE';
    case program = 'PROGRAM';
    case application_date = 'APPLICATION_DATE';
    case principal_borrower = 'PRINCIPAL_BORROWER';
    case co_borrower_1 = 'COBORROWER_1';
    case co_borrower_2 = 'COBORROWER_2';
    case birth_date = 'BIRTH_DATE';
    case birth_date_coborrower_1 = 'BIRTH_DATE_COBORROWER_1';
    case birth_date_coborrower_2 = 'BIRTH_DATE_COBORROWER_2';
    case work_area = 'WORK_AREA';
    case employment = 'EMPLOYMENT';
    case pay_mode = 'PAY_MODE';
    case type_of_development = 'TYPE_OF_DEVELOPMENT';
    case project_type = 'PROJECT_TYPE';
    case housing_type = 'HOUSING_TYPE';
    case total_floor_number = 'TOTAL_FLOOR_NUMBER';
    case total_floor_area = 'TOTAL_FLOOR_AREA';
    case price_ceiling = 'PRICE_CEILING';
    case lts_number = 'LTS_NUMBER';
    case lts_date = 'LTS_DATE';
    case selling_price = 'SELLING_PRICE';
    case appraised_value_lot = 'APPRAISED_VALUE_LOT';
    case appraised_value_house = 'APPRAISED_VALUE_HOUSE';
    case desired_loan = 'DESIRED_LOAN';
    case gross_income_principal = 'GROSS_INCOME_PRINCIPAL';
    case gross_income_coborrower_1 = 'GROSS_INCOME_COBORROWER_1';
    case gross_income_coborrower_2 = 'GROSS_INCOME_COBORROWER_2';
    case repricing_period = 'REPRICING_PERIOD';
    case loan_period_years = 'LOAN_PERIOD_YEARS';

    public function cell(): string
    {
        return match ($this) {
            Input::title => env('title','A1'),
            Input::guideline => env('guideline', 'C2'),
            Input::program => env('program', 'C3'),
            Input::application_date => env('application_date', 'K2'),
            Input::principal_borrower => env('principal_borrower', 'B6'),
            Input::co_borrower_1 => env('principal_borrower_1', 'B7'),
            Input::co_borrower_2 => env('principal_borrower_2', 'B8'),
            Input::birth_date => env('birth_date', 'F6'),
            Input::birth_date_coborrower_1 => env('birth_date_coborrower_1', 'F7'),
            Input::birth_date_coborrower_2 => env('birth_date_coborrower_2', 'F8'),
            Input::work_area => env('work_area', 'F10'),
            Input::employment => env('employment', 'F11'),
            Input::pay_mode => env('pay_mode', 'F12'),
            Input::type_of_development => env('type_of_development', 'F13'),
            Input::project_type => env('project_type', 'F14'),
            Input::housing_type => env('housing_type', 'F15'),
            Input::total_floor_number => env('total_floor_number', 'I15'),
            Input::total_floor_area => env('total_floor_area', 'I16'),
            Input::price_ceiling => env('price_ceiling', 'F16'),
            Input::lts_number => env('lts_number', 'F17'),
            Input::lts_date => env('lts_date', 'F18'),
            Input::selling_price => env('selling_price', 'F21'),
            Input::appraised_value_lot => env('appraised_value - lot', 'F25'),
            Input::appraised_value_house => env('appraised_value_house', 'F26'),
            Input::desired_loan => env('desired_loan', 'F31'),
            Input::gross_income_principal => env('gross_income - principal', 'F36'),
            Input::gross_income_coborrower_1 => env('gross_income_coborrower_1', 'F42'),
            Input::gross_income_coborrower_2 => env('gross_income_coborrower_2', 'F58'),
            Input::repricing_period => env('repricing_period', 'F94'),
            Input::loan_period_years => env('loan_term', 'F96'),
        };
    }

    public function default_value()
    {
        return match ($this) {
            Input::title => " EVALUATION SHEET  V1.0.2",
            Input::guideline => "403/349",
            Input::program => "CTS",
            Input::application_date => 44622,
            Input::principal_borrower => "PRINCIPAL BORROWER",
            Input::birth_date => 33043,
            Input::work_area => "HUC",
            Input::employment => "PRIVATE",
            Input::pay_mode => "Over-the-counter",
            Input::type_of_development => "BP 220",
            Input::project_type => "SOCIALIZED",
            Input::housing_type => "CONDOMINIUM",
            Input::total_floor_number => 2,
            Input::total_floor_area => 33,
            Input::price_ceiling => 750000,
            Input::lts_number => 12913,
            Input::lts_date => 43466,
            Input::selling_price => 750000,
            Input::appraised_value_lot => 4900*30,
            Input::appraised_value_house => 655900,
            Input::desired_loan => 750000,
            Input::gross_income_principal => 18000,
            Input::repricing_period => '3 yrs',
            Input::loan_period_years => 30,
            Input::co_borrower_1 => null,
            Input::co_borrower_2 => null,
            Input::birth_date_coborrower_1 => null,
            Input::birth_date_coborrower_2 => null,
            Input::gross_income_coborrower_1 => null,
            Input::gross_income_coborrower_2 => null
        };
    }
}
