<body onload="xyz()">
@extends('admin.adminLTE-dashboard')

@section('content')
<div class="table_products">
<h2>ORDER LIST</h2>
<br>
<a href="{{url('admin/orders/insertOrder')}}" class="btn btn-primary">Insert</a>
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
            <!-- <th scope="col">Code</th> -->
            <th scope="col">User</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
            <th scope="col"></th>
        </tr>
</thead>        

 <tbody>  
         
     @foreach($order_list as $row =>$data)

        <tr>  
            <td scope="row">{{$row + 1}}</td>
            <td>{{$data->users->name}}</td>
            <td>{{$data->tanggal_order}}</td>
            <td><a href="{{url('admin/orders/order_item/'.$data->id)}}" class="btn btn-primary">Lihat Pesanan</a></td>
            <td><a href="{{url('admin/orders/deletelist/'.$data->id)}}" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus sob?')">Delete</a></td>
    
        </tr>
    @endforeach
        
        
       
        
       
</tbody>       

    </table>
    
</div>

<script>
        function xyz() {
            
            var x = document.getElementsByClassName("nav-link")[11];
            x.classList.add("active");
            
    
        };

</script>



@endsection




