@extends('Templates.Default')

@section('custom-head')
    <title>Obter dados da Almg</title>
@endsection

@section('content')
    <div class="container">

        <form action="POST">
            
            <input type="sumbit" class="btn btn-primary" value="Obter dados da ALMG"/>
        </form>
    </div>
@endsection