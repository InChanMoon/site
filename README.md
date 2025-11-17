# Heleket Style Website

A cryptocurrency payment gateway website similar to heleket.com.

## Project Structure

```
site/
├── index.php                 # Main page
├── submit-form.php           # Form submission handler
├── includes/                 # Common components
│   ├── header.php           # Header
│   └── footer.php           # Footer
├── pages/                    # Sub pages
│   ├── cards.php            # Cards page
│   ├── contacts.php         # Contacts page
│   ├── blog.php             # Blog page
│   ├── transactions.php     # Transaction history (hidden)
│   └── admin.php            # Transaction management (hidden)
├── data/                     # Data storage
│   └── transactions.json    # Transaction records
└── assets/                   # Static assets
    ├── css/
    │   └── style.css        # Main stylesheet
    ├── js/
    │   └── main.js          # JavaScript
    └── img/                 # Images & icons
        ├── flag-en.svg      # English flag icon
        └── README.md        # Image sources documentation
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

### Public Pages
- **Cards** (`/pages/cards.php`) - Cryptocurrency card service introduction
- **Contacts** (`/pages/contacts.php`) - Contact information and inquiry form
- **Blog** (`/pages/blog.php`) - Blog post list

### Hidden Pages (Not in Menu)
- **Transactions** (`/pages/transactions.php`) - Exchange-style transaction history
  - View all cryptocurrency deposits and withdrawals
  - Filter by type, coin, and status
  - Real-time statistics dashboard
  - Copy transaction IDs to clipboard
  - Professional exchange interface design

- **Admin** (`/pages/admin.php`) - Transaction management system
  - Full CRUD operations (Create, Read, Update, Delete)
  - Add new transactions
  - Edit existing transactions
  - Delete transactions
  - Data stored in JSON format (`data/transactions.json`)
  - Instant updates to transaction history

## Tech Stack

- **Backend**: PHP
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Design**: Responsive Web Design

## Installation

1. Install web server (Apache/Nginx) and PHP 7.4+
2. Copy project to web root directory
3. Ensure `data/transactions.json` has write permissions (chmod 666)
4. Access via web browser

## Usage

### Accessing Hidden Pages

The transaction management pages are not linked in the navigation menu. Access them directly via URL:

- **Transaction History**: `http://yoursite.com/pages/transactions.php`
- **Admin Panel**: `http://yoursite.com/pages/admin.php`

### Managing Transactions

1. Navigate to `/pages/admin.php`
2. Use the form on the left to add new transactions or edit existing ones
3. View all transactions in the list on the right
4. Click "Edit" to modify a transaction
5. Click "Delete" to remove a transaction (with confirmation)
6. All changes are instantly saved to `data/transactions.json`

### Viewing Transaction History

1. Navigate to `/pages/transactions.php`
2. Use the filters to narrow down results:
   - Filter by transaction type (deposit/withdrawal)
   - Filter by cryptocurrency
   - Filter by status (completed/pending/processing/failed)
3. View detailed statistics at the top
4. Click "Copy" to copy transaction IDs to clipboard

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
