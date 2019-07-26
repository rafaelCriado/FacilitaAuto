<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Estado;
use App\Configuracao;
use App\ApiBancoRendimento;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoRequest;


class PedidoController extends Controller
{
    //Lista de todos os pedidos
    public function pedidos(){
        try {
            $pedidos = Pedido::all();
            return view('pedido.index', ['pedidos'=> $pedidos]);
        } catch (\Exception $th) {
            return back()->withErrors('Ops! Aconteceu algum problema, tente novamente!');
        }
    }

    private function somaDebitos($debitos){
        $arrayTotal = [];
        if(is_array($debitos))
            foreach($debitos as $item=>$debito)
                $arrayTotal[$item]= $this->somaArray($debito);
            
        return $arrayTotal;
    }

    private function somaArray($array){
        $xTotal = 0;
        if(is_array($array)){
            foreach($array as $item)
                if(is_numeric($item))
                    $xTotal += $item;
                
            return $xTotal;
        }else{
            return (float) $array;
        }
    }


    //Mostra informações de um pedido
    public function pedido($id){
        try {
            $estados = Estado::all();
            $configuracao = Configuracao::find(1);
            $pedido = Pedido::find($id);

            $api = new ApiBancoRendimento();
            $debitos = $api->ConsultaDebitos($pedido->placa);
            $somaDebitos = $this->somaDebitos($debitos);
            $somaDebitos['TAXA_SERVICO'] = (float)$configuracao->taxa_servico;
            $total = $this->somaArray($somaDebitos);

            
            $arrayView = [
                'estados'=>$estados,
                'pedido'=>$pedido,
                'debitos'=>$debitos,
                'soma_debitos'=>$somaDebitos,
                'total'=>$total
            ];
            return view('pedido.info', $arrayView);
        } catch (\Exception $th) {
            dd($th);
            return back()->withErrors('Ops! Aconteceu algum problema, tente novamente!');;
        } 
    }


    public function salvarDebitos(Request $request, $id){
        try {
            $pedido = Pedido::find($id);
            

        } catch (\Exception $th) {
            dd($th);
            return back()->withErrors('Ops! Aconteceu algum problema, tente novamente!');;
        }
    }

    //Tela de cadastro de novo pedido
    public function novo(){
        try {
            $estados = Estado::all();
            return view('pedido.novo', ['estados'=> $estados]);
        } catch (\Exception $th) {
            return back()->withErrors('Ops! Aconteceu algum problema, tente novamente!');;
        }
    }

    //Tela de editar um pedido expecifico
    public function editar($id){
        try {
            $pedido = Pedido::find($id);
            dd($pedido);
        } catch (\Exception $th) {
            return back()->withErrors('Ops! Aconteceu algum problema, tente novamente!');;
        }
    }

    //Salvar dados de um pedido
    public function salvar(Request $request, $id){
        try {
            $pedido = Pedido::find($id);
            dd($pedido);
        } catch (\Exception $th) {
            return back()->withErrors('Ops! Aconteceu algum problema, tente novamente!');;
        }
    }

    //Incluir novo pedido
    public function incluir(PedidoRequest $request){
        try {
            $formData = $request->all();

            $pedido         = new Pedido();
            $pedido->nome   = request('nome');
            $pedido->cpf    = request('cpf');
            $pedido->placa  = request('placa');
            $pedido->uf     = request('uf');
            
            $save = $pedido->save();
            if($save){
                \Session::flash('mensagem', ['msg'=>'Pedido cadastrado com sucesso', 'class'=>'success']);
                return redirect()->route('pedido.info', $pedido->id);
            }else{
                \Session::flash('mensagem', ['msg'=>'Erro ao cadastrar pedido!', 'class'=>'danger']);
                return redirect()->route('pedido.novo');
            }
        } catch (\Exception $th) {
            return back()->withErrors('Ops! Aconteceu algum problema, tente novamente!');;
        }
    }

    //Excluir pedido
    public function excluir($id){
        try {
            $pedido = Pedido::find($id);
            dd($pedido);
        } catch (\Exception $th) {
            return back()->withErrors('Ops! Aconteceu algum problema, tente novamente!');;
        }
    }
}
