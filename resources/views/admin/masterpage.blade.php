@extends('admin.master')

@section('contentpage')
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <nav aria-label="breadcrumb shadow">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Dashboard</a>               
              </li>                
              @section('breadcrumb')
              @show              
            </ol>
          </nav> 
        </div>        
      </div> 
      <!-- /.container-fluid -->           

      @if(Session::has('message'))
        <div class="container mtop16">
          <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
            {{ Session::get('message')}}
            @if( $errors->any() )
            <ul>
              @foreach( $errors->all() as $error )
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
            <script> 
              //$('.alert').slideDown(); 
              //setTimeout( function(){ $('.alert').slideUp();}, 5000);
              $('.alert').slideDown(1000); 
              window.setTimeout(function() { $(".alert").slideUp(1000); }, 5000); 
            </script>
          </div>
        </div>
      @endif

  <!-- THIS IS THE DASHBOARD´S CONTENT -->
    <div class="content">
      <div class="container-fluid">
          @section('content')
          @show  
      </div>
    </div>

  </div>  

@endsection