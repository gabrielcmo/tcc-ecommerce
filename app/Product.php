<?php

namespace Doomus;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;
    use Rateable;

    protected $fillable = ['id', 'nome', 'descricao', 'qtd_restante', 'valor', 'peso', 'altura', 'comprimento', 'largura', 'diametro', 'qtd_visto'];

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
            'products.nome' => 10,
        ],
        'joins' => [
            'categories' => ['products.categoria_id','categories.id'],
        ],
    ];

    /**
     * The Relationship
     *
     */
    public function image(){
        return $this->hasMany('Doomus\ProductImage');
    }

    public function category(){
        return $this->belongsTo('Doomus\Category');
    }

    public function orders(){
        return $this->belongsToMany('Doomus\Order');
    }

    public function ratings() {
        return $this->belongsToMany('Doomus\ProductRating', 'products_ratings', 'product_id', 'user_id', 'order_id');
    }

    public function evaluations(){
        return $this->hasMany('Doomus\EvaluationText');
    }
}
