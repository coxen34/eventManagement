<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function create()
    {
        return view('organizations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'zipcode' => 'required|string|max:10',
            'locality' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:organizations,email',
        ]);

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

        if (!$org) {
            return redirect()->route('organizations.showOrgs')->with('error', 'La organización no se encontró.');
        }


        if (!in_array($field, ['name', 'street', 'zipcode', 'locality', 'province', 'country', 'phone', 'email'])) {
            return redirect()->route('organizations.showOrgs')->with('error', 'Campo no válido.');
        }

        $fieldName = $field;
        $fieldValue = $org->{$field};

        return view('organizations.editField', compact('org', 'fieldName', 'fieldValue'));
    }


    public function updateField(Request $request, $orgId)
    {
        $org =  Organization::find($orgId);

        if (!$org) {
            return redirect()->route('organizations.showOrgs')->with('error', 'El organizador no se encontró.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'zipcode' => 'required|string|max:10',
            'locality' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:20', // Ajusta la longitud según tus necesidades
            'email' => 'required|email',
        ]);


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
