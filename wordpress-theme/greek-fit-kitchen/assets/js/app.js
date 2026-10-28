/**
 * Greek Fit Kitchen - Master Application Engine
 * "BIG GREEK FLAVOUR. ZERO MEAL PREP."
 * Managed by George the Greek (3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5)
 * Powered by Lean Meal (leanmeal.ca)
 * Designed & Developed by Penta Services (pentaservices.co.uk)
 * 
 * Production-Grade Architecture:
 * - Reactive LocalStorage DB for Menu, Orders, Inquiries, Settings & Auth
 * - Multi-Window Storage Event Synchronization (Customer Site <-> Admin <-> Kitchen Tablet)
 * - America/Toronto Delivery Cutoff Engine (Sun order by Fri 12pm, Wed order by Mon 12pm)
 * - Distance Pricing Engine: $5.99 Base + $0.99 / KM
 * - 6-Meal Starter Plan Minimum ($59.94 starting tier) & 10% Volume Discount on 7+ Meals
 * - 2 Sides Included (Except Pasta al Greco), Extra Sides +$4.99 CAD
 * - WCAG 2.2 Accessible Light/Dark Theme Switcher (Mandatory Rule 1)
 */

// ==========================================
// 0. ASSET URL RESOLVER (CDN FALLBACK ENGINE)
// ==========================================
function resolveAssetUrl(path) {
  if (!path) return "https://pixel-force.github.io/Greek-Fit-Kitchen/public/images/meals/grilled-chicken.jpg";
  if (path.startsWith("http://") || path.startsWith("https://") || path.startsWith("data:")) {
    return path;
  }
  const clean = path.replace(/^(?:\.\/|\/)?(?:public\/|assets\/)?/, "");
  if (typeof gfkConfig !== "undefined" && gfkConfig.themeUri) {
    return gfkConfig.themeUri + "/assets/" + clean;
  }
  return "https://pixel-force.github.io/Greek-Fit-Kitchen/public/" + clean;
}

// ==========================================
// 1. DEFAULT DATA: 20 MAIN DISHES FROM FLYER
// ==========================================
const DEFAULT_MENU_ITEMS = [
  {
    id: "grilled-chicken",
    name: "Grilled Chicken",
    price: 12.99,
    category: "chicken",
    image: "public/images/meals/grilled-chicken.jpg",
    description: "Tender herb-marinated chicken breast flame-grilled with Greek oregano, garlic, and extra virgin olive oil.",
    calories: 420,
    protein: "48g",
    carbs: "18g",
    fat: "9g",
    popular: true,
    hasSides: true,
    inStock: true
  },
  {
    id: "chilly-chicken",
    name: "Chilly Chicken",
    price: 13.99,
    category: "chicken",
    image: "public/images/meals/chilly-chicken.jpg",
    description: "Lean chicken breast tossed in a zesty Mediterranean chili and herb glaze for a vibrant metabolic kick.",
    calories: 430,
    protein: "46g",
    carbs: "22g",
    fat: "10g",
    popular: false,
    hasSides: true,
    inStock: true
  },
  {
    id: "salmon",
    name: "Salmon",
    price: 14.99,
    category: "fish",
    image: "public/images/meals/salmon.jpg",
    description: "Pan-seared Atlantic salmon fillet with sea salt, cracked black pepper, oregano, and fresh lemon essence.",
    calories: 490,
    protein: "44g",
    carbs: "14g",
    fat: "18g",
    popular: true,
    hasSides: true,
    inStock: true
  },
  {
    id: "spinach-feta-chicken",
    name: "Spinach & Feta Stuffed Chicken",
    price: 14.99,
    category: "chicken",
    image: "public/images/meals/spinach-feta-chicken.jpg",
    description: "Lean chicken breast stuffed with authentic Greek feta, wilted baby spinach, and roasted garlic cloves.",
    calories: 470,
    protein: "51g",
    carbs: "15g",
    fat: "13g",
    popular: true,
    hasSides: true,
    inStock: true
  },
  {
    id: "tandoori-chicken",
    name: "Tandoori Chicken",
    price: 14.99,
    category: "chicken",
    image: "public/images/meals/tandoori-chicken.jpg",
    description: "Greek-yogurt and aromatic spice-marinated chicken fillet, roasted tender with caramelized edges.",
    calories: 440,
    protein: "47g",
    carbs: "16g",
    fat: "11g",
    popular: false,
    hasSides: true,
    inStock: true
  },
  {
    id: "chicken-mushroom",
    name: "Chicken Mushroom Sauce",
    price: 13.99,
    category: "chicken",
    image: "public/images/meals/chicken-mushroom.jpg",
    description: "Succulent chicken breast smothered in a savory, simmered cremini mushroom reduction with Greek herbs.",
    calories: 450,
    protein: "47g",
    carbs: "19g",
    fat: "12g",
    popular: false,
    hasSides: true,
    inStock: true
  },
  {
    id: "chicken-fajita",
    name: "Chicken Fajita",
    price: 12.99,
    category: "chicken",
    image: "public/images/meals/chicken-fajita.jpg",
    description: "Sliced grilled chicken breast sautéed with sweet bell peppers, red onions, and smoky Mediterranean spices.",
    calories: 410,
    protein: "45g",
    carbs: "20g",
    fat: "9g",
    popular: false,
    hasSides: true,
    inStock: true
  },
  {
    id: "beef-fajita",
    name: "Beef Fajita",
    price: 14.99,
    category: "beef",
    image: "public/images/meals/beef-fajita.jpg",
    description: "Char-broiled strips of tender Canadian flank beef seared with colorful sweet peppers and charred sweet onions.",
    calories: 480,
    protein: "44g",
    carbs: "19g",
    fat: "16g",
    popular: false,
    hasSides: true,
    inStock: true
  },
  {
    id: "beef-mushroom",
    name: "Beef Mushroom Sauce",
    price: 14.99,
    category: "beef",
    image: "public/images/meals/beef-mushroom.jpg",
    description: "Slow-braised lean beef medallions topped with a rich garlic mushroom glaze and garden fresh parsley.",
    calories: 510,
    protein: "46g",
    carbs: "17g",
    fat: "18g",
    popular: true,
    hasSides: true,
    inStock: true
  },
  {
    id: "smoked-turkey",
    name: "Smoked Turkey Breast",
    price: 13.99,
    category: "other",
    image: "public/images/meals/smoked-turkey.jpg",
    description: "Naturally hardwood-smoked lean turkey breast carved into tender slices with fragrant rosemary jus.",
    calories: 390,
    protein: "50g",
    carbs: "14g",
    fat: "7g",
    popular: false,
    hasSides: true,
    inStock: true
  },
  {
    id: "chicken-leg",
    name: "Chicken Leg Plate",
    price: 10.99,
    category: "chicken",
    image: "public/images/meals/chicken-leg.jpg",
    description: "Slow-roasted bone-in chicken leg quarters seasoned with aromatic garlic, wild thyme, and fresh lemon.",
    calories: 460,
    protein: "42g",
    carbs: "12g",
    fat: "14g",
    popular: false,
    hasSides: true,
    inStock: true
  },
  {
    id: "chicken-fillet",
    name: "Chicken Fillet",
    price: 12.99,
    category: "chicken",
    image: "public/images/meals/chicken-fillet.jpg",
    description: "Ultra-lean grilled chicken breast fillet prepared simply with Greek lemon, sea salt, and extra virgin olive oil.",
    calories: 400,
    protein: "49g",
    carbs: "14g",
    fat: "8g",
    popular: false,
    hasSides: true,
    inStock: true
  },
  {
    id: "veggie-souvlaki",
    name: "Veggie Souvlaki",
    price: 11.99,
    category: "vegetarian",
    image: "public/images/meals/veggie-souvlaki.jpg",
    description: "Skewered char-grilled zucchini, bell peppers, cremini mushrooms, and red onions with Greek herb marinade.",
    calories: 320,
    protein: "14g",
    carbs: "34g",
    fat: "8g",
    popular: false,
    hasSides: true,
    inStock: true
  },
  {
    id: "chicken-souvlaki",
    name: "Chicken Souvlaki Plate",
    price: 12.99,
    category: "chicken",
    image: "public/images/meals/chicken-souvlaki.jpg",
    description: "Traditional skewers of cubed chicken breast marinated in lemon, garlic, white wine, and Greek mountain oregano.",
    calories: 430,
    protein: "48g",
    carbs: "16g",
    fat: "10g",
    popular: true,
    hasSides: true,
    inStock: true
  },
  {
    id: "beef-souvlaki",
    name: "Beef Souvlaki Plate",
    price: 13.99,
    category: "beef",
    image: "public/images/meals/beef-souvlaki.jpg",
    description: "Tender sirloin steak skewers grilled over open flame with extra virgin olive oil and fragrant spices.",
    calories: 470,
    protein: "45g",
    carbs: "15g",
    fat: "15g",
    popular: true,
    hasSides: true,
    inStock: true
  },
  {
    id: "pork-souvlaki",
    name: "Pork Souvlaki Plate",
    price: 9.99,
    category: "pork",
    image: "public/images/meals/pork-souvlaki.jpg",
    description: "Authentic Greek street-style marinated pork tenderloin skewers with vibrant lemon and crushed oregano.",
    calories: 440,
    protein: "43g",
    carbs: "14g",
    fat: "13g",
    popular: true,
    hasSides: true,
    inStock: true
  },
  {
    id: "spinach-pie",
    name: "Spinach Pie Dinner",
    price: 12.99,
    category: "vegetarian",
    image: "public/images/meals/spinach-pie.jpg",
    description: "Traditional homemade Spanakopita with flaky phyllo pastry, organic baby spinach, scallions, and sheep's milk feta.",
    calories: 450,
    protein: "18g",
    carbs: "42g",
    fat: "22g",
    popular: false,
    hasSides: true,
    inStock: true
  },
  {
    id: "pasta-al-greco",
    name: "Pasta al Greco",
    price: 9.99,
    category: "other",
    image: "public/images/meals/pasta-al-greco.jpg",
    description: "Penne pasta tossed in rich Greek roasted tomato sauce, virgin olive oil, fragrant basil, and crumbled sheep's feta. (Complete dish — no sides included).",
    calories: 460,
    protein: "16g",
    carbs: "68g",
    fat: "12g",
    popular: false,
    hasSides: false, // EXPLICIT EXCEPTION FROM FLYER
    inStock: true
  },
  {
    id: "smoked-pork-loin",
    name: "Smoked Pork Loin",
    price: 12.99,
    category: "pork",
    image: "public/images/meals/smoked-pork-loin.jpg",
    description: "Tender center-cut pork loin, lightly smoked with natural applewood and served with aromatic citrus jus.",
    calories: 460,
    protein: "46g",
    carbs: "14g",
    fat: "13g",
    popular: false,
    hasSides: true,
    inStock: true
  },
  {
    id: "turkey-souvlaki",
    name: "Turkey Souvlaki Plate",
    price: 13.99,
    category: "other",
    image: "public/images/meals/turkey-souvlaki.jpg",
    description: "Lean cubed turkey breast skewers flame-broiled with lemon, garlic, Greek sea salt, and extra virgin olive oil.",
    calories: 410,
    protein: "49g",
    carbs: "14g",
    fat: "8g",
    popular: false,
    hasSides: true,
    inStock: true
  }
];

