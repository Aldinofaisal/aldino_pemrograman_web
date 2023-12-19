<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

<!-- custom css file link  -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="header">

<div class="flex">
   <a href="#home" class="logo">Hotels And Resorts</a>
   <div id="menu-btn" class="fas fa-bars"></div>
</div>

<nav class="navbar">
   <a href="profil_form.php">register</a>
   <a href="reservasi_form.php">reservation</a>
   <a href="reviews_form.php">reviews</a>
</nav>

</section>

<!-- halaman home mulai -->
<section class="home" id="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="box swiper-slide">
            <img src="images/home-img-1.jpg" alt="">
            <div class="flex">
               <h3>VVIP rooms</h3>
               <a href="reservasi.php" class="btn">check order</a>
            </div>
         </div>

         <div class="box swiper-slide">
            <img src="images/home-img-2.jpg" alt="">
            <div class="flex">
               <h3>foods and drinks</h3>
               <a href="reviews.php" class="btn">all review</a>
            </div>
         </div>

         <div class="box swiper-slide">
            <img src="images/home-img-3.jpg" alt="">
            <div class="flex">
               <h3>lobby</h3>
               <a href="profil.php" class="btn">profil</a>
            </div>
         </div>

      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>

<!-- halaman home selesai -->

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
  
</body>
</html>