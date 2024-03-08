<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BasketStoreRequest;
use App\Services\BasketService;

class BasketController extends Controller
{
    public function __construct(BasketService $basket_serv){
        $this->basket_serv = $basket_serv;
    }

    public function store(BasketStoreRequest $request){
        $this->basket_serv->store($request->validated());
        return redirect()->back()->with('basket_message', trans('messages.add_basket'));
    }

    public function index(){
        $baskets = $this->basket_serv->getMy();
        return view('main.basket.index',['baskets' => $baskets]);
    }

    public function destroy($locale,int $id){
        $basket = $this->basket_serv->findByIdAndUserId($id);

        if(!$basket){
            return redirect()->back()->with('error_message',trans('message.item_not_found'));
        }

        $this->basket_serv->destroy($id);
        return redirect()->back();
    }
}
