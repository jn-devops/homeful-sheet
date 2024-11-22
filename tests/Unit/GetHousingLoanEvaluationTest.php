<?php

use App\Actions\GetHousingLoanEvaluation;
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Enums\{Computed, Input};

//beforeEach(function () {
//    $this->spreadsheet = app(GetHousingLoanEvaluation::class)->run();
//});

const CELL = 0;
const VALUE = 1;

dataset('gray cells', function () {
    return [
        [ [
            'title' => ['A1', " EVALUATION SHEET  V1.0.2"] ,
            'guideline' => ['C2', "403/349"],
            'program' => ['C3', "CTS"],
            'application date' => ['K2', 44622], //March 2, 2022
            'principal borrower' => ['B6', "PRINCIPAL BORROWER"],
            'birth date' => ['F6', 33043], //June 19, 1990
            'work area' => ['F10', "HUC"],
            'employment' => ['F11', "PRIVATE"],
            'pay mode' => ['F12', "Over-the-counter"],
            'type of development' => ['F13', "BP 220"],
            'project type' => ['F14', "SOCIALIZED"],
            'housing type' => ['F15', "CONDOMINIUM"],
            'total floor number' => ['I15', 2],
            'total floor area' => ['I16', 33],
            'price ceiling' => ['F16', 750000],
            'lts number' => ['F17', 12913],
            'lts date' => ['F18', 43466], //January 1, 2019
            'selling price' => ['F21', 750000],
            'appraised value - lot' => ['F25', 4900*30],
            'appraised value - house' => ['F26', 655900],
            'desired loan' => ['F31', 750000],
            'gross income - principal' => ['F36', 18000],
            'repricing period' => ['F94', '3 yrs'],
            'loan term' => ['F96', 30],
        ] ],
    ];
});

dataset('yellow cells', function () {
    return [
        [ [
            'gmi - principal' => ['F37', 6300.0],
            'gmi percent - principal' => ['G37', 0.35],
            'net gmi - principal' => ['F38', 6300.0],
            'gmi factor rate - principal' => ['F39', 0.006157172],
            'total gmi loanable' => ['G53', 1023197.01],
            'maximum loanable amount - principal' => ['F79', 6000000.00],
            'net loanable amount - principal' => ['I79', 6000000.00],
            'net loanable amount - total' => ['I82', 6000000.00],
            'computation label 1 - principal' => ['B100', "     Principal & Interest"],
            'computation label 2 - principal' => ['B101', "     MRI/SRI"],
            'computation label 3 - principal' => ['B102', "     Non-Life Insurance"],
            'computation label 4 - principal' => ['B103', "     Monthly Amortization/Installment"],
            'computation 1 - principal' => ['G100', 4617.88],
            'computation 2 - principal' => ['G101', 168.75],
            'computation 3 - principal' => ['G102', 116.19999999999999],
            'computation 4 - principal' => ['G103', 4902.83],
            'total label 1 - principal' => ['B115', "     Principal & Interest"],
            'total label 2 - principal' => ['B116', "     MRI/SRI"],
            'total label 3 - principal' => ['B117', "     Non-Life Insurance"],
            'total label 4 - principal' => ['B118', "     Monthly Amortization/Installment"],
            'computation 1 - total' => ['G100', 4617.88],
            'computation 2 - total' => ['G101', 168.75],
            'computation 3 - total' => ['G102', 116.19999999999999],
            'computation 4 - total' => ['G103', 4902.83],
            'MRI/SRI' => ['F121', 2025.00],
            'Doc Stamp' => ['F122', 100.00],
            'MRI/SRI Total' => ['F123', 2125.00],
            'non-life insurance' => ['F124', 1394.40],
            'factor' => ['F128',  0.006157172],
            'monthly p & i - principal' => ['F131', 750000.00],
            'blank F132 - principal' => ['F132', 4617.88],
            'mri/sri - principal' => ['F134', 168.75],
            'blank F135 - principal' => ['F135', 168.75],
            'aap - principal' => ['F136', 2025.00],
            'doc stamp - principal' => ['F137', 100.00],
            'annual premium - principal' => ['F138', 2125.00],
            'monthly p & i - total' => ['F158', 750000.00],
            'blank F132 - total' => ['F159', 4617.88],
            'mri/sri - total' => ['F161', 168.75],
            'blank F162 - principal' => ['F162', 168.75],
            'aap - total' => ['F163', 2025.00],
            'doc stamp - total' => ['F164', 100.00],
            'annual premium - total' => ['F165', 2125.00],
            'building value' => ['F168', 655900.00],
            'fire coverage' => ['F169', 655900.00],
            'zone' => ['F170', '2A'],
            'tariff' => ['F171', 0.001686], //0.168600%
            'aup 1' => ['F172', 1105.85],
            'doc stamp percent - fire insurance' => ['F173', 0.00021075],
            'doc stamp - fire insurance' => ['F174', 138.23],
            'fire service tax percent' => ['F175', 0.00002270],
            'fire service tax' => ['F176', 14.89],
            'value-added tax percent - fire insurance' => ['F177', 0.00020232],
            'value-added tax - fire insurance' => ['F178', 132.70],
            'LGU tax percent - fire insurance' => ['F179', 0.00000337],
            'LGU tax - fire insurance' => ['F180', 2.21],
            'aup 2' => ['F181', 1393.88],
            'aap line 1' => ['F182', 116.16],
            'aap line 2' => ['F183', 116.19999999999999],
            'total - fire insurance' => ['F184', 1394.4],
        ] ],
    ];
});

