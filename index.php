<?php
/**
 * frenchfoodsdiy - Authentic French Recipes & Culinary DIY Guides
 * Main Entry Point (One-Page Application)
 */

if (php_sapi_name() !== 'cli' && session_status() === PHP_SESSION_NONE) {
    @session_start();
}

// Generate CSRF token if not set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Load recipe and culinary data
require_once __DIR__ . '/data/recipes.php';

// Form handling logic for newsletter & contact forms
$flashMessage = null;
$flashType = 'success';
$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($requestMethod === 'POST') {
    $submittedToken = $_POST['csrf_token'] ?? '';
    if (!hash_equals($_SESSION['csrf_token'], $submittedToken)) {
        $flashMessage = "Security token validation failed. Please try submitting again.";
        $flashType = 'error';
    } else {
        $action = $_POST['action'] ?? '';
        
        if ($action === 'subscribe') {
            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
            $experience = htmlspecialchars(trim($_POST['experience'] ?? 'Enthusiast'));
            if ($email) {
                $flashMessage = "Merci beaucoup! Welcome to Club Cuisine. We've reserved your free French Pantry & Sauce Mastery Guide for " . htmlspecialchars($email) . ".";
                $flashType = 'success';
            } else {
                $flashMessage = "Please provide a valid email address to join Club Cuisine.";
                $flashType = 'error';
            }
        } elseif ($action === 'contact') {
            $name = htmlspecialchars(trim($_POST['name'] ?? 'Friend'));
            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
            $recipeQuestion = htmlspecialchars(trim($_POST['question'] ?? ''));
            
            if ($email && !empty($recipeQuestion)) {
                $flashMessage = "Merci, {$name}! Our culinary team has received your French cooking inquiry and will respond within 24 hours.";
                $flashType = 'success';
            } else {
                $flashMessage = "Please complete all required fields and provide a valid email.";
                $flashType = 'error';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- SEO Meta Tags -->
    <title>frenchfoodsdiy — Authentic French Recipes &amp; Home Cooking Masterclass</title>
    <meta name="description" content="Discover authentic French recipes with frenchfoodsdiy. Master Boeuf Bourguignon, French Onion Soup, buttery Croissants, and silky Crème Brûlée at home with step-by-step DIY guides, dynamic servings scaling, and pantry substitutions.">
    <meta name="keywords" content="french recipes, frenchfoodsdiy, boeuf bourguignon, french onion soup, croissants recipe, ratatouille, french cooking at home, classic french dishes, diy french cuisine">
    <meta name="author" content="frenchfoodsdiy">
    
    <!-- Open Graph / Social Sharing -->
    <meta property="og:title" content="frenchfoodsdiy — Authentic French Recipes Made Approachable">
    <meta property="og:description" content="Master classic French dishes at home: Boeuf Bourguignon, Soupe à l'Oignon, Croissants, and Crème Brûlée with interactive step-by-step guides and tips.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="assets/images/hero.jpg">
    <meta name="theme-color" content="#5A121E">

    <!-- Google Fonts: Playfair Display + Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Schema.org JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "frenchfoodsdiy",
      "url": "https://frenchfoodsdiy.com",
      "description": "Authentic French recipes and DIY culinary techniques for home cooks.",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "#recipes",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
</head>
<body>

    <!-- Header Navigation Component -->
    <?php include __DIR__ . '/includes/header.php'; ?>

    <!-- Flash Message Banner -->
    <?php if ($flashMessage): ?>
        <div class="flash-alert flash-<?php echo $flashType; ?>" id="flashAlert">
            <div class="container flash-container">
                <span class="flash-icon"><?php echo $flashType === 'success' ? '✨' : '⚠️'; ?></span>
                <p class="flash-text"><?php echo $flashMessage; ?></p>
                <button type="button" class="flash-close" onclick="document.getElementById('flashAlert').remove()" aria-label="Dismiss alert">&times;</button>
            </div>
        </div>
    <?php endif; ?>

    <main id="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-backdrop-image" style="background-image: url('assets/images/hero.jpg');"></div>
            <div class="hero-overlay-gradient"></div>
            <div class="container hero-content-wrapper">
                <div class="hero-badge-pill">
                    <span class="flag-dot">🇫🇷</span>
                    <span>L'Art de Vivre &bull; 100% Tested Home French Recipes</span>
                </div>
                
                <h1 class="hero-headline">
                    Master Authentic French Cuisine in Your <span class="accent-text">Home Kitchen</span>.
                </h1>

                <p class="hero-lead">
                    From slow-simmered, velvety <em>Boeuf Bourguignon</em> and golden caramelized <em>Soupe à l'Oignon</em> to flaky artisanal <em>Croissants Pur Beurre</em>. We demystify classical French culinary artistry into clear, step-by-step DIY kitchen guides.
                </p>

                <!-- Hero Live Search & Filter Bar -->
                <div class="hero-search-card">
                    <div class="search-input-wrap">
                        <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" id="heroSearchInput" placeholder="Search French recipes (e.g., onion soup, beef, custard, croissants)..." aria-label="Search French Recipes">
                        <button type="button" class="btn-clear-search" id="clearHeroSearchBtn" style="display: none;" aria-label="Clear search">&times;</button>
                    </div>
                    <div class="hero-quick-tags">
                        <span class="quick-tags-label">Popular Recettes:</span>
                        <button type="button" class="quick-tag-btn" data-search="Boeuf Bourguignon">Boeuf Bourguignon</button>
                        <button type="button" class="quick-tag-btn" data-search="French Onion Soup">Onion Soup</button>
                        <button type="button" class="quick-tag-btn" data-search="Croissants">Butter Croissants</button>
                        <button type="button" class="quick-tag-btn" data-search="Crème Brûlée">Crème Brûlée</button>
                        <button type="button" class="quick-tag-btn" data-search="Ratatouille">Ratatouille</button>
                    </div>
                </div>

                <!-- Hero Metric Highlights -->
                <div class="hero-metrics-row">
                    <div class="metric-item">
                        <span class="metric-number">7+</span>
                        <span class="metric-label">Iconic French Classics</span>
                    </div>
                    <div class="metric-divider"></div>
                    <div class="metric-item">
                        <span class="metric-number">100%</span>
                        <span class="metric-label">Tested in Home Kitchens</span>
                    </div>
                    <div class="metric-divider"></div>
                    <div class="metric-item">
                        <span class="metric-number">Zero</span>
                        <span class="metric-label">Chef Jargon • Pure Clarity</span>
                    </div>
                    <div class="metric-divider"></div>
                    <div class="metric-item">
                        <span class="metric-number">45k+</span>
                        <span class="metric-label">DIY French Food Enthusiasts</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Spotlight Banner -->
        <section class="spotlight-section">
            <div class="container">
                <div class="spotlight-card">
                    <div class="spotlight-image-col">
                        <img src="assets/images/boeuf-bourguignon.jpg" alt="Boeuf Bourguignon French Stew" class="spotlight-img" loading="lazy">
                        <div class="spotlight-stamp">
                            <span>⚜️ TODAY'S DIY SHOWCASE</span>
                        </div>
                    </div>
                    <div class="spotlight-text-col">
                        <div class="category-pill-gold">Chef's Heritage Masterpiece</div>
                        <h2 class="spotlight-title">Boeuf Bourguignon Traditionnel</h2>
                        <p class="spotlight-subtitle">Red Wine Braised Beef with Smoked Lardons &amp; Pearl Onions</p>
                        <p class="spotlight-desc">
                            The definitive standard of Burgundy comfort. Tender cuts of chuck roast seared to a dark mahogany fond, gently slow-braised for 3 hours in a full bottle of French Pinot Noir with sweet carrots, aromatic bouquet garni, and finished with pan-crisped mushrooms.
                        </p>
                        <div class="spotlight-perks">
                            <span class="perk-tag">⏱️ 3h 30m Total</span>
                            <span class="perk-tag">🍷 Pinot Noir Reduction</span>
                            <span class="perk-tag">🥖 Serve with Baguette</span>
                        </div>
                        <div class="spotlight-actions">
                            <button type="button" class="btn-primary open-recipe-trigger" data-recipe-id="boeuf-bourguignon">
                                <span>Start Cooking This Classic</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </button>
                            <a href="#techniques" class="btn-outline">Explore Braising Technique</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Recipe Gallery Section -->
        <section class="recipes-section" id="recipes">
            <div class="container">
                <div class="section-header-centered">
                    <div class="sub-header-pill">Le Répertoire Culinaire</div>
                    <h2 class="section-heading">Classic French Recipes For Home Cooks</h2>
                    <p class="section-subtext">
                        Every recipe includes scalable portions, an interactive ingredient checklist, cooking timers, and wine pairings. Select any dish to begin your DIY kitchen adventure.
                    </p>
                </div>

                <!-- Interactive Filters & Controls Toolbar -->
                <div class="recipe-filter-toolbar">
                    <div class="filter-categories" role="tablist" aria-label="Recipe Categories">
                        <button type="button" class="filter-tab active" data-category="all" role="tab" aria-selected="true">
                            <span>All Recipes</span>
                            <span class="badge-count"><?php echo count($recipes); ?></span>
                        </button>
                        <button type="button" class="filter-tab" data-category="mains" role="tab" aria-selected="false">
                            <span>Plats Principaux</span>
                        </button>
                        <button type="button" class="filter-tab" data-category="soups" role="tab" aria-selected="false">
                            <span>Soupes &amp; Entrées</span>
                        </button>
                        <button type="button" class="filter-tab" data-category="baking" role="tab" aria-selected="false">
                            <span>Boulangerie &amp; Tarts</span>
                        </button>
                        <button type="button" class="filter-tab" data-category="desserts" role="tab" aria-selected="false">
                            <span>Desserts</span>
                        </button>
                    </div>

                    <div class="filter-secondary-row">
                        <div class="select-group">
                            <label for="difficultyFilter" class="filter-label">Difficulty:</label>
                            <select id="difficultyFilter" class="filter-select">
                                <option value="all">Any Difficulty</option>
                                <option value="Easy DIY">Easy DIY (Débutant)</option>
                                <option value="Classic">Classic (Bistro Level)</option>
                                <option value="Chef Masterclass">Masterclass (Avancé)</option>
                            </select>
                        </div>

                        <div class="select-group">
                            <label for="timeFilter" class="filter-label">Max Time:</label>
                            <select id="timeFilter" class="filter-select">
                                <option value="all">Any Duration</option>
                                <option value="60">Under 60 Mins</option>
                                <option value="90">Under 90 Mins</option>
                                <option value="180">Slow Braised (2+ hrs)</option>
                            </select>
                        </div>

                        <div class="favorites-filter-toggle">
                            <button type="button" class="btn-fav-filter" id="filterFavoritesBtn" aria-pressed="false">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                                <span>Saved Only</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Active Filter Status and Result Count -->
                <div class="results-status-bar">
                    <span id="recipeCountDisplay">Showing <strong><?php echo count($recipes); ?></strong> authentic recipes</span>
                    <button type="button" class="btn-reset-filters" id="resetFiltersBtn" style="display: none;">Reset Filters</button>
                </div>

                <!-- Empty State -->
                <div class="empty-recipes-state" id="emptyRecipesState" style="display: none;">
                    <div class="empty-icon">🍳</div>
                    <h3>No French Recipes Found</h3>
                    <p>We couldn't find any recipes matching your current filter selections. Try clearing your search term or adjusting filters.</p>
                    <button type="button" class="btn-primary" id="clearAllFiltersAction">View All French Recipes</button>
                </div>

                <!-- Recipe Cards Grid -->
                <div class="recipes-grid" id="recipesGrid">
                    <?php foreach ($recipes as $recipe): ?>
                        <article class="recipe-card" 
                                 data-id="<?php echo htmlspecialchars($recipe['id']); ?>"
                                 data-category="<?php echo htmlspecialchars($recipe['category']); ?>"
                                 data-difficulty="<?php echo htmlspecialchars($recipe['difficulty']); ?>"
                                 data-time="<?php echo $recipe['cook_time_minutes'] + $recipe['prep_time_minutes']; ?>"
                                 data-title="<?php echo htmlspecialchars(strtolower($recipe['title'] . ' ' . $recipe['french_title'] . ' ' . $recipe['subtitle'])); ?>"
                                 id="card-<?php echo htmlspecialchars($recipe['id']); ?>">
                            
                            <div class="card-image-wrap">
                                <img src="<?php echo htmlspecialchars($recipe['image']); ?>" 
                                     alt="<?php echo htmlspecialchars($recipe['title']); ?>" 
                                     class="card-img" 
                                     loading="lazy">
                                <span class="card-badge"><?php echo htmlspecialchars($recipe['badge']); ?></span>
                                
                                <button type="button" 
                                        class="card-fav-btn" 
                                        data-id="<?php echo htmlspecialchars($recipe['id']); ?>" 
                                        aria-label="Save <?php echo htmlspecialchars($recipe['title']); ?> to favorites">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                </button>
                                
                                <div class="card-time-overlay">
                                    <span>⏱️ <?php echo htmlspecialchars($recipe['total_time']); ?></span>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-meta-top">
                                    <span class="card-category"><?php echo htmlspecialchars($recipe['category_name']); ?></span>
                                    <span class="card-difficulty diff-<?php echo strtolower(str_replace(' ', '-', $recipe['difficulty'])); ?>">
                                        <?php echo htmlspecialchars($recipe['difficulty']); ?>
                                    </span>
                                </div>

                                <h3 class="card-title"><?php echo htmlspecialchars($recipe['title']); ?></h3>
                                <p class="card-french-sub"><?php echo htmlspecialchars($recipe['french_title']); ?></p>
                                <p class="card-desc"><?php echo htmlspecialchars($recipe['description']); ?></p>

                                <div class="card-highlights">
                                    <span class="highlight-item">
                                        <strong>Serves:</strong> <?php echo $recipe['default_servings']; ?>
                                    </span>
                                    <span class="highlight-dot">&bull;</span>
                                    <span class="highlight-item">
                                        <strong>Calories:</strong> <?php echo $recipe['calories_per_serving']; ?> kcal
                                    </span>
                                </div>

                                <div class="card-footer">
                                    <button type="button" 
                                            class="btn-view-recipe open-recipe-trigger" 
                                            data-recipe-id="<?php echo htmlspecialchars($recipe['id']); ?>">
                                        <span>Cook This Recipe</span>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- DIY Technique Masterclass Section -->
        <section class="techniques-section" id="techniques">
            <div class="container">
                <div class="section-header-centered">
                    <div class="sub-header-pill">Les Fondations de la Cuisine</div>
                    <h2 class="section-heading">Master 4 Pillars of French Culinary Technique</h2>
                    <p class="section-subtext">
                        Great French cooking isn't about complexity — it's about mastering foundational mechanics. Learn the exact methods used in top Paris kitchens to transform ordinary supermarket staples into rich dining experiences.
                    </p>
                </div>

                <div class="techniques-grid">
                    <?php foreach ($techniques as $tech): ?>
                        <div class="technique-card">
                            <div class="tech-icon-circle"><?php echo $tech['icon']; ?></div>
                            <h3 class="tech-title"><?php echo htmlspecialchars($tech['title']); ?></h3>
                            <span class="tech-sub"><?php echo htmlspecialchars($tech['subtitle']); ?></span>
                            <p class="tech-body"><?php echo htmlspecialchars($tech['summary']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Interactive Pantry & Supermarket Substitutions Finder -->
        <section class="pantry-section" id="pantry">
            <div class="container">
                <div class="pantry-layout-card">
                    <div class="pantry-text-col">
                        <div class="sub-header-pill">Le Placard du Chef</div>
                        <h2 class="section-heading text-left">Can't Find French Ingredients?</h2>
                        <p class="pantry-intro">
                            Don't live next to a Parisian market? No problem! French cooking at home should never be blocked by inaccessible specialty items. Select any traditional French ingredient to see its exact supermarket substitute that preserves authentic flavor and texture.
                        </p>

                        <div class="pantry-interactive-tool">
                            <label for="pantrySelect" class="pantry-label">Select a Traditional French Staple:</label>
                            <select id="pantrySelect" class="pantry-dropdown">
                                <?php foreach ($substitutions as $index => $sub): ?>
                                    <option value="<?php echo $index; ?>"><?php echo htmlspecialchars($sub['french_item']); ?></option>
                                <?php endforeach; ?>
                            </select>

                            <div class="substitution-display-card" id="substitutionDisplay">
                                <div class="sub-header-row">
                                    <span class="sub-badge">French Ingredient:</span>
                                    <h4 id="subFrenchItem" class="sub-item-title"><?php echo htmlspecialchars($substitutions[0]['french_item']); ?></h4>
                                </div>
                                <p id="subDescription" class="sub-desc"><?php echo htmlspecialchars($substitutions[0]['description']); ?></p>
                                
                                <div class="supermarket-solution-box">
                                    <div class="sol-title">
                                        <span>🛒 Everyday Supermarket Alternative:</span>
                                    </div>
                                    <p id="subAlternative" class="sol-body"><?php echo htmlspecialchars($substitutions[0]['substitute']); ?></p>
                                </div>

                                <div class="sub-best-for">
                                    <strong>Best used in:</strong> <span id="subBestFor"><?php echo htmlspecialchars($substitutions[0]['best_for']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pantry-graphic-col">
                        <div class="chef-quote-box">
                            <span class="quote-symbol">&ldquo;</span>
                            <p>Cooking is about understanding why ingredients work together. When you know how butterfat, acidity, and aromatic herbs balance, you can cook French in any corner of the globe.</p>
                            <cite>&mdash; frenchfoodsdiy Culinary Team</cite>
                        </div>
                        <div class="pantry-checklist-card">
                            <h4>Essential DIY French Spice Drawer:</h4>
                            <ul class="spice-checklist">
                                <li><span>🌿</span> Whole dried bay leaves (Laurier)</li>
                                <li><span>🌿</span> Fresh English or French thyme sprigs</li>
                                <li><span>🧄</span> Fresh shallots &amp; garlic cloves</li>
                                <li><span>🧈</span> High-fat unsalted butter (min 82%)</li>
                                <li><span>🍷</span> Dry red wine (Pinot Noir or Côtes du Rhône)</li>
                                <li><span>🧂</span> Coarse grey sea salt (Sel de Guérande)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kitchen Unit & Temperature Conversion Tool -->
        <section class="converter-section" id="converter">
            <div class="container">
                <div class="section-header-centered">
                    <div class="sub-header-pill">La Précision en Cuisine</div>
                    <h2 class="section-heading">Interactive DIY Kitchen Calculator</h2>
                    <p class="section-subtext">
                        French culinary recipes traditionally rely on grams and Celsius. Use our live interactive converter to switch between metric and US kitchen measurements in seconds.
                    </p>
                </div>

                <div class="converters-wrapper">
                    <!-- Oven Temperature Converter -->
                    <div class="converter-card">
                        <div class="converter-card-header">
                            <span class="calc-icon">🔥</span>
                            <h3>Oven Temperature Converter</h3>
                        </div>
                        <div class="converter-inputs-grid">
                            <div class="input-block">
                                <label for="celsiusInput">Celsius (°C):</label>
                                <input type="number" id="celsiusInput" value="180" step="5" min="50" max="300">
                            </div>
                            <div class="converter-direction-symbol">&harr;</div>
                            <div class="input-block">
                                <label for="fahrenheitInput">Fahrenheit (°F):</label>
                                <input type="number" id="fahrenheitInput" value="356" step="5" min="100" max="600">
                            </div>
                        </div>
                        <div class="thermostat-display" id="thermostatDisplay">
                            <span>French Gas Mark / Thermostat: <strong>Th. 6 (Four Chaud)</strong></span>
                        </div>
                    </div>

                    <!-- Baking Ingredients Weight to Volume Converter -->
                    <div class="converter-card">
                        <div class="converter-card-header">
                            <span class="calc-icon">⚖️</span>
                            <h3>Baking Weight &amp; Volume Converter</h3>
                        </div>
                        <div class="ingredient-weight-grid">
                            <div class="input-block full-width">
                                <label for="ingredientTypeSelect">Ingredient:</label>
                                <select id="ingredientTypeSelect" class="filter-select">
                                    <option value="flour">All-Purpose / French T55 Flour (1 cup = 125g)</option>
                                    <option value="butter">French Butter (1 cup = 227g / 2 sticks)</option>
                                    <option value="sugar">Granulated Sugar (1 cup = 200g)</option>
                                    <option value="liquid">Broth / Wine / Milk (1 cup = 240ml)</option>
                                </select>
                            </div>
                            <div class="input-block">
                                <label for="gramsInput">Weight (Grams):</label>
                                <input type="number" id="gramsInput" value="250" step="5" min="0">
                            </div>
                            <div class="converter-direction-symbol">&rarr;</div>
                            <div class="input-block">
                                <label for="cupsDisplay">US Cups / Measurement:</label>
                                <input type="text" id="cupsDisplay" value="2.0 cups" readonly class="readonly-calc">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter / Club Cuisine Section -->
        <section class="newsletter-section" id="newsletter">
            <div class="container">
                <div class="newsletter-card">
                    <div class="newsletter-content">
                        <span class="newsletter-badge">⚜️ CLUB CUISINE</span>
                        <h2 class="newsletter-title">Join 45,000+ Home Chefs Mastering French Cooking</h2>
                        <p class="newsletter-desc">
                            Subscribe to receive our weekly curated French recipe release, printable grocery prep lists, secret bistro tips, and seasonal culinary guides. Strictly spam-free.
                        </p>

                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>#newsletter" method="POST" class="newsletter-form">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                            <input type="hidden" name="action" value="subscribe">

                            <div class="form-row-inline">
                                <input type="email" name="email" placeholder="Enter your email address..." required class="newsletter-input" aria-label="Email address for French recipe newsletter">
                                
                                <select name="experience" class="newsletter-select" aria-label="Cooking Experience Level">
                                    <option value="Beginner">Beginner Home Cook</option>
                                    <option value="Intermediate" selected>Avid Home Cook</option>
                                    <option value="Advanced">Culinary Enthusiast</option>
                                </select>

                                <button type="submit" class="btn-primary-newsletter">
                                    <span>Rejoindre le Club &rarr;</span>
                                </button>
                            </div>

                            <p class="newsletter-disclaimer">
                                We honor your privacy. Zero spam. Unsubscribe with 1-click anytime. Read our <button type="button" class="btn-inline-link" id="newsletterPrivacyLink">Privacy Policy</button> and <button type="button" class="btn-inline-link" id="newsletterTermsLink">Terms</button>.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ask the Culinary Desk / Contact Section -->
        <section class="contact-section" id="contact">
            <div class="container contact-container">
                <div class="contact-text-col">
                    <div class="sub-header-pill">Le Bureau Culinaire</div>
                    <h2 class="section-heading text-left">Have a Recipe Question or DIY Feedback?</h2>
                    <p class="contact-desc">
                        Need advice on rescuing a curdled sauce, adjusting baking time for high altitude, or finding a rare wine reduction substitute? Our culinary test team is here to help you succeed in the kitchen.
                    </p>
                    <div class="contact-points">
                        <div class="contact-point">
                            <span class="point-icon">📧</span>
                            <div>
                                <strong>Direct Culinary Desk:</strong>
                                <a href="mailto:bonjour@frenchfoodsdiy.com">bonjour@frenchfoodsdiy.com</a>
                            </div>
                        </div>
                        <div class="contact-point">
                            <span class="point-icon">📜</span>
                            <div>
                                <strong>Legal &amp; Recipe Licensing:</strong>
                                <a href="mailto:legal@frenchfoodsdiy.com">legal@frenchfoodsdiy.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-form-col">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>#contact" method="POST" class="contact-card-form">
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                        <input type="hidden" name="action" value="contact">

                        <h3 class="form-title">Ask Our Culinary Team</h3>

                        <div class="form-field">
                            <label for="contactName">Your Name:</label>
                            <input type="text" id="contactName" name="name" required placeholder="e.g. Marie or Alexander">
                        </div>

                        <div class="form-field">
                            <label for="contactEmail">Your Email:</label>
                            <input type="email" id="contactEmail" name="email" required placeholder="name@example.com">
                        </div>

                        <div class="form-field">
                            <label for="contactQuestion">Your Cooking Question or Feedback:</label>
                            <textarea id="contactQuestion" name="question" rows="4" required placeholder="Ask about beef browning, puff pastry lamination, or temperature conversions..."></textarea>
                        </div>

                        <button type="submit" class="btn-primary full-width">
                            <span>Send Culinary Inquiry &rarr;</span>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- Modals (Recipe Cook Modal, Terms of Service Modal, Privacy Policy Modal) -->
    <?php include __DIR__ . '/includes/recipe-modal.php'; ?>
    <?php include __DIR__ . '/includes/terms-modal.php'; ?>
    <?php include __DIR__ . '/includes/privacy-modal.php'; ?>

    <!-- Footer Component -->
    <?php include __DIR__ . '/includes/footer.php'; ?>

    <!-- Injected JSON Database for Fast Interactive Client-Side Features -->
    <script id="recipesDatabase" type="application/json">
        <?php echo json_encode($recipes, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>
    </script>
    <script id="substitutionsDatabase" type="application/json">
        <?php echo json_encode($substitutions, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>
    </script>

    <!-- Main Client Script -->
    <script src="assets/js/main.js"></script>
</body>
</html>
