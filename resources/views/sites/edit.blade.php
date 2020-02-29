@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Site
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($site, ['route' => ['sites.update', $site->id], 'method' => 'patch']) !!}

                        @include('sites.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection