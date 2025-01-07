<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Flower Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero bg-primary text-white text-center py-5">
        <h1>Welcome to Our Flower Shop</h1>
        <p>Fresh Flowers for Every Occasion</p>
        <a href="#" class="btn btn-light">Shop Now</a>
    </div>

    <!-- Product Grid -->
    <div class="container my-5">
        <h2 class="text-center">Featured Flowers</h2>
        <div class="row">
        <div class="col-md-4">
                <div class="card">
                    <img src="Images/2-4-768x768.png" class="card-img-top" alt="Flower 1">
                    <div class="card-body">
                        <h5 class="card-title">Roseline</h5>
                        <p class="card-text">$29.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Images/2-11-600x600.png" class="card-img-top" alt="Flower 2">
                    <div class="card-body">
                        <h5 class="card-title">Sweet Blossoms</h5>
                        <p class="card-text">$24.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Images/5-7-600x600.png" class="card-img-top" alt="Flower 3">
                    <div class="card-body">
                        <h5 class="card-title">Gorgeous Blossoms</h5>
                        <p class="card-text">$25.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Images/6-7-600x600.png" class="card-img-top" alt="Flower 4">
                    <div class="card-body">
                        <h5 class="card-title">Country Classic</h5>
                        <p class="card-text">$29.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Images/Red_Yellowrosebasket-Rs3800-600x600.jpg" class="card-img-top" alt="Flower 5">
                    <div class="card-body">
                        <h5 class="card-title">Red - Yellow Rose Basket</h5>
                        <p class="card-text">$39.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Images/images01.png" class="card-img-top" alt="Flower 6">
                    <div class="card-body">
                        <h5 class="card-title">Rose Bouquet</h5>
                        <p class="card-text">$18.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4">
        <p>&copy; 2024 Flower Shop. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>