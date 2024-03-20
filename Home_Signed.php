<?php

include 'auth.php';

if ($_SESSION['user_type'] == 1) {
  // User type is 1, continue with regular user functionality
} elseif ($_SESSION['user_type'] == 2) {
  // User type is 2, redirect to admin home
  redirectToAdminHome();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LYRA</title>

    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
 

    <link rel="stylesheet" href="Home_Signed.css" />
</head>
<body>
   

    <header class="Bar">
      <a href="#home"><img src="img/Logo_Banner.jpg" alt="Lyra"></a>
  
        <nav class="navbar">
            <a class="active" href="#home">home</a>
            <a href="About)Us.php">About us</a>
            <a href="contactUs_Signed.php">Contact us</a>
            <a href="Export.php">Export</a>
            <a href="Import.php">Import</a>
            <a href="logout.php">Log out</a>            
        </nav>
        
        <div class="icons">
          <i class="fas fa-bars" id="menu-bars"></i>       
          <i class="fas fa-search" id="search-icon"></i>
          <a href="#" class="fas fa-shopping-cart"></a>
        </div>
        
      </header>
  


    <form action="" id="search-form">
      <input
        type="search"
        placeholder="search here..."
        name=""
        id="search-box"
      />
      <label for="search-box" class="fas fa-search"></label>
      <i class="fas fa-times" id="close"></i>
    </form>   

    <section class="home" id="home">
      <div class="swiper-container home-slider">
        <div class="swiper-wrapper wrapper">
          <div class="swiper-slide slide">
            <div class="content">
              <span>Lyra company</span>
              <h3>Safe shipping</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                natus dolor cumque?
              </p>
            </div>
            <div class="image">
              <img src="Logo1.jpg" alt="" />
            </div>
          </div>

          <div class="swiper-slide slide">
            <div class="content">
              <span>Quality products</span>
              <h3>The best products</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                natus dolor cumque?
              </p>
            </div>
            <div class="image">
              <img src="Logo2.jpg" alt="" />
            </div>
          </div>

          <div class="swiper-slide slide">
            <div class="content">
              <span>Goods transport</span>
              <h3>free and fast</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                natus dolor cumque?
              </p>
            </div>
            <div class="image">
              <img src="Logo3.jpg" alt="" />
            </div>           
          </div>
          <div class="swiper-slide slide">
            <div class="content">
              <span>24/7</span>
              <h3>SERVICE</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                natus dolor cumque?
              </p>
            </div>
            <div class="image">
              <img src="Logo.jpg" alt="" />
            </div>
        </div>

        <div class="swiper-pagination"
        style="margin-top: 2px;"
        ></div>
      </div>
    </section>

    <section class="product" id="product">
      <h3 class="sub-heading">our products</h3>
      <h1 class="heading">Product</h1>

      <div class="box-container">
        <div class="box">
          <img src="Textile.jpg" alt="" />
          <h3>Textile</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <span>$5 - $100</span>
          <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
          <img src="Food.jpg" alt="" />
          <h3>Food</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <span>$1 - $30</span>
          <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
          <img src="BuildingMaterials.jpg" alt="" />
          <h3>Building Materials</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <span>$1 - $500</span>
          <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
          <img src="CarParts.jpg" alt="" />
          <h3>Car</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <span>$1000 - $20000</span>
          <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
          <img src="AgriculturalProducts.jpg" alt="" />
          <h3>agricultural products</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <span>$1 - $50</span>
          <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
          <img src="WoodProducts.jpg" alt="" />
          <h3>wood products</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <span>$10 - 100$</span>
          <a href="#" class="btn">add to cart</a>
        </div>
      </div>
      <div class="box-container">
        <div class="box">
          <h3></h3>
          <iframe
            width="100%"
            height="500" 
            src="img/gif3.jpg"
            frameborder="0"
            allowfullscreen
          >
          </iframe>
        </div>
      </div>
    </section>

        <section class="about" id="about">
          <h3 class="sub-heading">about us</h3>
          <h1 class="heading">why choose us?</h1>
    
          <div class="row">
            <div class="image">
              <img src="img/about_3.png" alt="" />
            </div>
    
            <div class="content">
              <h3>The best conditions in the region</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore,
                sequi corrupti corporis quaerat voluptatem ipsam neque labore modi
                autem, saepe numquam quod reprehenderit rem? Tempora aut soluta odio
                corporis nihil!
              </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                nemo. Sit porro illo eos cumque deleniti iste alias, eum natus.
              </p>
              <div class="icons-container">
                <div class="icons">
                  <i class="fas fa-shipping-fast"></i>
                  <span>free delivery</span>
                </div>
                <div class="icons">
                  <i class="fas fa-dollar-sign"></i>
                  <span>easy payments</span>
                </div>
                <div class="icons">
                  <i class="fas fa-headset"></i>
                  <span>24/7 service</span>
                </div>
              </div>
              <a href="About)Us.php" class="btn">learn more</a>
            </div>
          </div>
        </section>
    
        <section class="offers" id="offers">
          <h3 class="sub-heading">Offers</h3>
          <h1 class="heading">today's Offers</h1>
    
          <div class="box-container">
            <div class="box">
              <div class="image">
                <img src="img/Offers_1.jpg" alt="" />
                
              </div>
              <div class="content">
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Coca Cola</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Excepturi, accusantium.
                </p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$0.99</span>
              </div>
            </div>
    
            <div class="box">
              <div class="image">
                <img src="img/Offers_2.jpg" alt="" />
                
              </div>
              <div class="content">
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Meat</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Excepturi, accusantium.
                </p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$5.99</span>
              </div>
            </div>
    
            <div class="box">
              <div class="image">
                <img src="img/Offers_3.jpg" alt="" />
                
              </div>
              <div class="content">
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Cement</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Excepturi, accusantium.
                </p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$2.99</span>
              </div>
            </div>
    
            <div class="box">
              <div class="image">
                <img src="img/Offers_4.jpg" alt="" />
                
              </div>
              <div class="content">
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>the bread table</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Excepturi, accusantium.
                </p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$219.99</span>
              </div>
            </div>
    
            <div class="box">
              <div class="image">
                <img src="img/Offers_5.jpg" alt="" />
                
              </div>
              <div class="content">
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>bedroom</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Excepturi, accusantium.
                </p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$599.99</span>
              </div>
            </div>
    
            <div class="box">
              <div class="image">
                <img src="img/Offers_6.jpg" alt="" />
                
              </div>
              <div class="content">
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>shoes</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Excepturi, accusantium.
                </p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$12.99</span>
              </div>
            </div>
    
            <div class="box">
              <div class="image">
                <img src="img/Offers_7.jpg" alt="" />
                
              </div>
              <div class="content">
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>jackets</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Excepturi, accusantium.
                </p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$29.99</span>
              </div>
            </div>
    
            <div class="box">
              <div class="image">
                <img src="img/Offers_8.jpg" alt="" />
                
              </div>
              <div class="content">
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Mercedes AMG</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Excepturi, accusantium.
                </p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$50000</span>
              </div>
            </div>
    
            <div class="box">
              <div class="image">
                <img src="img/Offers_9.jpg" alt="" />
                
              </div>
              <div class="content">
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>transport truck</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Excepturi, accusantium.
                </p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$27000</span>
              </div>
            </div>
          </div>
        </section>

      
        <section class="contact" id="contact">
          <div class="box-container">
            <div class="box">
              <h3>locations</h3>
              <a href="#">Kosova</a>
              <a href="#">Albania</a>
              <a href="#">Macedonia</a>
              <a href="#">Croatia</a>
              <a href="#">Montenegro</a>
            </div>
    
            <div class="box">
              <h3>quick links</h3>
              <a href="#">home</a>
              <a href="#">products</a>
              <a href="#">about</a>
              <a href="#">Offers</a>
              
              <a href="#">order</a>
            </div>
    
            <div class="box">
              <h3>contact info</h3>
              <a href="#">+383-456-780</a>
              <a href="#">+383-222-333</a>
              <a href="#">kosova_exp@gmail.com</a>
              <a href="#">kosova_imp@gmail.com</a>
              <a href="#">Prishtina, Kosova - 10000</a>
            </div>
    
            <div class="box">
              <h3>follow us</h3>
              <a href="#">facebook</a>
              <a href="#">twitter</a>
              <a href="#">instagram</a>
              <a href="#">linkedin</a>
            </div>
          </div>
    
          <div class="credit">
            <span> copyright @ 2023 </span>
          </div>
        </section>

        <div class="loader-container">
          <img src="img/Logo_Banner.jpg" alt="" />
        </div>
    
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    
        <script src="Home_Signed.js"></script>
</body>
</html>