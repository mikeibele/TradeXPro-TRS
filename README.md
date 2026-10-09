# 🚀 TradeXpro (TRS) — Complete Project Guide & Documentation

Welcome to **TradeXpro**! This document is designed to give you a complete, clear, and beginner-friendly overview of your codebase. Whether you are non-technical or just starting out, this guide breaks down everything step-by-step: what this software is, how its features work under the hood, how to run it locally on your computer or on a live web server, and how to convert/run it as a mobile app ( iOS and Android ).

---

## 📌 Table of Contents
1. [What is TradeXpro?](#-what-is-tradexpro)
2. [Key Features Overview](#-key-features-overview)
3. [How the System Works (Under the Hood)](#-how-the-system-works-under-the-hood)
4. [Technology Stack Explained Simply](#-technology-stack-explained-simply)
5. [Project Folder & Codebase Structure](#-project-folder--codebase-structure)
6. [How to Run as a Web Application](#-how-to-run-as-a-web-application)
   - [A. Running Locally on Your PC](#a-running-locally-on-your-computer)
   - [B. Deploying to a Live Web Server (cPanel / VPS)](#b-deploying-to-a-live-web-server-cpanel)
7. [How to Run as a Mobile Application](#-how-to-run-as-a-mobile-application)
   - [Option 1: Progressive Web App (PWA) — Quickest](#option-1-progressive-web-app-pwa)
   - [Option 2: Native App Wrapper (Capacitor / WebView) — Best for App Stores](#option-2-native-app-wrapper-capacitor--webview)
   - [Option 3: Dedicated Native Mobile App (React Native / Expo)](#option-3-dedicated-native-mobile-app-react-native--expo)
8. [Admin Controls & Credentials](#-admin-controls--credentials)
9. [Troubleshooting & FAQs](#-troubleshooting--faqs)

---

## 💡 What is TradeXpro?

**TradeXpro** is an all-in-one financial technology (FinTech) and trading platform web application. It enables users to:
* **Trade Assets:** Place manual or automated trades across Cryptocurrency, Forex, and Stock markets with leverage.
* **Copy Expert Traders:** Automatically copy the trades of top-performing traders and share profits.
* **Buy, Sell & Mint NFTs:** Access a simplified NFT marketplace with bidding and minting gas fees.
* **Subscribe to Trading Signals:** Purchase premium signal packages to receive buying/selling recommendations via email and dashboard alerts.
* **Apply for Financial Loans:** Request loans directly from the platform, subject to admin approval.
* **Manage Wallets & Deposits:** Deposit funds via multiple crypto and fiat payment gateways, track transaction history, and request withdrawals.

Everything is managed through a central **Admin Dashboard**, giving the administrator full operational control over user balances, trade win/loss probabilities, transaction approvals, and system settings.

---

## ✨ Key Features Overview

| Module | What It Does | Key Capabilities |
| :--- | :--- | :--- |
| **📈 Trading Engine** | Allows users to open short-term or long-term positions (Buy/Sell) | • Leveraged trading (5x, 10x, 50x, etc.)<br>• Timed durations (1 min, 5 min, 1 day)<br>• Admin-configurable Win Rate Direct Probability (e.g. 70% win chance)<br>• Automated expiration & profit distribution |
| **👥 Copy Trading** | Allows beginners to duplicate expert trades automatically | • Admin adds expert profiles<br>• Profit-sharing deduction<br>• Real-time trade copying |
| **🖼️ NFT Marketplace** | Gas-based internal NFT buying/selling/bidding | • Minting requiring wallet gas fee<br>• Categorized gallery & bidding system<br>• No complex Web3 wallet required |
| **📡 Signals System** | Subscription plans for trading tips and alerts | • Admin creates TP (Take Profit) / SL (Stop Loss) signals<br>• Email & push notifications<br>• Access restricted to active plan subscribers |
| **💳 Wallet & Banking** | Deposits, withdrawals, and balance tracking | • Multi-gateway integration (Stripe, Paystack, Flutterwave, BitPay)<br>• Manual admin approval for security<br>• ROI auto-compounding investment cycles |
| **💰 Loan System** | Digital loan application engine | • Online application form<br>• Instant user credit upon admin approval<br>• Email notifications |

---

## ⚙️ How the System Works (Under the Hood)

To understand how TradeXpro runs, think of it in 3 main layers:

```
+-----------------------------------------------------------------------+
|                             USER INTERFACE                            |
|             Web Browser / Mobile View (HTML, Tailwind CSS, JS)         |
+-----------------------------------------------------------------------+
                                   │
                                   ▼
+-----------------------------------------------------------------------+
|                           LARAVEL BACKEND                             |
|    • Routes (web.php / api.php)  • Controllers (Trade, Loan, NFT)    |
|    • Admin Engine               • Scheduled Cron Jobs (process:trades)|
+-----------------------------------------------------------------------+
                                   │
                                   ▼
+-----------------------------------------------------------------------+
|                            MYSQL DATABASE                             |
|          Stores Users, Wallet Balances, Trades, NFTs, Loans          |
+-----------------------------------------------------------------------+
```

1. **User Action:** A user clicks a button (e.g., "Place Buy Trade on BTC/USD").
2. **Laravel Processing:** The request goes to a Controller ([TradeController](file:///c:/Users/AKPORHIEGBE%20SOLOMON/OneDrive/Documents/TRS/app/Http/Controllers)). Laravel checks the user's available wallet balance, verifies the trade duration, and calculates the win probability using the user's `win_rate`.
3. **Background Cron Automation:** A periodic background timer (Cron job) runs `php artisan process:trades`. When a trade's countdown timer expires, the background job checks the result, updates the user's balance automatically, and sends an alert.

### 🎲 How the Win Rate Probability Works
In TradeXpro, the `win_rate` is a number between **0 and 100** assigned by the Admin to each user:
* **Win Rate = 70:** The user has a **70% probability to WIN** trades (and a 30% chance to lose).
* **Win Rate = 20:** The user has a **20% probability to WIN** trades (and an 80% chance to lose).
* **Admin Override:** Admin can manually force any trade to be marked as WIN or LOSS at any time.

---

## 🛠️ Technology Stack Explained Simply

* **PHP 8 & Laravel 8 Framework:** The backend engine. Think of Laravel as the manager that handles database requests, user accounts, calculations, and security.
* **MySQL Database:** The digital filing cabinet that safely stores passwords, balances, trades, and logs.
* **Blade Templates:** Laravel's layout builder that generates web pages dynamically.
* **Tailwind CSS & Alpine.js:** Frontend tools that make the app look modern, sleek, interactive, and responsive on mobile screens.
* **Livewire:** Enables real-time user updates (like live timers and balance changes) without needing full page refreshes.

---

## 📁 Project Folder & Codebase Structure

Here is a simplified directory map of your codebase:

```
TRS/
├── app/                      <-- All core backend business logic
│   ├── Http/Controllers/     <-- Handles logic for Admin, Users, Trades, NFTs, Loans
│   ├── Models/               <-- Database structures (User, Trade, NFT, Loan, etc.)
│   └── Console/Commands/     <-- Background cron scripts (e.g., process:trades)
├── bootstrap/                <-- Framework startup scripts
├── config/                   <-- Configuration files (database, mail, services)
├── database/                 <-- Database schemas & migrations
├── public/                   <-- Public entry point (index.php, CSS, images, JS)
├── resources/                <-- Frontend files
│   ├── views/                <-- Web page templates (HTML/Blade)
│   └── css / js/             <-- Frontend styling & scripts
├── routes/                   <-- Web & API URL endpoints
│   ├── web.php               <-- Web page routes & Cron endpoints
│   ├── admin/                <-- Admin page routes
│   └── user/                 <-- User dashboard routes
├── storage/                  <-- Uploaded files (KYC docs, NFT images, logs)
├── .env                      <-- Secret environment configuration file
└── composer.json             <-- List of PHP backend packages used
```

---

## 💻 How to Run as a Web Application

### A. Running Locally on Your Computer (PC / Mac)

#### Prerequisites:
1. Install **PHP (v8.0 or v8.1)** (e.g., via XAMPP, Laragon, or Homebrew).
2. Install **Composer** (PHP Package Manager: https://getcomposer.org).
3. Install **Node.js & NPM** (https://nodejs.org).
4. Install a **MySQL Database** server (included in XAMPP/Laragon).

#### Step-by-Step Local Setup:
1. **Open your terminal / command prompt** in the project directory:
   ```bash
   cd "c:\Users\AKPORHIEGBE SOLOMON\OneDrive\Documents\TRS"
   ```
2. **Install PHP dependencies:**
   ```bash
   composer install
   ```
3. **Install JavaScript dependencies:**
   ```bash
   npm install
   ```
4. **Compile frontend assets:**
   ```bash
   npm run dev
   ```
5. **Configure your `.env` environment file:**
   * Make a copy of `.env.example` and name it `.env`.
   * Open `.env` and set your MySQL database details:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=tradexpro_db
     DB_USERNAME=root
     DB_PASSWORD=
     ```
6. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```
7. **Import Database:**
   * Create a database named `tradexpro_db` in PHPMyAdmin or MySQL Workbench.
   * Import the provided SQL database file (e.g. `database.sql`) into your MySQL server.
8. **Link Storage for Uploads:**
   ```bash
   php artisan storage:link
   ```
9. **Start the Local Web Server:**
   ```bash
   php artisan serve
   ```
10. **Access your site in your web browser:**
    * **User Dashboard:** `http://127.0.0.1:8000`
    * **Admin Dashboard:** `http://127.0.0.1:8000/admin/login`

---

### B. Deploying to a Live Web Server (cPanel / Hosting)

1. **Upload Files:** Upload the zip file of your codebase to your hosting account (`public_html` or sub-domain folder) via cPanel File Manager and extract it.
2. **Create MySQL Database:** In cPanel, go to *MySQL Database Wizard*, create a database & user, grant all privileges.
3. **Import Database:** Open *phpMyAdmin*, select your database, and import `database.sql`.
4. **Configure `.env` File:** Edit `.env` inside cPanel File Manager and update database details:
   ```env
   APP_URL=https://yourdomain.com
   DB_DATABASE=your_cpanel_dbname
   DB_USERNAME=your_cpanel_dbuser
   DB_PASSWORD=your_cpanel_dbpassword
   ```
5. **Setup Background Cron Jobs (Crucial for Trades & Investments):**
   In cPanel *Cron Jobs*, add the following commands:
   * **Trade Expiration Processor (Every Minute):**
     ```bash
     /usr/bin/php /home/yourusername/public_html/artisan process:trades >> /dev/null 2>&1
     ```
     *(Or set a URL Cron request to: `https://yourdomain.com/run-profit-return?key=remedy6034`)*
   * **Daily ROI Top-up:**
     ```bash
     wget -O - -q https://yourdomain.com/cron
     ```

---

## 📱 How to Run as a Mobile Application

You want to offer TradeXpro as a mobile app for iOS and Android. Here are the 3 best paths to accomplish this:

```
                     +---------------------------------------+
                     |     TradeXpro Mobile Possibilities    |
                     +---------------------------------------+
                                         │
        ┌────────────────────────────────┼────────────────────────────────┐
        ▼                                ▼                                ▼
  [Option 1: PWA]              [Option 2: Native Wrapper]       [Option 3: Full App]
• Quickest setup             • Generates .apk & .ipa          • Built with React Native
• Runs in mobile browser     • Capacitor / WebView            • Connects via Sanctum API
• Add to Home Screen         • Publishable to App Stores      • High performance
```

### Option 1: Progressive Web App (PWA) — *Fastest & Easiest*
TradeXpro's template is already designed to be fully mobile-responsive. 
* **How it works:** Users visit your website on Safari or Chrome on their phone and tap *"Add to Home Screen"*.
* **Pros:** Zero setup cost, no app store approvals needed, works on iOS & Android immediately.

### Option 2: Native App Wrapper (Capacitor / WebView) — *Recommended for App Stores*
You can convert your live web app into native Android (`.apk` / `.aab`) and iOS (`.ipa`) packages using **Ionic Capacitor** or Android Studio WebView.
* **Step 1:** Deploy your web application to a live domain (e.g., `https://yourdomain.com`).
* **Step 2:** Create an Ionic Capacitor wrapper project:
  ```bash
  npm install @capacitor/core @capacitor/cli
  npx cap init TradeXpro com.tradexpro.app --web-dir public
  npx cap add android
  npx cap add ios
  ```
* **Step 3:** Point the Capacitor configuration (`capacitor.config.json`) to your live URL (`https://yourdomain.com`).
* **Step 4:** Build the APK in Android Studio and publish it to the Google Play Store and Apple App Store!

### Option 3: Dedicated Native Mobile App (Expo / React Native)
If you want a native mobile app with separate native code:
* The backend already includes **Laravel Sanctum** API endpoints ([routes/api.php](file:///c:/Users/AKPORHIEGBE%20SOLOMON/OneDrive/Documents/TRS/routes/api.php)) for authenticating users via API.
* An Expo configuration folder (`.expo`) is present in the workspace. A mobile developer can build a React Native or Flutter frontend that connects directly to your Laravel API endpoints for login, trading, deposits, and withdrawals.

---

## 🔑 Admin Controls & Credentials

* **Admin Portal URL:** `https://yourdomain.com/admin/login`
* **Default Admin Email:** `admin@admin.com`
* **Default Admin Password:** `admin123` *(Be sure to change this immediately after setup!)*

### Admin Superpowers:
1. **User Management:** Adjust user wallet balances, verify KYC documents, toggle account status.
2. **Win Rate Control:** Adjust individual user `win_rate` (0 to 100%) to control trade winning frequency.
3. **Manual Trade Override:** Manually set any pending or active trade to **WIN** or **LOSS**.
4. **Loans & Withdrawals:** Review, approve, or reject user loan requests and withdrawal submissions.

---

## ❓ Troubleshooting & FAQs

* **Q: Why are trade timers not ending automatically?**
  * *Answer:* Ensure your Cron job is active or visit `https://yourdomain.com/run-profit-return?key=remedy6034` in your browser to trigger trade processing manually.
* **Q: How do I clear application cache after making changes?**
  * *Answer:* Visit `https://yourdomain.com/admin/clear-cache` or run `php artisan config:clear && php artisan cache:clear` in terminal.
* **Q: Can I run this without real cryptocurrency wallets for NFTs?**
  * *Answer:* Yes! TradeXpro features an off-chain Web2 simulated NFT engine. Users pay gas fees directly from their platform account balance without requiring Web3 wallets like MetaMask.

---

*Documentation generated for TradeXpro Codebase.*
#   - T r a d e X p r o - T R S - 
 
 