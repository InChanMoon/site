<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Heleket - Crypto Payment Gateway'; ?></title>
    <meta name="description" content="<?php echo $pageDescription ?? 'Safe and fast cryptocurrency payment service'; ?>">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-left">
                <a href="/" class="logo">
                    <span class="logo-text">Heleket</span>
                </a>
                <nav class="nav-links">
                    <a href="/pages/cards.php" class="nav-link">
                        Cards
                        <span class="badge-new">New</span>
                    </a>
                    <a href="https://doc.heleket.com" target="_blank" class="nav-link">Development API</a>
                    <a href="/pages/contacts.php" class="nav-link">Contacts</a>
                    <a href="/pages/blog.php" class="nav-link">Blog</a>
                </nav>
            </div>
            <div class="header-right">
                <div class="language-selector">
                    <button class="lang-btn">
                        <img src="/assets/img/flag-en.svg" alt="English" width="24" height="24">
                        <span>English</span>
                        <svg width="20" height="20" viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5z" fill="currentColor"/>
                        </svg>
                    </button>
                </div>
                <div class="auth-buttons">
                    <button class="btn btn-primary">Log in</button>
                </div>
            </div>
        </div>
    </header>
