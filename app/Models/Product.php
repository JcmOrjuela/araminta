<?php

namespace app\Models;

use app\Models\Sale;


class Product extends Model
{
    private $id;
    private $name;
    private $reference;
    private $price;
    private $weith;
    private $category;
    private $stock;
    private $created_at;
    private $updated_at;
    private $deleted_at;
    private $last_user;

    /**
     * Get the value of last_user
     */
    public function getLast_user()
    {
        return $this->last_user;
    }

    /**
     * Set the value of last_user
     *
     * @return  self
     */
    public function setLast_user($last_user)
    {
        $this->last_user = $last_user;

        return $this;
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
