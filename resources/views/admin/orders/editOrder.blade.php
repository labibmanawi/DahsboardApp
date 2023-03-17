<body onload="xyz()">
@extends('admin.adminLTE-dashboard2')

@section('content2')


<div class="col-sm-5 float-sm-left">
<section class="content">
      <div class="info-box">
      <div class="container-fluid">

      <div class="table_products">
    <h3>Edit Barang</h3> 
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

    

    <form method="post" action="{{url('admin/orders/editOrder-post/'.$oiDetail->id)}}">

        @csrf


        <div class="mb-3">
            <label for="product_name" class="form-label">Nama Barang</label><br>
            <input name="order_id" type="hidden" value={{$oiDetail->order_id}}>
            <select name="product_id" id="product_id" class="form-select form-control">
            <option value="" selected disabled>---Select your Product---</option>
                @foreach($oiProduct as $oin)
                <option value="{{$oin->id}}"
                
                {{$oiDetail->product_id == $oin->id ? 'selected' : '' }}

                >{{$oin->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="qty" class="form-label">Qty</label>
            <input name="qty" type="number" class="form-control" id="qty" value="{{old('qty',$oiDetail->qty)}}">
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









