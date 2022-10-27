
  

  {{-- header layout start --}}
   
    @include('admin_layout.header')

  {{-- header layout end  --}}

 {{-- admin layout left start --}}
 @include('admin_layout.leftsidebar')
  {{-- admin layout end --}}

  {{-- main content start  --}}
    @yield('content')
  {{-- main conten end  --}}

 
 

  {{-- footer start --}}

   @include('admin_layout.footer')

  {{-- footer end --}}
 
