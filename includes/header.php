<?php
// Page settings are defined by the calling page, never by request parameters.
require __DIR__ . '/i18n.php';
$iraqHome = json_decode(file_get_contents(__DIR__ . '/../data/iraq-home.json'), true, 512, JSON_THROW_ON_ERROR);
$isHome = ($pageId ?? 'home') === 'home';
$escape = static fn($value) => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <base href="<?= $escape($basePath . '/') ?>">
    <?php foreach ($supportedLocales as $language => $languageName): ?>
        <link rel="alternate" hreflang="<?= $language ?>" href="<?= $escape($localeUrl($language, $pageSlug)) ?>">
    <?php endforeach; ?>
    <link rel="alternate" hreflang="x-default" href="<?= $escape($localeUrl('ar', $pageSlug)) ?>">
    <link rel="canonical" href="<?= $escape($localeUrl($locale, $pageSlug)) ?>">
    <meta name="description" content="<?= $escape($pageDescription) ?>">
    <title><?= $escape($pageTitle) ?></title>
    <link rel="icon" href="assets/images/logo.png">
    <link rel="stylesheet" href="assets/css/globals.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/motion.css">
    <link rel="stylesheet" href="assets/css/i18n.css">
    <script>
        window.igniteMessages = <?= json_encode(array_intersect_key($translations, array_flip(['Pause animations', 'Resume animations', 'No matching content on this page.', 'This destination is not included in the supplied homepage. Its page or service URL is needed to connect this link.'])), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
        window.igniteText = text => window.igniteMessages[text] || text;
    </script>
    <?php foreach ($pageStyles as $stylesheet): ?>
        <link rel="stylesheet" href="<?= $escape($stylesheet) ?>">
    <?php endforeach; ?>
    <link rel="stylesheet" href="assets/css/mobile-header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/header-submenus.css">
    <link rel="stylesheet" href="assets/css/iraq-identity.css">
    <script src="assets/js/script.js" defer></script>
    <?php foreach ($pageScripts as $script): ?>
        <script src="<?= $escape($script) ?>" defer></script>
    <?php endforeach; ?>
</head>
<body class="iraq-site <?= $isHome ? 'iraq-home' : 'brainify-page ' . $escape($bodyClass ?? '') ?>">
    <?php if (!$isHome): ?>
        <a class="brainify-skip" href="#<?= $escape($mainId ?? 'brainify-main') ?>">Skip to content</a>
    <?php endif; ?>
    <header class="iraq-site-header" <?= $isHome ? ' id="home"' : '' ?>>
        <div class="navigation"><a class="brand" href="<?= $isHome ? '#home' : 'index.php' ?>" aria-label="IGNITE home"><img src="assets/images/logo.png"
                    alt="IGNITE"></a><button class="menu-toggle" aria-expanded="false"
                aria-controls="main-navigation"><span>Menu</span><span class="menu-icon" aria-hidden="true"><i></i><i></i><i></i></span></button>
            <nav id="main-navigation" aria-label="Main navigation">
                <?php
                $headerMenus = [
                    'products' => ['PRODUCTS', 'products', [['brAInify', 'brainify'], ['SANAREY', 'sanarey'], ['SENA', 'sena'], ['BrushO', 'brusho'], ['Bright', 'bright'], ['drinkHRW', 'drinkhrw']]],
                    'about' => ['ABOUT IGNITE', 'about', [['About IGNITE', 'about-ignite'], ['IGNITE Leadership', 'leadership'], ['IGNITE Global Advisory Board', 'advisory-board'], ['Media', 'media'], ['FAQ', 'faqs']]],
                    'business' => ['BUSINESS OPPORTUNITY', 'business-opportunity', [['The IGNITE Opportunity', 'opportunity'], ['Become a Brand Affiliate', 'become-a-brand-affiliate'], ['Build Your Business', 'build-your-business']]],
                    'resources' => ['RESOURCES', 'resources', [['IGNITE Blog', 'blog'], ['Training and Events', 'events'], ['Policies', 'policies']]],
                    'support' => ['SUPPORT', 'support', [['Contact Us', 'contact'], ['Help Centre', 'help']]],
                ];
                require __DIR__ . '/navigation-children.php';
                foreach ($headerMenus as $menuKey => [$menuLabel, $menuPage, $menuLinks]): ?>
                    <div class="nav-group">
                        <div class="nav-group-heading">
                            <a class="nav-parent" id="nav-label-<?= $menuKey ?>" href="<?= $escape($menuPage) ?>.php" <?= $pageId === $menuPage ? 'aria-current="page"' : '' ?>><?= $escape($menuLabel) ?></a>
                            <button class="nav-group-toggle" type="button" aria-labelledby="nav-label-<?= $menuKey ?>" aria-expanded="false" aria-controls="submenu-<?= $menuKey ?>"></button>
                        </div>
                        <div class="nav-submenu" id="submenu-<?= $menuKey ?>" hidden>
                            <?php foreach ($menuLinks as [$linkLabel, $linkAnchor]): ?>
                                <?php if (isset($nestedMenus[$linkAnchor])): ?>
                                    <div class="nav-entry">
                                        <div class="nav-entry-heading">
                                            <a class="nav-overview-link" id="nav-entry-<?= $escape($linkAnchor) ?>" href="<?= $escape($menuPage) ?>.php#<?= $escape($linkAnchor) ?>"><?= $escape($linkLabel) ?></a>
                                            <button class="nav-branch-toggle" type="button" aria-expanded="false" aria-controls="nested-<?= $escape($linkAnchor) ?>" aria-labelledby="nav-entry-<?= $escape($linkAnchor) ?>"></button>
                                        </div>
                                        <div class="nav-nested" id="nested-<?= $escape($linkAnchor) ?>" hidden>
                                            <?php foreach ($nestedMenus[$linkAnchor] as [$childLabel, $childHref]): ?>
                                                <?php if ($childHref): ?><a class="nav-leaf" href="<?= $escape($childHref) ?>"><?= $escape($childLabel) ?></a>
                                                <?php else: ?><span class="nav-download-pending" aria-disabled="true"><span><?= $escape($childLabel) ?></span><small><?= $locale === 'kk' ? 'Жақында' : ($locale === 'ru' ? 'Скоро' : 'Coming Soon') ?></small></span><?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php else: ?><a class="nav-overview-link" href="<?= $escape($menuPage) ?>.php#<?= $escape($linkAnchor) ?>"><?= $escape($linkLabel) ?></a><?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </nav>
            <button type="button" class="search-toggle" aria-label="Search website"><img src="assets/images/search.svg" alt=""></button>
            <button
                class="pill language" aria-label="<?= $escape($supportedLocales[$locale]) ?>"><img src="assets/images/globe.svg" alt=""> <?= strtoupper($locale) ?></button><a
                class="pill login" href="https://distributor.joinignite.com/">Login</a>
        </div>
    </header>
