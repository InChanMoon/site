<?php
$pageTitle = 'Heleket - 비즈니스를 위한 암호화폐 결제 수락';
$pageDescription = '웹사이트를 위한 편리한 암호화폐 결제 수락 서비스. 다양한 암호화폐 지원, 높은 보안 수준, 즉시 거래.';
include 'includes/header.php';
?>

<main class="main-content">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">비즈니스를 위한 암호화폐 결제 수락</h1>
                    <p class="hero-subtitle">전 세계 결제를 위한 0.4%의 유연한 수수료</p>
                    <div class="hero-buttons">
                        <a href="https://dash.heleket.com/signup" class="btn btn-primary btn-large">시작하기</a>
                        <a href="#form" class="btn btn-outline btn-large">문의하기</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="/assets/img/main-background.png" alt="Main Background" width="568" height="363">
                </div>
            </div>
        </div>
    </section>

    <!-- Coins Section -->
    <section class="coins-section">
        <div class="container">
            <h2 class="section-title">우리가 수락하는 코인</h2>
            <p class="section-description">우리 서비스는 웹사이트에서 암호화폐를 받을 수 있게 해줍니다. 편리한 암호화폐 처리는 안전하고 빠른 결제를 보장합니다.</p>
            <div class="coins-grid">
                <?php
                $coins = [
                    ['name' => 'Tether USD', 'code' => 'USDT', 'price' => '$0.99'],
                    ['name' => 'Bitcoin', 'code' => 'BTC', 'price' => '$92,855.86'],
                    ['name' => 'Monero', 'code' => 'XMR', 'price' => '$410.54'],
                    ['name' => 'Litecoin', 'code' => 'LTC', 'price' => '$93.70'],
                    ['name' => 'Ethereum', 'code' => 'ETH', 'price' => '$3,060.60'],
                    ['name' => 'USD Coin', 'code' => 'USDC', 'price' => '$0.99'],
                    ['name' => 'Dash', 'code' => 'DASH', 'price' => '$81.67'],
                ];

                foreach ($coins as $coin): ?>
                <div class="coin-item">
                    <div class="coin-icon"><?php echo $coin['code']; ?></div>
                    <div class="coin-info">
                        <p class="coin-name"><?php echo $coin['name']; ?></p>
                        <span class="coin-price"><?php echo $coin['price']; ?></span>
                        <span class="coin-code"><?php echo $coin['code']; ?></span>
                    </div>
                </div>
                <?php endforeach; ?>

                <a href="/currencies" class="coin-item view-all">
                    <div class="coin-icon-default">+</div>
                    <p class="coin-name">모두 보기</p>
                </a>
            </div>
        </div>
    </section>

    <!-- How Service Works -->
    <section class="how-works-section">
        <div class="container">
            <div class="how-works-header">
                <h2 class="section-title"><span class="highlight">Heleket</span> 서비스 작동 방식</h2>
                <p class="section-description">Heleket 서비스를 사용하면 웹사이트에 암호화폐 결제를 빠르고 안전하게 통합할 수 있습니다.</p>
            </div>
            <div class="how-works-content">
                <div class="how-works-top">
                    <div class="work-item work-item-1">
                        <p class="work-title">개인 및 비즈니스 목적을 위한 계정 생성</p>
                        <div class="work-blocks">
                            <div class="work-block">Personal</div>
                            <div class="work-block">Business</div>
                        </div>
                    </div>
                    <div class="work-item work-item-2">
                        <img src="/assets/img/3d-element.png" alt="3D Element" width="370" height="300">
                        <div class="work-text">
                            <p class="work-title">모든 프로젝트를 위한 하나의 계정</p>
                            <p class="work-subtitle">모든 프로젝트를 한 곳에서: 스토어를 추가하고, 각 프로젝트의 수익과 분석을 하나의 창에서 추적하세요.</p>
                        </div>
                        <a href="https://dash.heleket.com/signup" class="btn btn-primary">시작하기</a>
                    </div>
                </div>
                <div class="how-works-bottom">
                    <div class="work-item work-item-3">
                        <div>
                            <p class="work-title">CMS를 위한 즉시 사용 가능한 모듈</p>
                            <p class="work-subtitle">인기 플랫폼과 몇 분 안에 통합. 플러그인을 설치하면 암호화폐 결제가 이미 고객에게 제공됩니다.</p>
                        </div>
                        <div class="integration-icons">
                            <div class="integration-icon">WP</div>
                            <div class="integration-icon">Shopify</div>
                            <div class="integration-icon">WC</div>
                            <div class="integration-icon">CS</div>
                        </div>
                    </div>
                    <div class="work-item work-item-4">
                        <p class="work-title">API 통합</p>
                        <div class="api-visual">
                            <pre><code>API Integration</code></pre>
                        </div>
                        <a href="https://doc.heleket.com" class="btn btn-outline">자세히 보기 →</a>
                    </div>
                    <div class="work-item work-item-5">
                        <p class="work-title">고객을 위한 간단한 결제 양식</p>
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
            <h2 class="section-title">암호화폐 수락의 장점</h2>
            <p class="section-description">암호화폐 수락은 비즈니스에 새로운 기회를 엽니다: 낮은 수수료, 즉시 거래, 국제 고객 접근.</p>
            <div class="advantages-grid">
                <div class="advantage-item">
                    <div class="advantage-icon">📈</div>
                    <p class="advantage-title">전환율 증가</p>
                    <p class="advantage-description">암호화폐 처리를 통합하여 고객에게 추가적인 편리한 결제 방법을 제공합니다.</p>
                </div>
                <div class="advantage-item">
                    <div class="advantage-icon">🌍</div>
                    <p class="advantage-title">국제 결제</p>
                    <p class="advantage-description">고객은 전 세계 어디에서나 몇 초 안에 상품과 서비스에 대해 쉽게 결제할 수 있습니다.</p>
                </div>
                <div class="advantage-item">
                    <div class="advantage-icon">💰</div>
                    <p class="advantage-title">수수료 절감</p>
                    <p class="advantage-description">거래 비용 절감: 암호화폐 전송은 특히 국제 거래의 경우 표준 수수료보다 훨씬 저렴합니다.</p>
                </div>
                <div class="advantage-item">
                    <div class="advantage-icon">👤</div>
                    <p class="advantage-title">법인 등록 불필요</p>
                    <p class="advantage-description">회사 등록 없이 암호화폐 결제를 받기 시작 - 개인 계정을 만들고 즉시 청중을 확장하세요.</p>
                </div>
            </div>
            <a href="https://dash.heleket.com/signup" class="btn btn-primary btn-large">시작하기</a>
        </div>
    </section>

    <!-- For Business -->
    <section class="for-business-section">
        <div class="container">
            <p class="section-label">누구에게 적합한가요?</p>
            <h2 class="section-title">모든 비즈니스를 위해</h2>
            <p class="section-description">우리 서비스는 결제 옵션을 확장하고자 하는 온라인 스토어, 프리랜서 및 회사에 이상적입니다.</p>
            <div class="business-slider">
                <?php
                $businesses = [
                    ['name' => '프록시 및 VPN', 'description' => '디지털 상품 판매 시 암호화폐 결제 수락'],
                    ['name' => '온라인 게임', 'description' => '게임 내 화폐 및 아이템을 디지털 자산으로 판매'],
                    ['name' => '소매', 'description' => '실물 상품에 대한 암호화폐 수락 가능'],
                    ['name' => '온라인 교육', 'description' => '학생들에게 새로운 결제 방법 도입'],
                    ['name' => '기타 옵션', 'description' => '독특한 비즈니스? 요구 사항을 충족하는 한 협력에 열려 있습니다'],
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
            <p class="section-label">기능</p>
            <h2 class="section-title">필요한 모든 도구</h2>
            <p class="section-description">사용 가능한 기능에 무료로 액세스하세요</p>
            <div class="tools-grid">
                <?php
                $tools = [
                    ['name' => '수수료 처리', 'description' => '빠른 거래, 낮은 유연한 수수료 및 쉬운 통합'],
                    ['name' => '자동 출금', 'description' => '트리거를 설정하고 개인 지갑으로 자동 출금'],
                    ['name' => '대량 결제', 'description' => '시간 절약 - 직원에게 대량으로 지불'],
                    ['name' => '변환기', 'description' => '코인을 즉시 수수료 없이 다른 통화로 변환'],
                    ['name' => '자동 변환기', 'description' => '변동성을 피하기 위해 수익을 USDT로 변환할 시기를 선택'],
                    ['name' => '결제 수수료 정확도', 'description' => '정확도 설정으로 수수료 처리를 더욱 수익성 있게'],
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
                    <h2 class="section-title">세부 사항에 주의</h2>
                    <p class="section-description">고객의 안전과 편의를 보장하기 위해 모든 세부 사항에 주의를 기울입니다.</p>
                    <a href="#form" class="btn btn-primary">요청 보내기</a>
                </div>
                <div class="privacy-image">
                    <img src="/assets/img/enhanced-privacy.png" alt="Enhanced Privacy" width="364" height="296">
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq-section" id="faq">
        <div class="container">
            <h2 class="section-title">자주 묻는 질문</h2>
            <p class="section-description">제품과 기능에 대해 알아야 할 모든 것</p>
            <div class="faq-list">
                <?php
                $faqs = [
                    ['q' => '웹사이트에서 암호화폐 결제를 받는 방법은?', 'a' => 'Heleket 서비스에 등록하고 API를 통합하고 개인 계정에서 결제 수락을 구성해야 합니다. 프로세스는 몇 분밖에 걸리지 않습니다.'],
                    ['q' => 'Heleket은 어떤 수수료를 부과하나요?', 'a' => 'Heleket은 암호화폐 결제 처리에 대해 낮은 수수료를 제공합니다. 정확한 수수료는 선택한 플랜과 거래량에 따라 다릅니다.'],
                    ['q' => '어떤 암호화폐가 지원되나요?', 'a' => 'Bitcoin (BTC), Ethereum (ETH), USDT 등과 같은 인기 있는 암호화폐를 지원합니다. 지원되는 통화의 전체 목록은 개인 계정에서 확인할 수 있습니다.'],
                    ['q' => '거래가 얼마나 빨리 처리되나요?', 'a' => 'Heleket 서비스를 통한 거래는 즉시 처리되어 가능한 한 빨리 암호화폐 지갑으로 자금을 받을 수 있습니다.'],
                    ['q' => 'Heleket을 사용하는 것이 안전한가요?', 'a' => '네, Heleket은 현대적인 암호화 기술과 데이터 보호 조치를 사용하여 높은 수준의 보안을 제공합니다.'],
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
        <p class="cta-title">지금 암호화폐 수수료 처리 여정을 시작하세요</p>
        <a href="https://dash.heleket.com/signup" class="btn btn-secondary">시작하기</a>
    </div>

    <!-- Contact Form -->
    <section class="contact-form-section" id="form">
        <div class="container">
            <h2 class="section-title">암호화폐 수수료 처리를 활성화하기 위한 요청 제출</h2>
            <form class="contact-form" method="post" action="/submit-form.php">
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="이름*" required minlength="2" maxlength="50">
                    </div>
                    <div class="form-group">
                        <input type="text" name="telegram" placeholder="텔레그램 닉네임">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="이메일*" required>
                    </div>
                    <div class="form-group">
                        <input type="url" name="website" placeholder="웹사이트 링크*" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-large">보내기</button>
            </form>
            <div class="form-image">
                <img src="/assets/img/form-background.png" alt="Message" width="400" height="320">
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
