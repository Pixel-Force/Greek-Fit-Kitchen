/**
 * Greek Fit Kitchen - Core Application Logic
 * Modern, Next-Level, Fast-Loading, Zero Dependencies
 * Currency: CAD ($ Canadian Dollars)
 * Delivery: $5.99 + $0.99 per km from 3575 Lake Shore Blvd W, Etobicoke
 * Schedule: Sunday (Order by Fri 12pm) & Wednesday (Order by Mon 12pm)
 */

// ==========================================
// 1. DATA: 20 MAIN DISHES FROM FLYER
// ==========================================
const MENU_ITEMS = [
  {
    id: "grilled-chicken",
    name: "Grilled Chicken",
    price: 12.99,
    category: "poultry",
    image: "public/images/meals/grilled-chicken.jpg",
    description: "Tender herb-marinated chicken breast flame-grilled with Greek oregano, garlic, and virgin olive oil.",
    calories: 420,
    protein: "48g",
    carbs: "18g",
    fat: "9g",
    popular: true,
    hasSides: true
  },
  {
    id: "chicken-leg-plate",
    name: "Chicken Leg Plate",
    price: 10.99,
    category: "poultry",
    image: "public/images/meals/chicken-leg.jpg",
    description: "Slow-roasted bone-in chicken leg quarters seasoned with aromatic garlic, wild thyme, and citrus.",
    calories: 460,
    protein: "42g",
    carbs: "12g",
    fat: "14g",
    popular: false,
    hasSides: true
  },
  {
    id: "chilly-chicken",
    name: "Chilly Chicken",
    price: 13.99,
    category: "poultry",
    image: "public/images/meals/chilly-chicken.jpg",
    description: "Lean chicken breast glazed with a fiery Mediterranean chili and herb sauce for a metabolic kick.",
    calories: 430,
    protein: "46g",
    carbs: "22g",
    fat: "10g",
    popular: false,
    hasSides: true
  },
  {
    id: "chicken-fillet",
    name: "Chicken Fillet",
    price: 12.99,
    category: "poultry",
    image: "public/images/meals/chicken-fillet.jpg",
    description: "Clean, ultra-lean sliced chicken fillet seared with Aegean sea salt and fresh lemon juice.",
    calories: 390,
    protein: "50g",
    carbs: "8g",
    fat: "6g",
    popular: false,
    hasSides: true
  },
  {
    id: "salmon",
    name: "Fresh Atlantic Salmon",
    price: 14.99,
    category: "seafood",
    image: "public/images/meals/salmon.jpg",
    description: "Pan-seared premium Atlantic salmon fillet rich in Omega-3s, topped with fresh dill and lemon.",
    calories: 480,
    protein: "44g",
    carbs: "6g",
    fat: "18g",
    popular: true,
    hasSides: true
  },
  {
    id: "veggie-souvlaki",
    name: "Veggie Souvlaki",
    price: 11.99,
    category: "vegetarian",
    image: "public/images/meals/veggie-souvlaki.jpg",
    description: "Char-grilled skewers of zucchini, bell peppers, red onions, mushrooms, and grilled Greek halloumi.",
    calories: 340,
    protein: "18g",
    carbs: "32g",
    fat: "14g",
    popular: false,
    hasSides: true
  },
  {
    id: "spinach-feta-stuffed-chicken",
    name: "Spinach & Feta Stuffed Chicken",
    price: 14.99,
    category: "poultry",
    image: "public/images/meals/spinach-feta-chicken.jpg",
    description: "Tender chicken breast rolled with baby spinach, Kalamata herbs, and authentic crumbled Greek feta.",
    calories: 490,
    protein: "52g",
    carbs: "10g",
    fat: "15g",
    popular: true,
    hasSides: true
  },
  {
    id: "chicken-souvlaki-plate",
    name: "Chicken Souvlaki Plate",
    price: 12.99,
    category: "poultry",
    image: "public/images/meals/chicken-souvlaki.jpg",
    description: "Traditional Greek marinated chicken skewers grilled over flame with mountain oregano.",
    calories: 440,
    protein: "47g",
    carbs: "14g",
    fat: "11g",
    popular: true,
    hasSides: true
  },
  {
    id: "tandoori-chicken",
    name: "Tandoori Chicken",
    price: 14.99,
    category: "poultry",
    image: "public/images/meals/tandoori-chicken.jpg",
    description: "Aromatic yogurt-and-spice marinated chicken breast roasted tender with roasted lemon accents.",
    calories: 440,
    protein: "48g",
    carbs: "16g",
    fat: "11g",
    popular: false,
    hasSides: true
  },
  {
    id: "beef-souvlaki-plate",
    name: "Beef Souvlaki Plate",
    price: 13.99,
    category: "meat",
    image: "public/images/meals/beef-souvlaki.jpg",
    description: "Char-broiled AAA Canadian beef cubes seasoned with sea salt, pepper, garlic, and Greek herbs.",
    calories: 470,
    protein: "46g",
    carbs: "12g",
    fat: "16g",
    popular: true,
    hasSides: true
  },
  {
    id: "chicken-mushroom-sauce",
    name: "Chicken Mushroom Sauce",
    price: 13.99,
    category: "poultry",
    image: "public/images/meals/chicken-mushroom.jpg",
    description: "Sliced seared chicken breast smothered in a savory wild mushroom and garlic reduction.",
    calories: 450,
    protein: "46g",
    carbs: "15g",
    fat: "12g",
    popular: false,
    hasSides: true
  },
  {
    id: "pork-souvlaki-plate",
    name: "Pork Souvlaki Plate",
    price: 9.99,
    category: "meat",
    image: "public/images/meals/pork-souvlaki.jpg",
    description: "Classic tender pork skewers flame-kissed with Mediterranean oregano and crisp lemon finish.",
    calories: 430,
    protein: "44g",
    carbs: "10g",
    fat: "14g",
    popular: true,
    hasSides: true
  },
  {
    id: "chicken-fajita",
    name: "Chicken Fajita",
    price: 12.99,
    category: "poultry",
    image: "public/images/meals/chicken-fajita.jpg",
    description: "Sizzled chicken strips with sweet bell peppers and caramelized onions with clean spices.",
    calories: 410,
    protein: "45g",
    carbs: "20g",
    fat: "9g",
    popular: false,
    hasSides: true
  },
  {
    id: "spinach-pie-dinner",
    name: "Spinach Pie Dinner (Spanakopita)",
    price: 12.99,
    category: "vegetarian",
    image: "public/images/meals/spinach-pie.jpg",
    description: "Golden flaky phyllo pastry filled with fresh spinach, scallions, dill, and authentic Greek feta.",
    calories: 420,
    protein: "19g",
    carbs: "38g",
    fat: "17g",
    popular: true,
    hasSides: true
  },
  {
    id: "beef-fajita",
    name: "Beef Fajita",
    price: 14.99,
    category: "meat",
    image: "public/images/meals/beef-fajita.jpg",
    description: "Tender flank steak strips stir-seared with tri-color peppers, onions, and Aegean spices.",
    calories: 460,
    protein: "44g",
    carbs: "18g",
    fat: "15g",
    popular: false,
    hasSides: true
  },
  {
    id: "pasta-al-greco",
    name: "Pasta al Greco",
    price: 9.99,
    category: "vegetarian",
    image: "public/images/meals/pasta-al-greco.jpg",
    description: "Penne tossed in Greek tomato sauce, Kalamata olives, capers, garlic, basil, and crumbled feta cheese. (Prepared complete - no sides).",
    calories: 490,
    protein: "21g",
    carbs: "68g",
    fat: "14g",
    popular: true,
    hasSides: false
  },
  {
    id: "beef-mushroom-sauce",
    name: "Beef Mushroom Sauce",
    price: 14.99,
    category: "meat",
    image: "public/images/meals/beef-mushroom.jpg",
    description: "Succulent braised beef medallion cuts finished with an earthy herb mushroom gravy.",
    calories: 480,
    protein: "46g",
    carbs: "14g",
    fat: "17g",
    popular: false,
    hasSides: true
  },
  {
    id: "smoked-pork-loin",
    name: "Smoked Pork Loin",
    price: 12.99,
    category: "meat",
    image: "public/images/meals/smoked-pork-loin.jpg",
    description: "Lean wood-smoked pork loin slices served tender and juicy with Mediterranean herbs.",
    calories: 420,
    protein: "45g",
    carbs: "9g",
    fat: "13g",
    popular: false,
    hasSides: true
  },
  {
    id: "smoked-turkey-breast",
    name: "Smoked Turkey Breast",
    price: 13.99,
    category: "poultry",
    image: "public/images/meals/smoked-turkey.jpg",
    description: "Carved hardwood-smoked turkey breast with pristine lean protein macros and clean seasoning.",
    calories: 380,
    protein: "52g",
    carbs: "6g",
    fat: "5g",
    popular: false,
    hasSides: true
  },
  {
    id: "turkey-souvlaki-plate",
    name: "Turkey Souvlaki Plate",
    price: 13.99,
    category: "poultry",
    image: "public/images/meals/turkey-souvlaki.jpg",
    description: "Lean hand-skewered turkey marinated in Greek olive oil, lemon, garlic, and wild herbs.",
    calories: 410,
    protein: "48g",
    carbs: "10g",
    fat: "8g",
    popular: false,
    hasSides: true
  }
];

