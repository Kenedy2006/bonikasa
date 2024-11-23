<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    
    input[type='text']
    {
        height: 40px;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
        background-color: #f5f5f5;
    }

    .div_deg
    {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 30px;
    }

    .input-container
    {
      width: 60%;
      padding: 20px;
      background-color: #333;
      border-radius: 10px;
      text-align: center;
    }

    .table_deg
    {
      text-align: center;
      margin: 20px auto;
      border: 2px solid #ccc;
      border-radius: 10px;
      width: 80%;
      background-color: #22252A;
      overflow: hidden;
    }

    th
    {
      background-color: #DB6574;
      padding: 15px;
      font-size: 18px;
      font-weight: normal;
      color: white;
      border-bottom: 1px solid #4a4a4a;
    }

    td
    {
      color: #8A8D93;
      border: 1px solid #4a4a4a;
      padding: 10px;
      border-radius: 5px;
    }

    .btn {
      border-radius: 5px;
      padding: 8px 15px;
    }

    .btn-primary
    {
      background-color: #2ecc71;  
      color: white;
      border: none;
    }

    .btn-primary:hover
    {
      background-color: #00ff6a;
      color: rgb(105, 105, 105);
    }

    .btn-danger
    {
      background-color: #2D3035;
      color: white;
      border: none;
    }

    .btn-danger:hover
    {
      background-color: #c0392b;
    }

    .btn-sucess
    {
      background-color: #DB6574;
      color: white;
      border: none;
    }

    .btn-sucess:hover
    {
      background-color: #ff4c39;
      color: white;
    }

    h1 {
        font-family: 'Poppins', sans-serif;
        font-size: 28px;
        font-weight: bold;
        color: white;
        text-align: center;
    }

    </style>

  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1>Agregar categoría</h1>
          <div class="div_deg">
            <form action="{{url('add_category')}}" method="post" class="input-container">
              @csrf
              <input type="text" name="category" placeholder="Ingrese el nombre de la categoría" required style="width: 500px; height: 40px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; background-color: #f5f5f5;">
              <input class="btn btn-primary" type="submit" value="Agregar Categoría">
            </form>
          </div>         
          <div>
            <table class="table_deg">
              <tr>
                <th>Nombre de la Categoría</th>
                <th>Editar</th>
                <th>Borrar</th>
              </tr>
              @foreach ($data as $data)
              <tr>
                <td>{{$data->category_name}}</td>
                <td><a class="btn btn-sucess" href="{{url('edit_category',$data->id)}}">Editar</a></td>
                <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category',$data->id)}}">Borrar</a></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
    @include('admin.js')
  </body>
</html>
