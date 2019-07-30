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
                    $output .= "<a href="."/produto/$row->id"." class='dropdown-item'><li tabindex='0' class='mdc-list-item mdc-ripple-upgraded' id='aff395b0-479d-4378-b2c5-ea27f0d4368f' style='--mdc-ripple-fg-size:360px; --mdc-ripple-fg-scale:1.7064015552380171; --mdc-ripple-fg-translate-end:120px, -143.99999618530273px; --mdc-ripple-fg-translate-start:387px, -136.79999542236328px;'>";
                    $output .= '<span class="mdc-list-item__graphic material-icons" aria-hidden="true">folder</span>
                        <span class="mdc-list-item__text"><span class="mdc-list-item__primary-text">';
                    $output .= "$row->name</span><span class='mdc-list-item__secondary-text'>9 Jan 2018</span></span></li></a>";
                }
            }else{
                $output = '<a class="dropdown-item">Nada encontrado</a>';
            }

            return response($output);
        }
    }
}
