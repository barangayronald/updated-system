<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Princess Touch</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="csss/Profile.css">
  <link href="https://fonts.googleapis.com/css?family=Aboreto" rel="stylesheet">
  <link rel="icon" href="img/Logos.jpg">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
  <!-- 🌸 NAVBAR -->
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
            <a class="nav-link" href="websearch.php"><img src="img/SEARCH.png" alt=""
                class="icon zoom-on-hover"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="webcart.php"><img src="img/CARTTTT.png" alt=""
                class="icon zoom-on-hover"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="webfav.php"><img src="img/HEART.jpg" alt="Favorites" class="icon"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="webprofile.php"><img src="img/pROFILE.png" alt="Profile" class="icon"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <hr class="navbar-line">

  <div class="profile-header text-center">
    <h2>PROFILE</h2>
    <p>UPDATE YOUR PHOTO AND YOUR PERSONAL DETAILS HERE.</p>
  </div>
  <br>
  <hr class="navbar-line"><br><br>

  <div class="profile-container">
    <div class="profile-pic-section">
      <img id="profilePic" src="img/Vince feliciano.jpg" alt="Profile Picture" class="profile-pic" />
      <div>
        <div class="profile-title">Profile Picture</div>
        <input type="file" id="uploadInput" accept="image/*" hidden />
        <button class="btn-upload" id="uploadBtn">Upload Image</button>
        <button class="btn-remove" id="removeBtn">Remove</button>
        <p class="upload-info">We support PNGs, JPEGs, and GIFs under 10MB</p>
      </div>
    </div>

    <form id="profileForm">
      <div class="form-group"><label>Fullname</label><input type="text" id="fullname" /></div>
      <div class="form-group"><label>Username</label><input type="text" id="username" /></div>
      <div class="form-group"><label>Phone Number</label> <input type="text" id="phone" maxlength="11"
          oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Enter your phone number" /></div>
      <div class="form-group"><label>Email</label><input type="email" id="email" /></div>
      <div class="form-group"><label>Address</label><input type="text" id="address" /></div>
      <div class="form-group"><label>Password</label><input type="password" id="password" /></div>
      <div class="buttons">
        <button class="btn-save" type="submit">Save Changes</button>
        <button class="btn-back" type="button" id="cancelBtn">CANCEL</button>
      </div>
    </form>
  </div>

  <script>
    const uploadBtn = document.getElementById('uploadBtn');
    const uploadInput = document.getElementById('uploadInput');
    const profilePic = document.getElementById('profilePic');
    const removeBtn = document.getElementById('removeBtn');
    const form = document.getElementById('profileForm');
    const cancelBtn = document.getElementById('cancelBtn');

    // Load saved data on start
    function loadProfileData() {
      const savedData = JSON.parse(localStorage.getItem('profileData'));
      if (savedData) {
        document.getElementById('fullname').value = savedData.fullname || '';
        document.getElementById('username').value = savedData.username || '';
        document.getElementById('phone').value = savedData.phone || '';
        document.getElementById('email').value = savedData.email || '';
        document.getElementById('address').value = savedData.address || '';
        document.getElementById('password').value = savedData.password || '';
        if (savedData.image) profilePic.src = savedData.image;
      }
    }

    // Initialize form with saved data
    window.addEventListener('load', loadProfileData);

    // Store original data for cancel operation
    let originalData = {};
    window.addEventListener('load', () => {
      originalData = {
        fullname: document.getElementById('fullname').value,
        username: document.getElementById('username').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('email').value,
        address: document.getElementById('address').value,
        password: document.getElementById('password').value,
        image: profilePic.src
      };
    });

    // Upload new profile picture
    uploadBtn.addEventListener('click', () => uploadInput.click());

    uploadInput.addEventListener('change', function () {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = e => profilePic.src = e.target.result;
        reader.readAsDataURL(file);
      }
    });

    // Remove profile picture
    removeBtn.addEventListener('click', () => {
      profilePic.src = 'img/default_profile.png';
      uploadInput.value = '';
    });

    // Save profile info
    form.addEventListener('submit', e => {
      e.preventDefault();

      // Validate required fields
      const requiredFields = ['fullname', 'username', 'email'];
      let isValid = true;

      requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value.trim()) {
          isValid = false;
          input.classList.add('is-invalid');
        } else {
          input.classList.remove('is-invalid');
        }
      });

      if (!isValid) {
        alert('Please fill in all required fields');
        return;
      }

      const data = {
        fullname: document.getElementById('fullname').value,
        username: document.getElementById('username').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('email').value,
        address: document.getElementById('address').value,
        password: document.getElementById('password').value,
        image: profilePic.src
      };

      localStorage.setItem('profileData', JSON.stringify(data));
      originalData = { ...data };
      alert('Profile saved successfully!');
    });

    // Cancel (restore original data)
    cancelBtn.addEventListener('click', () => {
      if (confirm("Discard unsaved changes?")) {
        document.getElementById('fullname').value = originalData.fullname || '';
        document.getElementById('username').value = originalData.username || '';
        document.getElementById('phone').value = originalData.phone || '';
        document.getElementById('email').value = originalData.email || '';
        document.getElementById('address').value = originalData.address || '';
        document.getElementById('password').value = originalData.password || '';
        profilePic.src = originalData.image || 'img/default_profile.png';

        // Remove any validation styling
        document.querySelectorAll('.is-invalid').forEach(el => {
          el.classList.remove('is-invalid');
        });
      }
    });
  </script>
</body>

</html>