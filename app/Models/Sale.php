<?php

namespace app\Models;

use app\Models\Product;


class Sale extends Model
{
    private $id;
    private $product_id;
    private $quantity;
    private $total;
    private $salesman;
    private $customer;

    /**
     * Get the value of customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set the value of customer
     *
     * @return  self
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
