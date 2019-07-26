<div class="card card-warning card-outline">
    <div class="card-body">
        <div class="box-body box-profile">
            <h3 class="profile-username pt-2" style="border-bottom:1px solid #ffc107;">Endereço</h3>
                <!-- inicio form -->
            <form action="#" method="post" >
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label id="erroCEP" style="color:red"></label>
                            <input placeholder="CEP" maxlength="9" onkeypress="mascara(this, '#####-###')" value="" type="text" id="cep" name="cep" class="form-control">
                        </div>  
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for=""></label>
                            <input placeholder="Endereço" type="text" value="" id="rua" name="endereco" class="form-control">
                        </div>  
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for=""></label>
                            <input placeholder="Número" type="text" value="" name="nro" class="form-control">
                        </div>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input placeholder="Cidade" id="cidade" type="text" name="cidade" value="" class="form-control">
                        </div>  
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="uf" id="uf" class="form-control">
                                @foreach ($estados as $estado)
                                    <option value="{{$estado->uf}}" @if (isset($pedido->uf) and $pedido->uf == $estado->uf)
                                        selected='selected'
                                    @endif>{{$estado->uf}}</option>
                                @endforeach
                            </select>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input placeholder="Bairro" type="text" value="" id="bairro" name="bairro" class="form-control">
                        </div>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input placeholder="Complemento" type="text" value="" id="complemento" name="complemento" class="form-control">
                        </div>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="javascript:void(0);" class="btn pl-5 pr-5 pt-2 pb-2 btn-success">SALVAR ENDEREÇO</a>
                    </div>
                </div>
            </form>
            <!-- fim form -->
        </div>
    </div>
</div>

<script>
    var cep = document.getElementById('cep');
    cep.addEventListener('change',function(){
        fetch(`http://127.0.0.1:8000/cep/${cep.value}`)
        .then(response => response.json())
        .then(data=>mostrarResposta(data))
        .catch(erro => console.error(erro));
    })

    function mostrarResposta(cep) {
        if(cep.hasOwnProperty('erro')){
            document.getElementById('erroCEP').innerHTML('CEP não encontrado');
        }else{
            document.getElementById('rua').value = cep.logradouro;
            document.getElementById('cidade').value = cep.localidade;
            document.getElementById('bairro').value = cep.bairro;
            document.getElementById('uf').value = cep.uf;
            document.getElementById('complemento').value = cep.complemento;
            document.getElementById('cep').value = cep.cep;
        }
    }

    function mascara(t, mask){
        var i = t.value.length;
        var saida = mask.substring(1,0);
        var texto = mask.substring(i)
        if (texto.substring(0,1) != saida){
            t.value += texto.substring(0,1);
        }
    }
</script>