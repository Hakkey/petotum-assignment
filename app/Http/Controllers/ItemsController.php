<?php

namespace App\Http\Controllers;

use App\Items;
use App\Style;
use App\Color;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    
    public static function getItem($dataArr,$row,$column) {
        for($i = 0; $i < sizeof($dataArr); $i++){
            if($dataArr[$i]['row'] == $row && $dataArr[$i]['column'] == $column){
                return $dataArr[$i]['name'];    
            }
        }
    } 

    public static function getId($dataArr,$row,$column) {
        for($i = 0; $i < sizeof($dataArr); $i++){
            if($dataArr[$i]['row'] == $row && $dataArr[$i]['column'] == $column){
                return $dataArr[$i]['id'];    
            }
        }
    } 

    public static function getColor($dataArr,$row,$column) {
        for($i = 0; $i < sizeof($dataArr); $i++){
            if($dataArr[$i]['row'] == $row && $dataArr[$i]['column'] == $column){
                return $dataArr[$i]['color'];    
            }
        }
    }
    
    public static function getStyle($dataArr,$row,$column) {
        for($i = 0; $i < sizeof($dataArr); $i++){
            if($dataArr[$i]['row'] == $row && $dataArr[$i]['column'] == $column){
                return $dataArr[$i]['styling'];    
            }
        }
    } 

    public function index()
    {
        $items = Items::all();
        $rows = 4;
        $columns = 4;
        return view('index', compact('items', 'rows', 'columns'));
    }

    public function settings()
    {
        $items = Items::get()->toArray();
        $styles = Style::all();
        $colors = Color::all();
        $rows = 4;
        $columns = 4;
        return view('admin.settings', compact('items', 'styles', 'colors', 'rows', 'columns'));
    }
    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }

    public function saveStyle(Request $request, $id)
    {
        $item = Items::find($id);
        $item->styling = $request->styling;

        $item->save();

    }

    public function saveColor(Request $request, $id)
    {
        $item = Items::find($id);
        $item->color = $request->color;

        $item->save();

    }

    public function savePosition(Request $request, $id)
    {
        $item = Items::find($id);
        $item->position = $request->position;

        $item->save();

    }

    public function saveRowColumn(Request $request, $id)
    {
        $item = Items::find($id);
        $item->row = $request->row;
        $item->column = $request->column;

        $item->save();

    }
}
