<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    
    <title>Importar/Exportar - Excel</title>
</head>
<body>
<div id="app">
    <div class="container">
        <br/>
        <div class="row">
            <table class="table">
  <thead>
    
  </thead>
  <tbody>
    <tr>
    <form action="{{url('numeros/importar')}}" method="post" enctype="multipart/form-data">
                       @csrf
                      
    <th scope="row">  
    <input type="file" name="documento">
    </th>
    <td>   <button class="btn btn-primary" type="submit">Importar</button></td></form>
    <td> <form action="{{url('numeros/exportar')}}" enctype="multipart/form-data">
    <button class="btn btn-success">Exportar</button>
    </form></td>
    
    <td> </td>
    </tr>
 
  </tbody>
</table>
        </div>

        <div class="row">
        <table class="table">
  <thead>
    <tr>

      <th scope="col">Numero 1</th>
      <th scope="col">Numero 2</th>
      <th scope="col">Numero 3</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>

            @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>

    @endif


    @if(session('mensaje'))
        <div class="alert alert-success">
            <p>{{session('mensaje')}}</p>
        </div>
        @endif  
        <form action="{{url('numeros/add')}}" method="post" enctype="multipart/form-data">
                       @csrf
    
              
      <td> <input type="number"  class="form-control" name="number1"  :disabled="disabled == 1" ></td>
      <td> <input type="number"  class="form-control" name="number2"  :disabled="disabled == 1" ></td>
      <td> <input type="number"  class="form-control" name="number3"  :disabled="disabled == 1" ></td>
      
      <td>    <button class="btn btn-success">Guardar Numeros</button></td>
      </form>
    </tr>
    
   
  </tbody>
</table>
        </div>
        <div class="row">
            @if(count($numeros))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Numero 1</td>
                            <td>Numero 2</td>
                            <td>Numero 3</td>
                            
                        </tr>
                    </thead>
                    @foreach($numeros as $numero)
                        <tr>
                            <td>{{ $numero->numeros }}</td>
                            <td>{{ $numero->numeros_2 }}</td>
                            <td>{{ $numero->numeros_3 }}</td>
                            
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>

   
    </div>
    </div>
  
</body>

</html>