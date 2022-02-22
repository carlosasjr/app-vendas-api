                        <div class="row">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input class="form-control"
                                id="name"
                                name="name"
                                type="text"
                                value="{{ $company->name ?? old('name')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="cnpj">CNPJ</label>
                                <input class="form-control"
                                id="cnpj"
                                name="cnpj"
                                type="text"
                                value="{{ $company->cnpj ?? old('cnpj')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="license">Número de licenças</label>
                                    <input class="form-control"
                                    id="license"
                                    name="license"
                                    type="text"
                                    value="{{ $company->license ?? old('license')}}">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="license_used">Licenças utilizadas</label>
                                    <input
                                    disabled
                                    class="form-control"
                                    id="license_used"
                                    name="license_used"
                                    type="text"
                                    value="{{ $company->license_used ?? old('license_used')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <input id="block"
                                name="block"
                                type="checkbox"
                                {{  isset($company->block) ?
                                           $company->block == 1 ? 'checked' : '' : old('block') }}>
                                <label for="block">Bloqueada?</label>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Salvar">
