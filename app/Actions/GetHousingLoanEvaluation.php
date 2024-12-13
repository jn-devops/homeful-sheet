<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Reader\IReader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Lorisleiva\Actions\Concerns\AsAction;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Enums\{Computed, Input};
use Illuminate\Support\Arr;
use App\Data\InputData;

class GetHousingLoanEvaluation
{
    use AsAction;

    const CELL = 0;
    const VALUE = 1;

    /**
     * @throws Exception
     */
    public function handle(array $inputs, string $tempfilePath): array
    {
        $inputFileType = 'Xlsx';
        // $inputFileName = docs_path("SHDG - Evaluation sheet V1-0-2 - 240819.xlsx");
        $inputFileName = $tempfilePath;
        $reader = IOFactory::createReader($inputFileType);
        $reader->setReadDataOnly(false);
        $reader->setLoadSheetsOnly(["Sheet1"]);
        $reader->setReadEmptyCells(false);
        $spreadsheet = $reader->load($inputFileName);
        
        // Calculation::getInstance($spreadsheet)->clearCalculationCache();
        Calculation::getInstance($spreadsheet)->cyclicFormulaCount = 100;
        // Calculation::getInstance($spreadsheet)->disableCalculationCache();
        

        foreach ($inputs as $i => $value) {
            if($i == "COBORROWER_1"){
                 if($value){
                 $spreadsheet->getActiveSheet()->setCellValue('N7', TRUE);
                 }
                 else{
                 $spreadsheet->getActiveSheet()->setCellValue('N7', FALSE);
                 }
            }
            if($i == "COBORROWER_2"){
                 if($value){
                 $spreadsheet->getActiveSheet()->setCellValue('N8', TRUE);
                 }else{
                 $spreadsheet->getActiveSheet()->setCellValue('N8', FALSE);  }

            }
            $cell = Input::tryFrom($i)->cell();
            if ($cell)
                $spreadsheet->getActiveSheet()->setCellValue($cell, $value);

        }
       $gray_cells = [];
        foreach(Input::cases() as $case) {
            $cellValue = match ($case) {
                Input::appraised_value_lot => $spreadsheet->getActiveSheet()->getCell($case->cell())->getOldCalculatedValue(),
                default => $spreadsheet->getActiveSheet()->getCell($case->cell())->getCalculatedValue()
            };
            Arr::set($gray_cells, $case->value, $cellValue);
        }
        $computed = [];
        foreach(Computed::cases() as $case) {

            $cellValue = match ($case) {
                Computed::maximum_loanable_amount_principal,
                Computed::net_loanable_amount_principal,
                Computed::net_loanable_amount_total,
                Computed::annual_interest_rate,
                Computed::computed_installment_year,
                Computed::computation_label_1_principal,
                Computed::computation_label_2_principal,
                Computed::computation_label_3_principal,
                Computed::computation_label_4_principal,
                // Computed::amort_princ_int1,
                // Computed::amort_mrisri1,
                // Computed::amort_nonlife1,
                // Computed::monthly_amort1,
                //Cobuyer 1
                Computed::computation_label_1_coborrower_1,
                Computed::computation_label_2_coborrower_1,
                Computed::computation_label_3_coborrower_1,
                Computed::computation_label_4_coborrower_1,
                // Computed::amort_princ_int2,
                // Computed::amort_mrisri2,
                // Computed::amort_nonlife2,
                // Computed::monthly_amort2,
                //Cobuyer 2
                Computed::computation_label_1_coborrower_2,
                Computed::computation_label_2_coborrower_2,
                Computed::computation_label_3_coborrower_2,
                Computed::computation_label_4_coborrower_2,
                // Computed::amort_princ_int3,
                // Computed::amort_mrisri3,
                // Computed::amort_nonlife3,
                // Computed::monthly_amort3,

                Computed::total_label_1_principal,
                Computed::total_label_2_principal,
                Computed::total_label_3_principal,
                Computed::total_label_4_principal,
                Computed::building_value,
                Computed::zone,
                Computed::tariff,
                Computed::doc_stamp_percent_fire_insurance,
                Computed::fire_service_tax_percent,
                Computed::value_added_tax_percent_fire_insurance,
                Computed::lgu_tax_percent_fire_insurance,
                Computed::selling_price,
                Computed::price_ceiling,
                Computed::appraised_value,
                Computed::desired_loan,
                Computed::max_loan => $spreadsheet->getActiveSheet()->getCell($case->cell())->getCalculatedValue(),
                default => $spreadsheet->getActiveSheet()->getCell($case->cell())->getOldCalculatedValue()
                // default => $spreadsheet->getActiveSheet()->getCell($case->cell())->getCalculatedValue()
                
            };
            Arr::set($computed, $case->value, $cellValue);
        }


        //save excel
        $buyerStr = str_replace(' ', '_' , $gray_cells['PRINCIPAL_BORROWER'] );
        $fileName = $buyerStr .'_'. now()->format('Ymd_His') . '.xlsx';
        $savePath = storage_path('app/public/' . $fileName);
        return [
            'Value' => [
                'inputs' => $gray_cells,
                'computed' => $computed,
                // 'file'  => config('app.url') . Storage::url($fileName)
                  'file'  => config('app.url') . '/storage/' . $fileName
                // 'file' => config('app.url') . '/storage/demo_ES.xlsx'//? . $fileName
              
            ],
            'ES' =>[
                'Spreadsheet' => $spreadsheet,
                'Filename'    => $fileName
            ] 
        ];
    }
}
