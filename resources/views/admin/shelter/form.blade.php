@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    <div class="pt-8 pb-4 px-8">
        <div class="card">
            <div class="card-title flex flex-row justify-between">
                <h3>Editar datos de la asociación</h3>

                <div class="actions">
                    <button type="submit" class="btn btn-blue"><i class="fas fa-save mr-2"></i> Guardar</button>
                </div>
            </div>
            <div class="card-body">
                <div class="flex pt-4">
                    <div class="w-1/2 flex px-4">
                        {!! $form->renderField('name') !!}
                    </div>
                    <div class="w-1/2 flex px-4">
                        {!! $form->renderField('email') !!}
                    </div>
                </div>
                <div class="flex">
                    <div class="w-1/2 flex px-4">
                        {!! $form->renderField('domain') !!}
                    </div>
                    <div class="w-1/2 flex px-4">
                        {!! $form->renderField('subdomain') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
