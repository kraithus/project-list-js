<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="ico.png">
  <title>Home for ease but this page to add projects</title>
  <style>
    /* Custom styles */
    body {
      background-color: #000; /* Black background */
      color: #fff; /* White text color */
    }

    .btn-dark-blue {
      background-color: #1e90ff; /* Dark blue button color */
      color: #fff; /* White text color for the button */
    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <form id="projectForm" action="store.php" method="POST">
      <h1>Select Region and Council:</h1>
      <div class="form-group mb-2">
        <label for="regionDropdown">Region:</label>
        <select name="region" id="regionDropdown" class="form-control">
        <option value="North" <?php if(isset($_SESSION['selectedRegion']) && $_SESSION['selectedRegion'] == 'North') echo 'selected'; ?>>North</option>
          <option value="South" <?php if(isset($_SESSION['selectedRegion']) && $_SESSION['selectedRegion'] == 'South') echo 'selected'; ?>>South</option>
          <option value="Central" <?php if(isset($_SESSION['selectedRegion']) && $_SESSION['selectedRegion'] == 'Central') echo 'selected'; ?>>Central</option>
        </select>
      </div>
  
      <div class="form-group mb-2">
        <label for="councilDropdown">Council:</label>
        <?php if(isset($_SESSION['selectedCouncil'])): ?> 
        <select name="council" class="form-control">
          <option value="<?php echo $_SESSION['selectedCouncil']; ?>"><?php echo $_SESSION['selectedCouncil']; ?></option>
        </select>
        <?php else: ?>
        <select name="council" id="councilDropdown" class="form-control">
          <!-- Council options will be dynamically populated here -->
        </select>
        <?php endif; ?>
      </div>
  
      <div class="form-group mb-2">
        <label for="categoryDropdown">Category:</label>
        <?php if(isset($_SESSION['selectedCategory'])): ?>
        <select name="category" class="form-control">  
          <option value="<?php echo $_SESSION['selectedCategory'];?>"><?php echo $_SESSION['selectedCategory'];?></option>
        </select>  
        <?php else: ?>  
        <select name="category" id="categoryDropdown" class="form-control">
          <option value="Agriculture">Agriculture</option>
          <option value="Banking & Finance">Banking & Finance</option>
          <option value="Education">Education</option>
          <option value="Health">Health</option>
          <option value="ICT and Digital Services">ICT and Digital Services</option>
        </select>
        <?php endif; ?>
      </div>
  
      <div class="form-group mb-4">
        <label for="project">Project:</label>
        <textarea name="project" id="project" class="form-control" placeholder="Enter project name"></textarea>
      </div>
  
      <div class="form-group mb-4">
        <button id="addButton" class="form-control btn btn-dark-blue" type="submit" onlick="storeSelectedValues()">Add</button>
      </div>  

      <div class="form-group">
        <button id="clearSessionButton" class="form-control btn btn-danger" type="button" onclick="clearSession()">Clear Session</button>
      </div>
    </form>
  </div>
  
  <script>
    // Function to clear session
    function clearSession() {
      <?php
      // Clear specific session variables
      unset($_SESSION['selectedRegion']);
      unset($_SESSION['selectedCouncil']);
      unset($_SESSION['selectedCategory']);
      ?>
      // Reload the page to reflect changes
      location.reload();
    }
  </script>
  <script src="data.js"></script>
  <script src="add.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
