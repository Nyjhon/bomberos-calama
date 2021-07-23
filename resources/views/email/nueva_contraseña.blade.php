@extends('email.master')

@section('content')
<p>Hola: <strong>{{$nombre}}</strong></p>
<p>Esta es la nueva contraseña de su cuenta en el software de la “Dirección Departamental de Bomberos Calama”.</p>
<p><h2 style="text-align: center;">{{ $password }}</h2></p>
<p>Para iniciar sesión haga clic en el siguiente botón: </p>

<p><a href="{{ url('/ingreso')}}" style="display: inline-block; background-color: #2caaff; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none;">Iniciar Sesión</a></p>
<p>Si el botón anterior no le funciona, copie y pegue la siguiente url en su navegador:</p>
<p>{{url('/ingreso')}}</p>
@stop
