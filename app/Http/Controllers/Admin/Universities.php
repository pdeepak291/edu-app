<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\UniversitiesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UniversitySaveRequest;
use App\Http\Requests\UniversityUpdateRequest;
use App\Models\University;
use Illuminate\Http\Request;

class Universities extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UniversitiesDataTable $dataTable)
    {
        return $dataTable->render('admin.university.report');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.university.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UniversitySaveRequest $request)
    {
        try {
            $university = University::create([
                'university_code' => $request->university_code,
                'university_name' => $request->university_name
            ]);

            if($university){
                return redirect()->route('university.add')->with('success', 'University created successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to create University.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create University.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($uid)
    {
        $university = University::find(decrypt($uid));
        return view('admin.university.view',compact('university'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uid)
    {
        $university = University::find(decrypt($uid));
        return view('admin.university.edit',compact('university'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UniversityUpdateRequest $request, University $university)
    {
        try {
            $university = University::find(decrypt($request->university_id));
            if($university && $university->update(['university_code' => $request->university_code,'university_name' => $request->university_name])){
                return redirect()->route('universities')->with('success', 'University updated successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to updated University.');
            }

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to updated University.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uid)
    {
        try {
            $university = University::findOrFail(decrypt($uid));
            if($university && $university->courses->count() == 0){
                $university->delete();
                return redirect()->route('universities')->with('success', 'University deleted successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to delete University.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to retrieve University.');
        }
    }
}
