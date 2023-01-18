   @include('elements.header' )
   @include('elements.menu' )
  
   <div id = "container-fluid">
           @yield('content' )
   </div>
   
   @include('elements.footer' )