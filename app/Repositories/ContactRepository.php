<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    public function all(int $perPage = 10)
    {
        return Contact::orderBy('id', 'desc')->paginate($perPage);
    }

    public function find($id)
    {
        return Contact::findOrFail($id);
    }

    public function create(array $data)
    {
        return Contact::create($data);
    }

    public function update($id, array $data)
    {
        $contact = $this->find($id);
        $contact->update($data);
        return $contact;
    }

    public function delete($id)
    {
        $contact = $this->find($id);
        return $contact->delete();
    }
}
