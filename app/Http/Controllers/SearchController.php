<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Product;

class SearchController extends Controller
{
    /**
    * Search for products method
    * @param Request $search
    */
    public function find(Request $search)
    {
        if($search->ajax()){
            $query = $search->get('query');
            if($query !== ''){
                $data = Product::where('name', 'like', '%'.$query.'%')
                    ->orWhere('id', 'like', '%'.$query.'%')
                    ->orderBy('id', 'DESC')
                    ->get();

                $total_qtd = $data->count();
            }

            if($total_qtd > 0){
                $output = '';
                foreach($data as $row){
                    $output .= "<a href="."/produto/$row->id"." class='dropdown-item'>$row->name</a>";
                }
            }else{
                $output = '<a class="dropdown-item">Nada encontrado</a>';
            }

            return response($output);
        } 
    }
}
