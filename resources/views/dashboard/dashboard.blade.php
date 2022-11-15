
  

  {{-- header layout start --}}
   
  @include('dashboard.header')

  {{-- header layout end  --}}

 {{-- admin layout left start --}}
 @include('dashboard.leftsidebar')
  {{-- admin layout end --}}

  {{-- main content start  --}}
    @yield('user')
  {{-- main conten end  --}}

 
   {{-- footer start --}}

   @include('admin_layout.footer')

  {{-- footer end --}}
 

