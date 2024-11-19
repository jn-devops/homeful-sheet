<?php

namespace App\Enums;

enum Input: string
{
    case title = 'title';
    case guideline = 'guideline';
    case program = 'program';
    case application_date = 'application date';
    case principal_borrower = 'principal borrower';
    case birth_date = 'birth date';
    case work_area = 'work area';
    case employment = 'employment';
    case pay_mode = 'pay mode';
    case type_of_development = 'type of development';
    case project_type = 'project type';
    case housing_type = 'housing type';
    case total_floor_number = 'total floor number';
    case total_floor_area = 'total floor area';
    case price_ceiling = 'price ceiling';
    case lts_number = 'lts number';
    case lts_date = 'lts date';
    case selling_price = 'selling price';
    case appraised_value_lot = 'appraised value - lot';
    case appraised_value_house = 'appraised value - house';
    case desired_loan = 'desired loan';
    case gross_income_principal = 'gross income - principal';
    case repricing_period = 'repricing period';
    case loan_term = 'loan_term';

    public function cell(): string
    {
        return match ($this) {
            Input::title => env('title','A1'),
            Input::guideline => env('guideline', 'C2'),
            Input::program => env('program', 'C3'),
            Input::application_date => env('application date', 'K2'),
            Input::principal_borrower => env('principal borrower', 'B6'),
            Input::birth_date => env('birth date', 'F6'),
            Input::work_area => env('work area', 'F10'),
            Input::employment => env('employment', 'F11'),
            Input::pay_mode => env('pay mode', 'F12'),
            Input::type_of_development => env('type of development', 'F13'),
            Input::project_type => env('project type', 'F14'),
            Input::housing_type => env('housing type', 'F15'),
            Input::total_floor_number => env('total floor number', 'I15'),
            Input::total_floor_area => env('total floor area', 'I16'),
            Input::price_ceiling => env('price ceiling', 'F16'),
            Input::lts_number => env('lts number', 'F17'),
            Input::lts_date => env('lts date', 'F18'),
            Input::selling_price => env('selling price', 'F21'),
            Input::appraised_value_lot => env('appraised value - lot', 'F25'),
            Input::appraised_value_house => env('appraised value - house', 'F26'),
            Input::desired_loan => env('desired loan', 'F31'),
            Input::gross_income_principal => env('gross income - principal', 'F36'),
            Input::repricing_period => env('repricing period', 'F94'),
            Input::loan_term => env('loan_term', 'F96'),
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
            Input::loan_term => 30,
        };
    }
}
