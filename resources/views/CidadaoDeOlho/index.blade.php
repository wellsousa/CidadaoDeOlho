@extends('Templates.Default')

@section('custom_head')
<title>Orçamentos - Listar</title>
@endsection

@section('content')
<div class="card border">
    <div class="card-body">
        

        @if(count($maiores_gastadores) > 0)
            <h3 class="card-title text-center">Gastos dos Deputados - 2018</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Número</th>
                        <th>Valor gasto em 12 meses</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($maiores_gastadores as $deputado)
                        <tr>
                            <td>{{ $deputado['id_almg'] }}</td>
                            <td>{{ $deputado['nome'] }}</td>
                            <td>{{ $deputado['gasto'] }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
          <h5>Não há Orçamentos cadastrados ainda.</h5>
        @endif
    </div>
    <div class="card-footer">
    </div>
</div>
@endsection