<style>
    .card-documento{
        border:2px solid #ffc107;
        border-radius: 5px !important;
        padding-top: 10px;
        padding-bottom: 10px;
        min-height: 150px;
    }
    .card-documento h2{
        font-size: 1.3rem;
    }

    .card-documento div{
        height: 50px;
    }
</style>
<div class="card card-warning card-outline">
    <div class="card-body">
        <div class="box-body box-profile">
            <h3 class="profile-username pt-2" style="border-bottom:1px solid #ffc107;">Documentos</h3>
            <div class="row">
                <div class="col-md-4 p-1">
                    <div class="card card-default card-outline">
                        <div class="card-body">
                            <div class="box-body box-profile">
                                <h3 class="profile-username pt-2" style="border-bottom:1px solid #ffc107;">Laudo para transferência</h3>
                                <div class="row m-1 mt-3">
                                    <p>Foto do laudo efetuado.</p>
                                    <input type="file" name="laudo" id="">
                                    <a href="#" class="btn btn-success btn-block mt-3 pl-5 pr-5">ENVIAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 m-0 p-1">
                    <div class="card card-default card-outline">
                        <div class="card-body">
                            <div class="box-body box-profile">
                                <h3 class="profile-username pt-2" style="border-bottom:1px solid #ffc107;">Documento de Frente</h3>
                                <div class="row m-1 mt-3">
                                    <p>parte de cima do(a) RG ou CNH</p>
                                    <input type="file" name="laudo" id="">
                                    <a href="#" class="btn btn-success btn-block mt-3 pl-5 pr-5">ENVIAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 m-0 p-1">
                    <div class="card card-default card-outline m-0">
                        <div class="card-body">
                            <div class="box-body box-profile">
                                <h3 class="profile-username pt-2" style="border-bottom:1px solid #ffc107;">Documento Verso</h3>
                                <div class="row m-1 mt-3">
                                    <p>parte de cima do(a) RG(com cpf) ou CNH</p>
                                    <input type="file" name="laudo" id="">
                                    <a href="#" class="btn btn-success btn-block mt-3 pl-5 pr-5">ENVIAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>