dataset('orange cells', function () {
    return [
        [ [
            'selling price' => ['I21', 750000.00],
            'price ceiling' => ['I22', 750000.00],
            'appraised value' => ['I27', 802900.00],
            'desired loan' => ['I31', 750000.00],
            'gross income' => ['I51',  1023197.01],
            'max loan' => ['I75',  6000000.00],
            'recommended loan base' => ['K86',  750000.00],
        ] ],
    ];
});

dataset('simulation', function () {
    return [
        [ [
            'inputs' => [
                'title' => ['A1', " EVALUATION SHEET  V1.0.2"] ,
                'guideline' => ['C2', "403/349"],
                'program' => ['C3', "CTS"],
                'application date' => ['K2', 44622], //March 2, 2022
                'principal borrower' => ['B6', "PRINCIPAL BORROWER"],
                'birth date' => ['F6', 33043], //June 19, 1990
                'work area' => ['F10', "HUC"],
                'employment' => ['F11', "PRIVATE"],
                'pay mode' => ['F12', "Over-the-counter"],
                'type of development' => ['F13', "BP 220"],
                'project type' => ['F14', "SOCIALIZED"],
                'housing type' => ['F15', "CONDOMINIUM"],
                'total floor number' => ['I15', 2],
                'total floor area' => ['I16', 33],
                'price ceiling' => ['F16', 750000],
                'lts number' => ['F17', 12913],
                'lts date' => ['F18', 43466], //January 1, 2019
                'selling price' => ['F21', 800000.0],
                'appraised value - lot' => ['F25', 4900*30],
                'appraised value - house' => ['F26', 655900],
                'desired loan' => ['F31', 800000.0],
                'gross income - principal' => ['F36', 20000],
                'repricing period' => ['F94', '3 yrs'],
                'loan term' => ['F96', 30],
            ],
            'assertions' => [
                'orange' => [
                    'selling price' => ['I21', 800000.0],
                    'price ceiling' => ['I22', 750000.0],
                    'appraised value' => ['I27',  802900.0],
                    'desired loan' => ['I31', 800000.0],
                    'gross income' => ['I51',  1023197.01],
                    'max loan' => ['I75',  6000000.0],
                    'recommended loan base' => ['K86',  750000.0],
                ],
                'yellow' => [
                    'gmi - principal' => ['F37', 6300.0],
                    'gmi percent - principal' => ['G37', 0.35],
                    'net gmi - principal' => ['F38', 6300.0],
                    'gmi factor rate - principal' => ['F39', 0.006157172],
                    'total gmi loanable' => ['G53', 1023197.01],
                    'maximum loanable amount - principal' => ['F79', 6000000.00],
                    'net loanable amount - principal' => ['I79', 6000000.00],
                    'net loanable amount - total' => ['I82', 6000000.00],
                    'computation label 1 - principal' => ['B100', "     Principal & Interest"],
                    'computation label 2 - principal' => ['B101', "     MRI/SRI"],
                    'computation label 3 - principal' => ['B102', "     Non-Life Insurance"],
                    'computation label 4 - principal' => ['B103', "     Monthly Amortization/Installment"],
                    'computation 1 - principal' => ['G100', 4617.88],
                    'computation 2 - principal' => ['G101', 168.75],
                    'computation 3 - principal' => ['G102', 116.19999999999999],
                    'computation 4 - principal' => ['G103', 4902.83],
                    'total label 1 - principal' => ['B115', "     Principal & Interest"],
                    'total label 2 - principal' => ['B116', "     MRI/SRI"],
                    'total label 3 - principal' => ['B117', "     Non-Life Insurance"],
                    'total label 4 - principal' => ['B118', "     Monthly Amortization/Installment"],
                    'computation 1 - total' => ['G100', 4617.88],
                    'computation 2 - total' => ['G101', 168.75],
                    'computation 3 - total' => ['G102', 116.19999999999999],
                    'computation 4 - total' => ['G103', 4902.83],
                    'MRI/SRI' => ['F121', 2025.00],
                    'Doc Stamp' => ['F122', 100.00],
                    'MRI/SRI Total' => ['F123', 2125.00],
                    'non-life insurance' => ['F124', 1394.40],
                    'factor' => ['F128',  0.006157172],
                    'monthly p & i - principal' => ['F131', 750000.00],
                    'blank F132 - principal' => ['F132', 4617.88],
                    'mri/sri - principal' => ['F134', 168.75],
                    'blank F135 - principal' => ['F135', 168.75],
                    'aap - principal' => ['F136', 2025.00],
                    'doc stamp - principal' => ['F137', 100.00],
                    'annual premium - principal' => ['F138', 2125.00],
                    'monthly p & i - total' => ['F158', 750000.00],
                    'blank F132 - total' => ['F159', 4617.88],
                    'mri/sri - total' => ['F161', 168.75],
                    'blank F162 - principal' => ['F162', 168.75],
                    'aap - total' => ['F163', 2025.00],
                    'doc stamp - total' => ['F164', 100.00],
                    'annual premium - total' => ['F165', 2125.00],
                    'building value' => ['F168', 655900.00],
                    'fire coverage' => ['F169', 655900.00],
                    'zone' => ['F170', '2A'],
                    'tariff' => ['F171', 0.001686], //0.168600%
                    'aup 1' => ['F172', 1105.85],
                    'doc stamp percent - fire insurance' => ['F173', 0.00021075],
                    'doc stamp - fire insurance' => ['F174', 138.23],
                    'fire service tax percent' => ['F175', 0.00002270],
                    'fire service tax' => ['F176', 14.89],
                    'value-added tax percent - fire insurance' => ['F177', 0.00020232],
                    'value-added tax - fire insurance' => ['F178', 132.70],
                    'LGU tax percent - fire insurance' => ['F179', 0.00000337],
                    'LGU tax - fire insurance' => ['F180', 2.21],
                    'aup 2' => ['F181', 1393.88],
                    'aap line 1' => ['F182', 116.16],
                    'aap line 2' => ['F183', 116.19999999999999 ],
                    'total - fire insurance' => ['F184', 1394.4],
                ],
            ]
        ] ],
    ];
});

