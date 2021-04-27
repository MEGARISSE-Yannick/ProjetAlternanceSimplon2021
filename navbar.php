<nav class="navbar is-fixed-top">
    <div class="level-left">
        <div class="level-item ">
            <a class="button is-dark" href="index.php">
                <strong>Astrocoffe</strong>
            </a>
        </div>
    </div>

    <div class="navbar-brand">

        <div class="navbar-burger burger" data-target="navMenubd-example">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navMenubd-example" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="user.php">
                <i class="fas fa-user"></i>Tous les users
            </a>

            <a class="navbar-item" href="machine.php">
                <i class="fas fa-laptop-code"> </i>Toutes les machines
            </a>
            <a class="navbar-item" href="">
                <i class="fas fa-laptop"></i>Reservation
            </a>
            <a class="navbar-item" href="">
                <i class="fas fa-laptop"></i>Machine en utilisation
            </a>

            <hr class="navbar-divider">
        </div>
        <div class="level is-mobile">
            <div class="level-left">
                <div class="level-item ">
                    <a class="button is-small is-success" href="login.php">

                        <strong>Log in</strong>
                    </a>
                </div>
            </div>
            <div class="level-right">
                <div class="level-item ">
                    <a class="button is-small is-danger" href="deco.php">

                        <strong>Log out</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>

</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Get all "navbar-burger" elements
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any nav burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(function($el) {
                $el.addEventListener('click', function() {

                    // Get the target from the "data-target" attribute
                    var target = $el.dataset.target;
                    var $target = document.getElementById(target);

                    // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                    $el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>