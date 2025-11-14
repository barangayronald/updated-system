 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Princess Touch</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="csss/favorite.css">
  <link href="https://fonts.googleapis.com/css?family=Aboreto" rel="stylesheet">
  <link rel="icon" href="img/Logos.jpg">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light py-3 fade-scale">
    <div class="container">
      <a class="navbar-brand fw-bolder fs-2" href="index.php">PRINCESS TOUCH</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-6 gap-4">
          <li class="nav-item"><a class="nav-link" href="webcus.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="webshop.php">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="webtrending.php">Trending</a></li>
          <li class="nav-item"><a class="nav-link" href="webcontact.php">Contact Us</a></li>
          <li class="nav-item"><a class="nav-link" href="webabout.php">About Us</a></li>
        </ul>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-6 gap-6 d-flex align-items-center">
          <li class="nav-item">
            <a class="nav-link" href="websearch.php">
              <img src="img/SEARCH.png" alt="" class="icon zoom-on-hover">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="webcart.php">
              <img src="img/CARTTTT.png" alt="" class="icon zoom-on-hover">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="webfav.php">
              <img src="img/HEART.jpg" alt="Favorites" class="icon">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Profile.php">
              <img src="img/pROFILE.png" alt="Profile" class="icon">
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <hr class="navbar-line">

  <div class="container mt-5">
    <div class="favorites-header d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">MY FAVORITE PRODUCTS</h2>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="removeAll">
        <label class="form-check-label" for="removeAll">Select All</label>
      </div>
    </div>

    <div class="favorites-list" id="favItems"></div>

    <div class="text-center mt-5">
      <a href="checkout.php" class="btn btn-dark px-4 py-2 rounded-pill">GO TO CHECKOUT</a>
    </div>
  </div>

  <script src="js/bootstrap.js"></script>

  <script>
    function loadFavorites() {
      const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
      const container = document.getElementById('favItems');
      container.innerHTML = '';

      if (favorites.length === 0) {
        container.innerHTML = '<p class="text-center">No favorite products yet 💔</p>';
        return;
      }

      favorites.forEach((item, index) => {
        container.innerHTML += `
        <div class="favorite-item mb-3">
          <div class="d-flex align-items-center bg-pink-light p-3 rounded-4 justify-content-between">

            <div class="d-flex align-items-center">
              <input type="checkbox" class="form-check-input me-3 item-check" data-index="${index}">
              <img src="${item.img}" alt="${item.name}" class="product-img me-3" style="width:80px;height:80px;border-radius:10px;">
              <div class="product-info">
                <h5 class="mb-2">${item.name}</h5>
                <div class="d-flex gap-4">
                  <span class="price">${item.price}</span>
                  <span class="quantity">QUANTITY: 1</span>
                </div>
              </div>
            </div>

            <!-- DELETE BUTTON (matches your screenshot) -->
            <button class="btn btn-outline-danger delete-btn" data-index="${index}">
              <i class="bi bi-trash"></i>
            </button>

          </div>
        </div>`;
      });

      attachDeleteButtons();
    }

    function attachDeleteButtons() {
      const buttons = document.querySelectorAll('.delete-btn');

      buttons.forEach(btn => {
        btn.addEventListener('click', () => {
          const index = btn.getAttribute('data-index');
          removeFavorite(index);
        });
      });
    }

    function removeFavorite(index) {
      let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
      const removed = favorites[index];

      favorites.splice(index, 1);
      localStorage.setItem('favorites', JSON.stringify(favorites));

      loadFavorites();

      // Sync delete to backend
      fetch('system/delete_favorite.php', {
        method: 'POST',
        credentials: 'same-origin',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ product_name: removed.name })
      });

      alert("Favorite removed!");
    }

    document.getElementById('removeAll').addEventListener('change', function () {
      if (this.checked) {
        let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        const checks = document.querySelectorAll('.item-check');

        checks.forEach(check => {
          if (check.checked) {
            const index = parseInt(check.dataset.index);
            favorites.splice(index, 1);
          }
        });

        localStorage.setItem('favorites', JSON.stringify(favorites));

        this.checked = false;
        loadFavorites();
        alert("Selected favorites removed!");
      }
    });

    loadFavorites();
  </script>

</body>

</html>
