<?php
    foreach ($_COOKIE as $cookieName => $cookieValue) {
        if (str_starts_with($cookieName, "pizza")) {
            setcookie($cookieName, "", time() - 3600);
        }
    }

    header("Location: response_page.php?code=" . (http_response_code() == 200 ? 1 : 0));
