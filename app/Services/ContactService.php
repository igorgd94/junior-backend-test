<?php

namespace App\Services;

use App\Repositories\ContactRepository;

class ContactService
{
    protected $repo;

    public function __construct(ContactRepository $repo)
    {
        $this->repo = $repo;
    }

    private function sanitizePhone(string $phone): string
    {
        return preg_replace('/\D+/', '', $phone);
    }

    public function getAll(int $perPage = 10)
    {
        return $this->repo->all($perPage);
    }

    public function getById($id)
    {
        return $this->repo->find($id);
    }

    public function store(array $data)
    {
        $data['phone'] = $this->sanitizePhone($data['phone']);
        return $this->repo->create($data);
    }

    public function update($id, array $data)
    {
        $data['phone'] = $this->sanitizePhone($data['phone']);
        return $this->repo->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repo->delete($id);
    }
}

