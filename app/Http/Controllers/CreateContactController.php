<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;
use Inertia\Inertia;

class CreateContactController extends Controller
{
    protected $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $contacts = Contact::limit(10)->get();

        return view('contacts.index', [
            'contacts' => $contacts,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|min:5',
        ]);

        $this->service->store($validated);

        return response()->json([
            'success' => true,
            'message' => 'Contato criado com sucesso.',
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:contacts,email,' . $id,
            'phone' => 'required|string|min:5',
        ]);

        $this->service->update($id, $validated);

        return response()->json([
            'success' => true,
            'message' => 'Contato atualizado com sucesso.',
        ], 200);
    }

    public function destroy($id)
    {
        $this->service->destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Contato removido.',
        ], 200);
    }
}
