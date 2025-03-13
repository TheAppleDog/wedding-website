<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
    <div class="container-fluid"><a class="navbar-brand" href="index.php"><img src="images/logo/rings.png" alt="" style="height:55px; width:180px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="price.php">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recent_bookings.php">Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">Contact</a>
                </li>
<li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul> 
        <div class="form-inline my-2 my-lg-0">
            <a class="nav-link" href="">
                  <b style="font-size:14px; color:#0000EE"><?= isset($_SESSION['user_name']) ? ucfirst($_SESSION['user_name']) : 'Guest'; ?></b></a>
         </div>
            <div class="form-inline mr-2">              
                <a class="btn btn-sm my-2 my-sm-0 mr-2 loginbtn" href="index.php">Log Out</a>
            </div>
        </div>
 <div id="active-marker" class="active-marker"></div>
    </div>
</nav>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get current URL path and assign 'active' class
    var path = window.location.pathname;
    var page = path.split("/").pop();

    var navLinks = document.querySelectorAll('.navbar-nav .nav-item a');
    
    navLinks.forEach(function(link) {
        if (link.href.includes(page)) {
            link.parentElement.classList.add('active');
        } else {
            link.parentElement.classList.remove('active');
        }
    });
});
document.addEventListener("DOMContentLoaded", function() {
    const marker = document.getElementById('active-marker');

    // Function to update marker position and width
    function moveMarker() {
        const activeItem = document.querySelector('.navbar-nav .nav-item.active');
        if (activeItem) {
            const bounds = activeItem.getBoundingClientRect();
            marker.style.left = `${bounds.left}px`;
            marker.style.width = `${bounds.width}px`;
        }
    }

    // Initial move to active item
    moveMarker();

    // Optional: If you have a SPA or use AJAX to load content, call moveMarker() on page change
    // For demonstration, you might call it on nav item click, but use your actual page change logic
    document.querySelectorAll('.navbar-nav .nav-item a').forEach(item => {
        item.addEventListener('click', () => setTimeout(moveMarker, 150)); // Adjust delay as needed
    });
});

</script>
