# Greek Fit Kitchen — Next-Level Healthy Meal Preparation Platform

> **"BIG GREEK FLAVOUR. ZERO MEAL PREP."**  
> Managed by **George the Greek** (3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5)  
> Powered by **Lean Meal** ([leanmeal.ca](https://leanmeal.ca))

---

## 🏛️ Executive Summary

Greek Fit Kitchen is a comprehensive, production-quality online ordering platform, customer e-commerce experience, business administration dashboard, and touchscreen kitchen display tablet purpose-built for scheduled meal-prep delivery services across Toronto and the Greater Toronto Area.

Built strictly according to official brand guidelines and flyer specifications, the platform combines the navy-and-yellow brand palette (`#101D3A` & `#F5C542`) with high-contrast typography, interactive meal builders, and real-time order synchronization.

---

## 📦 Dedicated Standalone Pages

Each page is an independent HTML file sharing the unified responsive design system and continuous reactive `localStorage` state:

1. **Home Page (`index.html`)**: Brand hero slider, core value propositions, and featured meal highlights.
2. **Full Menu (`menu.html`)**: Complete menu showcasing all 20 flyer dishes, 11 sides, category filtering, search, and nutrition tags.
3. **Build Your Plan (`build-plan.html`)**: Dedicated 6-meal minimum plan builder with live progress gauge & 10% volume discount badge.
4. **How It Works (`how-it-works.html`)**: 3-step ordering process, insulated packaging standards & FAQs.
5. **Delivery & Pickup (`delivery.html`)**: Sunday & Wednesday cutoff schedules, Etobicoke pickup, and interactive distance rate calculator ($5.99 + $0.99/km).
6. **Catering (`catering.html`)**: Group meal packages & corporate event request form.
7. **About Us (`about.html`)**: George the Greek heritage (3575 Lake Shore Blvd W) & Lean Meal culinary standards.
8. **Contact (`contact.html`)**: Customer care support ticket form and special dietary request submission.
9. **Shopping Cart (`cart.html`)**: Itemized cart review with 6-meal requirement badge, 10% volume discount, and checkout pathway.
10. **Checkout (`checkout.html`)**: 4-step streamlined order placement, fulfillment scheduling, live payment simulation & printable receipt.
11. **Customer Account (`account.html`)**: Authentication, delivery profile, and order history with 1-click reorder.
12. **Privacy Policy (`privacy-policy.html`)**: Customer privacy & PIPEDA compliance.
13. **Terms & Conditions (`terms.html`)**: Advance batch ordering, cancellation deadlines & delivery terms.
14. **Refund Policy (`refund-policy.html`)**: Freshness guarantee, cold-chain standards & cutoff refund policy.
15. **Business Administration Console (`admin.html`)**: Live revenue stats, price manager, order status advancement & CSV export.
16. **Kitchen Tablet KDS (`kitchen.html`)**: Touch-optimized 4-column prep Kanban board & thermal ticket printer slip generator.

---

## 🧪 Running the Automated Verification Tests

Ensure Node.js is installed, then run:

```bash
node test-business-rules.js
```

All 116 automated tests will execute synchronously to verify:
- All 20 flyer dishes & approved pricing
- All 11 gourmet sides & Pasta al Greco exception
- 6-meal starter plan ($59.94 CAD) & 10% discount on 7+ meals
- Distance calculation ($5.99 base + $0.99/km)
- Clean customer headers (no internal Admin/KDS links)
- Clickable footer logo on all customer pages

---

## 🚀 WordPress Theme Package

The ready-to-deploy standalone WordPress theme package is located at:
- `wordpress-theme/greek-fit-kitchen.zip`
- Root archive: `greek-fit-kitchen.zip`