test('that true is true', function (array $inputs, array $computed, array $computed2, array $simulation) {
//    dd(Date::excelToDateTimeObject(44622)->format('M/d/y'));
    $inputFileType = 'Xlsx';
    $inputFileName = "resources/docs/SHDG - Evaluation sheet V1-0-2 - 240819.xlsx";
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    $reader->setReadDataOnly(true);
    $reader->setLoadSheetsOnly(["Sheet1"]);
    $reader->setReadEmptyCells(false);
    $spreadsheet = $reader->load($inputFileName);
    Calculation::getInstance($spreadsheet)->disableCalculationCache();
//    foreach ($inputs as $matrix) {
//        $cellValue = $spreadsheet->getActiveSheet()->getCell($matrix[CELL])->getCalculatedValue();
//        expect($cellValue)->toBe($matrix[VALUE]);
//    }
    foreach(Input::cases() as $input) {
        $cellValue = $spreadsheet->getActiveSheet()->getCell($input->cell())->getCalculatedValue();
        expect($cellValue)->toBe($input->default_value());
    };
    foreach ($computed as $title => $matrix) {
        $cellValue = match($spreadsheet->getActiveSheet()->getCell($matrix[CELL])->getDataType()) {
            'f' => $spreadsheet->getActiveSheet()->getCell($matrix[CELL])->getOldCalculatedValue(),
            's' => $spreadsheet->getActiveSheet()->getCell($matrix[CELL])->getCalculatedValue(),
            'n' => $spreadsheet->getActiveSheet()->getCell($matrix[CELL])->getCalculatedValue()
        };
        expect($cellValue)->toBe($matrix[VALUE]);
    }
    foreach ($computed2 as $matrix) {
        $cellValue = match($spreadsheet->getActiveSheet()->getCell($matrix[CELL])->getDataType()) {
            'f' => $spreadsheet->getActiveSheet()->getCell($matrix[CELL])->getOldCalculatedValue(),
            's' => $spreadsheet->getActiveSheet()->getCell($matrix[CELL])->getCalculatedValue(),
            'n' => $spreadsheet->getActiveSheet()->getCell($matrix[CELL])->getCalculatedValue(),
            default => $spreadsheet->getActiveSheet()->getCell($matrix[CELL])->getValue()
        };
        expect($cellValue)->toBe($matrix[VALUE]);
    }
})->with('gray cells', 'yellow cells', 'orange cells', 'simulation')->skip();

