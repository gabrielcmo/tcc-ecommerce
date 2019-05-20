<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;

    protected $fillable = ['id', 'name', 'details', 'description', 'price'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.id' => 10,
            'products.name' => 10,
        ],
        'joins' => [
            'categories' => ['products.category_id','categories.id'],
        ],
    ];

    /**
     * The Relationship
     *
     */
    public function image(){
        return $this->belongsTo('Doomus\ProductImage');
    }

    public function cart(){
        return $this->belongsToMany('Doomus\Cart', 'cart_products');
    }

    public function category(){
        return $this->belongsTo('Doomus\Category');
    }
}