// ==========================================
// 2. DATA: 11 SIDES FROM FLYER
// ==========================================
const SIDES_LIST = [
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

const EXTRA_SIDE_PRICE = 4.99; // CAD
const MINIMUM_MEALS = 6;
const PROMOTION_DISCOUNT_PERCENT = 10; // For 7+ meals
const STORE_ADDRESS = "3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5";
const STORE_LAT_LNG = { lat: 43.5936, lng: -79.5398 };

// ==========================================
// 3. APPLICATION STATE
// ==========================================
let cart = [];
let currentCustomizingMeal = null;
let currentCategoryFilter = "all";
let currentSlideIndex = 0;
let slideInterval = null;
let deliveryMethod = "delivery"; // "delivery" or "pickup"
let calculatedDistanceKm = 5.0; // default estimated km
let calculatedDeliveryFee = 10.94; // 5.99 + 5 * 0.99
let selectedDeliveryBatch = "Upcoming Sunday";

// Load cart & settings from localStorage
try {
  const savedCart = localStorage.getItem("gfk_cart");
  if (savedCart) {
    cart = JSON.parse(savedCart);
  }
} catch (e) {
  cart = [];
}

// ==========================================
// 4. THEME CONTROLLER (MANDATORY RULE 1)
// ==========================================
function initTheme() {
  const savedTheme = localStorage.getItem("theme");
  const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
  const isDark = savedTheme === "dark" || (!savedTheme && prefersDark);

  applyTheme(isDark);
}

function applyTheme(isDark) {
  if (isDark) {
    document.documentElement.classList.add("dark");
    localStorage.setItem("theme", "dark");
  } else {
    document.documentElement.classList.remove("dark");
    localStorage.setItem("theme", "light");
  }
  updateThemeIcons(isDark);
}

function toggleTheme() {
  const isDark = document.documentElement.classList.contains("dark");
  applyTheme(!isDark);
}

function updateThemeIcons(isDark) {
  const moonIcons = document.querySelectorAll(".theme-icon-moon");
  const sunIcons = document.querySelectorAll(".theme-icon-sun");

  moonIcons.forEach(el => {
    el.style.display = isDark ? "none" : "block";
  });
  sunIcons.forEach(el => {
    el.style.display = isDark ? "block" : "none";
  });
}

// Listen for system theme changes
window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", e => {
  if (!localStorage.getItem("theme")) {
    applyTheme(e.matches);
  }
});

// ==========================================
// 5. HERO SLIDER LOGIC
// ==========================================
function initHeroSlider() {
  const slides = document.querySelectorAll("#heroSlider .slide-item");
  const dots = document.querySelectorAll(".slider-dot");
  if (!slides.length) return;

  function showSlide(index) {
    slides.forEach((slide, idx) => {
      if (idx === index) {
        slide.classList.add("active");
        slide.style.opacity = "1";
        slide.style.visibility = "visible";
        slide.style.zIndex = "10";
      } else {
        slide.classList.remove("active");
        slide.style.opacity = "0";
        slide.style.visibility = "hidden";
        slide.style.zIndex = "1";
      }
    });

    dots.forEach((dot, idx) => {
      if (idx === index) {
        dot.className = "slider-dot w-8 h-2 rounded-full bg-greek-gold transition-all duration-300";
      } else {
        dot.className = "slider-dot w-2 h-2 rounded-full bg-white/40 hover:bg-white/80 transition-all duration-300";
      }
    });
    currentSlideIndex = index;
  }

  window.nextSlide = function () {
    const next = (currentSlideIndex + 1) % slides.length;
    showSlide(next);
  };

  window.prevSlide = function () {
    const prev = (currentSlideIndex - 1 + slides.length) % slides.length;
    showSlide(prev);
  };

  window.goToSlide = function (index) {
    showSlide(index);
    resetSliderTimer();
  };

  function startSliderTimer() {
    slideInterval = setInterval(window.nextSlide, 5500);
  }

  function resetSliderTimer() {
    if (slideInterval) clearInterval(slideInterval);
    startSliderTimer();
  }

  showSlide(0);
  startSliderTimer();
}