test('setting values', function (array $simulation) {
    $inputFileType = 'Xlsx';
    $inputFileName = "resources/docs/SHDG - Evaluation sheet V1-0-2 - 240819.xlsx";
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    $reader->setReadDataOnly(true);
    $reader->setLoadSheetsOnly(["Sheet1"]);
    $reader->setReadEmptyCells(false);
    $spreadsheet = $reader->load($inputFileName);
//    Calculation::getInstance($spreadsheet)->disableCalculationCache();
    $testComputation = $spreadsheet->getActiveSheet()->getCell('G100')->getOldCalculatedValue();
    dd($testComputation);
    foreach ($simulation['inputs'] as $inputs) {
        $cell = $inputs[CELL];
        $value = $inputs[VALUE];
        $spreadsheet->getActiveSheet()->setCellValue($cell, $value);
        $cellValue = $spreadsheet->getActiveSheet()->getCell($cell)->getCalculatedValue();
        expect($cellValue)->toBe($value);
    }
    Calculation::getInstance($spreadsheet)->clearCalculationCache();
    foreach ($simulation['assertions']['orange'] as $title => $assertions) {
        $cell = $assertions[CELL];
        $value = $assertions[VALUE];

        $cellValue = match ($title) {
            'selling price', 'desired loan' => $spreadsheet->getActiveSheet()->getCell($cell)->getCalculatedValue(),
            default => $spreadsheet->getActiveSheet()->getCell($cell)->getOldCalculatedValue()
        };
        expect($cellValue)->toBe($value);
    }
    foreach ($simulation['assertions']['yellow'] as $title => $assertions) {
        $cell = $assertions[CELL];
        $value = $assertions[VALUE];

        $cellValue = match ($title) {
            'computation label 1 - principal',
            'computation label 2 - principal',
            'computation label 3 - principal',
            'computation label 4 - principal',
            'total label 1 - principal',
            'total label 2 - principal',
            'total label 3 - principal',
            'total label 4 - principal',
            'zone', 'tariff',
            'doc stamp percent - fire insurance',
            'fire service tax percent',
            'value-added tax percent - fire insurance',
            'LGU tax percent - fire insurance' => $spreadsheet->getActiveSheet()->getCell($cell)->getCalculatedValue(),
            default => $spreadsheet->getActiveSheet()->getCell($cell)->getOldCalculatedValue()
        };
        expect($cellValue)->toBe($value);
    }

})->with('simulation')->skip();

