<?php

namespace App\Http\Controllers;

use App\Actions\GetHousingLoanEvaluation;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Storage;

class EvaluateController extends Controller
{
    public function __invoke(Request $request)
    {   
        // dd($request->file('excel_file'));  
        // dd(docs_path());
        $path = null;
        if($request->excel_file){
            $request->validate([
                'excel_file' => 'required|file|mimes:xlsx,xls',
            ]);
            $uploadedFile = $request->file('excel_file');
            $filename = 'ES_Temp_Test' . now()->format('Ymd_His') . '.' . $uploadedFile->getClientOriginalExtension();
            // $tempfilePath = $uploadedFile->storeAs(docs_path(), $filename);
            // $fullTempfilePath = storage_path('app/' . $tempfilePath);
            // dd(Storage::path(''));
            $path = Storage::disk('local')->putFileAs(
                'temp',
                $uploadedFile,
                $filename
            );

        }
        // dd($path);
        $tempfilePath = $path?Storage::path($path):$this->tempES("Create");
        // $es = GetHousingLoanEvaluation::run($request->all());
        // $es = GetHousingLoanEvaluation::run($request->all(), $tempfilePath);
        $es = GetHousingLoanEvaluation::run($request->except(['valueOnly']), $tempfilePath);
        // dd($es['ES']);
        $request->valueOnly!="true"?$this->saveES($es['ES']):$es['Value']['file']=Null;
        $this->tempES("Delete",$tempfilePath);
        return $es['Value'];
    }

    public function tempES(String $method,String $path = Null)
    {
        if($method=="Create")
        {
        // $sourcePath = docs_path("SHDG - Evaluation sheet V1-0-2 - 240819_v2.xlsx");
        $sourcePath = docs_path("SHDG - Evaluation sheet V1-0-2.xlsx");
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
