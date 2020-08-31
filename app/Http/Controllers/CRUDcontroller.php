<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;

class CRUDcontroller extends Controller
{
    public function index()
    {
        $data = Crud::latest()->get();

        return view('index',['data' => $data]);
    }
    public function create()
    {
        $task = new Crud();
        $task->name = request('name');
        $task->gmail = request('gmail');
        $task->phone = request('phone');
        $task->address = request('address');

        $task->save();
        return redirect('/');
    }
    public function delete($id)
    {
        $task = Crud::findOrFail($id);
        $task->delete();
        return redirect('/');
    }
    public function edit($id)
    {
        $task = Crud::findOrFail($id);
        $task->name = request('name');
        $task->gmail = request('gmail');
        $task->phone = request('phone');
        $task->address = request('address');
    //     $request->validate([
    //         'name' => 'required',
    //         'gmail' => 'required',
    //         'phone' => 'required',
    //         'address' => 'required',
    //  ]);
        $task->update();
        return redirect('/');
    }
}