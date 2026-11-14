<?php
// The regional composition uses the client's homepage copy and existing routes.
?>
<main id="iraq-main">
    <section class="iq-hero" aria-labelledby="iq-hero-title">
        <div class="iq-hero-copy">
            <p class="iq-eyebrow"><span aria-hidden="true"></span> IGNITE</p>
            <h1 id="iq-hero-title"><span>FUEL YOUR LIFE.</span><em>OWN YOUR FUTURE.</em></h1>
            <p class="iq-intro"><?= $escape($iraqHome['hero']['body']) ?></p>
            <div class="iq-actions"><a class="iq-button" href="products.php">Explore all products <span aria-hidden="true">↗</span></a><a class="iq-text-link" href="business.php">The IGNITE Opportunity <span aria-hidden="true">↗</span></a></div>
        </div>
        <figure class="iq-hero-visual" data-hero-carousel aria-roledescription="carousel" aria-label="Community in three scenes">
            <div class="iq-hero-window"><div class="iq-hero-track">
                <?php foreach ([['baghdad-courtyard', 'AI illustration of young adults learning in a brick courtyard'], ['basra-shanasheel', 'AI illustration of a traditional courtyard and everyday life'], ['erbil-everyday', 'AI illustration of young adults sharing ideas on a terrace']] as $slideIndex => [$photo, $description]): ?>
                <div class="iq-hero-slide" role="group" aria-roledescription="slide" aria-label="<?= $slideIndex + 1 ?> of 3" aria-hidden="<?= $slideIndex === 0 ? 'false' : 'true' ?>">
                    <img src="assets/images/iraq/<?= $photo ?>.jpg" alt="<?= $escape($description) ?>" <?= $slideIndex === 0 ? 'fetchpriority="high"' : 'loading="eager"' ?> width="1536" height="1024">
                </div>
                <?php endforeach; ?>
            </div></div>
            <figcaption><span class="iq-photo-index" aria-hidden="true">01</span>
                <div class="iq-hero-controls" dir="ltr" hidden>
                    <button type="button" data-hero-prev aria-label="Previous slide">&#8592;</button>
                    <button type="button" data-hero-pause aria-label="Pause slideshow">&#10074;&#10074;</button>
                    <button type="button" data-hero-next aria-label="Next slide">&#8594;</button>
                </div>
                <div class="iq-hero-progress" dir="ltr" hidden>
                    <?php for ($slideIndex = 0; $slideIndex < 3; $slideIndex++): ?><button type="button" data-hero-go="<?= $slideIndex ?>" aria-label="Show slide <?= $slideIndex + 1 ?>" aria-pressed="<?= $slideIndex === 0 ? 'true' : 'false' ?>"><span></span></button><?php endfor; ?>
                </div>
            </figcaption>
        </figure>
    </section>

    <nav class="iq-brand-strip" aria-label="Products">
        <?php foreach (['brAInify'=>'brainify', 'SANAREY'=>'sanarey', 'SENA'=>'sena', 'BrushO'=>'brusho', 'Bright'=>'bright', 'drinkHRW'=>'drinkhrw'] as $name=>$slug): ?><a href="<?= $slug ?>.php" lang="en" dir="ltr"><?= $name ?></a><?php endforeach; ?>
    </nav>

    <section class="iq-products iq-section" id="products" aria-labelledby="iq-products-title">
        <div class="iq-section-heading"><div><p class="iq-eyebrow">01 <span aria-hidden="true">/</span> PRODUCTS</p><h2 id="iq-products-title"><?= $escape($iraqHome['products']['title']) ?></h2></div><p><?= $escape($iraqHome['products']['body']) ?></p></div>
        <div class="iq-product-grid">
            <a class="iq-product iq-product-learning" href="brainify.php"><div class="iq-product-art"><img src="assets/images/iraq/iraqi-learning-team.jpg" alt="AI illustration of Iraqi colleagues learning together" loading="lazy" width="1672" height="941"><span class="iq-product-name" lang="en" dir="ltr">brAInify</span></div><div class="iq-product-copy"><p><?= $escape($iraqHome['brainify']['title']) ?></p><span class="iq-round-arrow" aria-hidden="true">↗</span></div></a>
            <a class="iq-product iq-product-wellness" href="sanarey.php"><div class="iq-product-art"><span class="iq-arch" aria-hidden="true"></span><span class="iq-product-name" lang="en" dir="ltr">SANAREY</span></div><div class="iq-product-copy"><p><?= $escape($iraqHome['sanarey']['body']) ?></p><span class="iq-round-arrow" aria-hidden="true">↗</span></div></a>
            <a class="iq-product iq-product-lifestyle" href="sena.php"><div class="iq-product-art"><span class="iq-dial" aria-hidden="true"></span><span class="iq-product-name" lang="en" dir="ltr">SENA</span></div><div class="iq-product-copy"><p><?= $escape($iraqHome['sena']['body']) ?></p><span class="iq-round-arrow" aria-hidden="true">↗</span></div></a>
        </div>
        <a class="iq-text-link iq-products-all" href="products.php">Explore all products <span aria-hidden="true">↗</span></a>
    </section>

    <section class="iq-about iq-section" id="about" aria-labelledby="iq-about-title">
        <figure class="iq-about-visual"><img src="assets/images/iraq/basra-shanasheel.jpg" alt="AI illustration of a traditional courtyard and everyday life" loading="lazy" width="1536" height="1024"></figure>
        <div class="iq-about-copy"><p class="iq-eyebrow">02 <span aria-hidden="true">/</span> ABOUT IGNITE</p><h2 id="iq-about-title">This is IGNITE</h2><p>A global social enterprise built around people, purpose, and products that create real value. Discover our story, our promise, and the people shaping what comes next.</p><div class="iq-about-values"><a href="our-company.php">Our Company <span aria-hidden="true">↗</span></a><a href="our-promise.php">Our Promise <span aria-hidden="true">↗</span></a></div><a class="iq-button iq-button-outline" href="about.php">Learn More <span aria-hidden="true">↗</span></a><span class="iq-about-pattern" aria-hidden="true"></span></div>
    </section>

    <section class="iq-learning iq-section" id="brainify" aria-labelledby="iq-learning-title">
        <div class="iq-learning-copy"><p class="iq-eyebrow">03 <span aria-hidden="true">/</span> <b lang="en">brAInify</b></p><h2 id="iq-learning-title"><?= $escape($iraqHome['brainify']['title']) ?></h2><p><?= $escape($iraqHome['brainify']['body']) ?></p><a class="iq-button" href="brainify.php">Explore brAInify <span aria-hidden="true">↗</span></a></div>
        <div class="iq-paths"><p class="iq-paths-label" lang="en" dir="ltr">br<span>AI</span>nify <small>07 / KNOWLEDGE PATHS</small></p><?php foreach ([['The AI Path','ai-path'],['The Creator Path','creator-path'],['The Financial Intelligence Path','financial-intelligence-path'],['The Digital Economy Path','digital-economy-path'],['The Youth Path','youth-path'],['The Digital Marketing Path','digital-marketing-path'],['The Master English Path','english-path']] as $i=>[$name,$anchor]): ?><a href="brainify.php#<?= $anchor ?>"><span class="iq-path-number" aria-hidden="true"><?= sprintf('%02d',$i+1) ?></span><span><?= $escape($name) ?></span><span aria-hidden="true">↗</span></a><?php endforeach; ?></div>
    </section>

    <?php require __DIR__ . '/home-coverage.php'; ?>

    <section class="iq-opportunity" id="business-opportunity" aria-labelledby="iq-opportunity-title">
        <div class="iq-opportunity-copy"><p class="iq-eyebrow">04 <span aria-hidden="true">/</span> BUSINESS OPPORTUNITY</p><h2 id="iq-opportunity-title">YOUR JOURNEY. YOUR CHOICE. YOUR FUTURE.</h2><p>Whether you’re exploring our products or ready to build a business, IGNITE connects you with a global community, powerful tools, and the freedom to create your own path and unlock your limitless potential.</p><a class="iq-button iq-button-gold" href="business.php">Start Your IGNITE Business <span aria-hidden="true">↗</span></a></div>
        <figure><img src="assets/images/iraq/erbil-everyday.jpg" alt="AI illustration of young adults sharing ideas on a terrace" loading="lazy" width="1536" height="1024"></figure>
    </section>
</main>
