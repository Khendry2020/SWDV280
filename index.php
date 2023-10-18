<!DOCTYPE html>
<head>
    <!--Bootstrap Links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
    <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
        </div>

      <div class="col-md-12">
        <h1>
          Scott's Furniture Barn
        </h1>

        <p class="tagline">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
        </p>
      </div>
    </div>

  </section><!-- End Hero -->
<main>
    <!--Navigation-->
  <div>
    <?php include 'header.php'; ?>
  </div>
    <!--End Navigation-->
    <!--Carousel-->
    <div class="container text-center">
        <div class="row">
          <div class="col-md-12">
          </div>
  
        <div class="col-md-12">
          <h2>
            Featured Items
          </h2>
          <div>
            <?php include 'home.php'; ?>
          </div>
        </div>
      </div>
    </div>
    <!--End carousel-->
    <!--About Me-->
    <div class="container text-center">
        <h2>
            About The Barn
        </h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quae, accusamus quod ad veniam vero, molestias 
            sequi possimus adipisci voluptate eos alias animi architecto ullam, 
            blanditiis harum laborum. Illum, perspiciatis.
        </p>
    </div>
    <!--End About Me-->
</main>
<footer>
    <?php include 'footer.php'; ?>
</footer>

</body>
</html>