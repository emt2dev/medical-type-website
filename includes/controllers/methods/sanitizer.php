<?php
function sanitize($dirty) {
        // removes all html from the post
        $beginSanitizing = strtolower($dirty);
        $beginSanitizing = strip_tags($beginSanitizing);

        $beginSanitizing = str_replace("delete", " ", $beginSanitizing);
        $beginSanitizing = str_replace("select", " ", $beginSanitizing);
        $beginSanitizing = str_replace("update", " ", $beginSanitizing);

        $beginSanitizing = str_replace("*", " ", $beginSanitizing);

        $beginSanitizing = str_replace("from users", " ", $beginSanitizing);
        $beginSanitizing = str_replace("fromusers", " ", $beginSanitizing);

        $beginSanitizing = str_replace("from admin", " ", $beginSanitizing);
        $beginSanitizing = str_replace("fromadmin", " ", $beginSanitizing);

        $beginSanitizing = str_replace("from orders", " ", $beginSanitizing);
        $beginSanitizing = str_replace("fromorders", " ", $beginSanitizing);

        $beginSanitizing = str_replace("from wishlist", " ", $beginSanitizing);
        $beginSanitizing = str_replace("fromwishlist", " ", $beginSanitizing);

        $beginSanitizing = str_replace("from clients", " ", $beginSanitizing);
        $beginSanitizing = str_replace("fromclients", " ", $beginSanitizing);

        $beginSanitizing = str_replace("product_list", " ", $beginSanitizing);
        $beginSanitizing = str_replace("fulfillment", " ", $beginSanitizing);
        $beginSanitizing = str_replace("can_staff", " ", $beginSanitizing);
        $beginSanitizing = str_replace("can_internal_notes", " ", $beginSanitizing);
        $beginSanitizing = str_replace("support_request", " ", $beginSanitizing);

        $beginSanitizing = str_replace("set password", " ", $beginSanitizing);
        $beginSanitizing = str_replace("set email", " ", $beginSanitizing);

        $beginSanitizing = str_replace("set password", " ", $beginSanitizing);
        $beginSanitizing = str_replace("setpassword", " ", $beginSanitizing);

        $beginSanitizing = str_replace("set status", " ", $beginSanitizing);
        $beginSanitizing = str_replace("setstatus", " ", $beginSanitizing);

        // removes quotes, comments, equal, white space
        $beginSanitizing = str_replace('"', " ", $beginSanitizing);
        $beginSanitizing = str_replace('-', " ", $beginSanitizing);
        $beginSanitizing = str_replace('=', " ", $beginSanitizing);
        $beginSanitizing = str_replace("'", " ", $beginSanitizing);

        // removes the whitespace
        $cleanString = htmlspecialchars($beginSanitizing);
        return $cleanString;
}

?>