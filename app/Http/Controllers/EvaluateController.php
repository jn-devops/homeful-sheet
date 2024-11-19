<?php

namespace App\Http\Controllers;

use App\Actions\GetHousingLoanEvaluation;
use Illuminate\Http\Request;

class EvaluateController extends Controller
{
    public function __invoke(Request $request)
    {
        $es = GetHousingLoanEvaluation::run($request->all());

        return response()->json($es);
    }
}
