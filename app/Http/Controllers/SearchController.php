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
        $domain = config('app.name');
        if ($search->ajax()) {
            $query = $search->get('query');
            if ($query !== '') {
                $data = Product::where('name', 'like', '%' . $query . '%')
                    ->orWhere('id', 'like', '%' . $query . '%')
                    ->orderBy('id', 'DESC')
                    ->get();

                $total_qtd = $data->count();
            }

            if ($total_qtd > 0) {
                $output = '';
                $count = 0;
                foreach ($data as $row) {
                    if ($count == 6) {
                        $output .= "<a class='dropdown-item'><span style='margin-left:200px;font-size:14px;margin-top:4px'>Encontrado " . count($data) . "</span></a>";
                        break;
                    }
                    $category = $row->category;
                    $style = "style='margin-top:6px;margin-bottom:6px;'";
                    $output .= "<a href=" . $domain . "/produto/$row->id" . " class='dropdown-item' $style>";
                    $output .= "<strong>$row->name</strong><span class='float-right'>$category->name</span></a>";
                    $count++;
                }
            } else {
                $output = '<a class="dropdown-item">Nada encontrado</a>';
            }

            return response($output);
        }
    }
}
