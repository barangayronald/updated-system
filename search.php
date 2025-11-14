<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search | Princess Touch</title>
    <link rel="stylesheet" href="csss/search.css">
    <link rel="icon" href="img/Logos.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
</head>

<body>
    <!-- 🩷 Back Button -->
    <a href="index.php" class="back-button">← Back to Home</a>

    <div class="search-container">
        <h1>Search Our Makeup Collection 💄</h1>

        <form id="searchForm" class="search-bar">
            <input type="text" id="searchInput" placeholder="Search makeup products..." required>
            <button type="submit">🔍</button>
        </form>

        <div class="search-results">
            <h2>Search Results</h2>
            <div id="results"></div>
        </div>
    </div>

    <script>
        // Basic JS search simulation
        const products = [
            { name: "Velvet Matte Lipstick", description: "Smooth and long-lasting matte lipstick" },
            { name: "Glow Foundation", description: "Radiant foundation for all skin types" },
            { name: "Peach Blush", description: "Adds a natural, fresh glow" },
            { name: "Shimmer Eyeshadow Palette", description: "12 shades of creamy shimmer colors" },
            { name: "Rose Lip Tint", description: "Lightweight tint with rosy finish" },
        ];

        document.getElementById('searchForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const query = document.getElementById('searchInput').value.toLowerCase();
            const resultsContainer = document.getElementById('results');
            resultsContainer.innerHTML = '';

            const filtered = products.filter(product =>
                product.name.toLowerCase().includes(query) ||
                product.description.toLowerCase().includes(query)
            );

            if (filtered.length === 0) {
                resultsContainer.innerHTML = `<p class="placeholder-text">No results found for "${query}" 😔</p>`;
            } else {
                filtered.forEach(product => {
                    const item = document.createElement('div');
                    item.classList.add('product-item');
                    item.innerHTML = `<h3>${product.name}</h3><p>${product.description}</p>`;
                    resultsContainer.appendChild(item);
                });
            }
        });
    </script>
</body>

</html>