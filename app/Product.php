<?php

namespace Doomus;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;

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

    public function mediaNotaAvaliacao(){
        $ratings = ProductRating::where([
            'product_id' => $this->id
        ])->get();

        $count = count($ratings);

        if($count == 0)
        {
            return 0;
        }

        $soma = 0;
        $media = 0;
        foreach($ratings as $rating)
        {
            $soma += $rating->note;
        }

        
        $media = $soma / $count;
        
        return $media;
    }

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
        return $this->belongsToMany('Doomus\User', 'products_ratings');
    }

    public function evaluations(){
        return $this->hasMany('Doomus\EvaluationText');
    }
}
