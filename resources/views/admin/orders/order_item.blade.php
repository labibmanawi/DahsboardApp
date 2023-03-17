<body onload="xyz()">
@extends('admin.adminLTE-dashboard2')

@section('content2')

<div class="col-sm-7 float-sm-left">
<section class="content">
      <div class="info-box">
      <div class="container-fluid">

      <thead>
    <table class="table"> 
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Produk</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Action</th>
            <th scope="col"></th>
        </tr>
</thead>        

 <tbody>  
      
      @foreach($detail_order as $doc =>$dat)
        <tr>  
            <td scope="row">{{$doc + 1}}</td>
            <td>{{$dat->name}}</td>
            <td>{{$dat->product_name}}</td>
            <td>{{$dat->qty}}</td>
            <td><a href="{{url('admin/orders/editOrder/'.$dat->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{url('admin/orders/delete/'.$dat->id)}}" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus sob?')">Delete</a></td>
    
        </tr>
     @endforeach
</tbody>       

    </table>


       </div>
      </div>
</section>

</div>


<div class="col-sm-5 float-sm-left">
<section class="content">
      <div class="info-box">
      <div class="container-fluid">

      <div class="table_products">
    <h3>Tambahkan Barang</h3> 
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    

    <form method="post" action="{{url('admin/orders/order_item/{id}')}}">

        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Nama Barang</label><br>
            <input name="order_id" type="hidden" value={{$id}}>
            <select name="product_id" id="product_id" class="form-select form-control">
            <option value="" selected disabled>---Select your Product---</option>
                @foreach($oiName as $oin)
                <option value="{{$oin->id}}">{{$oin->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="qty" class="form-label">Qty</label>
            <input name="qty" type="number" class="form-control" id="qty" value="">
        </div>

      
        <input type="submit" name="submit" class="btn btn-primary">
    </form>

</div>

</div>


<script>
        function xyz() {
          
            var x = document.getElementsByClassName("nav-link")[11];
            x.classList.add("active");
            
    
        };
        

       
</script>



@endsection









