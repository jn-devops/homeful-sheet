<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use App\Models\EvaluationDocument;
use Illuminate\Support\Facades\Storage;

class EvaluationDocumentController extends Controller
{

    public function index()
    {
        $projects = $this->get_projects();
        $documents = EvaluationDocument::latest()->get();
        return view('Dashboard', compact('documents','projects'));
    }

    // Store a new document
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Code' => 'required|string|max:255',
            'excel_file' => 'required|mimes:xlsx,xls|max:2048',
        ]);
    
        $check = EvaluationDocument::where('code',$request->input('Code'))->first();
        if($check){
            return redirect()->back()->with('warning', 'Project Document already existing. Kindly edit or delete it first');
        }
        // $path = $request->file('excel_file')->store('EvaluationSheet', 'public');
        $uploadedFile = $request->file('excel_file');
        $filename = $request->input('Code') . '_Evaluation_Sheet_' . now()->format('Ymd_His') . '.' . $uploadedFile->getClientOriginalExtension();
      
        $path = Storage::disk('public')->putFileAs(
            'EvaluationSheet',
            $uploadedFile,
            $filename
        );
        
        $res = EvaluationDocument::create([
            'name' => $request->input('Name'),
            'code' => $request->input('Code'),
            'file_path' => $path,
        ]);
        // dd($res);
        return redirect()->back()->with('success', 'Document added successfully!');
    }

    public function edit($id)
    {
        $editDocument = EvaluationDocument::findOrFail($id);
        $projects = $this->get_projects();
        $documents = EvaluationDocument::latest()->get();
        return view('dashboard', compact('editDocument','documents','projects'));
    }

        
    public function update(Request $request, $id)
    {
        $doc = EvaluationDocument::findOrFail($id);
    
        $doc->name = $request->input('Name');
        $doc->code = $request->input('Code');
        $oldfile = $doc->file_path;
        if ($request->hasFile('excel_file')) {

            //optional remove if need ng backup ng old document
            if ($oldfile && Storage::disk('public')->exists($oldfile)) {
                Storage::disk('public')->delete($oldfile);
            }

            $uploadedFile = $request->file('excel_file');
            $filename = $request->input('Code') . '_Evaluation_Sheet_' . now()->format('Ymd_His') . '.' . $uploadedFile->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs(
                'EvaluationSheet',
                $uploadedFile,
                $filename
            );
            $doc->file_path = $path;
        }
    
        $doc->save();
    
        return redirect('dashboard')->with('success', 'Document updated successfully.');
    }
    
    public function destroy($id)
    {
        $doc = EvaluationDocument::findOrFail($id);
        if ($doc->file_path && Storage::disk('public')->exists($doc->file_path)) {
            Storage::disk('public')->delete($doc->file_path);
        }
        $doc->delete();
        return redirect()->back()->with('success', 'Document deleted successfully.');
    }
    
    public static function get_projects()
    {
    $prop_url = config('homeful-sellers.api-urls.match');
        $proj_res = Http::asForm()
        // ->withToken('a34c9bef423b68fed296bd1e28e660a3bf282134c1dddb5458275b4bbb92360e') // Replace with your actual token
        // ->get('https://everyhome.enclavewrx.io/developers/api_storefront_seller/get_seller_projects/'.$id.'/'.$table);
        ->get('https://properties.homeful.ph/fetch-projects');
        $projects = $proj_res->json();
        $prod_res = Http::asForm()
        ->get('https://properties.homeful.ph/fetch-products');
        $products = $prod_res->json();
        // dd($products);
        $listProject=[];
        foreach($projects['projects'] as $project => $value)
        {
            foreach($products['products'] as $product => $val)
            {
                // dd($val);
                if($val['project_code']==$value['code'] && $val['phased_out']==false)
                {
                    $exists = false;
                    foreach ($listProject as $proj_list => $i) 
                    {
                        if($i['code']===$value['code'])
                        {
                            $exists = true;
                            break;
                        }
                    }
                    if($exists==false){
                        $listProject[]=[
                            'code' => $value['code'],
                            'name' => $value['name']
                        ];
                        break;
                    }
                }
            }
        }
        return $listProject;
    }
}