// ==========================================
// 2. DEFAULT DATA: 11 SIDES FROM FLYER
// ==========================================
const DEFAULT_SIDES = [
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

// ==========================================
// 3. BUSINESS SETTINGS CONFIGURATION
// ==========================================
const DEFAULT_SETTINGS = {
  businessName: "Greek Fit Kitchen",
  tagline: "BIG GREEK FLAVOUR. ZERO MEAL PREP.",
  manager: "George the Greek",
  pickupAddress: "3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5, Canada",
  poweredBy: "Lean Meal (leanmeal.ca)",
  currency: "CAD",
  currencySymbol: "$",
  minMeals: 6,
  minMealStartingPrice: 59.94,
  volumeDiscountThreshold: 7,
  volumeDiscountRate: 0.10, // 10% OFF on 7+ meals
  extraSidePrice: 4.99, // CAD
  includedSidesCount: 2,
  deliveryBaseFee: 5.99, // CAD
  deliveryPerKm: 0.99,   // CAD / km
  taxRate: 0.13,         // Ontario HST 13%
  taxInclusive: false,
  timezone: "America/Toronto",
  sundayCutoffDay: "Friday",
  sundayCutoffTime: "12:00", // 12pm noon
  wednesdayCutoffDay: "Monday",
  wednesdayCutoffTime: "12:00" // 12pm noon
};

// ==========================================
// 4. STORAGE ACCESSORS (Reactive Central DB)
// ==========================================
function getStoredMenu() {
  try {
    const raw = localStorage.getItem("gfk_menu_items");
    const items = raw ? JSON.parse(raw) : DEFAULT_MENU_ITEMS;
    return items.map(item => ({
      ...item,
      image: resolveAssetUrl(item.image)
    }));
  } catch (e) {
    return DEFAULT_MENU_ITEMS.map(item => ({
      ...item,
      image: resolveAssetUrl(item.image)
    }));
  }
}

function saveStoredMenu(items) {
  localStorage.setItem("gfk_menu_items", JSON.stringify(items));
  window.dispatchEvent(new Event("gfk_menu_updated"));
}

function getStoredSettings() {
  try {
    const raw = localStorage.getItem("gfk_settings");
    return raw ? { ...DEFAULT_SETTINGS, ...JSON.parse(raw) } : DEFAULT_SETTINGS;
  } catch (e) {
    return DEFAULT_SETTINGS;
  }
}

function saveStoredSettings(settings) {
  localStorage.setItem("gfk_settings", JSON.stringify(settings));
  window.dispatchEvent(new Event("gfk_settings_updated"));
}

function getStoredOrders() {
  try {
    const raw = localStorage.getItem("gfk_orders");
    return raw ? JSON.parse(raw) : [];
  } catch (e) {
    return [];
  }
}

function saveStoredOrders(orders) {
  localStorage.setItem("gfk_orders", JSON.stringify(orders));
  window.dispatchEvent(new Event("gfk_orders_updated"));
}

// ==========================================
// 5. APPLICATION STATE
// ==========================================
let currentMenu = getStoredMenu();
let currentSettings = getStoredSettings();
let cart = loadCart();
let selectedCategory = "all";
let searchKeyword = "";
let currentCustomizingMeal = null;
let deliveryMethod = "delivery"; // "delivery" | "pickup"
let calculatedDistanceKm = 5.0;  // default 5km
let calculatedDeliveryFee = 10.94; // 5.99 + (5 * 0.99)
let currentUser = loadUser();

// ==========================================
// 6. THEME CONTROLLER (MANDATORY RULE 1)
// ==========================================
function initTheme() {
  const savedTheme = localStorage.getItem("gfk_theme");
  const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
  
  if (savedTheme === "dark" || (!savedTheme && prefersDark)) {
    document.documentElement.classList.add("dark");
  } else {
    document.documentElement.classList.remove("dark");
  }
  updateThemeIcons();
}

function toggleTheme() {
  const isDark = document.documentElement.classList.toggle("dark");
  localStorage.setItem("gfk_theme", isDark ? "dark" : "light");
  updateThemeIcons();
}

function updateThemeIcons() {
  const isDark = document.documentElement.classList.contains("dark");
  const buttons = document.querySelectorAll("#themeToggleBtn, .theme-toggle-btn");
  
  buttons.forEach(btn => {
    // When in light mode: display Crescent Moon icon (to switch to dark)
    // When in dark mode: display Sun icon (to switch to light)
    if (isDark) {
      btn.innerHTML = `
        <svg class="w-5 h-5 text-greek-gold transition-transform duration-300 transform rotate-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 9h-1m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
        </svg>
      `;
      btn.setAttribute("title", "Switch to Light Mode");
    } else {
      btn.innerHTML = `
        <svg class="w-5 h-5 text-white transition-transform duration-300 transform -rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
        </svg>
      `;
      btn.setAttribute("title", "Switch to Dark Mode");
    }
  });
}

// ==========================================
// 7. AMERICA/TORONTO DELIVERY CUTOFF ENGINE
// ==========================================
function getTorontoTime() {
  const now = new Date();
  const torontoStr = now.toLocaleString("en-US", { timeZone: "America/Toronto" });
  return new Date(torontoStr);
}

function calculateNextCutoff() {
  const toronto = getTorontoTime();
  const day = toronto.getDay(); // 0: Sun, 1: Mon, 2: Tue, 3: Wed, 4: Thu, 5: Fri, 6: Sat
  const hour = toronto.getHours();
  const minute = toronto.getMinutes();
  
  // Cutoffs:
  // Sunday delivery: Order by Friday 12:00 PM (noon)
  // Wednesday delivery: Order by Monday 12:00 PM (noon)

  let nextBatch = "";
  let cutoffText = "";
  let hoursRemaining = 0;
  let targetDate = new Date(toronto);

  // Determine current window
  // If before Friday 12:00pm, next delivery is upcoming Sunday
  if (day < 5 || (day === 5 && hour < 12)) {
    nextBatch = "Upcoming Sunday Batch";
    cutoffText = "Sunday Delivery — Order by Friday, 12 p.m.";
    const daysUntilFriday = (5 - day);
    targetDate.setDate(toronto.getDate() + daysUntilFriday);
    targetDate.setHours(12, 0, 0, 0);
  } 
  // If after Friday 12:00pm and before Monday 12:00pm, next delivery is upcoming Wednesday
  else if (day === 5 || day === 6 || day === 0 || (day === 1 && hour < 12)) {
    nextBatch = "Upcoming Wednesday Batch";
    cutoffText = "Wednesday Delivery — Order by Monday, 12 p.m.";
    let daysUntilMonday = 0;
    if (day === 5) daysUntilMonday = 3;
    else if (day === 6) daysUntilMonday = 2;
    else if (day === 0) daysUntilMonday = 1;
    else if (day === 1) daysUntilMonday = 0;
    
    targetDate.setDate(toronto.getDate() + daysUntilMonday);
    targetDate.setHours(12, 0, 0, 0);
  } 
  // If after Monday 12:00pm and before Friday 12:00pm, next delivery is upcoming Sunday
  else {
    nextBatch = "Upcoming Sunday Batch";
    cutoffText = "Sunday Delivery — Order by Friday, 12 p.m.";
    const daysUntilFriday = (5 - day);
    targetDate.setDate(toronto.getDate() + daysUntilFriday);
    targetDate.setHours(12, 0, 0, 0);
  }

  const diffMs = targetDate.getTime() - toronto.getTime();
  const totalHours = Math.max(0, Math.floor(diffMs / (1000 * 60 * 60)));
  const totalMins = Math.max(0, Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60)));
  const totalSecs = Math.max(0, Math.floor((diffMs % (1000 * 60)) / 1000));

  return {
    nextBatch,
    cutoffText,
    totalHours,
    totalMins,
    totalSecs,
    targetDate
  };
}

function updateCutoffCountdown() {
  const cutoff = calculateNextCutoff();
  const cutoffEls = document.querySelectorAll("#cutoffCountdown, .cutoff-countdown");
  
  cutoffEls.forEach(el => {
    el.innerHTML = `
      <span class="inline-block w-2 h-2 rounded-full bg-greek-lime animate-pulse mr-1"></span>
      <span class="font-bold text-greek-gold">${cutoff.cutoffText}</span>
      <span class="text-white/80 font-mono text-[10px] ml-1.5 bg-black/40 px-2 py-0.5 rounded border border-white/10">
        ${cutoff.totalHours}h ${cutoff.totalMins}m ${cutoff.totalSecs}s left
      </span>
    `;
  });

  const checkoutCutoffEl = document.getElementById("checkoutCutoffNotice");
  if (checkoutCutoffEl) {
    checkoutCutoffEl.innerHTML = `
      <div>
        <strong class="text-greek-gold block">${cutoff.nextBatch} Guaranteed</strong>
        <span class="text-[11px] text-white/80">${cutoff.cutoffText} (Toronto Local Time)</span>
      </div>
    `;
  }
}

