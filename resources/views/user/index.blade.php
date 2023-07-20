<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <main class="container">
      <h1>Index</h1>
      <a href="{{route('user.create')}}" type="button" class="btn btn-primary">Novo usuário</a>

      <table class="table">
          <thead>
          <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Ver</th>
              <th scope="col">Editar</th>
              <th scope="col">Deletar</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  <a type="button" class="btn btn-success"href="{{route('user.show',$user->id)}}">Ver</a>
                </td>
                <td>
                  <a type="button" class="btn btn-warning"href="{{route('user.edit',$user->id)}}">Editar</a>
                </td>
                <td>
                  <form method="post" action="{{route('user.destroy',$user->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                  </form>
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>
  </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
