<body onload="xyz()">
@extends('admin.adminLTE-dashboard')

@section('content')

<div class="table_products">
<h2>USERS LIST</h2>
<br>
<a href="{{url('admin/user/insert2')}}" class="btn btn-primary">Insert</a>
<br><br>

@if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
@endif

<thead>
    <table class="table"> 
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
</thead>        

 <tbody>  
         <?php $i=1; ?>
        @foreach($user_list as $key => $data)
        
        <tr>  
            <td scope="row">{{$i}}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>  
            
            <td><a href="{{url('admin/user/edit2/' .$data->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ url('admin/user/delete/' .$data->id)}}" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus sob?')">Delete</a></td>
        </tr>
        <?php $i++; ?>
        @endforeach
        
       
</tbody>       

    </table>

    {{  $user_list->links() }}

</div>

<script>
    function xyz() {
            // document.getElementsByClassName("nav-link").className += " active";
            var x = document.getElementsByClassName("nav-link")[10];
            x.classList.add("active");
            
    
        };
</script>

@endsection