// ==========================================
// 8. MENU RENDERING, SEARCH & CATEGORIES
// ==========================================
function renderMenuGrid() {
  const container = document.getElementById("menuGrid");
  if (!container) return;

  currentMenu = getStoredMenu();

  const allowedIdsStr = container.getAttribute("data-allowed-ids");
  const allowedIds = allowedIdsStr ? allowedIdsStr.split(",").filter(Boolean) : null;
  const allowedCatsStr = container.getAttribute("data-allowed-cats");
  const allowedCats = allowedCatsStr ? allowedCatsStr.split(",").filter(Boolean) : null;

  let filtered = currentMenu.filter(item => {
    if (allowedIds && allowedIds.length > 0 && !allowedIds.includes(item.id)) {
      return false;
    }
    if (allowedCats && allowedCats.length > 0 && !allowedCats.includes(item.category)) {
      return false;
    }
    const matchCategory = selectedCategory === "all" || item.category === selectedCategory;
    const matchSearch = item.name.toLowerCase().includes(searchKeyword.toLowerCase()) ||
                        (item.description && item.description.toLowerCase().includes(searchKeyword.toLowerCase()));
    return matchCategory && matchSearch;
  });

  if (filtered.length === 0) {
    container.innerHTML = `
      <div class="col-span-full py-12 text-center text-slate-500 dark:text-slate-400">
        <p class="text-lg font-bold">No meals found matching "${searchKeyword}".</p>
        <button onclick="resetMenuFilters()" class="mt-3 px-4 py-2 btn-gold rounded-xl text-xs font-bold">
          View All Meals
        </button>
      </div>
    `;
    return;
  }

  container.innerHTML = filtered.map(meal => {
    const isPasta = !meal.hasSides;
    const sideBadge = isPasta
      ? `<span class="bg-white text-amber-800 text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-md border border-amber-300">Complete Plate (No Sides)</span>`
      : `<span class="bg-white text-[#101D3A] text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-md border border-slate-200">2 Sides Included</span>`;

    const mealImg = resolveAssetUrl(meal.image);
    const fallbackImg = "https://pixel-force.github.io/Greek-Fit-Kitchen/public/images/meals/grilled-chicken.jpg";

    return `
      <div class="meal-card group bg-white dark:bg-[#101D3A] rounded-2xl border border-slate-200 dark:border-white/10 overflow-hidden flex flex-col justify-between shadow-sm transition-all duration-300">
        <div class="relative overflow-hidden h-44 sm:h-48 md:aspect-[4/3] bg-slate-100 dark:bg-slate-800">
          <img 
            src="${mealImg}" 
            alt="${meal.name}" 
            loading="lazy"
            onerror="this.onerror=null; this.src='${fallbackImg}';"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          />
          <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
            ${sideBadge}
            ${meal.popular ? `<span class="bg-greek-gold text-greek-navy text-[10px] font-black px-2 py-0.5 rounded-full shadow-sm">Popular</span>` : ''}
          </div>
          <div class="absolute bottom-3 right-3 bg-greek-navy/90 text-white font-mono font-black text-sm px-2.5 py-1 rounded-xl shadow-lg border border-white/10">
            $${meal.price.toFixed(2)} <span class="text-[10px] font-normal text-greek-gold">CAD</span>
          </div>
        </div>

        <div class="p-4 sm:p-5 flex-1 flex flex-col justify-between">
            <div>
              <div class="flex items-start justify-between gap-2">
                <h3 class="text-sm sm:text-base font-black text-greek-navy dark:text-white group-hover:text-greek-gold transition-colors leading-tight break-words">
                  ${meal.name}
                </h3>
              </div>
              <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2 leading-relaxed">
                ${meal.description || 'Authentic Mediterranean meal prep prepared fresh for scheduled delivery.'}
              </p>
            </div>

            <!-- Nutrition Pill Strip -->
            <div class="flex flex-wrap items-center gap-1.5 sm:gap-2 text-[10px] font-semibold text-slate-500 dark:text-slate-400 pt-3 border-t border-slate-100 dark:border-white/5 mt-4">
              <span class="bg-slate-100 dark:bg-white/5 px-2 py-0.5 rounded">${meal.calories} kcal</span>
              <span class="bg-slate-100 dark:bg-white/5 px-2 py-0.5 rounded text-greek-navy dark:text-greek-gold font-bold">${meal.protein} protein</span>
              <span class="bg-slate-100 dark:bg-white/5 px-2 py-0.5 rounded">${meal.carbs} carbs</span>
            </div>

            <div class="grid grid-cols-2 gap-2 mt-4">
              <button 
                type="button"
                onclick="openMealDetailModal('${meal.id}')"
                class="w-full py-2.5 rounded-xl border border-slate-200 dark:border-white/20 text-xs font-bold text-greek-navy dark:text-white hover:bg-slate-100 dark:hover:bg-white/10 transition text-center"
              >
                Details
              </button>
              <button 
                type="button"
                onclick="openSideCustomizer('${meal.id}')"
                class="w-full py-2.5 px-1 btn-gold rounded-xl text-xs font-black transition flex items-center justify-center gap-1 shadow text-center"
              >
                <span class="truncate">${meal.hasSides ? 'Choose Sides' : 'Add to Plan'}</span>
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
              </button>
            </div>
        </div>
      </div>
    `;
  }).join("");
}

function filterMenuCategory(category) {
  selectedCategory = category;
  const buttons = document.querySelectorAll(".menu-cat-btn");
  buttons.forEach(btn => {
    if (btn.getAttribute("data-cat") === category) {
      btn.className = "menu-cat-btn px-4 py-2 rounded-xl text-xs font-black bg-greek-navy text-white dark:bg-greek-gold dark:text-greek-navy transition shadow";
    } else {
      btn.className = "menu-cat-btn px-4 py-2 rounded-xl text-xs font-bold text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-white/10 transition";
    }
  });
  renderMenuGrid();
}

function handleMenuSearch(val) {
  searchKeyword = val.trim();
  renderMenuGrid();
}

function resetMenuFilters() {
  selectedCategory = "all";
  searchKeyword = "";
  const input = document.getElementById("menuSearchInput");
  if (input) input.value = "";
  filterMenuCategory("all");
}

