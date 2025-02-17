<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index()
    {
        try {
            $contacts = Contact::paginate(10);
            return view('welcome', compact('contacts'));
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while fetching contacts.');
        }
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:contacts,name',
                'phone_number' => 'required|string|unique:contacts,phone_number'
            ]);


            Contact::create($request->all());

            return redirect()->route('contacts.index')->with('success', 'Contact added successfully!');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while adding the contact.');
        }
    }


    public function edit($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            return view('contacts.edit', compact('contact'));
        } catch (Exception $e) {
            return redirect()->route('contacts.index')->with('error', 'An error occurred while fetching the contact.');
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $contact = Contact::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255|unique:contacts,name,' . $id,
                'phone_number' => 'required|string|unique:contacts,phone_number,' . $id
            ]);


            $contact->update($request->all());

            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while updating the contact.');
        }
    }


    public function destroy($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while deleting the contact.');
        }
    }

    public function importXml(Request $request)
    {
        try {
            $request->validate(['xml_file' => 'required|mimes:xml']);

            $xmlData = simplexml_load_file($request->file('xml_file')->getPathname());

            foreach ($xmlData->contact as $contact) {
                $contactName = (string)$contact->name;
                $contactPhone = (string)$contact->phone_number;

                $existingContact = Contact::where('name', $contactName)
                    ->orWhere('phone_number', $contactPhone)
                    ->first();

                if ($existingContact) {
                    continue;
                }

                Contact::create([
                    'name' => $contactName,
                    'phone_number' => $contactPhone
                ]);
            }

            return redirect('/')->with('success', 'Contacts imported successfully.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while importing the contacts.');
        }
    }



    public function exportXml()
    {
        try {
            $contacts = Contact::all();

            $xml = new \SimpleXMLElement('<contacts/>');

            foreach ($contacts as $contact) {
                $contactXml = $xml->addChild('contact');
                $contactXml->addChild('name', $contact->name);
                $contactXml->addChild('phone_number', $contact->phone_number);
            }

            return response()->stream(
                function () use ($xml) {
                    echo $xml->asXML();
                },
                200,
                [
                    'Content-Type' => 'application/xml',
                    'Content-Disposition' => 'attachment; filename="contacts.xml"',
                ]
            );
        } catch (\Exception $e) {
            return redirect()->route('contacts.index')->with('error', 'There was an error exporting the contacts.');
        }
    }
}
