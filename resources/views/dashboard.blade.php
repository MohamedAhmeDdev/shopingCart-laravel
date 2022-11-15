@extends("dashboard.dashboard")

@section('user')


  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('User Dashboard') }}
                </h2>
            </x-slot>
        
            <div class="py-12">
                
    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 <b>{{ Auth::user()->name }}</b> Welcome, You're logged in!
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

    </div>
</x-app-layout>
@endsection
