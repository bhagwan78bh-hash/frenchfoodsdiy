<?php
/**
 * frenchfoodsdiy - Terms of Service Page
 * Simple, elegant PHP page with header, legal content, and footer.
 */

if (php_sapi_name() !== 'cli' && session_status() === PHP_SESSION_NONE) {
    @session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service — frenchfoodsdiy</title>
    <meta name="description" content="Terms of Service and legal agreements for frenchfoodsdiy. Read our culinary disclaimer, recipe copyright, and user safety guidelines.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .page-header-banner {
            background: linear-gradient(135deg, var(--burgundy-900) 0%, var(--burgundy-700) 100%);
            color: #ffffff;
            padding: 60px 0 40px;
            text-align: center;
        }
        .page-title {
            font-family: var(--font-serif);
            font-size: 2.8rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 8px;
        }
        .page-subtitle {
            font-size: 1rem;
            color: var(--gold-100);
        }
        .legal-page-container {
            max-width: 900px;
            margin: 40px auto 80px;
            background: #ffffff;
            padding: 48px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--card-border);
        }
        .legal-back-nav {
            margin-bottom: 24px;
        }
        .btn-back-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            color: var(--burgundy-700);
            font-size: 0.95rem;
        }
        .btn-back-home:hover {
            color: var(--burgundy-900);
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Header Navigation Component -->
    <?php include __DIR__ . '/includes/header.php'; ?>

    <main>
        <section class="page-header-banner">
            <div class="container">
                <h1 class="page-title">Terms of Service</h1>
                <p class="page-subtitle">frenchfoodsdiy &bull; Legal Agreement &amp; Culinary Disclaimers &bull; Last Updated: October 2026</p>
            </div>
        </section>

        <div class="container">
            <div class="legal-page-container">
                <div class="legal-back-nav">
                    <a href="index.php" class="btn-back-home">&larr; Return to frenchfoodsdiy Home</a>
                </div>

                <div class="legal-callout">
                    <strong>Important Notice:</strong> By accessing and using <strong>frenchfoodsdiy</strong> (the "Website", "we", "us", or "our"), you agree to be bound by these Terms of Service. If you do not agree with any part of these terms, please do not use our website or services.
                </div>

                <section class="legal-section">
                    <h3>1. Purpose of the Website</h3>
                    <p><strong>frenchfoodsdiy</strong> is dedicated to educating home cooks, culinary enthusiasts, and aspiring chefs on the preparation, techniques, and cultural history of authentic French cuisine. All content, recipes, ingredient measurements, video demonstrations, and culinary articles are provided for personal, non-commercial educational and entertainment purposes only.</p>
                </section>

                <section class="legal-section">
                    <h3>2. Food Safety & Cooking Disclaimer</h3>
                    <p>Culinary preparation inherently involves heat, knives, open flames, pressurized cookware, and raw ingredients (including poultry, beef, dairy, eggs, and seafood). You acknowledge and agree that:</p>
                    <ul>
                        <li><strong>Internal Cooking Temperatures:</strong> While we offer general guidelines and cooking durations, you are solely responsible for ensuring meats and seafood reach recommended safe minimum internal temperatures (e.g., poultry 165°F / 74°C, beef 145°F / 63°C).</li>
                        <li><strong>Food Allergies & Sensitivities:</strong> Our recipes frequently feature traditional French staples including gluten (wheat flour), dairy (butter, heavy cream, milk, aged cheeses), eggs, tree nuts, and alcohol reductions. You must verify all ingredients for personal allergens and dietary intolerances before preparation.</li>
                        <li><strong>Kitchen Equipment Safety:</strong> Extreme care must be exercised when handling hot cast iron cocottes, boiling broths, oil searing, and kitchen blowtorches (e.g., for Crème Brûlée). <em>frenchfoodsdiy</em> assumes no liability for kitchen accidents, burns, cuts, or foodborne illness resulting from improper handling or individual allergies.</li>
                    </ul>
                </section>

                <section class="legal-section">
                    <h3>3. Nutritional Data & Measurement Estimates</h3>
                    <p>All nutritional information (such as caloric counts, macronutrient breakdowns, and serving estimates) displayed on <em>frenchfoodsdiy</em> is calculated based on standard commercial databases and should be regarded as approximate. Individual brands, ingredient substitutions, and portioning variations will alter final nutritional values.</p>
                </section>

                <section class="legal-section">
                    <h3>4. Intellectual Property Rights</h3>
                    <p>All materials featured on <em>frenchfoodsdiy</em>, including but not limited to written recipes, culinary technique guides, original photography, graphics, logos, slogans, interactive tools (including our dynamic recipe scaler and pantry substitution finder), and code, are the intellectual property of <strong>frenchfoodsdiy</strong> or its content licensors and are protected under international copyright and trademark laws.</p>
                    <p>You may print individual recipe cards for personal kitchen use. You may NOT republish, redistribute, scrape, syndicate, or sell our original recipes, photography, or guides without prior written permission.</p>
                </section>

                <section class="legal-section">
                    <h3>5. User Conduct & Reviews</h3>
                    <p>When participating in community feedback, recipe notes, or submitting inquiries to our culinary desk, you agree to submit truthful, polite, and non-defamatory remarks. We reserve the right to remove any submissions that violate respectful culinary discourse or contain commercial spam.</p>
                </section>

                <section class="legal-section">
                    <h3>6. Third-Party Links & Kitchen Equipment Recommendations</h3>
                    <p>Our website may contain links or mentions of specific cookware (such as Dutch ovens, mandolines, pastry rings) or gourmet ingredients. Some of these links may be affiliate links, meaning we may earn a modest commission if you make a purchase at zero additional cost to you. We only recommend products tested in our home test kitchens.</p>
                </section>

                <section class="legal-section">
                    <h3>7. Limitation of Liability</h3>
                    <p>To the fullest extent permissible by applicable law, <em>frenchfoodsdiy</em>, its authors, chefs, and operators shall not be liable for any direct, indirect, incidental, consequential, or punitive damages arising out of your access to, use of, or inability to use this website or recipes.</p>
                </section>

                <section class="legal-section">
                    <h3>8. Governing Law & Modifications</h3>
                    <p>These terms shall be governed by and construed in accordance with applicable laws. We reserve the right to update these Terms of Service periodically. Changes take effect immediately upon posting to this page.</p>
                </section>

                <section class="legal-section">
                    <h3>9. Contact Us</h3>
                    <p>If you have questions or inquiries regarding these Terms of Service, please reach out to our legal department:</p>
                    <p class="contact-email-box">
                        <strong>Email:</strong> legal@frenchfoodsdiy.com<br>
                        <strong>Brand:</strong> frenchfoodsdiy Culinary Group
                    </p>
                </section>

                <div style="margin-top: 40px; text-align: center;">
                    <a href="index.php#recipes" class="btn-primary">Explore Authentic French Recipes &rarr;</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Component -->
    <?php include __DIR__ . '/includes/footer.php'; ?>

    <script src="assets/js/main.js"></script>
</body>
</html>
