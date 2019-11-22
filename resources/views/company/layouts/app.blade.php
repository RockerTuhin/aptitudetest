<!DOCTYPE html>
<html lang="en">

@include('company.layouts.head')

<body id="page-top">

@include('company.layouts.header')

  <div id="wrapper">

    @include('company.layouts.sidebar')

    <div id="content-wrapper">

      <div class="container-fluid">

        @section('content')
        	@show

      </div>
      <!-- /.container-fluid -->

      @include('company.layouts.footer')

</body>

</html>
