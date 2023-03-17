<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">Stock</th>
      <th scope="col">Variant</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; ?>
    @foreach ($data as $key => $data)
    <tr>
        <td scope="row">{{$i++}}</td>
        <!-- <td>{{ $data->code }}</td> -->
        <td>{{ $data->name }}</td>
        <td>{{ $data->category->nama }}</td>
        <td>{{ $data->stock }}</td>  
        <td>{{ $data->varian }}</td> 
        <td>{{ $data->description }}</td>
    </tr>
    @endforeach    
  </tbody>
</table>
</body>
</html>l