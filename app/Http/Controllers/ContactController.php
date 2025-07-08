<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    protected $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $contacts = $this->service->getAll();
        return Inertia::render('Contacts/Index', compact('contacts'));
    }

    public function create()
    {
        return Inertia::render('Contacts/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string',
        ]);

        $this->service->store($validated);

        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso.');
    }

    public function edit($id)
    {
        $contact = $this->service->getById($id);
        return Inertia::render('Contacts/Edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:contacts,email,' . $id,
            'phone' => 'required|string',
        ]);

        $this->service->update($id, $validated);

        return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);

        return redirect()->route('contacts.index')->with('success', 'Contato removido.');
    }
}
