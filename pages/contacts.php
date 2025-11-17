<?php
$pageTitle = 'Contacts - Heleket';
$pageDescription = '연락처 및 문의';
include '../includes/header.php';
?>

<main class="main-content">
    <section class="hero-section">
        <div class="container">
            <div class="hero-content" style="grid-template-columns: 1fr;">
                <div class="hero-text" style="text-align: center;">
                    <h1 class="hero-title">문의하기</h1>
                    <p class="hero-subtitle">궁금한 점이 있으시면 언제든지 문의해주세요.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form-section" style="background: #fff;">
        <div class="container">
            <div style="max-width: 600px; margin: 0 auto;">
                <h2 class="section-title">연락처 정보</h2>

                <div style="margin: 40px 0;">
                    <div class="advantage-item" style="margin-bottom: 20px;">
                        <div class="advantage-icon">📧</div>
                        <p class="advantage-title">이메일</p>
                        <p class="advantage-description">support@heleket.com</p>
                    </div>

                    <div class="advantage-item" style="margin-bottom: 20px;">
                        <div class="advantage-icon">💬</div>
                        <p class="advantage-title">텔레그램</p>
                        <p class="advantage-description">@heleket</p>
                    </div>

                    <div class="advantage-item">
                        <div class="advantage-icon">🌐</div>
                        <p class="advantage-title">소셜 미디어</p>
                        <p class="advantage-description">Facebook, Instagram, X (Twitter), LinkedIn</p>
                    </div>
                </div>

                <div class="social-links" style="justify-content: center; margin: 40px 0;">
                    <a href="https://t.me/heleket" target="_blank" class="social-icon">
                        <span>Telegram</span>
                    </a>
                    <a href="https://www.facebook.com/heleket" target="_blank" class="social-icon">
                        <span>Facebook</span>
                    </a>
                    <a href="http://instagram.com/heleket_systems" target="_blank" class="social-icon">
                        <span>Instagram</span>
                    </a>
                    <a href="https://x.com/heleket_systems" target="_blank" class="social-icon">
                        <span>X</span>
                    </a>
                </div>
            </div>

            <form class="contact-form" method="post" action="/submit-form.php" style="margin-top: 60px;">
                <h3 style="text-align: center; margin-bottom: 30px; font-size: 24px;">문의 양식</h3>
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="이름*" required minlength="2" maxlength="50">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="이메일*" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" name="telegram" placeholder="텔레그램 닉네임">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="제목*" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <textarea name="message" placeholder="메시지*" required rows="6" style="width: 100%; padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-family: inherit; resize: vertical;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-large">보내기</button>
            </form>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>
