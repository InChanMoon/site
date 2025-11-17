<?php
$pageTitle = 'Blog - Heleket';
$pageDescription = '최신 암호화폐 소식과 팁';
include '../includes/header.php';
?>

<main class="main-content">
    <section class="hero-section">
        <div class="container">
            <div class="hero-content" style="grid-template-columns: 1fr;">
                <div class="hero-text" style="text-align: center;">
                    <h1 class="hero-title">블로그</h1>
                    <p class="hero-subtitle">암호화폐와 결제에 대한 최신 정보를 확인하세요.</p>
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
                        'title' => '암호화폐 결제의 미래',
                        'excerpt' => '비즈니스에서 암호화폐 결제가 어떻게 미래를 변화시키고 있는지 알아보세요.',
                        'date' => '2025년 1월 15일',
                        'icon' => '🚀'
                    ],
                    [
                        'title' => '안전한 거래를 위한 팁',
                        'excerpt' => '암호화폐 거래를 안전하게 수행하기 위한 필수 보안 팁.',
                        'date' => '2025년 1월 10일',
                        'icon' => '🔐'
                    ],
                    [
                        'title' => 'API 통합 가이드',
                        'excerpt' => 'Heleket API를 쉽게 통합하는 방법에 대한 단계별 가이드.',
                        'date' => '2025년 1월 5일',
                        'icon' => '⚙️'
                    ],
                    [
                        'title' => '암호화폐 시장 동향',
                        'excerpt' => '2025년 암호화폐 시장의 주요 트렌드와 전망.',
                        'date' => '2025년 1월 1일',
                        'icon' => '📊'
                    ],
                    [
                        'title' => '고객 성공 사례',
                        'excerpt' => 'Heleket을 사용하여 성공한 비즈니스 사례를 소개합니다.',
                        'date' => '2024년 12월 25일',
                        'icon' => '🏆'
                    ],
                    [
                        'title' => 'Web3와 결제의 미래',
                        'excerpt' => 'Web3 시대에 결제 시스템이 어떻게 진화하고 있는지 탐구합니다.',
                        'date' => '2024년 12월 20일',
                        'icon' => '🌐'
                    ],
                ];

                foreach ($posts as $post): ?>
                <div class="business-card">
                    <div class="business-icon"><?php echo $post['icon']; ?></div>
                    <p class="business-name"><?php echo $post['title']; ?></p>
                    <p class="business-description"><?php echo $post['excerpt']; ?></p>
                    <p style="margin-top: 16px; font-size: 12px; color: #9ca3af;"><?php echo $post['date']; ?></p>
                    <a href="#" class="btn btn-outline" style="margin-top: 16px; display: inline-block;">자세히 보기</a>
                </div>
                <?php endforeach; ?>
            </div>

            <div style="text-align: center; margin-top: 60px;">
                <p style="color: #6b7280; font-size: 18px;">더 많은 콘텐츠가 곧 업데이트됩니다.</p>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>