// ==========================================
// 6. CUTOFF COUNTDOWN TIMER
// ==========================================
function updateCutoffCountdown() {
  const badge = document.getElementById("cutoffCountdown");
  const checkoutNotice = document.getElementById("checkoutCutoffNotice");
  if (!badge && !checkoutNotice) return;

  // Toronto timezone calculation
  const now = new Date();
  const dayOfWeek = now.getDay(); // 0 = Sun, 1 = Mon, ..., 5 = Fri, 6 = Sat
  const currentHour = now.getHours();

  let targetDate = new Date(now);
  let nextDeliveryName = "";
  let cutoffName = "";

  // Cutoff rules:
  // Sunday delivery: cutoff is Friday 12:00 PM
  // Wednesday delivery: cutoff is Monday 12:00 PM
  if (dayOfWeek < 1 || (dayOfWeek === 1 && currentHour < 12)) {
    // Before Monday 12pm -> Wednesday delivery
    targetDate.setDate(now.getDate() + ((1 - dayOfWeek + 7) % 7));
    targetDate.setHours(12, 0, 0, 0);
    nextDeliveryName = "Wednesday Delivery";
    cutoffName = "Mon 12:00 PM";
  } else if (dayOfWeek < 5 || (dayOfWeek === 5 && currentHour < 12)) {
    // Before Friday 12pm -> Sunday delivery
    targetDate.setDate(now.getDate() + ((5 - dayOfWeek + 7) % 7));
    targetDate.setHours(12, 0, 0, 0);
    nextDeliveryName = "Sunday Delivery";
    cutoffName = "Fri 12:00 PM";
  } else {
    // After Friday 12pm -> Next Wednesday delivery (Cutoff next Monday 12pm)
    const daysUntilNextMon = ((1 - dayOfWeek + 7) % 7) || 7;
    targetDate.setDate(now.getDate() + daysUntilNextMon);
    targetDate.setHours(12, 0, 0, 0);
    nextDeliveryName = "Wednesday Delivery";
    cutoffName = "Mon 12:00 PM";
  }

  const diffMs = targetDate - now;
  const diffHours = Math.floor(diffMs / (1000 * 60 * 60));
  const diffMins = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
  const diffSecs = Math.floor((diffMs % (1000 * 60)) / 1000);

  const countdownText = `⏱️ Next cutoff for <strong>${nextDeliveryName}</strong> (${cutoffName}) in <strong>${diffHours}h ${diffMins}m ${diffSecs}s</strong>`;

  if (badge) {
    badge.innerHTML = countdownText;
  }
  if (checkoutNotice) {
    checkoutNotice.innerHTML = `Orders placed today lock in for <strong>${nextDeliveryName}</strong>. Cutoff closes in <strong>${diffHours}h ${diffMins}m</strong>.`;
  }
}

// ==========================================
// 7. MENU RENDERING & FILTERING
// ==========================================
function renderMenuGrid() {
  const container = document.getElementById("menuGrid");
  if (!container) return;

  const filtered = MENU_ITEMS.filter(item => {
    if (currentCategoryFilter === "all") return true;
    return item.category === currentCategoryFilter;
  });

  container.innerHTML = filtered.map(meal => {
    return `
      <div class="meal-card group bg-white dark:bg-[#0E223D] rounded-2xl overflow-hidden border border-slate-200/80 dark:border-white/10 flex flex-col justify-between shadow-sm">
        <div class="relative overflow-hidden bg-slate-100 dark:bg-slate-800 h-52 sm:h-56">
          <img 
            src="${meal.image}" 
            alt="${meal.name}" 
            loading="lazy"
            onerror="this.src='public/images/meals/grilled-chicken.jpg'"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
          />
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
          
          <!-- Category & Popular Badges -->
          <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
            ${meal.popular ? `
              <span class="px-2.5 py-0.5 rounded-full text-[11px] font-black uppercase tracking-wider bg-greek-gold text-greek-navy shadow">
                ★ Best Seller
              </span>
            ` : ''}
            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-black/60 text-white backdrop-blur-md">
              ${meal.category}
            </span>
          </div>

          <!-- Price Tag Badge in CAD -->
          <div class="absolute bottom-3 right-3 bg-greek-navy/90 text-greek-gold px-3 py-1 rounded-xl font-black text-base shadow border border-greek-gold/30 backdrop-blur-md">
            $${meal.price.toFixed(2)} <span class="text-[10px] text-white/80 font-semibold">CAD</span>
          </div>

          <!-- Sides included badge -->
          <div class="absolute bottom-3 left-3">
            ${meal.hasSides ? `
              <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-300 bg-black/70 px-2 py-0.5 rounded-md backdrop-blur-md border border-emerald-400/30">
                ✓ 2 Sides Included
              </span>
            ` : `
              <span class="inline-flex items-center gap-1 text-[11px] font-bold text-amber-300 bg-black/70 px-2 py-0.5 rounded-md backdrop-blur-md border border-amber-400/30">
                Complete Dish (No Sides)
              </span>
            `}
          </div>
        </div>

        <!-- Meal Details -->
        <div class="p-5 flex-1 flex flex-col justify-between">
          <div>
            <h3 class="text-lg font-black text-greek-navy dark:text-white group-hover:text-greek-gold transition-colors leading-tight mb-1.5">
              ${meal.name}
            </h3>
            <p class="text-xs text-slate-600 dark:text-slate-300 line-clamp-2 leading-relaxed mb-3">
              ${meal.description}
            </p>

            <!-- Macros Bar -->
            <div class="grid grid-cols-4 gap-1.5 py-2 px-3 rounded-xl bg-greek-cream dark:bg-white/5 border border-slate-200 dark:border-white/5 text-center text-[11px] mb-4">
              <div>
                <span class="text-[10px] text-slate-400 block font-medium">Cal</span>
                <strong class="font-bold text-greek-navy dark:text-white">${meal.calories}</strong>
              </div>
              <div>
                <span class="text-[10px] text-slate-400 block font-medium">Protein</span>
                <strong class="font-bold text-greek-lime">${meal.protein}</strong>
              </div>
              <div>
                <span class="text-[10px] text-slate-400 block font-medium">Carbs</span>
                <strong class="font-bold text-slate-700 dark:text-slate-200">${meal.carbs}</strong>
              </div>
              <div>
                <span class="text-[10px] text-slate-400 block font-medium">Fat</span>
                <strong class="font-bold text-slate-700 dark:text-slate-200">${meal.fat}</strong>
              </div>
            </div>
          </div>

          <!-- Action Button -->
          <div>
            ${meal.hasSides ? `
              <button 
                onclick="openSideCustomizer('${meal.id}')"
                class="w-full py-2.5 px-4 rounded-xl text-xs font-black btn-gold flex items-center justify-center gap-2"
              >
                <span>Select 2 Sides &amp; Add</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
              </button>
            ` : `
              <button 
                onclick="addQuickMealDirectly('${meal.id}')"
                class="w-full py-2.5 px-4 rounded-xl text-xs font-black btn-navy flex items-center justify-center gap-2"
              >
                <span>Add Complete Plate</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
              </button>
            `}
          </div>
        </div>
      </div>
    `;
  }).join("");
}

