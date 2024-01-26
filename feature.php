<?php
include 'config.php'; // Include your database connection configuration

// Fetch categories from the database
$categoryQuery = "SELECT DISTINCT category FROM dishes ORDER BY category";
$categoryResult = $con->query($categoryQuery);

// If category is set in the URL query string, use it; otherwise, set to default 'All'
$category = isset($_GET['category']) ? $_GET['category'] : 'All';

// If sort is set in the URL query string, use it; otherwise, set to default 'price_asc'
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'price_asc';

// Sorting query based on selected sort option
switch ($sort) {
    case 'price_asc':
        $sortQuery = "ORDER BY price ASC";
        break;
    case 'price_desc':
        $sortQuery = "ORDER BY price DESC";
        break;
    case 'date_new':
        $sortQuery = "ORDER BY date_of_adding DESC";
        break;
    case 'date_old':
        $sortQuery = "ORDER BY date_of_adding ASC";
        break;
    default:
        $sortQuery = "ORDER BY price ASC";
}

// Selecting dishes based on category, if 'All' is not selected
if ($category !== 'All') {
    $query = "SELECT dish_name, price, img FROM dishes WHERE category = ? $sortQuery";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $category);
} else {
    // Select all dishes if 'All' is selected
    $query = "SELECT dish_name, price, img FROM dishes $sortQuery";
    $stmt = $con->prepare($query);
}

// Execute the prepared statement
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Featured Products</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Featured Product</h2>
            </div>
            <div class="featured__controls">
                <ul>
                    <!-- All categories option -->
                    <li class="<?php echo $category === 'All' ? 'active' : ''; ?>" onclick="window.location.href = '?category=All&sort=<?php echo $sort; ?>'">All</li>

                    <!-- Dynamic category options -->
                    <?php while ($row = $categoryResult->fetch_assoc()): ?>
                        <li class="<?php echo $category === $row['category'] ? 'active' : ''; ?>" onclick="window.location.href = '?category=<?php echo urlencode($row['category']); ?>&sort=<?php echo $sort; ?>'">
                            <?php echo htmlspecialchars($row['category']); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <!-- Sorting select option -->
        <div class="col-12">
            <select id="sort" class="form-control my-3" onchange="window.location.href = window.location.pathname + '?sort=' + this.value + '&category=<?php echo urlencode($category); ?>'">
                <option value="price_asc" <?php echo $sort === 'price_asc' ? 'selected' : ''; ?>>Sort by price (low to high)</option>
                <option value="price_desc" <?php echo $sort === 'price_desc' ? 'selected' : ''; ?>>Sort by price (high to low)</option>
                <option value="date_new" <?php echo $sort === 'date_new' ? 'selected' : ''; ?>>Sort by date (new to old)</option>
                <option value="date_old" <?php echo $sort === 'date_old' ? 'selected' : ''; ?>>Sort by date (old to new)</option>
            </select>
        </div>

  
  <!-- Display products -->
  <div class="row">
    <?php while ($row = $result->fetch_assoc()): ?>
      <!-- Product card -->
      <div class="col-md-4 mt-3">
        <div class="card">
          <img class="card-img-top" src="path_to_image_folder/<?php echo htmlspecialchars($row['img']); ?>" alt="<?php echo htmlspecialchars($row['dish_name']); ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($row['dish_name']); ?></h5>
            <p class="card-text">$<?php echo htmlspecialchars($row['price']); ?></p>
            <!-- Add to Cart button (for future implementation) -->
            <a href="#" class="btn btn-primary">Add to Cart</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
