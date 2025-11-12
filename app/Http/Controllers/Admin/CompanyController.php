<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
        $data = Company::get();
        return view('admin.company.index',compact('data'));
    }
    public function create()
    {
       
        return view('admin.company.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'website' => 'nullable|url|max:255',
        ]);

        $company = new Company();
        $company->name = $validated['name'];
        $company->website = $validated['website'] ?? null;

        // handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'company_' . time() . '_' . uniqid() . '.' . $logo->getClientOriginalExtension();
            $destinationPath = public_path('uploads/company_logos');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            // resize to reasonable dimensions
            Image::make($logo)->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . DIRECTORY_SEPARATOR . $logoName, 80);
            $company->logo = 'uploads/company_logos/' . $logoName;
        }

        if ($company->save()) {
            $notification = array(
                'messege' => 'Company Saved',
                'type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }

        $notification = array(
            'messege' => 'Unsuccessful',
            'type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $data = Company::findOrFail($id);
        return view('admin.company.edit', compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'website' => 'nullable|url|max:255',
        ]);

        $company = Company::findOrFail($id);
        $company->name = $validated['name'];
        $company->website = $validated['website'] ?? null;

        // handle logo replacement
        if ($request->hasFile('logo')) {
            if ($company->logo && File::exists(public_path($company->logo))) {
                @unlink(public_path($company->logo));
            }
            $logo = $request->file('logo');
            $logoName = 'company_' . time() . '_' . uniqid() . '.' . $logo->getClientOriginalExtension();
            $destinationPath = public_path('uploads/company_logos');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            Image::make($logo)->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . DIRECTORY_SEPARATOR . $logoName, 80);
            $company->logo = 'uploads/company_logos/' . $logoName;
        }

        if ($company->save()) {
            $notification = array(
                'messege' => 'Company Updated',
                'type' => 'success'
            );

            return Redirect()->back()->with($notification);
        }

        $notification = array(
            'messege' => 'Unsuccessful',
            'type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        $company = Company::findOrFail($id);
        // delete logo if present
        if ($company->logo && File::exists(public_path($company->logo))) {
            @unlink(public_path($company->logo));
        }

        if ($company->delete()) {
            $notification = array(
                'messege' => 'Company Deleted',
                'type' => 'success'
            );

            return Redirect()->back()->with($notification);
        }

        $notification = array(
            'messege' => 'Unsuccessful',
            'type' => 'error'
        );

        return Redirect()->back()->with($notification);
        
    }
}
