<?php

namespace App\Http\Controllers;

use App\Mascota;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascotas = Mascota::all();
        return view('home', ['mascotas' => $mascotas]);
    }

    public function create(Request $request)
    {
        $error = '';
        if ($request->session()->exists('error')) {
            $error = $request->session()->get('error');
        }
        return view('create', ['error' => $error]);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        if (!$inputs['nombre'] || trim($inputs['nombre']) == '') {
            $request->session()->flash('error', 'Debes darme un nombre para continuar');
            return redirect('/crear');
        }
        $mascota = new Mascota();
        $mascota->nombre = trim($inputs['nombre']);
        $mascota->energia = 100;
        $mascota->diversion = 100;
        $mascota->hambre = 100;
        $mascota->higiene = 100;
        $mascota->social = 100;
        $mascota->salud = 100;
        $mascota->save();
        return redirect('/');
    }

    public function jugar(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        $error = '';
        if ($request->session()->exists('error')) {
            $error = $request->session()->get('error');
        }
        return view('jugar', ['mascota' => $mascota, 'error' => $error]);
    }

    public function corregirValoresNegativos(&$mascota)
    {
        if ($mascota->energia < 0) {
            $mascota->energia = 0;
        }
        if ($mascota->diversion < 0) {
            $mascota->diversion = 0;
        }
        if ($mascota->hambre < 0) {
            $mascota->hambre = 0;
        }
        if ($mascota->higiene < 0) {
            $mascota->higiene = 0;
        }
        if ($mascota->social < 0) {
            $mascota->social = 0;
        }
        if ($mascota->salud < 0) {
            $mascota->salud = 0;
        }
    }

    public function corregirValoresMaximos(&$mascota)
    {
        if ($mascota->energia > 100) {
            $mascota->energia = 100;
        }
        if ($mascota->diversion > 100) {
            $mascota->diversion = 100;
        }
        if ($mascota->hambre > 100) {
            $mascota->hambre = 100;
        }
        if ($mascota->higiene > 100) {
            $mascota->higiene = 100;
        }
        if ($mascota->social > 100) {
            $mascota->social = 100;
        }
        if ($mascota->salud > 100) {
            $mascota->salud = 100;
        }
    }

    public function dormir(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        $mascota->energia = 100;
        $mascota->diversion -= 5;
        $mascota->hambre -= 30;
        $mascota->higiene -= 20;
        $mascota->social -= 2;
        $mascota->salud -= 1;
        $this->corregirValoresNegativos($mascota);
        $this->corregirValoresMaximos($mascota);
        $mascota->save();
        return redirect('/jugar/' . $id);
    }

    public function television(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        if ($mascota->energia < 5) {
            $request->session()->flash('error', 'No tienes energia suficiente, anda a dormir');
            return redirect('/jugar/' . $id);
        }
        if ($mascota->hambre < 2) {
            $request->session()->flash('error', 'Tengo hambre! quiero comer!');
            return redirect('/jugar/' . $id);
        }
        if ($mascota->higiene < 10) {
            $request->session()->flash('error', 'Wuacala! necesito ducharme');
            return redirect('/jugar/' . $id);
        }
        $mascota->energia -= 5;
        $mascota->diversion += 15;
        $mascota->hambre -= 2;
        $mascota->higiene -= 2;
        $mascota->social -= 5;
        $mascota->salud -= 1;
        $this->corregirValoresNegativos($mascota);
        $this->corregirValoresMaximos($mascota);
        $mascota->save();
        return redirect('/jugar/' . $id);
    }

    public function comer(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        if ($mascota->energia < 6) {
            $request->session()->flash('error', 'No tienes energia suficiente, anda a dormir');
            return redirect('/jugar/' . $id);
        }
        $mascota->energia -= 6;
        $mascota->diversion -= 2;
        $mascota->hambre += 34;
        $mascota->higiene -= 10;
        $mascota->social -= 2;
        $mascota->salud -= 10;
        $this->corregirValoresNegativos($mascota);
        $this->corregirValoresMaximos($mascota);
        $mascota->save();
        return redirect('/jugar/' . $id);
    }

    public function ducharse(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        if ($mascota->energia < 10) {
            $request->session()->flash('error', 'No tienes energia suficiente, anda a dormir');
            return redirect('/jugar/' . $id);
        }
        if ($mascota->hambre < 6) {
            $request->session()->flash('error', 'Tengo hambre! quiero comer!');
            return redirect('/jugar/' . $id);
        }
        $mascota->energia -= 10;
        $mascota->diversion -= 5;
        $mascota->hambre -= 6;
        $mascota->higiene = 100;
        $mascota->social -= 5;
        $mascota->salud -= 8;
        $this->corregirValoresNegativos($mascota);
        $this->corregirValoresMaximos($mascota);
        $mascota->save();
        return redirect('/jugar/' . $id);
    }

    public function hablar(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        if ($mascota->energia < 4) {
            $request->session()->flash('error', 'No tienes energia suficiente, anda a dormir');
            return redirect('/jugar/' . $id);
        }
        if ($mascota->hambre < 2) {
            $request->session()->flash('error', 'Tengo hambre! quiero comer!');
            return redirect('/jugar/' . $id);
        }
        if ($mascota->higiene < 10) {
            $request->session()->flash('error', 'Wuacala! necesito ducharme');
            return redirect('/jugar/' . $id);
        }
        $mascota->energia -= 4;
        $mascota->diversion += 2;
        $mascota->hambre -= 2;
        $mascota->higiene -= 10;
        $mascota->social += 5;
        $mascota->salud += 1;
        $this->corregirValoresNegativos($mascota);
        $this->corregirValoresMaximos($mascota);
        $mascota->save();
        return redirect('/jugar/' . $id);
    }

    public function correr(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        if ($mascota->energia < 20) {
            $request->session()->flash('error', 'No tienes energia suficiente, anda a dormir');
            return redirect('/jugar/' . $id);
        }
        if ($mascota->hambre < 30) {
            $request->session()->flash('error', 'Tengo hambre! quiero comer!');
            return redirect('/jugar/' . $id);
        }
        if ($mascota->higiene < 10) {
            $request->session()->flash('error', 'Wuacala! necesito ducharme');
            return redirect('/jugar/' . $id);
        }
        $mascota->energia -= 20;
        $mascota->diversion += 5;
        $mascota->hambre -= 30;
        $mascota->higiene -= 40;
        $mascota->social -= 2;
        $mascota->salud += 15;
        $this->corregirValoresNegativos($mascota);
        $this->corregirValoresMaximos($mascota);
        $mascota->save();
        return redirect('/jugar/' . $id);
    }
}
