<?php
// The plain PHP server falls back to index.php for directory-style URLs.
// Dispatch those requests as well, even when no router was supplied at startup.
if (PHP_SAPI === 'cli-server' && !defined('IGNITE_ROUTED') &&
    !in_array(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), ['/', '/index.php', '/index'], true)) {
    require __DIR__ . '/router.php';
    exit;
}
$pageId = 'home';
$pageTitle = 'IGNITE';
$pageDescription = 'IGNITE fuels your mind, body, and lifestyle with purposeful products, ethical business solutions, and practical learning experiences.';
$pageStyles = ['assets/css/coverage.css'];
$pageScripts = ['assets/js/coverage.js', 'assets/js/iraq-hero.js'];
require __DIR__ . '/includes/header.php';
?>
<?php require __DIR__ . '/includes/iraq-home.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
