<nav class="#00796b teal darken-2">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php" title="Halaman Awal" class="brand-logo"><i class="material-icons">local_atm</i>BANK NASIONAL LINA</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="login.php" title="Admin"><i class="material-icons">account_circle</i></a></li>
                <?php if (isset($_POST["gantiSandi"])) : ?>
                    <form action="" method="post" class="input-field inline">
                        <li><a href="profil.php" title="Setting account"><i class="material-icons">build</i></a></li>
                        <li><a href="logout.php" title="Logout"><i class="material-icons">remove_circle</i></a></li>
                    </form>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>