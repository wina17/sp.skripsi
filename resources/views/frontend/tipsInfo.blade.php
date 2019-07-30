@extends('layouts.frontend')
@section('content')
<section class="mbr-section content5 cid-r81rsCLT9y mbr-parallax-background" id="content5-h">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8"><br><br>
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-2">
                    Tips & Info</h2>
            </div>
          </div>
       </div>
</section>
<section class="bg-white">
  <!-- Page Content -->
    <div class="container">

      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <!-- Blog Post -->
          <div class="card mb-4" style="padding-top: 50px;">
          </style>
            <img class="card-img-top" src="https://i0.wp.com/www.infocatdog.com/wp-content/uploads/2018/08/WhatsApp-Image-2018-08-09-at-3.41.48-PM-3.jpeg?w=900" alt="Card image cap" style="height: 350px; width: 730px;">
            <div class="card-body">
              <h2 class="card-title">Waspada Scabies Gatalnya Bikin Stress</h2>
              <p class="card-text">Pernahkah petlovers memergoki hewan kesayangannya tidak nyaman karena gatal? Bisa jadi hewan kesayangan petlovers terkena scabies, lalu bagaimana cara mengatasinya?</p>
              <a href="{{ url('/tipsInfo/artikelA') }}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Kategori</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Kesehatan</a>
                    </li>
                    <li>
                      <a href="#">Adopt Pet</a>
                    </li>
                    <li>
                      <a href="#">Dog Food</a>
                    </li>
                    <li>
                      <a href="#">Dog Snack</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Hibah Pet</a>
                    </li>
                    <li>
                      <a href="#">Lost Pet</a>
                    </li>
                    <li>
                      <a href="#">Pet Lovers Event</a>
                    </li>
                    <li>
                      <a href="#">Pet Choker</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Artikel Lainnya</h5>
            <div class="card-body">
              <h5 style="text-align: center;">
                <a href="https://anjingkita.com/artikel/469/siberian-husky">
                  <img src="https://i2.wp.com/shopee.co.id/inspirasi-shopee/wp-content/uploads/2018/01/Butuh-Teman-Hewan-Penjaga-5-Anjing-Ini-Bisa-Jadi-Jawabannya-2.jpeg?fit=3099%2C2207&ssl=1" alt="" title="" style="max-height: 250px; max-width: 250px;"><br><br>Iren</a>
              </h5>
            </div>
            <div class="card-body">
              <h5 style="text-align: center;">
                <a href="https://anjingkita.com/artikel/469/siberian-husky">
                  <img src="https://i2.wp.com/shopee.co.id/inspirasi-shopee/wp-content/uploads/2018/01/Butuh-Teman-Hewan-Penjaga-5-Anjing-Ini-Bisa-Jadi-Jawabannya-2.jpeg?fit=3099%2C2207&ssl=1" alt="" title="" style="max-height: 250px; max-width: 250px;"><br><br>Iren</a>
              </h5>
            </div>

          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
  </section>
@endsection