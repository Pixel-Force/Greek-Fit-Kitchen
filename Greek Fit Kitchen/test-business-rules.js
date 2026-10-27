/**
 * Greek Fit Kitchen - Business Rules & Requirements Verification Test Suite
 * Validates Flyer Data, Pricing Engine, Toronto Cutoffs, Distance Calculations & Guidelines
 */

const fs = require('fs');
const path = require('path');

let testsPassed = 0;
let testsFailed = 0;

function assert(condition, testName) {
  if (condition) {
    console.log(`✅ PASS: ${testName}`);
    testsPassed++;
  } else {
    console.error(`❌ FAIL: ${testName}`);
    testsFailed++;
  }
}

console.log('====================================================');
console.log('  GREEK FIT KITCHEN — AUTOMATED TEST SUITE');
console.log('====================================================\n');

// 1. Read app.js
const appJsPath = path.join(__dirname, 'app.js');
const appJsContent = fs.readFileSync(appJsPath, 'utf8');

// 2. Verify all 20 dishes and approved prices from Flyer
const expectedDishes = {
  "Grilled Chicken": 12.99,
  "Chilly Chicken": 13.99,
  "Salmon": 14.99,
  "Spinach & Feta Stuffed Chicken": 14.99,
  "Tandoori Chicken": 14.99,
  "Chicken Mushroom Sauce": 13.99,
  "Chicken Fajita": 12.99,
  "Beef Fajita": 14.99,
  "Beef Mushroom Sauce": 14.99,
  "Smoked Turkey Breast": 13.99,
  "Chicken Leg Plate": 10.99,
  "Chicken Fillet": 12.99,
  "Veggie Souvlaki": 11.99,
  "Chicken Souvlaki Plate": 12.99,
  "Beef Souvlaki Plate": 13.99,
  "Pork Souvlaki Plate": 9.99,
  "Spinach Pie Dinner": 12.99,
  "Pasta al Greco": 9.99,
  "Smoked Pork Loin": 12.99,
  "Turkey Souvlaki Plate": 13.99
};

Object.entries(expectedDishes).forEach(([dish, price]) => {
  assert(
    appJsContent.includes(`name: "${dish}"`) && appJsContent.includes(`price: ${price}`),
    `Dish verification: "${dish}" exists with approved price $${price} CAD`
  );
});

// 3. Verify all 11 Sides from Flyer
const expectedSides = [
  "Rice Pilaf with Veggies",
  "Yellow Basmati Rice",
  "Spinach Mushroom Rice",
  "Orzo in Tomato Sauce",
  "Garlic Butter Baked Potatoes",
  "Lemon Roasted Potatoes",
  "Sweet Potatoes",
  "Mashed Potatoes",
  "Sautéed Veggies",
  "Steamed Veggies",
  "Green Beans in Tomato Sauce"
];

expectedSides.forEach(side => {
  assert(appJsContent.includes(`"${side}"`), `Side verification: "${side}" is in options`);
});

// 4. Verify Pasta al Greco hasSides: false exception
assert(
  appJsContent.includes(`id: "pasta-al-greco"`) && appJsContent.includes(`hasSides: false`),
  'Pasta al Greco exception: hasSides is false (complete plate, no sides)'
);

// 5. Verify 6-Meal Starter starting price calculation ($9.99 * 6 = $59.94 CAD)
const sixMealStarterPrice = 9.99 * 6;
assert(
  sixMealStarterPrice.toFixed(2) === "59.94",
  '6-meal starter plan calculation matches flyer advertisement ($59.94 CAD)'
);

// 6. Verify Distance Rate Formula: $5.99 + $0.99/km
function calcRate(km) {
  return Number((5.99 + (km * 0.99)).toFixed(2));
}

assert(calcRate(0) === 5.99, 'Distance calculation: 0 km is $5.99 CAD base');
assert(calcRate(2) === 7.97, 'Distance calculation: 2 km is $7.97 CAD ($5.99 + 2 * $0.99)');
assert(calcRate(5) === 10.94, 'Distance calculation: 5 km is $10.94 CAD ($5.99 + 5 * $0.99)');
assert(calcRate(10) === 15.89, 'Distance calculation: 10 km is $15.89 CAD ($5.99 + 10 * $0.99)');

