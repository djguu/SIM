<div class="row">
    <div class="col-lg-12">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="navbar-header navbar-pasific">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <span class="color-dark">MyNotes</span>
                </a>
            </div>
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto">
                    <li id="notes_nav" class="nav-item">
                        <a class="nav-link" href="/">Notas</a>
                    </li>
                    <li id="img_nav" class="nav-item">
                        <a class="nav-link" href="/assets/pages/images.php">Imagens</a>
                    </li>
                    <li id="vid_nav" class="nav-item">
                        <a class="nav-link" href="/assets/pages/videos.php">Videos</a>
                    </li>
                    <li id="calendar_nav" class="nav-item">
                        <a class="nav-link" href="/assets/pages/calendar.php">Calendario</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=$_SESSION["username"]?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-inf" aria-labelledby="navbarDropdown">
                            <?php
                                if(isset($_SESSION['admin']) && $_SESSION['admin']){
                            ?><a class="dropdown-item" href="/assets/pages/admin.php">Admin-Dashboard</a><?php
                                }
                            ?>
                            <a class="dropdown-item" href="/assets/pages/user.php">Settings</a>
                            <a class="dropdown-item" href="/assets/php/logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>