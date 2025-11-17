# Heleket Style Website

A cryptocurrency payment gateway website similar to heleket.com.

## Project Structure

```
site/
├── index.php                 # Main page
├── includes/                 # Common components
│   ├── header.php           # Header
│   └── footer.php           # Footer
├── pages/                    # Sub pages
│   ├── cards.php            # Cards page
│   ├── contacts.php         # Contacts page
│   └── blog.php             # Blog page
└── assets/                   # Static assets
    ├── css/
    │   └── style.css        # Main stylesheet
    ├── js/
    │   └── main.js          # JavaScript
    └── img/                 # Images (needs to be added)
```

## Main Features

### Main Page
- Hero Section - Main title and CTA buttons
- Coins List - Displays supported cryptocurrencies
- How Service Works - Usage guide
- Advantages Section - Service benefits
- Business Section - Applicable business types
- Tools Section - Features provided
- FAQ - Frequently asked questions (accordion)
- Contact Form

### Sub Pages
- **Cards** - Cryptocurrency card service introduction
- **Contacts** - Contact information and inquiry form
- **Blog** - Blog post list

## Tech Stack

- **Backend**: PHP
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Design**: Responsive Web Design

## Installation

1. Install web server (Apache/Nginx) and PHP 7.4+
2. Copy project to web root directory
3. Access via web browser

## Technologies Used

- **CSS Grid & Flexbox**: Layout composition
- **Responsive Design**: Mobile, tablet, desktop support
- **PHP Include**: Component reuse
- **JavaScript**: FAQ accordion, smooth scroll

## Customization

### Change Colors
Modify the following color values in `assets/css/style.css`:
- Primary Color: `#6366f1`
- Secondary Color: `#8b5cf6`
- Text Color: `#333`
- Background: `#fff`

### Edit Content
You can directly modify text in each page's PHP file.

## License

MIT License

## Author

Claude Code