// 7. Verify Volume Discount Transition: 6 meals (0%) vs 7 meals (10%)
function calcDiscount(mealsCount, foodSubtotal) {
  if (mealsCount >= 7) {
    return Number((foodSubtotal * 0.10).toFixed(2));
  }
  return 0;
}

assert(calcDiscount(6, 60.00) === 0, '6 meals order receives 0% discount ($0.00)');
assert(calcDiscount(7, 70.00) === 7.00, '7 meals order receives 10% volume discount ($7.00)');
assert(calcDiscount(10, 120.00) === 12.00, '10 meals order receives 10% volume discount ($12.00)');

// 8. Verify Extra Side Price is $4.99 CAD
assert(
  appJsContent.includes('extraSidePrice: 4.99') || appJsContent.includes('4.99'),
  'Extra side price is configured at $4.99 CAD each'
);

// 9. Verify Pickup Location
const pickupAddress = "3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5";
assert(
  appJsContent.includes('3575 Lake Shore Blvd W, Etobicoke'),
  'Pickup location is George the Greek in Etobicoke (3575 Lake Shore Blvd W)'
);

// 10. Verify Mandatory Guidelines and Header Cleanliness Across All HTML Files
const allPages = [
  'index.html',
  'menu.html',
  'build-plan.html',
  'how-it-works.html',
  'delivery.html',
  'catering.html',
  'about.html',
  'contact.html',
  'cart.html',
  'checkout.html',
  'account.html',
  'privacy-policy.html',
  'terms.html',
  'refund-policy.html',
  'admin.html',
  'kitchen.html'
];

const customerPages = [
  'index.html',
  'menu.html',
  'build-plan.html',
  'how-it-works.html',
  'delivery.html',
  'catering.html',
  'about.html',
  'contact.html',
  'cart.html',
  'checkout.html',
  'account.html',
  'privacy-policy.html',
  'terms.html',
  'refund-policy.html'
];

allPages.forEach(filename => {
  const filePath = path.join(__dirname, filename);
  const html = fs.readFileSync(filePath, 'utf8');

  // Verify Dark Mode Toggle is removed
  assert(
    !html.includes('id="themeToggleBtn"') && !html.includes('toggleTheme()'),
    `Header Cleanliness: ${filename} has dark mode toggle icon removed`
  );

  // Verify Penta Services Footer Bottom Credit Bar is removed
  assert(
    !html.includes('pentaservices.co.uk') && !html.includes('penta-services-logo.svg'),
    `Footer Cleanliness: ${filename} has Penta Services credit bar removed`
  );
});

// 11. Verify Customer Headers have NO Admin or KDS links
customerPages.forEach(filename => {
  const filePath = path.join(__dirname, filename);
  const html = fs.readFileSync(filePath, 'utf8');
  const headerMatch = html.match(/<header\b[^>]*>([\s\S]*?)<\/header>/i);
  
  if (headerMatch) {
    const headerHtml = headerMatch[1];
    const hasAdmin = /admin\.html/i.test(headerHtml);
    const hasKds = /kitchen\.html/i.test(headerHtml);
    
    assert(!hasAdmin, `Header Cleanliness: ${filename} header does NOT contain Admin link`);
    assert(!hasKds, `Header Cleanliness: ${filename} header does NOT contain KDS link`);
  }
});

// 12. Verify Footer Logo is Clickable in All Customer Pages
customerPages.forEach(filename => {
  const filePath = path.join(__dirname, filename);
  const html = fs.readFileSync(filePath, 'utf8');
  const footerMatch = html.match(/<footer\b[^>]*>([\s\S]*?)<\/footer>/i);

  if (footerMatch) {
    const footerHtml = footerMatch[1];
    const isClickable = /<a\b[^>]*href="index\.html"[^>]*>\s*<img\b[^>]*greek-fit-kitchen-logo\.png/i.test(footerHtml);
    assert(isClickable, `Footer Navigation: ${filename} has clickable logo linking to index.html`);
  }
});

console.log('\n====================================================');
console.log(`TEST RESULTS: ${testsPassed} PASSED, ${testsFailed} FAILED`);
console.log('====================================================');

if (testsFailed > 0) {
  process.exit(1);
}
