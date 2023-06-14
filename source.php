<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&amp;display=swap'>
<style>

:root {
  --dark-color: hsl(230, 100%, 9%);
  --light-color: #fff;
  --bg-gradient: linear-gradient(
    to bottom,
    #21aa14, #0a2501,
  );
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

body {
  min-height: 100vh;
  display: grid;
  place-items: center;
  padding: 2rem;
  font-family: "Poppins";
  color: var(--dark-color);
  background-image: url("https://products.ls.graphics/mesh-gradients/images/99.-Roman.jpg");
  background-size: cover;
  background-position: center top;
}

strong {
  font-weight: 700;
}

.overlay {
  width: min(100%, 1140px);
  /*   max-height: 640px; */
  padding: 8rem 6rem;
  display: flex;
  align-items: center;
  background: rgba(255, 255, 255, 0.375);
  box-shadow: 0 0.75rem 2rem 0 rgba(0, 0, 0, 0.1);
  -webkit-backdrop-filter: blur(10px);
          backdrop-filter: blur(10px);
  border-radius: 2rem;
  border: 1px solid rgba(255, 255, 255, 0.125);
}

.overlay__inner {
  max-width: 36rem;
}

.overlay__title {
  font-size: 1.875rem;
  line-height: 2.75rem;
  font-weight: 700;
  letter-spacing: -0.025em;
  margin-bottom: 2rem;
}

.text-gradient {
  background-image: linear-gradient(45deg, #21aa14, #124204);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.overlay__description {
  font-size: 1rem;
  line-height: 1.75rem;
  margin-bottom: 3rem;
  font-weight: 500;
}

.overlay__btn {
  padding: 0.9rem 2.5rem;
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--light-color);
  background-image: linear-gradient(45deg, #2abb1d, #124204);
  border: none;
  border-radius: 0.5rem;
  transition: transform 150ms ease;
}

.overlay__btn:hover {
  transform: scale(1.05);
  cursor: pointer;
}

@media only screen and (max-width: 1140px) {
  .overlay {
    padding: 8rem 4rem;
  }
}

@media only screen and (max-width: 840px) {
  body {
    padding: 1.5rem;
  }

  .overlay {
    padding: 4rem;
    height: auto;
  }

  .overlay__title {
    font-size: 1.25rem;
    line-height: 2rem;
    margin-bottom: 1.5rem;
  }

  .overlay__description {
    font-size: 0.875rem;
    line-height: 1.5rem;
    margin-bottom: 2.5rem;
  }
}

@media only screen and (max-width: 600px) {
  .overlay {
    padding: 1.5rem;
  }

  .overlay__btns {
    /*     flex-wrap: wrap; */
  }

  .overlay__btn {
    width: 100%;
    /*     font-size: 0.75rem; */
  }
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="overlay" style="max-width:600px; padding:40px;">
  <!-- Overlay inner wrapper -->
  <div class="overlay__inner">
    <!-- Title -->
    <h1 class="overlay__title">
      Offsite  
      <span class="text-gradient">Agro-Products</span>  Sourcing
    </h1>
    <!-- Description -->
    <p class="overlay__description">
      This is for enterprises that need a particular Agriculture product or its primary derivatives in large tonnage and willing to pay for its research and sourcing. Note: Kindly drop the product information(name, type and quantity) as they will be used for sourcing.
     <br>   
     <br>
      Click the "Proceed" button below to message us on whatsapp.
    </p>
    <!-- Buttons -->
    <div class="overlay__btns" style="text-align:center">

      <a href="https://wa.me/%2B2348174993336?text=Hello%2C%20I%20will%20like%20to%20source%20for%20a%20product.%0A%0AProduct%20Name:%0AQuantity:%0AType:"><button class="overlay__btn"> Proceed</button></a>

    </div>
  </div>
</div>
<!-- partial -->
  
</body>
</html>


