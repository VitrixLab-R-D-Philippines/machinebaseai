MACHINE BASE AI - DEPLOYMENT NOTES FOR JASON

Domain: machinebaseai.com
Public brand: Machine Base AI
Lead email: keith@thekeithhopkins.com

FILES
- index.html: landing page
- styles.css: all styling / responsive layout
- send.php: inquiry form handler
- thank-you.html: confirmation page
- assets/hero.jpeg: current Machine Base AI global banner artwork
- assets/logo.jpeg: current Machine Base AI logo artwork

CONTACT BUTTONS
- CALL KEITH uses a tel: link. The phone number is embedded in code, not printed on the page.
- WHATSAPP KEITH uses WhatsApp click-to-chat with a prefilled Machine Base AI message. Number is embedded in code, not printed on the page.

FORM
- POSTs to send.php.
- send.php sends inquiries to keith@thekeithhopkins.com.
- Current mail() implementation is a deployment fallback only. RECOMMENDED: replace with authenticated SMTP or transactional email API so delivery is reliable.
- Keep the destination email server-side, not in the visible HTML form.
- Add server-side rate limiting / CAPTCHA or Turnstile before paid ad traffic becomes heavy.
- After successful submit, redirect to thank-you.html.
- Recommended next step: also POST every lead into GHL/central CRM via webhook/API while keeping email notification immediate.

TRACKING
- Add Meta Pixel and Conversion API.
- Fire Lead event only after successful form submission / thank-you page.
- Add Google Analytics if desired.
- Use UTM parameters on every ad.

BACKEND ARCHITECTURE
Traffic -> MachineBaseAI.com -> Lead Form -> Server endpoint -> Email + CRM -> AI follow-up -> Human sales -> reporting.

Do not hard-code future automation into the front end. Keep integrations server-side or in a backend service so the website can be redesigned without breaking CRM/AI workflows.

DESIGN DIRECTION
Keep the existing brand: black/navy, electric blue/cyan, silver, Earth/global infrastructure imagery. Futuristic and premium, not cartoonish. Mobile-first because Meta ad traffic will be heavily mobile.
