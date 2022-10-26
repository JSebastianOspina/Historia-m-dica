<x-layout>
    <div class="d-flex justify-content-end">
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#createMedicalRecord">Crear historia
            médica
        </button>
    </div>
    <h1>
        Historias médicas
    </h1>


    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif

    <div class="modal fade" id="createMedicalRecord" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Nueva historia médica</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('medicalRecord.store')}}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Nombre del paciente</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" placeholder="John Doe" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="birthDate">Fecha de nacimiento</label>
                            <input type="date" class="form-control @error('birthDate') is-invalid @enderror"
                                   id="birthDate" name="birthDate"
                                   placeholder="Fecha de nacimiento" value="{{old('birthDate')}}">
                            @error('birthDate')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="gender">Sexo</label>
                            <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                                <option selected disabled>Selecciona un género</option>
                                <option value="masculino" @if(old('gender') === "masculino") selected @endif>Masculino</option>
                                <option value="femenino" @if(old('gender') === "femenino") selected @endif>Femenino</option>
                            </select>
                            @error('gender')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="height">Estatura (CM)</label>
                            <input type="number" class="form-control @error('height') is-invalid @enderror " id="height"
                                   name="height" placeholder="188"
                                   min="1" value="{{old('height')}}">
                            @error('height')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="weight">Peso (KG)</label>
                            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight"
                                   name="weight" placeholder="75" value="{{old('weight')}}">
                            @error('weight')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-dark">Crear historia médica</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    @if($errors->any())
        @push('scripts')
            <script>
                window.addEventListener("load", function () {

                    const createMedicalRecord = document.getElementById('createMedicalRecord');
                    let modal = new bootstrap.Modal(createMedicalRecord);
                    modal.show();

                })
            </script>
        @endpush
    @endif
</x-layout>
