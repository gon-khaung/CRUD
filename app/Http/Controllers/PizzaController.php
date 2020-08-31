<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
    public function index(){
        $pizza = Pizza::all();
         return view('pizzas.index', 
            [
             'pizzas' => $pizza,
            ]
        );
    }
    public function show($id)
    {
        $pizzas = Pizza::findOrFail($id);
        return view('pizzas.show', 
        [
        'id' => $id,
        'pizza' => $pizzas
        ]
    );
    }
    public function create()
    {
        return view('pizzas.create');
    }
    public function store()
    {
        $pizza = new Pizza();
        $pizza->name=request('name');
        $pizza->type=request('type');
        $pizza->base=request('base');
       $pizza->toppings=request('toppings');
        $pizza->save();
       return redirect('/')->with('mssg', 'Thank for your order');
    }
    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }
}
