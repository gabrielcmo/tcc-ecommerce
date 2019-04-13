@extends('partials.__head')


<body>
    @extends('partials.__nav')

    @yield('carousel')

    <!--Main layout-->
    <main>
        <div class="container">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

            <!-- Navbar brand -->
            <span class="navbar-brand">Categories:</span>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">All
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                @yield('categories')
            </ul>
            <!-- Links -->

            <form class="form-inline">
                <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                </div>
            </form>
            </div>
            <!-- Collapsible content -->

        </nav>
        <!--/.Navbar-->

        <!--Section: Products-->
      <section class="text-center mb-4">

        <!--Grid row-->
        <div class="row wow fadeIn">

        @yield('products')

        </div>
        <!--Grid row-->

        </section>
        <!--Section: Products-->

        <!--Pagination-->
      <nav class="d-flex justify-content-center wow fadeIn">
        <ul class="pagination pg-blue">

          <!--Arrow left-->
          <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>

          <li class="page-item active">
            <a class="page-link" href="#">1
              <span class="sr-only">(current)</span>
            </a>
          </li>

            @yield('pagination')

          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
      <!--Pagination-->
    </main>

    @extends('partials.__footer')
</body>
</html>
