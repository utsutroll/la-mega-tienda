<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business_Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BusinessPartnerController extends Controller
{
    public function index()
    {
        return view('admin.business-partners.index');
    }

    public function create()
    {
        return view('admin.business-partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([   
            'partner' => 'required|unique:business_partners,partner',   
            'file'  => 'required|image',
            'link' => 'required|url'
        ]);
            
        $continuar = $request->continue;

        if($request->file('file')){
            $url = Storage::put('partners', $request->file('file'));     
        }    

        Business_Partner::create([
            'partner' => $request->partner,   
            'img' => $url,  
            'link' => $request->link,       
            'slug' => Str::slug($request->partner),
            
        ]);

        if($continuar == "on"){

            return redirect()->route('admin.business-partners.create')->with('info', 'El Aliado Comercial  se creó con éxito.');

        }else{
            return redirect()->route('admin.business-partners.index')->with('info', 'El Aliado Comercial se creó con éxito.');
        }
    }

    public function show(Business_Partner $business_Partner)
    {
        //
    }

    public function edit(Business_Partner $business_partner)
    {
        return view('admin.business-partners.edit', compact('business_partner'));
    }

    public function update(Request $request, Business_Partner $business_partner)
    {
        
        $request->validate([   
            'partner' => "required|unique:business_partners,partner,$business_partner->id",   
            'file'  => 'required|image',
            'link' => 'required|url'
        ]);

   

        if($request->file('file')){
        
            if ($business_partner->img) {
                Storage::delete($business_partner->img);

                $url = Storage::put('partners', $request->file('file'));

            }else{

                $url = Storage::put('partners', $request->file('file'));
            }
        }
        $business_partner->update([
            'partner' => $request->partner,   
            'img' => $url,  
            'link' => $request->link,       
            'slug' => Str::slug($request->partner),
            
        ]);

        return redirect()->route('admin.business-partners.index')->with('info_e', 'El Aliado Comercial se actualizó con éxito.');
    }

    public function destroy(Business_Partner $business_Partner)
    {
        //
    }
}
