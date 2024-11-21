<?php

namespace App\Http\Controllers;

use App\Actions\GetHousingLoanEvaluation;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class EvaluateController extends Controller
{
    public function __invoke(Request $request)
    {
        // $es = GetHousingLoanEvaluation::run($request->all());
        $tempfilePath = $this->tempES("Create");
        $es = GetHousingLoanEvaluation::run($request->all(), $tempfilePath);
        $this->tempES("Delete",$tempfilePath);
        return $es;
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
}