test('action test', function (array $simulation) {
    $inputs = [
//        Input::title->value => " EVALUATION SHEET  V1.0.2",
//        Input::guideline->value => "403/349",
//        Input::program->value => "CTS",
//        Input::application_date->value => 44622,
//        Input::principal_borrower->value => "PRINCIPAL BORROWER",
//        Input::birth_date->value => 33043,
//        Input::work_area->value => "HUC",
//        Input::employment->value => "PRIVATE",
//        Input::pay_mode->value => "Over-the-counter",
//        Input::type_of_development->value => "BP 220",
//        Input::project_type->value => "SOCIALIZED",
//        Input::housing_type->value => "CONDOMINIUM",
//        Input::total_floor_number->value => 2,
//        Input::total_floor_area->value => 33,
//        Input::price_ceiling->value => 750000,
//        Input::lts_number->value => 12913,
//        Input::lts_date->value => 43466,
        Input::selling_price->value => 800000.0,
//        Input::appraised_value_lot->value => 4900*30,
//        Input::appraised_value_house->value => 655900,
//        Input::desired_loan->value => 800000.0,
//        Input::gross_income_principal->value => 18000,
//        Input::repricing_period->value => '3 yrs',
//        Input::loan_term->value => 30,
    ];

    $data = app(GetHousingLoanEvaluation::class)->run($inputs);
    dd($data);
})->with('simulation')->skip();


test('end point test', function () {
    $inputs = [
//        Input::title->value => " EVALUATION SHEET  V1.0.2",
//        Input::guideline->value => "403/349",
//        Input::program->value => "CTS",
//        Input::application_date->value => 44622,
//        Input::principal_borrower->value => "PRINCIPAL BORROWER",
//        Input::birth_date->value => 33043,
//        Input::work_area->value => "HUC",
//        Input::employment->value => "PRIVATE",
//        Input::pay_mode->value => "Over-the-counter",
//        Input::type_of_development->value => "BP 220",
//        Input::project_type->value => "SOCIALIZED",
//        Input::housing_type->value => "CONDOMINIUM",
//        Input::total_floor_number->value => 2,
//        Input::total_floor_area->value => 33,
//        Input::price_ceiling->value => 750000,
//        Input::lts_number->value => 12913,
//        Input::lts_date->value => 43466,
        Input::selling_price->value => 800000.0,
//        Input::appraised_value_lot->value => 4900*30,
//        Input::appraised_value_house->value => 655900,
//        Input::desired_loan->value => 800000.0,
//        Input::gross_income_principal->value => 18000,
//        Input::repricing_period->value => '3 yrs',
//        Input::loan_term->value => 30,
    ];

    $response = $this->post(route('evaluate'), $inputs);
    expect($response->status())->toBe(200);
    expect($response->json())->toHaveCount(3);
    expect($response->json('inputs'))->toHaveCount(30);
    expect($response->json('computed'))->toHaveCount(83);
});
