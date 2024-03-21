<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

class CustomerService
{
    /**
     * Get all customers.
     */
    public function getAllCustomers(): Collection
    {
        return Customer::all();
    }

    /**
     * Find a customer by ID.
     */
    public function findById(int $id): ?Customer
    {
        return Customer::find($id);
    }

    /**
     * Create a new customer.
     */
    public function create(array $data): Customer
    {
        return Customer::create($data);
    }

    /**
     * Update a customer.
     */
    public function update(array $data, int $id): ?Customer
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return null;
        }
        $customer->update($data);
        return $customer;
    }

    /**
     * Delete a customer.
     */
    public function delete(int $id): bool
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return false;
        }
        return $customer->delete();
    }
}
