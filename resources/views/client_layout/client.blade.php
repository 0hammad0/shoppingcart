<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>
      @yield('title')
    </title>

    @include('client_layout.head')

  </head>

  <!-- START nav -->
  @include('client_layout.navbar')
  <!-- END nav -->


  <!-- start content -->
  @yield('content')
  <!-- end content -->
        

  @include('client_layout.body')
  <!-- loader -->
  @include('client_layout.script')