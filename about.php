<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'includes/header.php';
    session_start(); // Start the session
    ?>
    <style>
        .about-us{
  height: 100vh;
  width: 100%;
  padding: 90px 0;
  background: #ddd;
}
.pic{
  height: auto;
  width:  302px;
}
.about{
  width: 1130px;
  max-width: 85%;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-around;
}
.text{
  width: 540px;
}
.text h2{
  font-size: 90px;
  font-weight: 600;
  margin-bottom: 10px;
}
.text h5{
  font-size: 22px;
  font-weight: 500;
  margin-bottom: 20px;
}
span{
  color: #4070f4;
}
.text p{
  font-size: 18px;
  line-height: 25px;
  letter-spacing: 1px;
}
.data{
  margin-top: 30px;
}
.hire{
  font-size: 18px;
  background: #4070f4;
  color: #fff;
  text-decoration: none;
  border: none;
  padding: 8px 25px;
  border-radius: 6px;
  transition: 0.5s;
}
.hire:hover{
  background: #000;
  border: 1px solid #4070f4;
}
.ab{
    height:30vh ;
    width: 30%;
}

    </style>
</head>

<body>
    <!-- Header Section -->
    <header>
        <?php
            include 'includes/menu.php';
        ?>
    </header>



    <section class="about-us">
    <div class="about">
      <!--<img src="girl.png" class="pic">-->
      <div class="text">
        <h2>About Us</h2>
        <h5> <span>Red Rooster Farm</span></h5>
         
        <div class="data">
        Welcome to Red Rooster Farm, your premier destination for fresh, sustainable agricultural and livestock products right in the heart of Brussels City, Belgium. Our farm is dedicated to providing the finest quality vegetables, fruits, dairy products, and more to the residents of Brussels.

At Red Rooster Farm, we take pride in our commitment to sustainable farming practices, ensuring that our products are not only delicious but also environmentally friendly. From our lush vegetable gardens to our thriving fruit orchards, every product is grown and harvested with care and attention to detail.

Whether you're looking for farm-fresh vegetables to cook up a wholesome meal or craving creamy dairy products straight from the source, Red Rooster Farm has you covered. Join us in supporting local agriculture and taste the difference that freshness and quality make.

Explore our website to learn more about our products, our farm, and our commitment to sustainability. Thank you for choosing Red Rooster Farm for all your agricultural and livestock needs.
        
        </div>
      </div>
    </div>
  </section>
   

</body>

</html>