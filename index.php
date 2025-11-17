<?php
$pageTitle = 'Heleket - Accepting Cryptocurrency Payments for Your Business';
$pageDescription = 'Convenient cryptocurrency payment acceptance service for websites. Support for multiple cryptocurrencies, high security level, instant transactions.';
include 'includes/header.php';
?>

<main class="main-content">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">Accepting Cryptocurrency Payments for Your Business</h1>
                    <p class="hero-subtitle">Flexible fees from 0.4% for payments worldwide</p>
                    <div class="hero-buttons">
                        <a href="https://dash.heleket.com/signup" class="btn btn-primary btn-large">Get Started</a>
                        <a href="#form" class="btn btn-outline btn-large">Contact Us</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1639762681485-074b7f938ba0?w=568&h=363&fit=crop&q=80" alt="Cryptocurrency Payment" width="568" height="363">
                </div>
            </div>
        </div>
    </section>

    <!-- Coins Section -->
    <section class="coins-section">
        <div class="container">
            <h2 class="section-title">Coins We Accept</h2>
            <p class="section-description">Our service allows you to accept cryptocurrencies on your website. Convenient crypto processing ensures safe and fast payments.</p>
            <div class="coins-grid">
                <?php
                $coins = [
                    ['name' => 'Tether USD', 'code' => 'USDT', 'price' => '$0.99', 'icon' => 'usdt'],
                    ['name' => 'Bitcoin', 'code' => 'BTC', 'price' => '$92,855.86', 'icon' => 'btc'],
                    ['name' => 'Monero', 'code' => 'XMR', 'price' => '$410.54', 'icon' => 'xmr'],
                    ['name' => 'Litecoin', 'code' => 'LTC', 'price' => '$93.70', 'icon' => 'ltc'],
                    ['name' => 'Ethereum', 'code' => 'ETH', 'price' => '$3,060.60', 'icon' => 'eth'],
                    ['name' => 'USD Coin', 'code' => 'USDC', 'price' => '$0.99', 'icon' => 'usdc'],
                    ['name' => 'Dash', 'code' => 'DASH', 'price' => '$81.67', 'icon' => 'dash'],
                ];

                foreach ($coins as $coin): ?>
                <div class="coin-item">
                    <img src="https://cdn.jsdelivr.net/gh/spothq/cryptocurrency-icons@master/128/color/<?php echo $coin['icon']; ?>.png"
                         alt="<?php echo $coin['name']; ?>"
                         width="48"
                         height="48"
                         class="coin-icon-img">
                    <div class="coin-info">
                        <p class="coin-name"><?php echo $coin['name']; ?></p>
                        <span class="coin-price"><?php echo $coin['price']; ?></span>
                        <span class="coin-code"><?php echo $coin['code']; ?></span>
                    </div>
                </div>
                <?php endforeach; ?>

                <a href="/currencies" class="coin-item view-all">
                    <div class="coin-icon-default">+</div>
                    <p class="coin-name">View All</p>
                </a>
            </div>
        </div>
    </section>

    <!-- How Service Works -->
    <section class="how-works-section">
        <div class="container">
            <div class="how-works-header">
                <h2 class="section-title">How Does <span class="highlight">Heleket</span> Service Work</h2>
                <p class="section-description">Heleket service allows you to quickly and securely integrate cryptocurrency payments into your website.</p>
            </div>
            <div class="how-works-content">
                <div class="how-works-top">
                    <div class="work-item work-item-1">
                        <p class="work-title">Create an Account for Personal and Business Purposes</p>
                        <div class="work-blocks">
                            <div class="work-block">Personal</div>
                            <div class="work-block">Business</div>
                        </div>
                    </div>
                    <div class="work-item work-item-2">
                        <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?w=370&h=300&fit=crop&q=80" alt="Dashboard Interface" width="370" height="300">
                        <div class="work-text">
                            <p class="work-title">One Account for All Your Projects</p>
                            <p class="work-subtitle">Combine all your projects in one place: add your stores, track revenue and analytics for each project in a single window.</p>
                        </div>
                        <a href="https://dash.heleket.com/signup" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
                <div class="how-works-bottom">
                    <div class="work-item work-item-3">
                        <div>
                            <p class="work-title">Ready-Made Modules for Your CMS</p>
                            <p class="work-subtitle">Integrate with popular platforms in minutes. Just install the plugin and crypto payments are already available to your customers.</p>
                        </div>
                        <div class="integration-icons">
                            <div class="integration-icon">WP</div>
                            <div class="integration-icon">Shopify</div>
                            <div class="integration-icon">WC</div>
                            <div class="integration-icon">CS</div>
                        </div>
                    </div>
                    <div class="work-item work-item-4">
                        <p class="work-title">API Integration</p>
                        <div class="api-visual">
                            <pre><code>API Integration</code></pre>
                        </div>
                        <a href="https://doc.heleket.com" class="btn btn-outline">Learn More →</a>
                    </div>
                    <div class="work-item work-item-5">
                        <p class="work-title">Simple Payment Form for Clients</p>
                        <div class="payment-form-preview">
                            <div class="form-mockup">Payment Form</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Advantages -->
    <section class="advantages-section">
        <div class="container">
            <h2 class="section-title">Advantages of Accepting Cryptocurrencies</h2>
            <p class="section-description">Accepting cryptocurrencies opens up new opportunities for your business: low fees, instant transactions and access to international clients.</p>
            <div class="advantages-grid">
                <div class="advantage-item">
                    <div class="advantage-icon">📈</div>
                    <p class="advantage-title">Increasing Conversion</p>
                    <p class="advantage-description">By integrating cryptocurrency processing, you provide your customers with an additional convenient payment method.</p>
                </div>
                <div class="advantage-item">
                    <div class="advantage-icon">🌍</div>
                    <p class="advantage-title">International Payments</p>
                    <p class="advantage-description">Your customers will be able to easily pay for goods and services online in seconds from anywhere in the world.</p>
                </div>
                <div class="advantage-item">
                    <div class="advantage-icon">💰</div>
                    <p class="advantage-title">Saving on Commissions</p>
                    <p class="advantage-description">Lower transaction costs: cryptocurrency transfers are significantly cheaper than standard acquiring, especially for international transactions.</p>
                </div>
                <div class="advantage-item">
                    <div class="advantage-icon">👤</div>
                    <p class="advantage-title">No Legal Entity Registration Required</p>
                    <p class="advantage-description">Start accepting cryptocurrency payments without having to register a company - just create a personal account and instantly expand your audience.</p>
                </div>
            </div>
            <a href="https://dash.heleket.com/signup" class="btn btn-primary btn-large">Get Started</a>
        </div>
    </section>

    <!-- For Business -->
    <section class="for-business-section">
        <div class="container">
            <p class="section-label">Who is This Suitable For?</p>
            <h2 class="section-title">For Any Business</h2>
            <p class="section-description">Our service is ideal for online stores, freelancers and companies who want to expand their payment options.</p>
            <div class="business-slider">
                <?php
                $businesses = [
                    ['name' => 'Proxy and VPN', 'description' => 'Accept crypto payments selling digital goods'],
                    ['name' => 'Online Gaming', 'description' => 'Sell in-game currencies and items for digital assets'],
                    ['name' => 'Retail', 'description' => 'It\'s possible to accept crypto for physical items'],
                    ['name' => 'Online Education', 'description' => 'Introduce a new payment method to your students'],
                    ['name' => 'Other Popular Options', 'description' => 'Unique business? We are open to cooperation as long as you meet requirements'],
                ];

                foreach ($businesses as $business): ?>
                <div class="business-card">
                    <div class="business-icon">🎯</div>
                    <p class="business-name"><?php echo $business['name']; ?></p>
                    <p class="business-description"><?php echo $business['description']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Tools -->
    <section class="tools-section">
        <div class="container">
            <p class="section-label">Features</p>
            <h2 class="section-title">Every Tool You Need</h2>
            <p class="section-description">Enjoy free access to usable features</p>
            <div class="tools-grid">
                <?php
                $tools = [
                    ['name' => 'Acquiring', 'description' => 'Fast transactions, low flexible fees and easy integration for your peace of mind'],
                    ['name' => 'Auto-withdrawal', 'description' => 'Simply set a trigger and get your profit withdrawn automatically to your Personal wallet'],
                    ['name' => 'Mass Payments', 'description' => 'Save time - pay out your employees in bulk'],
                    ['name' => 'Converter', 'description' => 'Convert your coins to other currencies instantly and without fees'],
                    ['name' => 'Auto-converter', 'description' => 'Choose when to convert your profits into USDT to avoid volatility'],
                    ['name' => 'Payment Fee Accuracy', 'description' => 'Accuracy settings is your chance to make acquiring even more profitable, try it now'],
                ];

                foreach ($tools as $tool): ?>
                <div class="tool-item">
                    <div class="tool-icon">🔧</div>
                    <div class="tool-content">
                        <p class="tool-name"><?php echo $tool['name']; ?></p>
                        <p class="tool-description"><?php echo $tool['description']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Enhanced Privacy -->
    <section class="privacy-section">
        <div class="container">
            <div class="privacy-content">
                <div class="privacy-text">
                    <h2 class="section-title">Attention to Details</h2>
                    <p class="section-description">We pay attention to every detail to ensure the safety and convenience of your customers.</p>
                    <a href="#form" class="btn btn-primary">Send a Request</a>
                </div>
                <div class="privacy-image">
                    <img src="https://images.unsplash.com/photo-1614064641938-3bbee52942c7?w=364&h=296&fit=crop&q=80" alt="Security and Privacy" width="364" height="296">
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq-section" id="faq">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-description">Everything you need to know about the product and its capabilities</p>
            <div class="faq-list">
                <?php
                $faqs = [
                    ['q' => 'How to accept cryptocurrency payments on my website?', 'a' => 'To accept cryptocurrency payments on your website, you need to register with the Heleket service, integrate the API, and configure payment acceptance in your personal account. The process takes just a few minutes.'],
                    ['q' => 'What fees does Heleket charge?', 'a' => 'Heleket offers low fees for processing cryptocurrency payments. The exact fee depends on the selected plan and transaction volume.'],
                    ['q' => 'Which cryptocurrencies are supported?', 'a' => 'We support popular cryptocurrencies such as Bitcoin (BTC), Ethereum (ETH), USDT, and more. A full list of supported currencies is available in your personal account.'],
                    ['q' => 'How fast are the transactions processed?', 'a' => 'Transactions through the Heleket service are processed instantly, allowing you to receive funds to your crypto wallet in the shortest possible time.'],
                    ['q' => 'Is it safe to use Heleket?', 'a' => 'Yes, Heleket provides a high level of security using modern encryption technologies and data protection measures.'],
                ];

                foreach ($faqs as $index => $faq): ?>
                <div class="faq-item" data-index="<?php echo $index; ?>">
                    <div class="faq-question">
                        <p><?php echo $faq['q']; ?></p>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p><?php echo $faq['a']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Bottom CTA -->
    <div class="bottom-cta" id="BottomStart">
        <p class="cta-title">Start Your Journey in Crypto Acquiring Now</p>
        <a href="https://dash.heleket.com/signup" class="btn btn-secondary">Get Started</a>
    </div>

    <!-- Contact Form -->
    <section class="contact-form-section" id="form">
        <div class="container">
            <h2 class="section-title">Submit a Request to Enable Crypto Acquiring</h2>
            <form class="contact-form" method="post" action="/submit-form.php">
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name*" required minlength="2" maxlength="50">
                    </div>
                    <div class="form-group">
                        <input type="text" name="telegram" placeholder="Telegram Nickname">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="E-mail*" required>
                    </div>
                    <div class="form-group">
                        <input type="url" name="website" placeholder="Link to Your Website*" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-large">Send</button>
            </form>
            <div class="form-image">
                <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=400&h=320&fit=crop&q=80" alt="Contact Us" width="400" height="320">
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
