<?php

namespace App\Http\Controllers;

use App\Actions\GetHousingLoanEvaluation;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class EvaluateController extends Controller
{
    public function __invoke(Request $request)
    {   

        $tempfilePath = $this->tempES("Create");
        // $es = GetHousingLoanEvaluation::run($request->all());
        // $es = GetHousingLoanEvaluation::run($request->all(), $tempfilePath);
        $es = GetHousingLoanEvaluation::run($request->except(['valueOnly']), $tempfilePath);
        $request->valueOnly!="true"?$this->saveES($es['ES']):$es['Value']['file']=Null;
        $this->tempES("Delete",$tempfilePath);
        return $es['Value'];
    }

    public function tempES(String $method,String $path = Null)
    {
        if($method=="Create")
        {
        $sourcePath = docs_path("SHDG - Evaluation sheet V1-0-2 - 240819.xlsx");
        $timestamp = now()->format('Ymd_His');
        $tempfilePath = docs_path("ES_Temp".$timestamp.".xlsx");
        File::copy($sourcePath, $tempfilePath);
        return $tempfilePath;
        }
        elseif($method=="Delete"){
        if (File::exists($path)) {
            File::delete($path);
        }            
        }
    }
    public function saveES($ES){
        $savePath = storage_path('app/public/' . $ES['Filename']);
        $writer = new Xlsx($ES['Spreadsheet']);
        $writer->save($savePath);
    }
}
