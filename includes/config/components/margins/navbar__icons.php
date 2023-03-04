<?php
if ($_SERVER['SERVER_NAME'] == 'vendors.localhost') {
    echo "<a href='".$_SESSION['vendors_url']."' class='fas fa-user'> Dashboard</a>";
    echo "<a href='".$_SESSION['vendors_url']."?logout=true' class='fas fa-user'>Logout</a>";
} else {
    if(isset($_SESSION['id'])) {
        echo "<a href='".$_SESSION['base_url']."dashboard' class='fas fa-user'> Dashboard | </a>";
        echo "<a href='".$_SESSION['base_url']."?logout=true' class='fas fa-user'>Logout</a>";
    } else {
        echo "<a href='".$_SESSION['base_url']."login' > Sign in</a>";
        echo "<a href='".$_SESSION['base_url']."register' class='fas fa-user'> Join</a>";
    }
}
    echo "
        </div>
    </div>
</section>
</div>
<br /><br /><br /><br />";
?>