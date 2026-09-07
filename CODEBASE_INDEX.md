# MACHINE BASE AI - CODEBASE INDEX

**Project**: Machine Base AI - Intelligence Infrastructure Landing Page
**Domain**: machinebaseai.com
**Lead Contact**: keith@thekeithhopkins.com
**Stack**: Static HTML/CSS + PHP form handler

---

## PROJECT SUMMARY

Landing page for Machine Base AI - a B2B AI infrastructure service selling: AI Agents, AI Voice/Calling, Lead & CRM Automation, Private AI Systems, Custom Integrations, Scale Systems. Converts traffic via free AI automation audit form → email → human follow-up.

---

## FILE CLASSIFICATION

### Core Application Files

| File | Type | Purpose | Classification |
|------|------|---------|----------------|
| `index.html` | HTML | Main landing page - hero, solutions grid, methodology, contact form | **Entry Point / UI** |
| `styles.css` | CSS | All styling, responsive layout, animations, theme variables | **Presentation Layer** |
| `send.php` | PHP | Form handler - validates, sanitizes, emails lead to Keith | **Backend / API Endpoint** |
| `thank-you.html` | HTML | Post-submit confirmation page with CTA buttons | **UI / Success State** |

### Assets

| File | Type | Purpose | Classification |
|------|------|---------|----------------|
| `assets/hero.jpeg` | Image | Hero banner background (global infrastructure imagery) | **Static Asset / Brand** |
| `assets/logo.jpeg` | Image | Logo used in header & footer | **Static Asset / Brand** |

### Configuration & Docs

| File | Type | Purpose | Classification |
|------|------|---------|----------------|
| `package.json` | JSON | Node metadata, graphify dependency (unused in current static build) | **Config / Dependency Manifest** |
| `package-lock.json` | JSON | Locked dependency versions | **Config / Lockfile** |
| `README_FOR_JASON.txt` | Text | Deployment notes, architecture, recommendations | **Documentation / Ops Guide** |
| `.env` | Env | Environment variables (not tracked in git) | **Secrets / Config** |

### Infrastructure

| Path | Type | Purpose | Classification |
|------|------|---------|----------------|
| `.git/` | Dir | Git repository | **Version Control** |
| `.ox/` | Dir | Ox agent config | **Tooling** |
| `node_modules/` | Dir | npm dependencies | **Dependencies** |
| `venv/` | Dir | Python virtual env (likely for future AI backend) | **Runtime / Dev Env** |

---

## ARCHITECTURE MAP

```
Traffic (Meta Ads, Organic)
         │
         ▼
┌─────────────────────────────────────┐
│      index.html (Landing Page)      │
│  - Hero: Brand + Value Prop + CTAs  │
│  - Solutions: 6 service cards       │
│  - Method: 4-step Traffic→Revenue   │
│  - Form: POST → send.php            │
└─────────────────────────────────────┘
         │
         ▼ POST (name, business, email, phone, interest, message)
┌─────────────────────────────────────┐
│          send.php                   │
│  - Validate required fields         │
│  - Honeypot spam check (website)    │
│  - Sanitize inputs                  │
│  - mail() → keith@thekeithhopkins.com│
│  - Redirect → thank-you.html        │
└─────────────────────────────────────┘
         │
         ▼
┌─────────────────────────────────────┐
│       thank-you.html                │
│  - Confirmation + Call/WhatsApp CTAs│
└─────────────────────────────────────┘
         │
         ▼ (Future: Webhook/API)
┌─────────────────────────────────────┐
│    CRM / GHL / AI Follow-up         │
│    (Server-side, not in frontend)   │
└─────────────────────────────────────┘
```

---

## KEY PATTERNS & CONVENTIONS

### Styling (styles.css)
- **CSS Variables**: `--bg`, `--panel`, `--cyan`, `--blue`, `--text`, `--muted`
- **Mobile-first**: Breakpoints at 900px, 560px
- **Layout**: CSS Grid (3-col solutions, 4-col steps, 2-col contact)
- **Theme**: Dark navy/black, electric cyan/blue accents, premium feel

### Form Handling (send.php)
- **Method**: POST only
- **Validation**: Required (name, email, phone), email format
- **Spam**: Honeypot field `website` (hidden, must be empty)
- **Sanitization**: `clean()` strips newlines, trims
- **Email**: Plain text, From: `leads@machinebaseai.com`, Reply-To: user email
- **Response**: 302 redirect on success, 400/500 on error

### Contact CTAs (index.html + thank-you.html)
- **Call**: `tel:+12546440645` (embedded, not displayed)
- **WhatsApp**: `wa.me/12546440645` with prefilled message

---

## DEPLOYMENT CHECKLIST (from README_FOR_JASON)

- [ ] Replace `mail()` with authenticated SMTP / transactional email API
- [ ] Add server-side rate limiting / CAPTCHA / Turnstile
- [ ] Add Meta Pixel + Conversion API (fire Lead event on thank-you)
- [ ] Add Google Analytics
- [ ] UTM parameters on all ads
- [ ] POST leads to GHL/CRM via webhook (server-side)
- [ ] Keep integrations server-side (decouple from frontend)

---

## FILE SIZES (approx)

| File | Lines | Size |
|------|-------|------|
| index.html | 7 | 3.7 KB |
| styles.css | 1 | 3.7 KB |
| send.php | 15 | 743 B |
| thank-you.html | 1 | 1.3 KB |
| README_FOR_JASON.txt | 40 | 1.3 KB |

---

## FUTURE EXTENSION POINTS

1. **Backend Service**: Move form handling, CRM sync, AI follow-up to dedicated API (Node/Python)
2. **Database**: Lead storage, audit tracking
3. **Auth**: Admin dashboard for lead management
4. **AI Integration**: Automated qualification, response drafting
5. **Analytics**: Event tracking, funnel visualization