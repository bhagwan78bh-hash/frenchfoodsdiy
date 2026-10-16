<?php
/**
 * frenchfoodsdiy - Privacy Policy Page
 * Simple, elegant PHP page with header, privacy disclosures, and footer.
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
    <title>Privacy Policy — frenchfoodsdiy</title>
    <meta name="description" content="Privacy Policy for frenchfoodsdiy. Learn how we handle your newsletter email, cookies, local browser storage, and GDPR/CCPA data rights.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .page-header-banner {
            background: linear-gradient(135deg, var(--burgundy-900) 0%, var(--navy-900) 100%);
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
                <h1 class="page-title">Privacy Policy</h1>
                <p class="page-subtitle">frenchfoodsdiy &bull; GDPR &amp; CCPA Compliance &bull; Last Updated: October 2026</p>
            </div>
        </section>

        <div class="container">
            <div class="legal-page-container">
                <div class="legal-back-nav">
                    <a href="index.php" class="btn-back-home">&larr; Return to frenchfoodsdiy Home</a>
                </div>

                <div class="legal-callout">
                    <strong>Your Privacy Matters:</strong> At <strong>frenchfoodsdiy</strong>, we respect your personal data and are committed to maintaining transparent, responsible privacy practices. This Privacy Policy details how we collect, store, and safeguard your information.
                </div>

                <section class="legal-section">
                    <h3>1. Information We Collect</h3>
                    <p>We only collect information strictly necessary to provide an exceptional culinary experience:</p>
                    <ul>
                        <li><strong>Direct Information You Provide:</strong> When you subscribe to our <em>Club Cuisine</em> newsletter or submit an inquiry to our culinary desk, we collect your email address, name, and any recipe feedback you share.</li>
                        <li><strong>Local Browser Storage (Client-Side Privacy):</strong> Your saved recipe bookmarks, checked ingredients, and kitchen timer preferences are stored exclusively on your local device via modern browser <code>localStorage</code>. This data never leaves your device and is never uploaded to any remote server or sold to advertisers.</li>
                        <li><strong>Technical & Diagnostic Data:</strong> Standard server logs containing anonymous device type, browser version, referring URL, and approximate country region to maintain website uptime and security.</li>
                    </ul>
                </section>

                <section class="legal-section">
                    <h3>2. How We Use Your Information</h3>
                    <p>We use the minimal information we gather strictly to:</p>
                    <ul>
                        <li>Send weekly authentic French recipes, chef technique tips, and seasonal culinary guides (only if you opt in).</li>
                        <li>Answer culinary inquiries, recipe conversion questions, or dietary substitution queries.</li>
                        <li>Ensure security against fraudulent activity or automated spam submissions.</li>
                        <li>Analyze aggregated, anonymous traffic to determine which French classics home cooks love most.</li>
                    </ul>
                </section>

                <section class="legal-section">
                    <h3>3. Cookies & Local Storage Practices</h3>
                    <p>We prioritize minimal cookie usage. We utilize:</p>
                    <ul>
                        <li><strong>Essential Cookies / Local Storage:</strong> To remember your cooking progress, recipe unit preferences (Metric vs Imperial), and favorited recipes across browser reloads.</li>
                        <li><strong>No Invasive Cross-Site Trackers:</strong> We do not deploy third-party behavioural cross-site tracking pixels or invasive advertising networks.</li>
                    </ul>
                </section>

                <section class="legal-section">
                    <h3>4. GDPR & CCPA Compliance (Your Rights)</h3>
                    <p>Regardless of your geographic location, we extend comprehensive privacy controls to all users:</p>
                    <ul>
                        <li><strong>Right of Access & Portability:</strong> You may request a copy of any personal details we hold associated with your email address.</li>
                        <li><strong>Right to Rectification or Erasure ("Right to Be Forgotten"):</strong> You may request that we permanently delete your email and subscription records from our database at any time.</li>
                        <li><strong>One-Click Unsubscribe:</strong> Every newsletter email dispatched contains a direct, automated one-click unsubscribe mechanism.</li>
                        <li><strong>Do Not Sell My Information:</strong> We do NOT sell, lease, or monetize your personal information to third-party data brokers.</li>
                    </ul>
                </section>

                <section class="legal-section">
                    <h3>5. Data Security</h3>
                    <p>We implement industry-standard cryptographic protocols (SSL/TLS HTTPS encryption) and secure servers to protect your data during transit and storage. Access to subscriber databases is restricted to authorized culinary staff only.</p>
                </section>

                <section class="legal-section">
                    <h3>6. Children's Online Privacy Protection</h3>
                    <p><em>frenchfoodsdiy</em> is designed for general audiences and home cooks. We do not knowingly collect personal data from individuals under 13 years of age. If you believe a minor has submitted personal information, please notify us immediately for prompt deletion.</p>
                </section>

                <section class="legal-section">
                    <h3>7. Privacy Contact & Data Protection Officer</h3>
                    <p>For any privacy inquiries, data deletion requests, or questions regarding our compliance practices, contact our Data Protection desk:</p>
                    <p class="contact-email-box">
                        <strong>Email:</strong> privacy@frenchfoodsdiy.com<br>
                        <strong>Subject Line:</strong> Privacy &amp; Data Request - frenchfoodsdiy<br>
                        <strong>Response Time:</strong> Within 48 business hours
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
