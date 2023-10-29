<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function create(){
        return view('organizations.create');
    }

    public function store(Request $request)
    {
        $org = new Organization();


        $org->name = $request->name;
        $org->street = $request->street;
        $org->zipcode = $request->zipcode;
        $org->locality = $request->locality;
        $org->locality = $request->locality;
        $org->province = $request->province;
        $org->country = $request->country;
        $org->phone = $request->phone;
        $org->email = $request->email;
        
        $org->save();

        


        if (!$org) {
            return redirect()->route('organizations.showOrgs')->with('error2', 'El evento no se creó.');
        } else {
            return redirect()->route('organizations.showOrgs')->with('success', 'El evento se ha creado.');
        }
    }
    public function showOrgs()
{
        $orgs = Organization::orderBy('id', 'desc')->paginate(16);
        
    return view('organizations.showOrgs', compact('orgs'));
}

public function destroy($orgId)
    {
        $org = Organization::find($orgId);

        if ($org) {
            $org->delete();
            return redirect()->route('organizations.showOrgs')->with('success', 'Organizador eliminado correctamente');
        } else {
            return redirect()->route('organizations.showOrgs')->with('error', 'No se pudo encontrar el organizador');
        }
    }
    public function editField($orgId, $field)
    {
        $org = Organization::find($orgId);

        // Determina el nombre del campo y su valor actual
        $fieldName = $field;
        $fieldValue = $org->{$field};

        return view('organizations.editField', compact('org','fieldName', 'fieldValue'));
    }

    public function updateField(Request $request, $orgId)
    {
        $org =  Organization::find($orgId);
        
        $org->name = $request->name;
        $org->street = $request->street;
        $org->zipcode = $request->zipcode;
        $org->locality = $request->locality;
        $org->locality = $request->locality;
        $org->province = $request->province;
        $org->country = $request->country;
        $org->phone = $request->phone;
        $org->email = $request->email;
        $org->save();

        if ($org) {
            return redirect()->route('organizations.showOrgs', ['orgId' => $org->id])->with('success', 'Organizador modificado');
        } else {
            return redirect()->route('organizations.showOrgs')->with('error', 'No se ha podido modificar el organizador');
        }
    }

}
