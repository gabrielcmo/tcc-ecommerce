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
                $count = 0;
                foreach($data as $row){
                    if($count == 5){
                        $output .= "<a class='dropdown-item'><span style='margin-left:200px;font-size:14px;'>Encontrado ".count($data)."</span></a>";
                        break;
                    }
                    $category = $row->category;
                    $output .= "<a href="."/produto/$row->id"." class='dropdown-item bg-light'><li tabindex='0' class='mdc-list-item mdc-ripple-upgraded' id='aff395b0-479d-4378-b2c5-ea27f0d4368f' style='--mdc-ripple-fg-size:360px; --mdc-ripple-fg-scale:1.7064015552380171; --mdc-ripple-fg-translate-end:120px, -143.99999618530273px; --mdc-ripple-fg-translate-start:387px, -136.79999542236328px;'>";
                    $output .= '<span class="mdc-list-item__text"><span class="mdc-list-item__primary-text">';
                    $output .= "$row->name</span><span class='mdc-list-item__secondary-text'>$category->name</span></span></li></a>";
                    $count++;
                }
            }else{
                $output = '<a class="dropdown-item">Nada encontrado</a>';
            }

            return response($output);
        }
    }
}
