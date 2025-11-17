<?php
$pageTitle = 'Blog - Heleket';
$pageDescription = 'Latest cryptocurrency news and tips';
include '../includes/header.php';
?>

<main class="main-content">
    <section class="hero-section">
        <div class="container">
            <div class="hero-content" style="grid-template-columns: 1fr;">
                <div class="hero-text" style="text-align: center;">
                    <h1 class="hero-title">Blog</h1>
                    <p class="hero-subtitle">Check out the latest information on cryptocurrencies and payments.</p>
                </div>
            </div>
        </div>
    </section>

    <section style="padding: 80px 0; background: #fff;">
        <div class="container">
            <div class="business-slider">
                <?php
                $posts = [
                    [
                        'title' => 'The Future of Cryptocurrency Payments',
                        'excerpt' => 'Discover how cryptocurrency payments are transforming the future in business.',
                        'date' => 'January 15, 2025',
                        'icon' => '🚀'
                    ],
                    [
                        'title' => 'Tips for Safe Transactions',
                        'excerpt' => 'Essential security tips for safely conducting cryptocurrency transactions.',
                        'date' => 'January 10, 2025',
                        'icon' => '🔐'
                    ],
                    [
                        'title' => 'API Integration Guide',
                        'excerpt' => 'A step-by-step guide on how to easily integrate the Heleket API.',
                        'date' => 'January 5, 2025',
                        'icon' => '⚙️'
                    ],
                    [
                        'title' => 'Cryptocurrency Market Trends',
                        'excerpt' => 'Key trends and outlook for the cryptocurrency market in 2025.',
                        'date' => 'January 1, 2025',
                        'icon' => '📊'
                    ],
                    [
                        'title' => 'Customer Success Stories',
                        'excerpt' => 'Introducing business success stories using Heleket.',
                        'date' => 'December 25, 2024',
                        'icon' => '🏆'
                    ],
                    [
                        'title' => 'Web3 and the Future of Payments',
                        'excerpt' => 'Exploring how payment systems are evolving in the Web3 era.',
                        'date' => 'December 20, 2024',
                        'icon' => '🌐'
                    ],
                ];

                foreach ($posts as $post): ?>
                <div class="business-card">
                    <div class="business-icon"><?php echo $post['icon']; ?></div>
                    <p class="business-name"><?php echo $post['title']; ?></p>
                    <p class="business-description"><?php echo $post['excerpt']; ?></p>
                    <p style="margin-top: 16px; font-size: 12px; color: #9ca3af;"><?php echo $post['date']; ?></p>
                    <a href="#" class="btn btn-outline" style="margin-top: 16px; display: inline-block;">Read More</a>
                </div>
                <?php endforeach; ?>
            </div>

            <div style="text-align: center; margin-top: 60px;">
                <p style="color: #6b7280; font-size: 18px;">More content will be updated soon.</p>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>