function filterCategory(category, buttonEl) {
  currentCategoryFilter = category;
  document.querySelectorAll(".category-tab-btn").forEach(btn => {
    btn.classList.remove("active", "bg-greek-navy", "text-white", "dark:bg-greek-gold", "dark:text-greek-navy");
    btn.classList.add("bg-white", "dark:bg-white/5", "text-slate-700", "dark:text-slate-300");
  });

  if (buttonEl) {
    buttonEl.classList.add("active", "bg-greek-navy", "text-white");
    buttonEl.classList.remove("bg-white", "dark:bg-white/5", "text-slate-700", "dark:text-slate-300");
  }

  renderMenuGrid();
}

// ==========================================
// 8. SIDE CUSTOMIZER MODAL
// ==========================================
function openSideCustomizer(mealId) {
  const meal = MENU_ITEMS.find(m => m.id === mealId);
  if (!meal) return;
  currentCustomizingMeal = meal;

  const modal = document.getElementById("sideModal");
  if (!modal) return;

  // Set Modal Headings & Picture
  document.getElementById("modalMealName").innerText = meal.name;
  document.getElementById("modalMealPrice").innerText = `$${meal.price.toFixed(2)} CAD`;
  document.getElementById("modalMealDesc").innerText = meal.description;
  const modalImg = document.getElementById("modalMealImg");
  if (modalImg) modalImg.src = meal.image;

  // Render Side 1 Options
  const side1Container = document.getElementById("side1Options");
  side1Container.innerHTML = SIDES_LIST.map((side, i) => `
    <label class="flex items-center gap-2.5 p-2.5 rounded-xl border border-slate-200 dark:border-white/10 hover:border-greek-gold cursor-pointer transition text-xs font-medium bg-slate-50 dark:bg-white/5">
      <input type="radio" name="modal_side1" value="${side}" ${i === 0 ? 'checked' : ''} class="text-greek-gold focus:ring-greek-gold" />
      <span>${side}</span>
    </label>
  `).join("");

  // Render Side 2 Options
  const side2Container = document.getElementById("side2Options");
  side2Container.innerHTML = SIDES_LIST.map((side, i) => `
    <label class="flex items-center gap-2.5 p-2.5 rounded-xl border border-slate-200 dark:border-white/10 hover:border-greek-gold cursor-pointer transition text-xs font-medium bg-slate-50 dark:bg-white/5">
      <input type="radio" name="modal_side2" value="${side}" ${i === 5 ? 'checked' : ''} class="text-greek-gold focus:ring-greek-gold" />
      <span>${side}</span>
    </label>
  `).join("");

  // Render Extra Sides Options (+ $4.99 CAD)
  const extraSidesContainer = document.getElementById("extraSidesOptions");
  extraSidesContainer.innerHTML = SIDES_LIST.map(side => `
    <label class="flex items-center justify-between p-2 rounded-lg border border-slate-200 dark:border-white/10 hover:border-greek-lime cursor-pointer transition text-xs bg-white dark:bg-white/5">
      <div class="flex items-center gap-2">
        <input type="checkbox" name="modal_extra_sides" value="${side}" onchange="updateCustomizerSubtotal()" class="text-greek-lime rounded focus:ring-greek-lime" />
        <span>${side}</span>
      </div>
      <span class="text-[11px] font-bold text-greek-lime">+$${EXTRA_SIDE_PRICE.toFixed(2)}</span>
    </label>
  `).join("");

  document.getElementById("modalMealNotes").value = "";
  updateCustomizerSubtotal();

  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function updateCustomizerSubtotal() {
  if (!currentCustomizingMeal) return;
  const checkedExtras = document.querySelectorAll("input[name='modal_extra_sides']:checked");
  const extraCost = checkedExtras.length * EXTRA_SIDE_PRICE;
  const total = currentCustomizingMeal.price + extraCost;

  const btn = document.getElementById("confirmAddCustomMealBtn");
  if (btn) {
    btn.innerHTML = `<span>Add to Order · $${total.toFixed(2)} CAD</span>`;
  }
}

function closeSideModal() {
  const modal = document.getElementById("sideModal");
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
  currentCustomizingMeal = null;
}

function confirmAddCustomMeal() {
  if (!currentCustomizingMeal) return;

  const side1Radio = document.querySelector("input[name='modal_side1']:checked");
  const side2Radio = document.querySelector("input[name='modal_side2']:checked");
  const side1 = side1Radio ? side1Radio.value : SIDES_LIST[0];
  const side2 = side2Radio ? side2Radio.value : SIDES_LIST[5];

  const extraSidesChecked = Array.from(document.querySelectorAll("input[name='modal_extra_sides']:checked")).map(cb => cb.value);
  const notes = document.getElementById("modalMealNotes")?.value.trim() || "";

  const cartItem = {
    cartItemId: "item_" + Date.now() + "_" + Math.random().toString(36).substr(2, 4),
    mealId: currentCustomizingMeal.id,
    name: currentCustomizingMeal.name,
    basePrice: currentCustomizingMeal.price,
    extraSidesPrice: extraSidesChecked.length * EXTRA_SIDE_PRICE,
    unitPrice: currentCustomizingMeal.price + (extraSidesChecked.length * EXTRA_SIDE_PRICE),
    quantity: 1,
    image: currentCustomizingMeal.image,
    side1: side1,
    side2: side2,
    extraSides: extraSidesChecked,
    notes: notes,
    hasSides: true
  };

  addItemToCart(cartItem);
  closeSideModal();
  openCartDrawer();
}

function addQuickMealDirectly(mealId) {
  const meal = MENU_ITEMS.find(m => m.id === mealId);
  if (!meal) return;

  const cartItem = {
    cartItemId: "item_" + Date.now() + "_" + Math.random().toString(36).substr(2, 4),
    mealId: meal.id,
    name: meal.name,
    basePrice: meal.price,
    extraSidesPrice: 0,
    unitPrice: meal.price,
    quantity: 1,
    image: meal.image,
    side1: null,
    side2: null,
    extraSides: [],
    notes: "Prepared complete (no extra sides)",
    hasSides: false
  };

  addItemToCart(cartItem);
  openCartDrawer();
}

// ==========================================
// 9. CART MANAGEMENT & 6-MEAL / 10% DISCOUNT
// ==========================================
function addItemToCart(item) {
  // Check if identical item already in cart
  const existingIdx = cart.findIndex(c => 
    c.mealId === item.mealId &&
    c.side1 === item.side1 &&
    c.side2 === item.side2 &&
    JSON.stringify(c.extraSides) === JSON.stringify(item.extraSides) &&
    c.notes === item.notes
  );

  if (existingIdx > -1) {
    cart[existingIdx].quantity += item.quantity;
  } else {
    cart.push(item);
  }

  saveCart();
  renderCartDrawer();
  showToast(`Added "${item.name}" to your order.`);
}

function updateItemQuantity(cartItemId, delta) {
  const idx = cart.findIndex(c => c.cartItemId === cartItemId);
  if (idx === -1) return;

  cart[idx].quantity += delta;
  if (cart[idx].quantity <= 0) {
    cart.splice(idx, 1);
  }

  saveCart();
  renderCartDrawer();
}

function removeCartItem(cartItemId) {
  cart = cart.filter(c => c.cartItemId !== cartItemId);
  saveCart();
  renderCartDrawer();
}

function clearCart() {
  cart = [];
  saveCart();
  renderCartDrawer();
}

function saveCart() {
  try {
    localStorage.setItem("gfk_cart", JSON.stringify(cart));
  } catch (e) {}
}

function getCartCalculations() {
  const totalMealsCount = cart.reduce((sum, item) => sum + item.quantity, 0);
  const foodSubtotal = cart.reduce((sum, item) => sum + (item.unitPrice * item.quantity), 0);

  // 10% discount for 7+ meals
  const hasVolumeDiscount = totalMealsCount >= 7;
  const discountAmount = hasVolumeDiscount ? (foodSubtotal * (PROMOTION_DISCOUNT_PERCENT / 100)) : 0;
  const discountedSubtotal = foodSubtotal - discountAmount;

  // Delivery fee
  const actualDeliveryFee = deliveryMethod === "pickup" ? 0 : calculatedDeliveryFee;

  // 13% Ontario HST on food & delivery
  const taxRate = 0.13;
  const taxAmount = (discountedSubtotal + actualDeliveryFee) * taxRate;
  const grandTotal = discountedSubtotal + actualDeliveryFee + taxAmount;

  const isMinMealsMet = totalMealsCount >= MINIMUM_MEALS;
  const mealsNeededForMin = Math.max(0, MINIMUM_MEALS - totalMealsCount);
  const mealsNeededForDiscount = Math.max(0, 7 - totalMealsCount);

  return {
    totalMealsCount,
    foodSubtotal,
    hasVolumeDiscount,
    discountAmount,
    discountedSubtotal,
    deliveryFee: actualDeliveryFee,
    taxAmount,
    grandTotal,
    isMinMealsMet,
    mealsNeededForMin,
    mealsNeededForDiscount
  };
}

function renderCartDrawer() {
  const calc = getCartCalculations();

  // Badges in Header & Mobile
  document.querySelectorAll(".cart-count-badge").forEach(el => {
    el.innerText = calc.totalMealsCount;
    el.style.display = calc.totalMealsCount > 0 ? "flex" : "none";
  });

  const cartList = document.getElementById("cartItemsList");
  const emptyState = document.getElementById("cartEmptyState");
  const filledState = document.getElementById("cartFilledState");

  if (!cartList) return;

  if (cart.length === 0) {
    if (emptyState) emptyState.classList.remove("hidden");
    if (filledState) filledState.classList.add("hidden");
    return;
  }

  if (emptyState) emptyState.classList.add("hidden");
  if (filledState) filledState.classList.remove("hidden");

  // Render 6-Meal Minimum Progress Bar
  const progressContainer = document.getElementById("cartMinMealProgress");
  if (progressContainer) {
    const percent = Math.min(100, Math.round((calc.totalMealsCount / MINIMUM_MEALS) * 100));
    progressContainer.innerHTML = `
      <div class="p-3 rounded-xl bg-greek-cream dark:bg-white/5 border ${calc.isMinMealsMet ? 'border-greek-lime' : 'border-greek-gold/40'}">
        <div class="flex items-center justify-between text-xs font-bold mb-1.5">
          <span class="flex items-center gap-1.5 ${calc.isMinMealsMet ? 'text-greek-lime' : 'text-greek-gold'}">
            ${calc.isMinMealsMet ? '✓ 6-Meal Minimum Reached!' : `📦 Minimum 6 Meals: ${calc.totalMealsCount} of 6 selected`}
          </span>
          <span class="text-slate-500 font-semibold text-[11px]">${calc.totalMealsCount} meals</span>
        </div>
        <div class="w-full bg-slate-200 dark:bg-slate-700 h-2.5 rounded-full overflow-hidden">
          <div class="h-full rounded-full transition-all duration-300 ${calc.isMinMealsMet ? 'bg-greek-lime pulse-green' : 'bg-greek-gold'}" style="width: ${percent}%;"></div>
        </div>
        ${!calc.isMinMealsMet ? `
          <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1.5">
            Add <strong>${calc.mealsNeededForMin} more meal${calc.mealsNeededForMin > 1 ? 's' : ''}</strong> to unlock checkout.
          </p>
        ` : `
          <p class="text-[11px] text-greek-lime font-semibold mt-1">
            ${calc.hasVolumeDiscount ? '🎉 10% volume discount active!' : `💡 Add 1 more meal to unlock an extra 10% OFF!` }
          </p>
        `}
      </div>
    `;
  }

  // Render Items List
  cartList.innerHTML = cart.map(item => `
    <div class="p-3 rounded-xl border border-slate-200 dark:border-white/10 bg-white dark:bg-white/5 flex gap-3 text-xs">
      <img src="${item.image}" alt="${item.name}" class="w-16 h-16 rounded-lg object-cover bg-slate-100 flex-shrink-0" />
      <div class="flex-1 flex flex-col justify-between">
        <div class="flex items-start justify-between gap-1">
          <div>
            <h4 class="font-black text-greek-navy dark:text-white leading-tight">${item.name}</h4>
            <div class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">
              ${item.hasSides ? `
                <div class="text-slate-600 dark:text-slate-300">Sides: <span class="font-medium text-greek-navy dark:text-greek-gold">${item.side1}</span> &amp; <span class="font-medium text-greek-navy dark:text-greek-gold">${item.side2}</span></div>
              ` : `
                <span class="italic text-slate-400">Complete dish (no sides)</span>
              `}
              ${item.extraSides && item.extraSides.length > 0 ? `
                <div class="text-greek-lime font-medium mt-0.5">+ Extra: ${item.extraSides.join(", ")} (+$${(item.extraSides.length * EXTRA_SIDE_PRICE).toFixed(2)})</div>
              ` : ''}
              ${item.notes ? `<div class="italic text-[10px] text-slate-400">Note: "${item.notes}"</div>` : ''}
            </div>
          </div>
          <button onclick="removeCartItem('${item.cartItemId}')" class="text-slate-400 hover:text-red-500 p-1 transition" title="Remove Item">
            ✕
          </button>
        </div>

        <div class="flex items-center justify-between mt-2 pt-2 border-t border-slate-100 dark:border-white/5">
          <div class="flex items-center border border-slate-200 dark:border-white/10 rounded-lg overflow-hidden bg-slate-50 dark:bg-white/5">
            <button onclick="updateItemQuantity('${item.cartItemId}', -1)" class="px-2 py-0.5 hover:bg-slate-200 dark:hover:bg-white/10 font-bold text-slate-700 dark:text-slate-200">−</button>
            <span class="px-2 py-0.5 font-bold text-xs">${item.quantity}</span>
            <button onclick="updateItemQuantity('${item.cartItemId}', 1)" class="px-2 py-0.5 hover:bg-slate-200 dark:hover:bg-white/10 font-bold text-slate-700 dark:text-slate-200">+</button>
          </div>
          <span class="font-black text-greek-navy dark:text-greek-gold text-xs">
            $${(item.unitPrice * item.quantity).toFixed(2)} CAD
          </span>
        </div>
      </div>
    </div>
  `).join("");

  // Update Summary Pricing
  document.getElementById("cartFoodSubtotal").innerText = `$${calc.foodSubtotal.toFixed(2)} CAD`;
  
  const discountRow = document.getElementById("cartDiscountRow");
  if (discountRow) {
    if (calc.hasVolumeDiscount) {
      discountRow.classList.remove("hidden");
      document.getElementById("cartDiscountAmount").innerText = `-$${calc.discountAmount.toFixed(2)} CAD`;
    } else {
      discountRow.classList.add("hidden");
    }
  }

  document.getElementById("cartEstDelivery").innerText = deliveryMethod === "pickup" ? "FREE Pickup" : `$${calc.deliveryFee.toFixed(2)} CAD`;
  document.getElementById("cartTaxAmount").innerText = `$${calc.taxAmount.toFixed(2)} CAD`;
  document.getElementById("cartGrandTotal").innerText = `$${calc.grandTotal.toFixed(2)} CAD`;

  // Enable / Disable Checkout button based on 6-meal minimum
  const checkoutBtn = document.getElementById("cartCheckoutBtn");
  if (checkoutBtn) {
    if (calc.isMinMealsMet) {
      checkoutBtn.disabled = false;
      checkoutBtn.className = "w-full py-3.5 px-4 rounded-xl text-sm font-black btn-gold flex items-center justify-center gap-2 cursor-pointer shadow-lg";
      checkoutBtn.innerHTML = `<span>Proceed to Checkout ($${calc.grandTotal.toFixed(2)} CAD)</span> →`;
    } else {
      checkoutBtn.disabled = true;
      checkoutBtn.className = "w-full py-3.5 px-4 rounded-xl text-xs font-bold bg-slate-300 dark:bg-slate-800 text-slate-500 cursor-not-allowed flex items-center justify-center gap-2 opacity-80";
      checkoutBtn.innerHTML = `<span>Minimum 6 Meals Required (Add ${calc.mealsNeededForMin} More)</span>`;
    }
  }
}

function openCartDrawer() {
  renderCartDrawer();
  const drawer = document.getElementById("cartDrawer");
  const overlay = document.getElementById("cartOverlay");
  if (drawer && overlay) {
    drawer.classList.remove("translate-x-full");
    overlay.classList.remove("hidden");
  }
}

function closeCartDrawer() {
  const drawer = document.getElementById("cartDrawer");
  const overlay = document.getElementById("cartOverlay");
  if (drawer && overlay) {
    drawer.classList.add("translate-x-full");
    overlay.classList.add("hidden");
  }
}

// 1-Click 6-Meal Package Starter
function addSixMealPackage() {
  const packageMeals = [
    { id: "grilled-chicken", side1: "Rice Pilaf with Veggies", side2: "Lemon Roasted Potatoes" },
    { id: "salmon", side1: "Lemon Roasted Potatoes", side2: "Steamed Veggies" },
    { id: "chicken-souvlaki-plate", side1: "Yellow Basmati Rice", side2: "Garlic Butter Baked Potatoes" },
    { id: "spinach-feta-stuffed-chicken", side1: "Spinach Mushroom Rice", side2: "Green Beans in Tomato Sauce" },
    { id: "beef-souvlaki-plate", side1: "Yellow Basmati Rice", side2: "Sweet Potatoes" },
    { id: "pork-souvlaki-plate", side1: "Rice Pilaf with Veggies", side2: "Sautéed Veggies" }
  ];

  packageMeals.forEach(pm => {
    const meal = MENU_ITEMS.find(m => m.id === pm.id);
    if (meal) {
      const cartItem = {
        cartItemId: "item_" + Date.now() + "_" + Math.random().toString(36).substr(2, 4),
        mealId: meal.id,
        name: meal.name,
        basePrice: meal.price,
        extraSidesPrice: 0,
        unitPrice: meal.price,
        quantity: 1,
        image: meal.image,
        side1: pm.side1,
        side2: pm.side2,
        extraSides: [],
        notes: "Chef Recommended 6-Meal Starter Plan",
        hasSides: true
      };
      cart.push(cartItem);
    }
  });

  saveCart();
  renderCartDrawer();
  openCartDrawer();
  showToast("6-Meal Starter Package added to your order! Minimum met.");
}

// ==========================================
// 10. DISTANCE CALCULATOR LOGIC ($5.99 + $0.99/KM)
// ==========================================
function calculateDeliveryRate(km) {
  const baseFee = 5.99;
  const perKmRate = 0.99;
  return Number((baseFee + (km * perKmRate)).toFixed(2));
}

function handleDistanceCalculation(distanceVal) {
  const km = parseFloat(distanceVal);
  if (isNaN(km) || km < 0) return;

  calculatedDistanceKm = km;
  calculatedDeliveryFee = calculateDeliveryRate(km);

  const feeDisplay = document.getElementById("calcResultFee");
  const breakDisplay = document.getElementById("calcResultBreakdown");
  if (feeDisplay) {
    feeDisplay.innerText = `$${calculatedDeliveryFee.toFixed(2)} CAD`;
  }
  if (breakDisplay) {
    breakDisplay.innerText = `Base fee $5.99 + (${km} km &times; $0.99/km)`;
  }

  renderCartDrawer();
}

function setPresetDeliveryZone(km, zoneName) {
  const input = document.getElementById("deliveryKmInput");
  if (input) input.value = km;
  handleDistanceCalculation(km);
  showToast(`Updated delivery zone: ${zoneName} (${km} km)`);
}

// ==========================================
// 11. CHECKOUT MODAL & CREDIT CARD GATEWAY
// ==========================================
function openCheckoutModal() {
  const calc = getCartCalculations();
  if (!calc.isMinMealsMet) {
    showToast(`You must order at least 6 meals. Currently ${calc.totalMealsCount} selected.`);
    return;
  }

  closeCartDrawer();
  const modal = document.getElementById("checkoutModal");
  if (!modal) return;

  // Populate checkout summary
  document.getElementById("checkoutMealsCount").innerText = `${calc.totalMealsCount} meals`;
  document.getElementById("checkoutSubtotal").innerText = `$${calc.foodSubtotal.toFixed(2)} CAD`;
  
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

// 1-Click Demo Credit Card Filler for Easy Testing
function fillDemoCreditCard() {
  document.getElementById("ccNumber").value = "4500 1234 5678 9012";
  document.getElementById("ccExpiry").value = "12/28";
  document.getElementById("ccCvc").value = "888";
  document.getElementById("ccName").value = "Dimitrios Papadopoulos";
  document.getElementById("ccPostal").value = "M8W 1P5";
  document.getElementById("checkoutEmail").value = "dimitrios@example.com";
  document.getElementById("checkoutPhone").value = "416-555-0199";
  document.getElementById("checkoutAddress").value = "3200 Lake Shore Blvd W, Unit 4";
  
  detectCardType("4500 1234 5678 9012");
  showToast("Demo card details populated.");
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

// Process Simulated Credit Card Payment Gateway
function handleProcessPayment(event) {
  event.preventDefault();
  const calc = getCartCalculations();

  const ccNum = document.getElementById("ccNumber").value.replace(/\s+/g, '');
  const ccExp = document.getElementById("ccExpiry").value;
  const ccCvc = document.getElementById("ccCvc").value;
  const custName = document.getElementById("ccName").value;
  const custEmail = document.getElementById("checkoutEmail").value;
  const custPhone = document.getElementById("checkoutPhone").value;
  const deliveryAddress = deliveryMethod === "pickup" ? STORE_ADDRESS : document.getElementById("checkoutAddress").value;
  const deliveryDay = document.querySelector("input[name='deliveryDay']:checked")?.value || "Upcoming Sunday";

  if (!custEmail || !custPhone || (deliveryMethod === "delivery" && !deliveryAddress)) {
    alert("Please provide your contact information and delivery address.");
    return;
  }

  if (ccNum.length < 13 || ccExp.length < 4 || ccCvc.length < 3) {
    alert("Please enter a valid credit card number, expiry, and CVC.");
    return;
  }

  // Show processing loader
  const submitBtn = document.getElementById("paySubmitButton");
  const originalText = submitBtn.innerHTML;
  submitBtn.disabled = true;
  submitBtn.innerHTML = `
    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-greek-navy" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
    </svg>
    <span>Connecting Gateway &amp; Authorizing CAD...</span>
  `;

  setTimeout(() => {
    // Generate order record
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
      subtotal: calc.foodSubtotal,
      discount: calc.discountAmount,
      deliveryFee: calc.deliveryFee,
      tax: calc.taxAmount,
      grandTotal: calc.grandTotal,
      status: "Received",
      paymentStatus: "Paid (Credit Card)",
      authCode: "AUTH-" + Math.random().toString(36).substring(2, 8).toUpperCase()
    };

    // Save to orders history
    let existingOrders = [];
    try {
      existingOrders = JSON.parse(localStorage.getItem("gfk_orders") || "[]");
    } catch (e) { existingOrders = []; }
    existingOrders.unshift(orderRecord);
    localStorage.setItem("gfk_orders", JSON.stringify(existingOrders));

    // Reset button & close modal
    submitBtn.disabled = false;
    submitBtn.innerHTML = originalText;
    closeCheckoutModal();

    // Clear cart
    clearCart();

    // Show Confirmation Modal
    showOrderConfirmationModal(orderRecord);
  }, 1200);
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
          ${it.side1 ? `<div class="text-[11px] text-slate-500">Sides: ${it.side1}, ${it.side2}</div>` : ''}
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
// 12. KITCHEN TABLET DASHBOARD INTERACTION
// ==========================================
function initKitchenView() {
  const container = document.getElementById("kitchenOrdersList");
  if (!container) return;

  let orders = [];
  try {
    orders = JSON.parse(localStorage.getItem("gfk_orders") || "[]");
  } catch (e) {
    orders = [];
  }

  if (orders.length === 0) {
    container.innerHTML = `
      <div class="col-span-full py-16 text-center text-slate-400">
        <p class="text-lg font-bold">No prep tickets in queue right now.</p>
        <p class="text-xs mt-1">Orders placed on the customer site will appear here in real time.</p>
      </div>
    `;
    return;
  }

  container.innerHTML = orders.map((order, idx) => {
    let statusClass = "bg-amber-500/20 text-amber-400 border-amber-500/30";
    if (order.status === "In Prep") statusClass = "bg-blue-500/20 text-blue-400 border-blue-500/30";
    if (order.status === "Ready") statusClass = "bg-emerald-500/20 text-emerald-400 border-emerald-500/30";
    if (order.status === "Completed") statusClass = "bg-slate-700 text-slate-400 border-slate-600";

    return `
      <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 flex flex-col justify-between shadow-xl relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-1.5 ${order.deliveryMethod === 'pickup' ? 'bg-amber-400' : 'bg-greek-lime'}"></div>
        
        <div>
          <div class="flex items-center justify-between gap-2 mb-2 pt-1">
            <span class="font-mono font-black text-sm text-greek-gold">#${order.orderId}</span>
            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold border ${statusClass}">
              ${order.status}
            </span>
          </div>

          <div class="mb-3">
            <div class="font-bold text-base text-white">${order.customerName}</div>
            <div class="text-xs text-slate-400">${order.customerPhone} · ${order.deliveryMethod === 'pickup' ? '🛍️ STORE PICKUP' : '🚚 SCHEDULED DELIVERY'}</div>
            <div class="text-[11px] text-greek-gold mt-0.5">📅 Batch: ${order.scheduledDate}</div>
          </div>

          <div class="space-y-2 border-t border-b border-slate-800 py-3 my-3">
            ${order.items.map(item => `
              <div class="text-xs">
                <div class="flex justify-between font-bold text-slate-200">
                  <span>${item.quantity}&times; ${item.name}</span>
                </div>
                ${item.side1 ? `
                  <div class="text-[11px] text-sky-400 pl-3">↳ 1: ${item.side1}</div>
                  <div class="text-[11px] text-sky-400 pl-3">↳ 2: ${item.side2}</div>
                ` : `
                  <div class="text-[11px] text-slate-500 pl-3">↳ Complete plate (no sides)</div>
                `}
                ${item.extraSides && item.extraSides.length ? `
                  <div class="text-[11px] text-greek-lime pl-3">↳ Extra: ${item.extraSides.join(", ")}</div>
                ` : ''}
              </div>
            `).join("")}
          </div>
        </div>

        <div class="space-y-2 pt-2">
          <div class="flex items-center justify-between text-xs text-slate-400">
            <span>Total: <strong>${order.itemCount} meals</strong></span>
            <span class="font-mono font-bold text-white">$${order.grandTotal.toFixed(2)} CAD</span>
          </div>

          <div class="grid grid-cols-3 gap-1.5 pt-2">
            <button onclick="updateKitchenOrderStatus('${order.orderId}', 'In Prep')" class="px-2 py-1.5 rounded-lg bg-blue-900/60 hover:bg-blue-800 text-blue-200 text-xs font-bold transition">
              In Prep
            </button>
            <button onclick="updateKitchenOrderStatus('${order.orderId}', 'Ready')" class="px-2 py-1.5 rounded-lg bg-emerald-900/60 hover:bg-emerald-800 text-emerald-200 text-xs font-bold transition">
              Ready
            </button>
            <button onclick="updateKitchenOrderStatus('${order.orderId}', 'Completed')" class="px-2 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition">
              Done
            </button>
          </div>
        </div>
      </div>
    `;
  }).join("");
}

function updateKitchenOrderStatus(orderId, newStatus) {
  let orders = JSON.parse(localStorage.getItem("gfk_orders") || "[]");
  const idx = orders.findIndex(o => o.orderId === orderId);
  if (idx !== -1) {
    orders[idx].status = newStatus;
    localStorage.setItem("gfk_orders", JSON.stringify(orders));
    initKitchenView();
  }
}

// ==========================================
// 13. TOAST NOTIFICATIONS
// ==========================================
function showToast(message) {
  let toast = document.getElementById("siteToast");
  if (!toast) {
    toast = document.createElement("div");
    toast.id = "siteToast";
    toast.className = "fixed bottom-5 right-5 z-50 bg-greek-navy text-white px-4 py-3 rounded-xl shadow-2xl border border-greek-gold/40 text-xs font-bold flex items-center gap-3 transition-all duration-300 transform translate-y-20 opacity-0";
    document.body.appendChild(toast);
  }

  toast.innerHTML = `
    <span class="w-2 h-2 rounded-full bg-greek-gold"></span>
    <span>${message}</span>
  `;

  toast.classList.remove("translate-y-20", "opacity-0");
  toast.classList.add("translate-y-0", "opacity-100");

  setTimeout(() => {
    toast.classList.remove("translate-y-0", "opacity-100");
    toast.classList.add("translate-y-20", "opacity-0");
  }, 3200);
}

// ==========================================
// 14. INITIALIZATION HOOK
// ==========================================
document.addEventListener("DOMContentLoaded", () => {
  initTheme();
  initHeroSlider();
  renderMenuGrid();
  renderCartDrawer();
  updateCutoffCountdown();
  setInterval(updateCutoffCountdown, 1000);

  // Setup CC number spacing
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
      if (parts.length) {
        e.target.value = parts.join(' ');
      } else {
        e.target.value = v;
      }
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

  // Kitchen tablet view auto-run
  if (document.getElementById("kitchenOrdersList")) {
    initKitchenView();
  }
});