// ==========================================
// 9. SIDE CUSTOMIZATION & MEAL DETAIL MODAL
// ==========================================
function openSideCustomizer(mealId) {
  const meal = currentMenu.find(m => m.id === mealId);
  if (!meal) return;

  currentCustomizingMeal = meal;

  const modal = document.getElementById("sideModal");
  if (!modal) return;

  const modalImg = document.getElementById("modalMealImg");
  if (modalImg) {
    modalImg.src = resolveAssetUrl(meal.image);
    modalImg.onerror = function() {
      this.onerror = null;
      this.src = "https://pixel-force.github.io/Greek-Fit-Kitchen/public/images/meals/grilled-chicken.jpg";
    };
  }
  document.getElementById("modalMealName").innerText = meal.name;
  document.getElementById("modalMealPrice").innerText = `$${meal.price.toFixed(2)} CAD`;
  document.getElementById("modalMealDesc").innerText = meal.description || "";

  const sidesContainer = document.getElementById("sidesSelectionSection");
  const pastaNotice = document.getElementById("pastaAlGrecoNotice");

  if (!meal.hasSides) {
    // Pasta al Greco exception
    if (sidesContainer) sidesContainer.classList.add("hidden");
    if (pastaNotice) pastaNotice.classList.remove("hidden");
  } else {
    if (sidesContainer) sidesContainer.classList.remove("hidden");
    if (pastaNotice) pastaNotice.classList.add("hidden");
    renderSideOptions();
  }

  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeSideModal() {
  const modal = document.getElementById("sideModal");
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
  currentCustomizingMeal = null;
}

function renderSideOptions() {
  const side1Container = document.getElementById("side1Options");
  const side2Container = document.getElementById("side2Options");
  const extraSidesContainer = document.getElementById("extraSidesOptions");

  if (!side1Container || !side2Container) return;

  // Side 1 Radio List
  side1Container.innerHTML = DEFAULT_SIDES.map((side, idx) => `
    <label class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-white/10 hover:border-greek-gold cursor-pointer transition text-xs">
      <input type="radio" name="modalSide1" value="${side}" ${idx === 0 ? 'checked' : ''} class="text-greek-gold focus:ring-greek-gold" />
      <span class="text-slate-800 dark:text-slate-200 font-medium">${side}</span>
    </label>
  `).join("");

  // Side 2 Radio List
  side2Container.innerHTML = DEFAULT_SIDES.map((side, idx) => `
    <label class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-white/10 hover:border-greek-gold cursor-pointer transition text-xs">
      <input type="radio" name="modalSide2" value="${side}" ${idx === 4 ? 'checked' : ''} class="text-greek-gold focus:ring-greek-gold" />
      <span class="text-slate-800 dark:text-slate-200 font-medium">${side}</span>
    </label>
  `).join("");

  // Extra Sides Checkboxes (+$4.99 each)
  if (extraSidesContainer) {
    extraSidesContainer.innerHTML = DEFAULT_SIDES.map(side => `
      <label class="flex items-center justify-between p-2.5 rounded-xl border border-slate-200 dark:border-white/10 hover:border-greek-gold cursor-pointer transition text-xs">
        <div class="flex items-center gap-2">
          <input type="checkbox" name="modalExtraSides" value="${side}" onchange="updateCustomizerTotal()" class="text-greek-gold rounded focus:ring-greek-gold" />
          <span class="text-slate-800 dark:text-slate-200 font-medium">${side}</span>
        </div>
        <span class="text-[11px] font-black text-greek-lime dark:text-greek-gold font-mono">+$4.99</span>
      </label>
    `).join("");
  }

  updateCustomizerTotal();
}

function updateCustomizerTotal() {
  if (!currentCustomizingMeal) return;
  const extraChecked = document.querySelectorAll("input[name='modalExtraSides']:checked");
  const extraCount = extraChecked.length;
  const extraPrice = extraCount * currentSettings.extraSidePrice;
  const total = currentCustomizingMeal.price + extraPrice;

  const btn = document.getElementById("confirmAddCustomMealBtn");
  if (btn) {
    btn.innerHTML = `
      <span>Add to Plan · $${total.toFixed(2)} CAD</span>
    `;
  }
}

function confirmAddCustomMeal() {
  if (!currentCustomizingMeal) return;

  let side1 = null;
  let side2 = null;
  let extraSides = [];

  if (currentCustomizingMeal.hasSides) {
    const s1 = document.querySelector("input[name='modalSide1']:checked");
    const s2 = document.querySelector("input[name='modalSide2']:checked");
    side1 = s1 ? s1.value : DEFAULT_SIDES[0];
    side2 = s2 ? s2.value : DEFAULT_SIDES[1];

    const extraCheckboxes = document.querySelectorAll("input[name='modalExtraSides']:checked");
    extraCheckboxes.forEach(cb => extraSides.push(cb.value));
  }

  const notes = document.getElementById("modalMealNotes")?.value || "";

  addItemToCart(currentCustomizingMeal, side1, side2, extraSides, notes);
  closeSideModal();
  showToast(`Added ${currentCustomizingMeal.name} to your plan.`);
  openCartDrawer();
}

// Meal Detail Modal (Comprehensive nutritional overview)
function openMealDetailModal(mealId) {
  const meal = currentMenu.find(m => m.id === mealId);
  if (!meal) return;

  let modal = document.getElementById("mealDetailModal");
  if (!modal) {
    modal = document.createElement("div");
    modal.id = "mealDetailModal";
    modal.className = "fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/80 backdrop-blur-sm overflow-y-auto";
    document.body.appendChild(modal);
  }

  modal.innerHTML = `
    <div class="bg-white dark:bg-[#101D3A] rounded-3xl max-w-xl w-full p-6 sm:p-8 shadow-2xl border border-slate-200 dark:border-white/10 my-8">
      <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-white/10">
        <div>
          <span class="text-[10px] font-black uppercase text-greek-gold tracking-wider">Chef Prepared Meal Details</span>
          <h3 class="text-2xl font-black text-greek-navy dark:text-white">${meal.name}</h3>
        </div>
        <button onclick="closeMealDetailModal()" class="text-slate-400 hover:text-white text-2xl font-bold p-1">
          &times;
        </button>
      </div>

      <div class="my-4 rounded-2xl overflow-hidden aspect-[16/9] bg-slate-100 dark:bg-slate-800">
        <img src="${resolveAssetUrl(meal.image)}" alt="${meal.name}" onerror="this.onerror=null; this.src='https://pixel-force.github.io/Greek-Fit-Kitchen/public/images/meals/grilled-chicken.jpg';" class="w-full h-full object-cover" />
      </div>

      <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed mb-4">
        ${meal.description || 'Authentic Greek recipes prepared with clean olive oil, garlic, and Mediterranean spices.'}
      </p>

      <div class="grid grid-cols-4 gap-2 text-center p-3 rounded-2xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 mb-4 text-xs">
        <div>
          <span class="block text-slate-400 text-[10px]">Calories</span>
          <strong class="font-bold text-greek-navy dark:text-white">${meal.calories}</strong>
        </div>
        <div>
          <span class="block text-slate-400 text-[10px]">Protein</span>
          <strong class="font-bold text-greek-lime">${meal.protein}</strong>
        </div>
        <div>
          <span class="block text-slate-400 text-[10px]">Carbs</span>
          <strong class="font-bold text-greek-navy dark:text-white">${meal.carbs}</strong>
        </div>
        <div>
          <span class="block text-slate-400 text-[10px]">Fat</span>
          <strong class="font-bold text-greek-navy dark:text-white">${meal.fat}</strong>
        </div>
      </div>

      <div class="flex items-center justify-between pt-4 border-t border-slate-200 dark:border-white/10">
        <div>
          <span class="text-[10px] text-slate-400 block">Single Serving Price</span>
          <span class="text-xl font-black text-greek-gold font-mono">$${meal.price.toFixed(2)} CAD</span>
        </div>
        <button 
          onclick="closeMealDetailModal(); openSideCustomizer('${meal.id}')"
          class="px-6 py-3 btn-gold rounded-xl font-black text-xs shadow-lg flex items-center gap-2"
        >
          <span>Customize &amp; Add</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </button>
      </div>
    </div>
  `;

  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeMealDetailModal() {
  const modal = document.getElementById("mealDetailModal");
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
}

// ==========================================
// 10. CART ENGINE, 6-MEAL MINIMUM & 10% DISCOUNT
// ==========================================
function loadCart() {
  try {
    const raw = localStorage.getItem("gfk_cart");
    return raw ? JSON.parse(raw) : [];
  } catch (e) {
    return [];
  }
}

function saveCart() {
  localStorage.setItem("gfk_cart", JSON.stringify(cart));
  window.dispatchEvent(new Event("gfk_cart_updated"));
}

function addItemToCart(meal, side1, side2, extraSides = [], notes = "") {
  const extraPrice = (extraSides.length || 0) * currentSettings.extraSidePrice;
  const unitPrice = meal.price + extraPrice;

  const cartItem = {
    cartItemId: "item_" + Date.now() + "_" + Math.random().toString(36).substr(2, 5),
    mealId: meal.id,
    name: meal.name,
    basePrice: meal.price,
    extraSidesPrice: extraPrice,
    unitPrice: unitPrice,
    quantity: 1,
    image: meal.image,
    side1: side1,
    side2: side2,
    extraSides: extraSides,
    notes: notes,
    hasSides: meal.hasSides
  };

  cart.push(cartItem);
  saveCart();
  renderCartDrawer();
  updateMealPlanBuilderUI();
}

function removeCartItem(cartItemId) {
  cart = cart.filter(item => item.cartItemId !== cartItemId);
  saveCart();
  renderCartDrawer();
  updateMealPlanBuilderUI();
  showToast("Meal removed from plan.");
}

function updateCartItemQty(cartItemId, delta) {
  const item = cart.find(it => it.cartItemId === cartItemId);
  if (!item) return;

  item.quantity += delta;
  if (item.quantity <= 0) {
    removeCartItem(cartItemId);
    return;
  }

  saveCart();
  renderCartDrawer();
  updateMealPlanBuilderUI();
}

function clearCart() {
  cart = [];
  saveCart();
  renderCartDrawer();
  updateMealPlanBuilderUI();
}

function getCartCalculations() {
  let totalMealsCount = 0;
  let foodSubtotal = 0;
  let extraSidesSubtotal = 0;

  cart.forEach(item => {
    totalMealsCount += item.quantity;
    foodSubtotal += (item.basePrice * item.quantity);
    extraSidesSubtotal += (item.extraSidesPrice * item.quantity);
  });

  const grossFood = foodSubtotal + extraSidesSubtotal;

  // 10% Multi-Meal Volume Discount:
  // APPLIES ONLY ON 7 OR MORE MEALS (6 meals: 0% discount, 7+ meals: 10% discount on foodSubtotal)
  const isMinMealsMet = totalMealsCount >= currentSettings.minMeals;
  const hasVolumeDiscount = totalMealsCount >= currentSettings.volumeDiscountThreshold;
  const discountAmount = hasVolumeDiscount ? Number((foodSubtotal * currentSettings.volumeDiscountRate).toFixed(2)) : 0;
  const netFood = grossFood - discountAmount;

  // Delivery fee calculation
  const deliveryFee = deliveryMethod === "pickup" ? 0 : calculatedDeliveryFee;

  // Ontario HST (13%)
  const taxableAmount = netFood + deliveryFee;
  const taxAmount = Number((taxableAmount * currentSettings.taxRate).toFixed(2));
  const grandTotal = Number((netFood + deliveryFee + taxAmount).toFixed(2));

  return {
    totalMealsCount,
    foodSubtotal,
    extraSidesSubtotal,
    grossFood,
    isMinMealsMet,
    hasVolumeDiscount,
    discountAmount,
    netFood,
    deliveryFee,
    taxAmount,
    grandTotal
  };
}

function renderCartDrawer() {
  const countBadge = document.getElementById("headerCartCount");
  const countMobileBadge = document.getElementById("mobileCartCount");
  const subtotalBadge = document.getElementById("headerCartSubtotal");
  const cartItemsList = document.getElementById("cartItemsList");
  const emptyState = document.getElementById("cartEmptyState");
  const filledState = document.getElementById("cartFilledState");
  const minProgress = document.getElementById("cartMinMealProgress");
  const checkoutBtn = document.getElementById("cartCheckoutBtn");

  const calc = getCartCalculations();

  // Update header badges
  if (countBadge) countBadge.innerText = calc.totalMealsCount;
  if (countMobileBadge) countMobileBadge.innerText = calc.totalMealsCount;
  if (subtotalBadge) subtotalBadge.innerText = `$${calc.grossFood.toFixed(2)}`;

  if (calc.totalMealsCount === 0) {
    if (emptyState) emptyState.classList.remove("hidden");
    if (filledState) filledState.classList.add("hidden");
    if (minProgress) minProgress.classList.add("hidden");
    return;
  }

  if (emptyState) emptyState.classList.add("hidden");
  if (filledState) filledState.classList.remove("hidden");
  if (minProgress) minProgress.classList.remove("hidden");

  // Render Minimum Order Progress Bar
  if (minProgress) {
    const min = currentSettings.minMeals;
    const progressPercent = Math.min(100, Math.round((calc.totalMealsCount / min) * 100));
    const mealsRemaining = Math.max(0, min - calc.totalMealsCount);

    let progressMsg = "";
    if (calc.totalMealsCount < min) {
      progressMsg = `<strong>${calc.totalMealsCount} of ${min} meals selected</strong> · Add ${mealsRemaining} more to checkout`;
    } else if (calc.totalMealsCount === min) {
      progressMsg = `🎉 <strong>6-Meal Starter Met!</strong> Add 1 more meal to unlock <span class="text-greek-gold font-black">10% OFF</span>!`;
    } else {
      progressMsg = `🔥 <strong>10% Volume Savings Applied!</strong> (${calc.totalMealsCount} meals selected)`;
    }

    minProgress.innerHTML = `
      <div class="flex items-center justify-between text-xs mb-1.5">
        <span class="text-slate-600 dark:text-slate-300">${progressMsg}</span>
        <span class="font-mono font-bold text-greek-gold">${calc.totalMealsCount}/${min}</span>
      </div>
      <div class="w-full bg-slate-200 dark:bg-white/10 rounded-full h-2 overflow-hidden">
        <div 
          class="h-full rounded-full transition-all duration-300 ${calc.isMinMealsMet ? 'bg-greek-lime' : 'bg-greek-gold'}" 
          style="width: ${progressPercent}%"
        ></div>
      </div>
    `;
  }

  // Render Cart Item Cards
  if (cartItemsList) {
    cartItemsList.innerHTML = cart.map(item => `
      <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 space-y-2">
        <div class="flex items-start justify-between gap-3">
          <img src="${resolveAssetUrl(item.image)}" alt="${item.name}" onerror="this.onerror=null; this.src='https://pixel-force.github.io/Greek-Fit-Kitchen/public/images/meals/grilled-chicken.jpg';" class="w-12 h-12 rounded-xl object-cover bg-slate-200 dark:bg-slate-700 flex-shrink-0" />
          <div class="flex-1 min-w-0">
            <h4 class="font-bold text-xs text-greek-navy dark:text-white truncate">${item.name}</h4>
            <div class="text-[11px] font-mono text-greek-gold font-black">$${item.unitPrice.toFixed(2)} CAD</div>
            
            ${item.hasSides && item.side1 ? `
              <div class="text-[10px] text-slate-500 dark:text-slate-400 mt-1">
                <div>• Side 1: <strong class="text-slate-700 dark:text-slate-200">${item.side1}</strong></div>
                <div>• Side 2: <strong class="text-slate-700 dark:text-slate-200">${item.side2}</strong></div>
              </div>
            ` : `
              <div class="text-[10px] text-amber-600 dark:text-amber-400 mt-1">• Complete Plate (No Sides)</div>
            `}

            ${item.extraSides && item.extraSides.length ? `
              <div class="text-[10px] text-greek-lime mt-0.5">
                + Extras ($4.99 ea): ${item.extraSides.join(", ")}
              </div>
            ` : ''}

            ${item.notes ? `
              <div class="text-[10px] text-slate-400 italic mt-0.5">Note: "${item.notes}"</div>
            ` : ''}
          </div>

          <button onclick="removeCartItem('${item.cartItemId}')" class="text-slate-400 hover:text-red-500 p-1 text-sm font-bold" title="Remove">
            &times;
          </button>
        </div>

        <div class="flex items-center justify-between pt-2 border-t border-slate-200 dark:border-white/5">
          <div class="flex items-center gap-2 border border-slate-300 dark:border-white/20 rounded-lg px-2 py-0.5 text-xs">
            <button onclick="updateCartItemQty('${item.cartItemId}', -1)" class="text-slate-500 hover:text-greek-gold font-bold px-1">−</button>
            <span class="font-bold font-mono text-greek-navy dark:text-white px-1.5">${item.quantity}</span>
            <button onclick="updateCartItemQty('${item.cartItemId}', 1)" class="text-slate-500 hover:text-greek-gold font-bold px-1">+</button>
          </div>
          <div class="font-mono font-bold text-xs text-slate-900 dark:text-white">
            $${(item.unitPrice * item.quantity).toFixed(2)} CAD
          </div>
        </div>
      </div>
    `).join("");
  }

  // Update Summary Rows
  const foodSubEl = document.getElementById("cartFoodSubtotal");
  const discountRow = document.getElementById("cartDiscountRow");
  const discountAmt = document.getElementById("cartDiscountAmount");
  const delivEl = document.getElementById("cartEstDelivery");
  const taxEl = document.getElementById("cartTaxAmount");
  const grandEl = document.getElementById("cartGrandTotal");

  if (foodSubEl) foodSubEl.innerText = `$${calc.grossFood.toFixed(2)} CAD`;

  if (discountRow) {
    if (calc.hasVolumeDiscount) {
      discountRow.classList.remove("hidden");
      if (discountAmt) discountAmt.innerText = `-$${calc.discountAmount.toFixed(2)} CAD`;
    } else {
      discountRow.classList.add("hidden");
    }
  }

  if (delivEl) delivEl.innerText = deliveryMethod === "pickup" ? "FREE ($0.00)" : `$${calc.deliveryFee.toFixed(2)} CAD`;
  if (taxEl) taxEl.innerText = `$${calc.taxAmount.toFixed(2)} CAD`;
  if (grandEl) grandEl.innerText = `$${calc.grandTotal.toFixed(2)} CAD`;

  // Checkout button status
  if (checkoutBtn) {
    if (calc.isMinMealsMet) {
      checkoutBtn.disabled = false;
      checkoutBtn.className = "w-full py-4 btn-gold rounded-2xl font-black text-sm flex items-center justify-center gap-2 shadow-xl";
      checkoutBtn.innerHTML = `
        <span>Proceed to Scheduled Checkout</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
      `;
    } else {
      checkoutBtn.disabled = true;
      checkoutBtn.className = "w-full py-4 bg-slate-300 dark:bg-white/10 text-slate-500 dark:text-slate-400 rounded-2xl font-bold text-xs cursor-not-allowed";
      checkoutBtn.innerHTML = `
        <span>Add ${Math.max(0, currentSettings.minMeals - calc.totalMealsCount)} More Meals to Meet Minimum (6 Meals)</span>
      `;
    }
  }
}

function openCartDrawer() {
  const overlay = document.getElementById("cartOverlay");
  const drawer = document.getElementById("cartDrawer");
  if (overlay && drawer) {
    overlay.classList.remove("hidden");
    drawer.classList.remove("translate-x-full");
    document.body.style.overflow = "hidden";
  }
}

function closeCartDrawer() {
  const overlay = document.getElementById("cartOverlay");
  const drawer = document.getElementById("cartDrawer");
  if (overlay && drawer) {
    drawer.classList.add("translate-x-full");
    setTimeout(() => {
      overlay.classList.add("hidden");
      document.body.style.overflow = "";
    }, 250);
  }
}

// 1-Click 6-Meal Package Starter
function addStarterSixMealPackage() {
  const starterMeals = [
    { id: "pork-souvlaki", side1: "Lemon Roasted Potatoes", side2: "Rice Pilaf with Veggies" },
    { id: "chicken-leg", side1: "Garlic Butter Baked Potatoes", side2: "Green Beans in Tomato Sauce" },
    { id: "pasta-al-greco", side1: null, side2: null },
    { id: "chicken-souvlaki", side1: "Yellow Basmati Rice", side2: "Sautéed Veggies" },
    { id: "grilled-chicken", side1: "Sweet Potatoes", side2: "Steamed Veggies" },
    { id: "veggie-souvlaki", side1: "Orzo in Tomato Sauce", side2: "Spinach Mushroom Rice" }
  ];

  starterMeals.forEach(entry => {
    const meal = currentMenu.find(m => m.id === entry.id);
    if (meal) {
      addItemToCart(meal, entry.side1, entry.side2, [], "Starter 6-Meal Value Plan");
    }
  });

  showToast("Loaded 6-Meal Starter Plan! Minimum met ($59.94 tier).");
  openCartDrawer();
}

// ==========================================
// 11. INTERACTIVE MEAL PLAN BUILDER
// ==========================================
function updateMealPlanBuilderUI() {
  const planContainer = document.getElementById("planBuilderSelectedList");
  const planCountBadge = document.getElementById("planBuilderCount");
  const planSubtotalEl = document.getElementById("planBuilderSubtotal");
  const planDiscountEl = document.getElementById("planBuilderDiscount");
  const planGrandTotalEl = document.getElementById("planBuilderGrandTotal");
  const planStatusNotice = document.getElementById("planBuilderStatusNotice");
  const planCtaBtn = document.getElementById("planBuilderCtaBtn");

  if (!planContainer) return;

  const calc = getCartCalculations();

  if (planCountBadge) planCountBadge.innerText = `${calc.totalMealsCount} of ${currentSettings.minMeals} meals`;
  if (planSubtotalEl) planSubtotalEl.innerText = `$${calc.grossFood.toFixed(2)} CAD`;
  
  if (planDiscountEl) {
    if (calc.hasVolumeDiscount) {
      planDiscountEl.innerText = `-$${calc.discountAmount.toFixed(2)} CAD (10% OFF)`;
      planDiscountEl.parentElement.classList.remove("hidden");
    } else {
      planDiscountEl.parentElement.classList.add("hidden");
    }
  }

  if (planGrandTotalEl) planGrandTotalEl.innerText = `$${calc.grandTotal.toFixed(2)} CAD`;

  if (planStatusNotice) {
    if (calc.totalMealsCount < currentSettings.minMeals) {
      const remaining = currentSettings.minMeals - calc.totalMealsCount;
      planStatusNotice.className = "p-3 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-600 dark:text-amber-400 text-xs font-bold";
      planStatusNotice.innerHTML = `⚠️ Select at least ${currentSettings.minMeals} meals. Add ${remaining} more meal${remaining > 1 ? 's' : ''} to unlock delivery.`;
    } else if (calc.totalMealsCount === currentSettings.minMeals) {
      planStatusNotice.className = "p-3 rounded-xl bg-blue-500/10 border border-blue-500/30 text-blue-600 dark:text-blue-300 text-xs font-bold";
      planStatusNotice.innerHTML = `🎉 6-meal minimum satisfied! Add 1 more meal to save 10% on your entire order.`;
    } else {
      planStatusNotice.className = "p-3 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-600 dark:text-emerald-400 text-xs font-bold";
      planStatusNotice.innerHTML = `🔥 10% Multi-Meal Volume Discount Applied! You're saving $${calc.discountAmount.toFixed(2)} CAD.`;
    }
  }

  if (planCtaBtn) {
    planCtaBtn.disabled = !calc.isMinMealsMet;
    if (calc.isMinMealsMet) {
      planCtaBtn.className = "w-full py-4 btn-gold rounded-2xl font-black text-sm shadow-xl flex items-center justify-center gap-2";
    } else {
      planCtaBtn.className = "w-full py-4 bg-slate-300 dark:bg-white/10 text-slate-500 rounded-2xl font-bold text-xs cursor-not-allowed";
    }
  }

  if (cart.length === 0) {
    planContainer.innerHTML = `
      <div class="py-8 text-center text-slate-400 text-xs">
        <p>No meals selected yet.</p>
        <p class="mt-1">Browse the menu cards above and customize your sides!</p>
      </div>
    `;
    return;
  }

  planContainer.innerHTML = cart.map(item => `
    <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-xs">
      <div class="flex items-center gap-2.5 min-w-0">
        <img src="${resolveAssetUrl(item.image)}" alt="${item.name}" onerror="this.onerror=null; this.src='https://pixel-force.github.io/Greek-Fit-Kitchen/public/images/meals/grilled-chicken.jpg';" class="w-9 h-9 rounded-lg object-cover flex-shrink-0" />
        <div class="truncate">
          <span class="font-bold text-greek-navy dark:text-white block truncate">${item.name}</span>
          <span class="text-[10px] text-slate-400">${item.hasSides && item.side1 ? `${item.side1}, ${item.side2}` : 'Complete Plate'}</span>
        </div>
      </div>
      <div class="flex items-center gap-2 flex-shrink-0">
        <span class="font-mono font-bold">$${(item.unitPrice * item.quantity).toFixed(2)}</span>
        <button onclick="removeCartItem('${item.cartItemId}')" class="text-slate-400 hover:text-red-500 font-bold p-1">&times;</button>
      </div>
    </div>
  `).join("");
}

// ==========================================
// 12. DISTANCE CALCULATOR LOGIC ($5.99 + $0.99/KM)
// ==========================================
function calculateDeliveryRate(km) {
  const base = currentSettings.deliveryBaseFee;
  const rate = currentSettings.deliveryPerKm;
  return Number((base + (km * rate)).toFixed(2));
}

function handleDistanceCalculation(distanceVal) {
  const km = parseFloat(distanceVal);
  if (isNaN(km) || km < 0) return;

  calculatedDistanceKm = km;
  calculatedDeliveryFee = calculateDeliveryRate(km);

  const feeDisplay = document.getElementById("calcResultFee");
  const breakDisplay = document.getElementById("calcResultBreakdown");
  
  if (feeDisplay) feeDisplay.innerText = `$${calculatedDeliveryFee.toFixed(2)} CAD`;
  if (breakDisplay) breakDisplay.innerText = `Base fee $${currentSettings.deliveryBaseFee.toFixed(2)} + (${km.toFixed(1)} km × $${currentSettings.deliveryPerKm.toFixed(2)}/km)`;

  renderCartDrawer();
  updateMealPlanBuilderUI();
}

function setPresetDeliveryZone(km, zoneName) {
  const input = document.getElementById("deliveryKmInput");
  if (input) input.value = km;
  handleDistanceCalculation(km);
  showToast(`Updated to ${zoneName} (${km} km)`);
}

// ==========================================
// 13. CHECKOUT MODAL & STRIPE-STYLE CARD SIMULATOR
// ==========================================
function openCheckoutModal() {
  const calc = getCartCalculations();
  if (!calc.isMinMealsMet) {
    showToast(`Minimum order requirement: 6 meals. Currently ${calc.totalMealsCount} selected.`);
    return;
  }

  closeCartDrawer();
  const modal = document.getElementById("checkoutModal");
  if (!modal) return;

  // Auto-fill customer profile if logged in
  if (currentUser) {
    const emailField = document.getElementById("checkoutEmail");
    const nameField = document.getElementById("ccName");
    const phoneField = document.getElementById("checkoutPhone");
    const addrField = document.getElementById("checkoutAddress");

    if (emailField) emailField.value = currentUser.email || "";
    if (nameField) nameField.value = currentUser.name || "";
    if (phoneField) phoneField.value = currentUser.phone || "";
    if (addrField) addrField.value = currentUser.address || "";
  }

  // Populate Summary Rows
  document.getElementById("checkoutMealsCount").innerText = `${calc.totalMealsCount} meals`;
  document.getElementById("checkoutSubtotal").innerText = `$${calc.grossFood.toFixed(2)} CAD`;
  
  const discountRow = document.getElementById("checkoutDiscountRow");
  if (calc.hasVolumeDiscount) {
    discountRow.classList.remove("hidden");
    document.getElementById("checkoutDiscount").innerText = `-$${calc.discountAmount.toFixed(2)} CAD`;
  } else {
    discountRow.classList.add("hidden");
  }

  document.getElementById("checkoutDeliveryFee").innerText = deliveryMethod === "pickup" ? "FREE ($0.00)" : `$${calc.deliveryFee.toFixed(2)} CAD`;
  document.getElementById("checkoutTax").innerText = `$${calc.taxAmount.toFixed(2)} CAD`;
  document.getElementById("checkoutGrandTotal").innerText = `$${calc.grandTotal.toFixed(2)} CAD`;
  document.getElementById("payButtonAmount").innerText = `$${calc.grandTotal.toFixed(2)} CAD`;

  updateCutoffCountdown();

  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeCheckoutModal() {
  const modal = document.getElementById("checkoutModal");
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
}

function toggleCheckoutMethod(method) {
  deliveryMethod = method;
  const addressFields = document.getElementById("checkoutAddressFields");
  const pickupNotice = document.getElementById("checkoutPickupNotice");

  if (method === "pickup") {
    if (addressFields) addressFields.classList.add("hidden");
    if (pickupNotice) pickupNotice.classList.remove("hidden");
  } else {
    if (addressFields) addressFields.classList.remove("hidden");
    if (pickupNotice) pickupNotice.classList.add("hidden");
  }

  renderCartDrawer();
  const calc = getCartCalculations();
  document.getElementById("checkoutDeliveryFee").innerText = deliveryMethod === "pickup" ? "FREE ($0.00)" : `$${calc.deliveryFee.toFixed(2)} CAD`;
  document.getElementById("checkoutGrandTotal").innerText = `$${calc.grandTotal.toFixed(2)} CAD`;
  document.getElementById("payButtonAmount").innerText = `$${calc.grandTotal.toFixed(2)} CAD`;
}

// 1-Click Demo Credit Card Filler for Easy Real-World Testing
function fillDemoCreditCard() {
  document.getElementById("ccNumber").value = "4500 1234 5678 9012";
  document.getElementById("ccExpiry").value = "12/28";
  document.getElementById("ccCvc").value = "888";
  document.getElementById("ccName").value = "Dimitrios Papadopoulos";
  document.getElementById("ccPostal").value = "M8W 1P5";
  document.getElementById("checkoutEmail").value = "dimitrios@greekfitkitchen.ca";
  document.getElementById("checkoutPhone").value = "416-555-0199";
  document.getElementById("checkoutAddress").value = "3200 Lake Shore Blvd W, Etobicoke, ON";
  
  detectCardType("4500 1234 5678 9012");
  showToast("Demo card & Etobicoke delivery address filled!");
}

function detectCardType(number) {
  const clean = number.replace(/\s+/g, '');
  const badge = document.getElementById("cardBrandBadge");
  if (!badge) return;

  if (/^4/.test(clean)) {
    badge.innerText = "VISA";
    badge.className = "px-2 py-0.5 rounded text-[10px] font-black bg-blue-600 text-white";
  } else if (/^5[1-5]/.test(clean)) {
    badge.innerText = "MC";
    badge.className = "px-2 py-0.5 rounded text-[10px] font-black bg-red-600 text-white";
  } else if (/^3[47]/.test(clean)) {
    badge.innerText = "AMEX";
    badge.className = "px-2 py-0.5 rounded text-[10px] font-black bg-sky-600 text-white";
  } else {
    badge.innerText = "CARD";
    badge.className = "px-2 py-0.5 rounded text-[10px] font-black bg-slate-600 text-white";
  }
}

// Process Credit Card Payment & Dispatch Order Record
function handleProcessPayment(event) {
  event.preventDefault();
  const calc = getCartCalculations();

  if (!calc.isMinMealsMet) {
    alert("Please select at least 6 meals before checking out.");
    return;
  }

  const ccNum = document.getElementById("ccNumber").value.replace(/\s+/g, '');
  const ccExp = document.getElementById("ccExpiry").value;
  const ccCvc = document.getElementById("ccCvc").value;
  const custName = document.getElementById("ccName").value;
  const custEmail = document.getElementById("checkoutEmail").value;
  const custPhone = document.getElementById("checkoutPhone").value;
  const deliveryAddress = deliveryMethod === "pickup" ? currentSettings.pickupAddress : document.getElementById("checkoutAddress").value;
  const deliveryDay = document.querySelector("input[name='deliveryDay']:checked")?.value || "Upcoming Sunday Batch";

  if (!custEmail || !custPhone || (deliveryMethod === "delivery" && !deliveryAddress)) {
    alert("Please fill in your contact information and delivery address.");
    return;
  }

  if (ccNum.length < 13 || ccExp.length < 4 || ccCvc.length < 3) {
    alert("Please enter a valid card number, expiry, and security code.");
    return;
  }

  // Processing Animation
  const submitBtn = document.getElementById("paySubmitButton");
  const originalText = submitBtn.innerHTML;
  submitBtn.disabled = true;
  submitBtn.innerHTML = `
    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-greek-navy" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
    </svg>
    <span>Encrypting &amp; Authorizing CAD Payment...</span>
  `;

  const orderId = "GFK-" + Math.floor(100000 + Math.random() * 900000);
  const orderRecord = {
    orderId: orderId,
    timestamp: new Date().toISOString(),
    customerName: custName,
    customerEmail: custEmail,
    customerPhone: custPhone,
    deliveryMethod: deliveryMethod,
    deliveryAddress: deliveryAddress,
    scheduledDate: deliveryDay,
    items: JSON.parse(JSON.stringify(cart)),
    itemCount: calc.totalMealsCount,
    subtotal: calc.grossFood,
    discount: calc.discountAmount,
    deliveryFee: calc.deliveryFee,
    tax: calc.taxAmount,
    grandTotal: calc.grandTotal,
    status: "Received",
    paymentStatus: "Paid (Stripe Gateway Authorized)",
    authCode: "AUTH-" + Math.random().toString(36).substring(2, 8).toUpperCase(),
    staffNotes: ""
  };

  // Dispatch Order to WordPress Backend (Saves in DB & Sends Confirmation Emails)
  const ajaxUrl = (typeof gfkConfig !== 'undefined' && gfkConfig.ajaxUrl) ? gfkConfig.ajaxUrl : '/wp-admin/admin-ajax.php';
  const nonce = (typeof gfkConfig !== 'undefined' && gfkConfig.orderNonce) ? gfkConfig.orderNonce : '';

  const formData = new FormData();
  formData.append('action', 'gfk_submit_order');
  formData.append('nonce', nonce);
  formData.append('order_data', JSON.stringify(orderRecord));

  fetch(ajaxUrl, {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    console.log('Order submission response:', data);
  })
  .catch(err => {
    console.log('Order sync note:', err);
  })
  .finally(() => {
    // Save to Orders Database
    const existingOrders = getStoredOrders();
    existingOrders.unshift(orderRecord);
    saveStoredOrders(existingOrders);

    // Save order to customer account if logged in
    if (currentUser) {
      currentUser.orderHistory = currentUser.orderHistory || [];
      currentUser.orderHistory.unshift(orderRecord);
      saveUser(currentUser);
    }

    submitBtn.disabled = false;
    submitBtn.innerHTML = originalText;
    closeCheckoutModal();
    clearCart();

    showOrderConfirmationModal(orderRecord);
  });
}

function showOrderConfirmationModal(order) {
  const modal = document.getElementById("confirmationModal");
  if (!modal) return;

  document.getElementById("confirmOrderId").innerText = `#${order.orderId}`;
  document.getElementById("confirmCustomer").innerText = `${order.customerName} (${order.customerEmail})`;
  document.getElementById("confirmSlot").innerText = order.scheduledDate;
  document.getElementById("confirmAddress").innerText = order.deliveryAddress;
  document.getElementById("confirmTotal").innerText = `$${order.grandTotal.toFixed(2)} CAD`;

  const itemsContainer = document.getElementById("confirmItemsList");
  if (itemsContainer) {
    itemsContainer.innerHTML = order.items.map(it => `
      <div class="flex justify-between items-start py-1.5 border-b border-slate-100 dark:border-white/5 text-xs">
        <div>
          <span class="font-bold">${it.quantity}x ${it.name}</span>
          ${it.hasSides && it.side1 ? `<div class="text-[11px] text-slate-500">Sides: ${it.side1}, ${it.side2}</div>` : ''}
          ${it.extraSides && it.extraSides.length ? `<div class="text-[11px] text-greek-lime">+ Extras: ${it.extraSides.join(", ")}</div>` : ''}
        </div>
        <span class="font-mono font-bold">$${(it.unitPrice * it.quantity).toFixed(2)} CAD</span>
      </div>
    `).join("");
  }

  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeConfirmationModal() {
  const modal = document.getElementById("confirmationModal");
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
}

// ==========================================
// 14. CUSTOMER AUTHENTICATION & ORDER HISTORY
// ==========================================
function loadUser() {
  try {
    const raw = localStorage.getItem("gfk_current_user");
    return raw ? JSON.parse(raw) : null;
  } catch (e) {
    return null;
  }
}

function saveUser(user) {
  if (user) {
    localStorage.setItem("gfk_current_user", JSON.stringify(user));
  } else {
    localStorage.removeItem("gfk_current_user");
  }
  currentUser = user;
  updateUserUI();
}

function updateUserUI() {
  const authBtn = document.getElementById("headerAccountBtn");
  if (!authBtn) return;

  if (currentUser) {
    authBtn.innerHTML = `
      <span class="w-2 h-2 rounded-full bg-greek-lime"></span>
      <span class="text-xs font-bold text-white">${currentUser.name.split(" ")[0]}</span>
    `;
    authBtn.setAttribute("title", `Account: ${currentUser.email}`);
  } else {
    authBtn.innerHTML = `
      <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
    `;
    authBtn.setAttribute("title", "Sign In / Account");
  }
}

function openAccountModal() {
  let modal = document.getElementById("accountModal");
  if (!modal) {
    modal = document.createElement("div");
    modal.id = "accountModal";
    modal.className = "fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/80 backdrop-blur-md overflow-y-auto";
    document.body.appendChild(modal);
  }

  if (currentUser) {
    // Show logged in Dashboard
    const orders = getStoredOrders().filter(o => o.customerEmail === currentUser.email);

    modal.innerHTML = `
      <div class="bg-white dark:bg-[#101D3A] rounded-3xl max-w-xl w-full p-6 sm:p-8 shadow-2xl border border-slate-200 dark:border-white/10 my-8">
        <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-white/10">
          <div>
            <span class="text-[10px] font-black uppercase text-greek-gold tracking-wider">Customer Portal</span>
            <h3 class="text-2xl font-black text-greek-navy dark:text-white">Hello, ${currentUser.name}!</h3>
          </div>
          <button onclick="closeAccountModal()" class="text-slate-400 hover:text-white text-2xl font-bold p-1">&times;</button>
        </div>

        <div class="py-4 space-y-4">
          <div class="p-4 rounded-2xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-xs space-y-1">
            <div><strong>Email:</strong> ${currentUser.email}</div>
            <div><strong>Phone:</strong> ${currentUser.phone || 'None'}</div>
            <div><strong>Saved Address:</strong> ${currentUser.address || '3200 Lake Shore Blvd W, Etobicoke'}</div>
          </div>

          <div>
            <h4 class="font-bold text-sm text-greek-navy dark:text-white mb-2">Previous Orders (${orders.length})</h4>
            <div class="max-h-64 overflow-y-auto space-y-2">
              ${orders.length === 0 ? '<p class="text-xs text-slate-400">No orders placed yet.</p>' : orders.map(ord => `
                <div class="p-3 rounded-xl border border-slate-200 dark:border-white/10 text-xs flex items-center justify-between">
                  <div>
                    <strong class="text-greek-gold font-mono">#${ord.orderId}</strong> · ${ord.itemCount} meals
                    <div class="text-[10px] text-slate-400">${ord.scheduledDate} · Status: <strong>${ord.status}</strong></div>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="font-bold font-mono">$${ord.grandTotal.toFixed(2)} CAD</span>
                    <button onclick="reorderPreviousOrder('${ord.orderId}')" class="px-3 py-1 btn-gold rounded-lg text-[10px] font-black">
                      Reorder
                    </button>
                  </div>
                </div>
              `).join("")}
            </div>
          </div>

          <div class="pt-4 border-t border-slate-200 dark:border-white/10 flex justify-between">
            <button onclick="logoutCustomer()" class="text-xs text-red-500 font-bold hover:underline">
              Sign Out
            </button>
            <button onclick="closeAccountModal()" class="px-5 py-2.5 rounded-xl bg-greek-navy text-white text-xs font-bold">
              Close
            </button>
          </div>
        </div>
      </div>
    `;
  } else {
    // Show Login/Register Tabs
    modal.innerHTML = `
      <div class="bg-white dark:bg-[#101D3A] rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl border border-slate-200 dark:border-white/10 my-8">
        <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-white/10">
          <div>
            <span class="text-[10px] font-black uppercase text-greek-gold tracking-wider">Greek Fit Kitchen</span>
            <h3 class="text-2xl font-black text-greek-navy dark:text-white">Customer Sign In</h3>
          </div>
          <button onclick="closeAccountModal()" class="text-slate-400 hover:text-white text-2xl font-bold p-1">&times;</button>
        </div>

        <form onsubmit="handleCustomerLogin(event)" class="space-y-4 py-4">
          <div>
            <label class="block text-xs font-bold mb-1">Your Full Name</label>
            <input type="text" id="authName" required placeholder="Dimitrios Papadopoulos" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" />
          </div>

          <div>
            <label class="block text-xs font-bold mb-1">Email Address</label>
            <input type="email" id="authEmail" required placeholder="your.name@example.com" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" />
          </div>

          <div>
            <label class="block text-xs font-bold mb-1">Phone Number</label>
            <input type="tel" id="authPhone" required placeholder="416-555-0199" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" />
          </div>

          <button type="submit" class="w-full py-3 btn-gold rounded-xl font-black text-xs shadow-lg">
            Sign In &amp; Save Profile
          </button>
        </form>
      </div>
    `;
  }

  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeAccountModal() {
  const modal = document.getElementById("accountModal");
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
}

function handleCustomerLogin(event) {
  event.preventDefault();
  const name = document.getElementById("authName")?.value || "Valued Customer";
  const email = document.getElementById("authEmail")?.value || "customer@example.com";
  const phone = document.getElementById("authPhone")?.value || "";

  saveUser({
    name,
    email,
    phone,
    address: "3200 Lake Shore Blvd W, Etobicoke, ON",
    orderHistory: []
  });

  closeAccountModal();
  showToast(`Welcome back, ${name}!`);
}

function logoutCustomer() {
  saveUser(null);
  closeAccountModal();
  showToast("You have been signed out.");
}

function reorderPreviousOrder(orderId) {
  const order = getStoredOrders().find(o => o.orderId === orderId);
  if (!order) return;

  cart = JSON.parse(JSON.stringify(order.items));
  saveCart();
  renderCartDrawer();
  updateMealPlanBuilderUI();
  closeAccountModal();
  openCartDrawer();
  showToast(`Re-loaded ${order.itemCount} meals from Order #${orderId}`);
}

// ==========================================
// 15. CATERING & SPECIAL REQUEST FORMS
// ==========================================
function openCateringModal() {
  let modal = document.getElementById("cateringModal");
  if (!modal) return;
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeCateringModal() {
  const modal = document.getElementById("cateringModal");
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
}

function handleCateringSubmit(event) {
  event.preventDefault();
  const name = document.getElementById("catName")?.value || "";
  const email = document.getElementById("catEmail")?.value || "";
  const phone = document.getElementById("catPhone")?.value || "";
  const guests = document.getElementById("catGuests")?.value || "";
  const date = document.getElementById("catDate")?.value || "";
  const notes = document.getElementById("catNotes")?.value || "";

  const request = {
    id: "CAT-" + Date.now().toString(36).toUpperCase(),
    timestamp: new Date().toISOString(),
    name,
    email,
    phone,
    guests,
    date,
    notes,
    status: "New Inquiry"
  };

  const submitBtn = document.getElementById("catSubmitBtn") || event.target.querySelector("button[type='submit']");
  const originalText = submitBtn ? submitBtn.innerHTML : "Submit Catering Request";
  if (submitBtn) {
    submitBtn.disabled = true;
    submitBtn.innerHTML = "Sending Catering Request...";
  }

  const ajaxUrl = (typeof gfkConfig !== 'undefined' && gfkConfig.ajaxUrl) ? gfkConfig.ajaxUrl : '/wp-admin/admin-ajax.php';
  const nonce = (typeof gfkConfig !== 'undefined' && gfkConfig.orderNonce) ? gfkConfig.orderNonce : '';

  const formData = new FormData();
  formData.append('action', 'gfk_submit_catering');
  formData.append('nonce', nonce);
  formData.append('catering_data', JSON.stringify(request));

  fetch(ajaxUrl, {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => console.log('Catering email result:', data))
  .catch(err => console.log('Catering sync error:', err))
  .finally(() => {
    try {
      const existing = JSON.parse(localStorage.getItem("gfk_catering_requests") || "[]");
      existing.unshift(request);
      localStorage.setItem("gfk_catering_requests", JSON.stringify(existing));
    } catch (e) {}

    if (submitBtn) {
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalText;
    }
    closeCateringModal();
    showToast("Catering enquiry sent! Confirmation email dispatched to your inbox.");
  });
}

function openContactModal() {
  let modal = document.getElementById("contactModal");
  if (!modal) return;
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeContactModal() {
  const modal = document.getElementById("contactModal");
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
}

function handleContactSubmit(event) {
  event.preventDefault();
  const name = document.getElementById("dietaryName")?.value || "Customer";
  const email = document.getElementById("dietaryEmail")?.value || "";
  const notes = document.getElementById("dietaryNotes")?.value || "";

  const request = {
    name,
    email,
    notes
  };

  const submitBtn = document.getElementById("dietarySubmitBtn") || event.target.querySelector("button[type='submit']");
  const originalText = submitBtn ? submitBtn.innerHTML : "Send to Chef Team";
  if (submitBtn) {
    submitBtn.disabled = true;
    submitBtn.innerHTML = "Sending Request...";
  }

  const ajaxUrl = (typeof gfkConfig !== 'undefined' && gfkConfig.ajaxUrl) ? gfkConfig.ajaxUrl : '/wp-admin/admin-ajax.php';
  const nonce = (typeof gfkConfig !== 'undefined' && gfkConfig.orderNonce) ? gfkConfig.orderNonce : '';

  const formData = new FormData();
  formData.append('action', 'gfk_submit_dietary');
  formData.append('nonce', nonce);
  formData.append('dietary_data', JSON.stringify(request));

  fetch(ajaxUrl, {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => console.log('Dietary email result:', data))
  .catch(err => console.log('Dietary sync error:', err))
  .finally(() => {
    if (submitBtn) {
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalText;
    }
    showToast("Your special dietary request was received. We sent a confirmation to your email!");
    closeContactModal();
  });
}

// Legal Policies Modal
function openPolicyModal(type) {
  let title = "Privacy Policy";
  let content = "";

  if (type === "privacy") {
    title = "Privacy Policy";
    content = `
      <p class="mb-3">At Greek Fit Kitchen, managed by George the Greek in Etobicoke, we respect your privacy and protect your personal ordering data.</p>
      <p class="mb-3">We collect your name, phone number, delivery address, and order selections exclusively for preparing and delivering your scheduled meals. We do not sell or rent customer data.</p>
      <p>All online payments are securely tokenized through encrypted card gateway services in accordance with PCI-DSS standards.</p>
    `;
  } else if (type === "terms") {
    title = "Terms & Conditions";
    content = `
      <p class="mb-3"><strong>Minimum Order:</strong> All meal-prep orders require a minimum of 6 meals before delivery or pickup fulfillment can be scheduled.</p>
      <p class="mb-3"><strong>Cutoff Rules:</strong> Sunday delivery orders must be completed before Friday at 12:00 p.m. noon (America/Toronto time). Wednesday orders must be completed before Monday at 12:00 p.m. noon.</p>
      <p><strong>Pickup Location:</strong> Store pickup is free of charge at George the Greek, 3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5.</p>
    `;
  } else if (type === "refund") {
    title = "Refund & Cancellation Policy";
    content = `
      <p class="mb-3">Because our meals are chef-prepared fresh to order, order cancellations or modifications must be submitted prior to the respective cutoff window (Friday 12 p.m. for Sunday batch, Monday 12 p.m. for Wednesday batch).</p>
      <p class="mb-3">Orders cancelled before the cutoff will receive a 100% refund to the original payment method.</p>
      <p>If you experience any quality issue with your meals, please notify our team within 24 hours of delivery with photographic documentation for an immediate replacement or store credit.</p>
    `;
  }

  let modal = document.getElementById("policyModal");
  if (!modal) {
    modal = document.createElement("div");
    modal.id = "policyModal";
    modal.className = "fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/80 backdrop-blur-md overflow-y-auto";
    document.body.appendChild(modal);
  }

  modal.innerHTML = `
    <div class="bg-white dark:bg-[#101D3A] rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-slate-200 dark:border-white/10 my-8">
      <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-white/10">
        <h3 class="text-xl font-black text-greek-navy dark:text-white">${title}</h3>
        <button onclick="closePolicyModal()" class="text-slate-400 hover:text-white text-2xl font-bold p-1">&times;</button>
      </div>
      <div class="py-4 text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
        ${content}
      </div>
      <div class="pt-4 border-t border-slate-200 dark:border-white/10 text-right">
        <button onclick="closePolicyModal()" class="px-5 py-2.5 btn-gold rounded-xl text-xs font-black">
          I Understand
        </button>
      </div>
    </div>
  `;

  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closePolicyModal() {
  const modal = document.getElementById("policyModal");
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
}

// ==========================================
// 16. HERO SLIDER LOGIC
// ==========================================
let currentSlide = 0;
let slideInterval = null;

function initHeroSlider() {
  const slides = document.querySelectorAll(".slide-item");
  if (slides.length <= 1) return;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      const isActive = (i === index);
      slide.classList.toggle("active", isActive);
      slide.style.opacity = isActive ? "1" : "0";
      slide.style.position = isActive ? "relative" : "absolute";
      slide.style.zIndex = isActive ? "10" : "1";
      slide.style.pointerEvents = isActive ? "auto" : "none";
    });
    currentSlide = index;
  }

  window.prevHeroSlide = function() {
    let next = currentSlide - 1;
    if (next < 0) next = slides.length - 1;
    showSlide(next);
    restartSlideTimer();
  };

  window.nextHeroSlide = function() {
    let next = (currentSlide + 1) % slides.length;
    showSlide(next);
    restartSlideTimer();
  };

  function restartSlideTimer() {
    if (slideInterval) clearInterval(slideInterval);
    slideInterval = setInterval(() => {
      window.nextHeroSlide();
    }, 6000);
  }

  restartSlideTimer();
}

// ==========================================
// 17. TOAST NOTIFICATIONS
// ==========================================
function showToast(message) {
  let toast = document.getElementById("siteToast");
  if (!toast) {
    toast = document.createElement("div");
    toast.id = "siteToast";
    toast.className = "fixed bottom-5 right-5 z-50 bg-[#101D3A] text-white px-5 py-3.5 rounded-2xl shadow-2xl border border-greek-gold/40 text-xs font-bold flex items-center gap-3 transition-all duration-300 transform translate-y-20 opacity-0";
    document.body.appendChild(toast);
  }

  toast.innerHTML = `
    <span class="w-2.5 h-2.5 rounded-full bg-greek-gold flex-shrink-0 animate-ping"></span>
    <span class="leading-snug">${message}</span>
  `;

  toast.classList.remove("translate-y-20", "opacity-0");
  toast.classList.add("translate-y-0", "opacity-100");

  setTimeout(() => {
    toast.classList.remove("translate-y-0", "opacity-100");
    toast.classList.add("translate-y-20", "opacity-0");
  }, 3400);
}

// ==========================================
// 18. MULTI-WINDOW STORAGE SYNCHRONIZATION
// ==========================================
window.addEventListener("storage", (e) => {
  if (e.key === "gfk_cart") {
    cart = loadCart();
    renderCartDrawer();
    updateMealPlanBuilderUI();
  }
  if (e.key === "gfk_menu_items") {
    currentMenu = getStoredMenu();
    renderMenuGrid();
  }
  if (e.key === "gfk_settings") {
    currentSettings = getStoredSettings();
    renderCartDrawer();
    updateMealPlanBuilderUI();
  }
  if (e.key === "gfk_theme") {
    initTheme();
  }
});

// ==========================================
// 19. INITIALIZATION HOOK
// ==========================================
function initApp() {
  // Clear any stale cached menu items in localStorage from older versions
  try {
    const cachedVersion = localStorage.getItem("gfk_version");
    if (cachedVersion !== "2.2.0") {
      localStorage.removeItem("gfk_menu_items");
      localStorage.setItem("gfk_version", "2.2.0");
    }
  } catch (e) {}

  initTheme();
  initHeroSlider();
  updateUserUI();
  renderMenuGrid();
  renderCartDrawer();
  updateMealPlanBuilderUI();
  updateCutoffCountdown();
  setInterval(updateCutoffCountdown, 1000);

  // CC Number formatting
  const ccInput = document.getElementById("ccNumber");
  if (ccInput) {
    ccInput.addEventListener("input", e => {
      let v = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
      let matches = v.match(/\d{4,16}/g);
      let match = (matches && matches[0]) || '';
      let parts = [];
      for (let i = 0, len = match.length; i < len; i += 4) {
        parts.push(match.substring(i, i + 4));
      }
      e.target.value = parts.length ? parts.join(' ') : v;
      detectCardType(e.target.value);
    });
  }

  // CC Expiry format (MM/YY)
  const expInput = document.getElementById("ccExpiry");
  if (expInput) {
    expInput.addEventListener("input", e => {
      let v = e.target.value.replace(/\D/g, '');
      if (v.length > 2) {
        e.target.value = v.substring(0, 2) + '/' + v.substring(2, 4);
      } else {
        e.target.value = v;
      }
    });
  }

  // Mobile menu button
  const mobileBtn = document.getElementById("mobileMenuBtn");
  const mobileDrawer = document.getElementById("mobileMenuDrawer");
  if (mobileBtn && mobileDrawer) {
    mobileBtn.addEventListener("click", () => {
      mobileDrawer.classList.toggle("hidden");
    });
  }
}

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initApp);
} else {
  initApp();
}

// Compatibility alias for meal sides selection modal
window.openMealSidesModal = function(mealId) {
  if (typeof openSideCustomizer === 'function') {
    openSideCustomizer(mealId);
  }
};
