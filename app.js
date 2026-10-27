/**
 * Greek Fit Kitchen - Core Application Logic
 * High performance, zero dependencies
 */

// 1. Menu Dishes Catalog from Official Flyer
const MENU_ITEMS = [
  {
    id: "grilled-chicken",
    name: "Grilled Chicken",
    price: 12.99,
    category: "poultry",
    image: "public/images/meals/grilled-chicken.jpg",
    description: "Tender herb-marinated chicken breast flame-grilled to perfection with Greek oregano and lemon.",
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
    description: "Slow-roasted bone-in chicken leg quarters seasoned with aromatic garlic, thyme, and citrus.",
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
    description: "Clean, ultra-lean sliced chicken fillet seared with Aegean sea salt and virgin olive oil.",
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
    description: "Pan-seared premium Atlantic salmon fillet rich in Omega-3 fatty acids, topped with dill and lemon butter.",
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
    description: "Chicken breast rolled with sautéed baby spinach, Kalamata herbs, and authentic authentic Greek feta cheese.",
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
    description: "Traditional Greek marinated chicken skewers grilled over flame with olive oil and wild mountain oregano.",
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
    description: "Yogurt-marinated chicken breast infused with warming spices, char-grilled for authentic smoky depth.",
    calories: 450,
    protein: "48g",
    carbs: "12g",
    fat: "11g",
    popular: false,
    hasSides: true
  },
  {
    id: "beef-souvlaki-plate",
    name: "Beef Souvlaki Plate",
    price: 13.99,
    category: "beef",
    image: "public/images/meals/beef-souvlaki.jpg",
    description: "Prime cuts of lean beef skewered with Mediterranean peppers and char-grilled medium-rare.",
    calories: 490,
    protein: "46g",
    carbs: "11g",
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
    description: "Grilled chicken breast smothered in a silky cremini and porcini mushroom garlic herb reduction.",
    calories: 470,
    protein: "47g",
    carbs: "15g",
    fat: "14g",
    popular: false,
    hasSides: true
  },
  {
    id: "pork-souvlaki-plate",
    name: "Pork Souvlaki Plate",
    price: 9.99,
    category: "pork",
    image: "public/images/meals/pork-souvlaki.jpg",
    description: "Authentic Athenian pork tenderloin skewers, delicately seasoned with lemon juice and cracked pepper.",
    calories: 440,
    protein: "43g",
    carbs: "9g",
    fat: "13g",
    popular: false,
    hasSides: true
  },
  {
    id: "chicken-fajita",
    name: "Chicken Fajita",
    price: 12.99,
    category: "poultry",
    image: "public/images/meals/chicken-fajita.jpg",
    description: "Sliced grilled chicken tossed with caramelized sweet bell peppers, Spanish onions, and mild spices.",
    calories: 410,
    protein: "44g",
    carbs: "20g",
    fat: "10g",
    popular: false,
    hasSides: true
  },
  {
    id: "spinach-pie-dinner",
    name: "Spinach Pie Dinner (Spanakopita)",
    price: 12.99,
    category: "vegetarian",
    image: "public/images/meals/spinach-pie.jpg",
    description: "Crispy golden layered phyllo pastry filled with fresh spinach, scallions, eggs, and creamy feta.",
    calories: 460,
    protein: "21g",
    carbs: "38g",
    fat: "19g",
    popular: false,
    hasSides: true
  },
  {
    id: "beef-fajita",
    name: "Beef Fajita",
    price: 14.99,
    category: "beef",
    image: "public/images/meals/beef-fajita.jpg",
    description: "Seared lean flank steak strips sizzled with tri-color sweet peppers and charred sweet onions.",
    calories: 490,
    protein: "45g",
    carbs: "18g",
    fat: "15g",
    popular: false,
    hasSides: true
  },
  {
    id: "pasta-al-greco",
    name: "Pasta al Greco",
    price: 9.99,
    category: "pasta",
    image: "public/images/meals/pasta-al-greco.jpg",
    description: "Whole wheat penne tossed in rich roasted garlic tomato sauce, Kalamata olives, capers, and crumbled feta. (No sides included)",
    calories: 520,
    protein: "22g",
    carbs: "72g",
    fat: "12g",
    popular: false,
    hasSides: false // Excludes sides per flyer
  },
  {
    id: "beef-mushroom-sauce",
    name: "Beef Mushroom Sauce",
    price: 14.99,
    category: "beef",
    image: "public/images/meals/beef-mushroom.jpg",
    description: "Slow-braised tender beef medallions ladled with a velvety roasted wild mushroom and red wine demi.",
    calories: 510,
    protein: "48g",
    carbs: "14g",
    fat: "18g",
    popular: false,
    hasSides: true
  },
  {
    id: "smoked-pork-loin",
    name: "Smoked Pork Loin",
    price: 12.99,
    category: "pork",
    image: "public/images/meals/smoked-pork-loin.jpg",
    description: "Applewood hardwood smoked lean pork loin chops carved thin and served with natural pan jus.",
    calories: 430,
    protein: "45g",
    carbs: "8g",
    fat: "12g",
    popular: false,
    hasSides: true
  },
  {
    id: "smoked-turkey-breast",
    name: "Smoked Turkey Breast",
    price: 13.99,
    category: "poultry",
    image: "public/images/meals/smoked-turkey.jpg",
    description: "Ultra-clean smoked artisan turkey breast seasoned with cracked peppercorn and Aegean sage.",
    calories: 380,
    protein: "51g",
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
    description: "Char-grilled lean turkey tenderloin cubes infused with lemon garlic herb marinade.",
    calories: 420,
    protein: "48g",
    carbs: "9g",
    fat: "8g",
    popular: false,
    hasSides: true
  }
];

// Available sides from flyer (Any plate comes with 2 sides of your choice, except Pasta al Greco)
const AVAILABLE_SIDES = [
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

// 2. Application State
const state = {
  cart: JSON.parse(localStorage.getItem('gfk_cart') || '[]'),
  selectedDish: null,
  deliveryMethod: 'delivery', // 'delivery' or 'pickup'
  deliveryDistanceKm: 4.5,
  scheduledDay: 'Sunday',
  activeCategory: 'all',
  customerOrders: JSON.parse(localStorage.getItem('gfk_orders') || '[]')
};

// 3. Theme Management (User Rule 1)
function initTheme() {
  const savedTheme = localStorage.getItem('gfk_theme');
  const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
  
  if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark');
  }
  updateThemeIcon();
}

function toggleTheme() {
  const isDark = document.documentElement.classList.toggle('dark');
  localStorage.setItem('gfk_theme', isDark ? 'dark' : 'light');
  updateThemeIcon();
}

function updateThemeIcon() {
  const isDark = document.documentElement.classList.contains('dark');
  const moonIcons = document.querySelectorAll('.theme-icon-moon');
  const sunIcons = document.querySelectorAll('.theme-icon-sun');
  
  moonIcons.forEach(el => {
    el.style.display = isDark ? 'none' : 'block';
  });
  sunIcons.forEach(el => {
    el.style.display = isDark ? 'block' : 'none';
  });
}

// 4. Hero Slider Implementation
let currentSlide = 0;
let slideInterval = null;

function initSlider() {
  const slides = document.querySelectorAll('.slide-item');
  const dots = document.querySelectorAll('.slider-dot');
  if (!slides.length) return;

  function showSlide(index) {
    slides.forEach((s, idx) => {
      s.classList.toggle('active', idx === index);
    });
    dots.forEach((d, idx) => {
      d.classList.toggle('bg-sky-400', idx === index);
      d.classList.toggle('w-8', idx === index);
      d.classList.toggle('bg-white/40', idx !== index);
      d.classList.toggle('w-2.5', idx !== index);
    });
    currentSlide = index;
  }

  window.nextSlide = function() {
    let next = (currentSlide + 1) % slides.length;
    showSlide(next);
  };

  window.prevSlide = function() {
    let prev = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(prev);
  };

  window.goToSlide = function(index) {
    showSlide(index);
    resetSliderInterval();
  };

  function startSliderInterval() {
    slideInterval = setInterval(window.nextSlide, 5500);
  }

  function resetSliderInterval() {
    if (slideInterval) clearInterval(slideInterval);
    startSliderInterval();
  }

  const sliderContainer = document.getElementById('heroSlider');
  if (sliderContainer) {
    sliderContainer.addEventListener('mouseenter', () => clearInterval(slideInterval));
    sliderContainer.addEventListener('mouseleave', startSliderInterval);
  }

  startSliderInterval();
}

// 5. Order Cutoff Countdown (Toronto Local Time)
function updateCutoffCountdown() {
  const now = new Date();
  // Toronto is in Eastern Time (America/Toronto)
  const estString = now.toLocaleString("en-US", { timeZone: "America/Toronto" });
  const torontoNow = new Date(estString);
  const currentDay = torontoNow.getDay(); // 0 is Sunday, 1 Monday, 5 Friday
  
  // Cutoffs:
  // For Sunday Delivery: Order by Friday 12:00 PM
  // For Wednesday Delivery: Order by Monday 12:00 PM
  const countdownEl = document.getElementById('cutoffCountdown');
  const nextDeliveryBadge = document.getElementById('nextDeliveryBadge');
  if (!countdownEl) return;

  let targetDate = new Date(torontoNow);
  let nextDeliveryName = "Sunday Delivery";

  if (currentDay < 1 || (currentDay === 1 && torontoNow.getHours() < 12)) {
    // Next cutoff is Monday 12 PM for Wednesday delivery
    targetDate.setDate(torontoNow.getDate() + ((1 - currentDay + 7) % 7));
    targetDate.setHours(12, 0, 0, 0);
    nextDeliveryName = "Wednesday Delivery";
  } else if (currentDay < 5 || (currentDay === 5 && torontoNow.getHours() < 12)) {
    // Next cutoff is Friday 12 PM for Sunday delivery
    targetDate.setDate(torontoNow.getDate() + ((5 - currentDay + 7) % 7));
    targetDate.setHours(12, 0, 0, 0);
    nextDeliveryName = "Sunday Delivery";
  } else {
    // Past Friday 12 PM -> Next cutoff is Monday 12 PM
    targetDate.setDate(torontoNow.getDate() + ((1 - currentDay + 7) % 7));
    targetDate.setHours(12, 0, 0, 0);
    nextDeliveryName = "Wednesday Delivery";
  }

  const diffMs = targetDate - torontoNow;
  if (diffMs > 0) {
    const hours = Math.floor(diffMs / (1000 * 60 * 60));
    const mins = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
    const secs = Math.floor((diffMs % (1000 * 60)) / 1000);
    countdownEl.innerHTML = `<span class="text-amber-400 font-bold">${hours}h ${mins}m ${secs}s</span> left to order for <strong>${nextDeliveryName}</strong>`;
    if (nextDeliveryBadge) {
      nextDeliveryBadge.innerText = `Cutoff in ${hours}h ${mins}m`;
    }
  }
}

// 6. Delivery Distance Calculator
function calculateDeliveryFee(distanceKm, method = 'delivery') {
  if (method === 'pickup') return 0;
  const km = parseFloat(distanceKm) || 0;
  if (km <= 2) {
    return 0; // Up to 2 km: Free
  } else if (km <= 5) {
    return 5.00; // Over 2 km and up to 5 km: $5
  } else {
    return km * 1.00; // Over 5 km: $1 per km
  }
}

function updateDistanceCalculatorUI() {
  const input = document.getElementById('calcDistanceInput');
  const resultFee = document.getElementById('calcResultFee');
  const resultBadge = document.getElementById('calcResultBadge');
  if (!input || !resultFee) return;

  const km = parseFloat(input.value) || 0;
  state.deliveryDistanceKm = km;
  const fee = calculateDeliveryFee(km, 'delivery');

  if (km <= 2) {
    resultFee.innerHTML = `<span class="text-emerald-500 font-bold text-2xl">FREE</span>`;
    resultBadge.innerHTML = `<span class="bg-emerald-500/20 text-emerald-400 text-xs px-2.5 py-1 rounded-full font-semibold">Under 2 km Free Zone</span>`;
  } else if (km <= 5) {
    resultFee.innerHTML = `<span class="text-sky-400 font-bold text-2xl">$5.00 CAD</span>`;
    resultBadge.innerHTML = `<span class="bg-sky-500/20 text-sky-400 text-xs px-2.5 py-1 rounded-full font-semibold">Standard Local Zone (2–5 km)</span>`;
  } else {
    resultFee.innerHTML = `<span class="text-amber-400 font-bold text-2xl">$${fee.toFixed(2)} CAD</span>`;
    resultBadge.innerHTML = `<span class="bg-amber-500/20 text-amber-400 text-xs px-2.5 py-1 rounded-full font-semibold">Extended Zone ($1.00/km)</span>`;
  }

  updateCartSummary();
}

// 7. Menu Rendering & Filtering
function renderMenu(category = 'all') {
  const container = document.getElementById('menuGrid');
  if (!container) return;

  const filtered = category === 'all' 
    ? MENU_ITEMS 
    : MENU_ITEMS.filter(item => item.category === category);

  container.innerHTML = filtered.map(item => `
    <div class="group glass-card rounded-2xl overflow-hidden flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-sky-500/10 border border-slate-200 dark:border-slate-800">
      <div class="relative overflow-hidden aspect-[4/3] bg-slate-100 dark:bg-slate-900">
        <img src="${item.image}" alt="${item.name}" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
        <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
          ${item.popular ? `<span class="badge-gold text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full shadow">Chef's Pick</span>` : ''}
          ${!item.hasSides ? `<span class="bg-slate-800/90 text-white text-[11px] font-medium px-2 py-0.5 rounded-full backdrop-blur-sm">No Sides</span>` : `<span class="bg-sky-600/90 text-white text-[11px] font-semibold px-2 py-0.5 rounded-full backdrop-blur-sm">2 Sides Included</span>`}
        </div>
        <div class="absolute bottom-3 right-3 bg-slate-900/80 backdrop-blur-md text-white text-xs px-2.5 py-1 rounded-full font-semibold">
          🔥 ${item.calories} kcal · 💪 ${item.protein}
        </div>
      </div>

      <div class="p-5 flex-1 flex flex-col justify-between">
        <div>
          <div class="flex items-start justify-between gap-2 mb-2">
            <h3 class="font-bold text-lg text-slate-900 dark:text-white group-hover:text-sky-500 transition-colors">
              ${item.name}
            </h3>
            <span class="text-lg font-black text-sky-600 dark:text-sky-400 whitespace-nowrap">
              $${item.price.toFixed(2)}
            </span>
          </div>
          <p class="text-xs text-slate-600 dark:text-slate-400 line-clamp-2 mb-4 leading-relaxed">
            ${item.description}
          </p>
          
          <div class="flex items-center gap-3 text-[11px] text-slate-500 dark:text-slate-400 mb-4 bg-slate-100/70 dark:bg-slate-800/60 p-2 rounded-lg">
            <span>Carbs: <strong>${item.carbs}</strong></span>
            <span>·</span>
            <span>Fat: <strong>${item.fat}</strong></span>
            <span>·</span>
            <span class="text-emerald-600 dark:text-emerald-400 font-semibold">Fresh Prep</span>
          </div>
        </div>

        <button onclick="openMealCustomizer('${item.id}')" class="w-full py-2.5 px-4 bg-sky-600 hover:bg-sky-500 active:scale-[0.98] text-white font-semibold text-sm rounded-xl transition-all shadow-md shadow-sky-600/20 flex items-center justify-center gap-2">
          <span>Customize &amp; Add</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
        </button>
      </div>
    </div>
  `).join('');
}

// 8. Meal Customization Modal
function openMealCustomizer(dishId) {
  const dish = MENU_ITEMS.find(m => m.id === dishId);
  if (!dish) return;
  state.selectedDish = dish;

  const modal = document.getElementById('mealCustomizerModal');
  const title = document.getElementById('customizerTitle');
  const img = document.getElementById('customizerImg');
  const price = document.getElementById('customizerPrice');
  const desc = document.getElementById('customizerDesc');
  const sidesContainer = document.getElementById('customizerSidesSection');
  const extraSidesContainer = document.getElementById('customizerExtraSidesSection');
  const notesInput = document.getElementById('customizerNotes');

  title.innerText = dish.name;
  img.src = dish.image;
  price.innerText = `$${dish.price.toFixed(2)} CAD`;
  desc.innerText = dish.description;
  if (notesInput) notesInput.value = '';

  if (!dish.hasSides) {
    sidesContainer.innerHTML = `
      <div class="p-4 bg-amber-500/10 border border-amber-500/20 rounded-xl text-amber-600 dark:text-amber-400 text-xs">
        ℹ️ Note: <strong>Pasta al Greco</strong> is served as a complete stand-alone dish with roasted sauce and Greek feta (no sides included).
      </div>
    `;
    extraSidesContainer.classList.add('hidden');
  } else {
    extraSidesContainer.classList.remove('hidden');
    // Included Sides (Choose up to 2)
    sidesContainer.innerHTML = `
      <div class="mb-3">
        <div class="flex items-center justify-between">
          <label class="text-xs font-bold uppercase tracking-wider text-slate-800 dark:text-slate-200">
            Choose Your 2 Included Sides <span class="text-sky-500">(Included in $${dish.price.toFixed(2)})</span>
          </label>
          <span id="sidesChosenCount" class="text-xs font-semibold text-slate-500">0 of 2 selected</span>
        </div>
        <p class="text-[11px] text-slate-500 dark:text-slate-400">Select any 2 gourmet fresh sides prepared daily:</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 max-h-48 overflow-y-auto pr-1">
        ${AVAILABLE_SIDES.map((side, idx) => `
          <label class="flex items-center gap-2.5 p-2.5 rounded-lg border border-slate-200 dark:border-slate-800 hover:bg-sky-50 dark:hover:bg-slate-800/50 cursor-pointer transition-colors text-xs text-slate-700 dark:text-slate-300">
            <input type="checkbox" name="includedSide" value="${side}" onchange="handleSideSelectionLimit(this)" class="custom-checkbox w-4 h-4 rounded text-sky-600 border-slate-300 dark:border-slate-700 focus:ring-sky-500" />
            <span>${side}</span>
          </label>
        `).join('')}
      </div>
    `;

    // Extra Sides (+$4.99 CAD each)
    const extraSidesList = document.getElementById('extraSidesList');
    if (extraSidesList) {
      extraSidesList.innerHTML = AVAILABLE_SIDES.slice(0, 6).map(side => `
        <label class="flex items-center justify-between p-2 rounded-lg border border-slate-200 dark:border-slate-800 text-xs hover:bg-slate-50 dark:hover:bg-slate-800/40 cursor-pointer">
          <span class="flex items-center gap-2 text-slate-700 dark:text-slate-300">
            <input type="checkbox" name="extraSide" value="${side}" onchange="updateCustomizerTotal()" class="custom-checkbox w-4 h-4 rounded text-sky-600 focus:ring-sky-500" />
            <span>${side}</span>
          </span>
          <span class="font-bold text-sky-600 dark:text-sky-400">+$4.99</span>
        </label>
      `).join('');
    }
  }

  updateCustomizerTotal();
  modal.classList.remove('hidden');
  document.body.classList.add('overflow-hidden');
}

function handleSideSelectionLimit(checkbox) {
  const checked = document.querySelectorAll('input[name="includedSide"]:checked');
  const countDisplay = document.getElementById('sidesChosenCount');
  
  if (checked.length > 2) {
    checkbox.checked = false;
    alert("You can choose up to 2 included sides. Check extra sides below if you'd like more!");
  } else {
    if (countDisplay) {
      countDisplay.innerText = `${checked.length} of 2 selected`;
      countDisplay.className = checked.length === 2 ? "text-xs font-bold text-emerald-500" : "text-xs font-semibold text-slate-500";
    }
  }
}

function updateCustomizerTotal() {
  if (!state.selectedDish) return;
  const extraSides = document.querySelectorAll('input[name="extraSide"]:checked');
  const extraTotal = extraSides.length * 4.99;
  const total = state.selectedDish.price + extraTotal;
  const btnTotal = document.getElementById('customizerAddBtnTotal');
  if (btnTotal) {
    btnTotal.innerText = `$${total.toFixed(2)} CAD`;
  }
}

function closeMealCustomizer() {
  const modal = document.getElementById('mealCustomizerModal');
  if (modal) modal.classList.add('hidden');
  document.body.classList.remove('overflow-hidden');
  state.selectedDish = null;
}

function addCustomizedMealToCart() {
  if (!state.selectedDish) return;
  const dish = state.selectedDish;

  let chosenSides = [];
  let chosenExtraSides = [];

  if (dish.hasSides) {
    const includedChecked = document.querySelectorAll('input[name="includedSide"]:checked');
    if (includedChecked.length === 0) {
      if (!confirm("You haven't selected your 2 included sides. Would you like to select them now? (Click Cancel to select default: Rice Pilaf + Roasted Potatoes)")) {
        chosenSides = ["Rice Pilaf with Veggies", "Lemon Roasted Potatoes"];
      } else {
        return;
      }
    } else {
      includedChecked.forEach(cb => chosenSides.push(cb.value));
    }

    const extraChecked = document.querySelectorAll('input[name="extraSide"]:checked');
    extraChecked.forEach(cb => chosenExtraSides.push(cb.value));
  }

  const notesInput = document.getElementById('customizerNotes');
  const specialNotes = notesInput ? notesInput.value.trim() : '';

  const cartItem = {
    cartItemId: Date.now() + Math.random().toString(36).substr(2, 5),
    id: dish.id,
    name: dish.name,
    price: dish.price,
    image: dish.image,
    sides: chosenSides,
    extraSides: chosenExtraSides,
    extraSidesCost: chosenExtraSides.length * 4.99,
    specialNotes: specialNotes,
    quantity: 1
  };

  state.cart.push(cartItem);
  saveCart();
  closeMealCustomizer();
  openCartDrawer();
}

// 9. Quick Add 6-Meal Value Package ($59.94 CAD)
function addSixMealPackage() {
  // Adds the 6-meal starter plan ($59.94 CAD = $9.99/meal)
  const starterMeals = [
    { id: "grilled-chicken", sides: ["Rice Pilaf with Veggies", "Lemon Roasted Potatoes"] },
    { id: "chicken-souvlaki-plate", sides: ["Yellow Basmati Rice", "Garlic Butter Baked Potatoes"] },
    { id: "pork-souvlaki-plate", sides: ["Rice Pilaf with Veggies", "Sautéed Veggies"] },
    { id: "chicken-leg-plate", sides: ["Spinach Mushroom Rice", "Sweet Potatoes"] },
    { id: "veggie-souvlaki", sides: ["Lemon Roasted Potatoes", "Green Beans in Tomato Sauce"] },
    { id: "pasta-al-greco", sides: [] }
  ];

  starterMeals.forEach(sm => {
    const dish = MENU_ITEMS.find(m => m.id === sm.id);
    if (dish) {
      state.cart.push({
        cartItemId: Date.now() + Math.random().toString(36).substr(2, 5),
        id: dish.id,
        name: dish.name,
        price: dish.price,
        image: dish.image,
        sides: sm.sides,
        extraSides: [],
        extraSidesCost: 0,
        specialNotes: "6-Meal Starter Package selection",
        quantity: 1
      });
    }
  });

  saveCart();
  openCartDrawer();
}

// 10. Cart Management & Calculations
function saveCart() {
  localStorage.setItem('gfk_cart', JSON.stringify(state.cart));
  updateCartBadge();
  updateCartSummary();
}

function updateCartBadge() {
  const totalCount = state.cart.reduce((sum, item) => sum + item.quantity, 0);
  const badges = document.querySelectorAll('.cart-count-badge');
  badges.forEach(b => {
    b.innerText = totalCount;
    b.style.display = totalCount > 0 ? 'flex' : 'none';
  });
}

function updateCartSummary() {
  const container = document.getElementById('cartItemsList');
  if (!container) return;

  const totalMeals = state.cart.reduce((sum, item) => sum + item.quantity, 0);
  const subtotal = state.cart.reduce((sum, item) => sum + ((item.price + item.extraSidesCost) * item.quantity), 0);

  // Minimum 6 meals rule
  const minMet = totalMeals >= 6;
  const mealsNeeded = Math.max(0, 6 - totalMeals);

  // Volume Discount: 10% off for 7 or more meals
  const discountEligible = totalMeals >= 7;
  const discountAmount = discountEligible ? subtotal * 0.10 : 0;
  const discountedSubtotal = subtotal - discountAmount;

  // Delivery fee
  const deliveryFee = calculateDeliveryFee(state.deliveryDistanceKm, state.deliveryMethod);
  const tax = discountedSubtotal * 0.13; // Ontario 13% HST
  const grandTotal = discountedSubtotal + deliveryFee + tax;

  // Update Mini Cart Notice / Progress Bar
  const progressContainer = document.getElementById('cartVolumeProgressBar');
  if (progressContainer) {
    if (!minMet) {
      progressContainer.innerHTML = `
        <div class="p-3 bg-amber-500/10 border border-amber-500/20 rounded-xl text-xs text-amber-600 dark:text-amber-400 flex items-center justify-between">
          <span>⚠️ Minimum order is <strong>6 meals</strong> (${mealsNeeded} more needed)</span>
          <button onclick="addSixMealPackage()" class="underline font-bold hover:text-amber-500">Auto Fill 6</button>
        </div>
      `;
    } else if (!discountEligible) {
      progressContainer.innerHTML = `
        <div class="p-3 bg-sky-500/10 border border-sky-500/20 rounded-xl text-xs text-sky-600 dark:text-sky-400 flex items-center justify-between">
          <span>🎉 Minimum met! Add <strong>1 more meal</strong> to unlock <strong>10% Volume Discount</strong></span>
        </div>
      `;
    } else {
      progressContainer.innerHTML = `
        <div class="p-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-xs text-emerald-600 dark:text-emerald-400 flex items-center justify-between">
          <span>🌟 <strong>10% Volume Discount Applied!</strong> You saved $${discountAmount.toFixed(2)} CAD</span>
        </div>
      `;
    }
  }

  // Render Items List
  if (state.cart.length === 0) {
    container.innerHTML = `
      <div class="text-center py-12 text-slate-400">
        <svg class="w-16 h-16 mx-auto mb-3 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
        </svg>
        <p class="font-semibold text-slate-700 dark:text-slate-300">Your meal prep cart is empty</p>
        <p class="text-xs text-slate-500 mt-1">Choose from our healthy chef-curated Greek meals (min 6 meals)</p>
        <button onclick="closeCartDrawer(); window.location.hash = '#menuGrid';" class="mt-4 px-4 py-2 bg-sky-600 text-white rounded-lg text-xs font-bold hover:bg-sky-500">
          Browse Menu
        </button>
      </div>
    `;
  } else {
    container.innerHTML = state.cart.map((item, index) => `
      <div class="p-3.5 bg-slate-50 dark:bg-slate-800/60 rounded-xl border border-slate-200 dark:border-slate-800/80 flex gap-3 text-xs">
        <img src="${item.image}" alt="${item.name}" class="w-16 h-16 rounded-lg object-cover flex-shrink-0" />
        <div class="flex-1 min-w-0">
          <div class="flex items-start justify-between gap-1">
            <h4 class="font-bold text-slate-900 dark:text-white truncate">${item.name}</h4>
            <span class="font-bold text-sky-600 dark:text-sky-400 whitespace-nowrap">$${((item.price + item.extraSidesCost) * item.quantity).toFixed(2)}</span>
          </div>

          ${item.sides.length > 0 ? `
            <div class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5 line-clamp-1">
              <strong>Sides:</strong> ${item.sides.join(', ')}
            </div>
          ` : '<div class="text-[11px] text-slate-400">No sides</div>'}

          ${item.extraSides.length > 0 ? `
            <div class="text-[10px] text-amber-500 mt-0.5">
              + Extra: ${item.extraSides.join(', ')} (+$${item.extraSidesCost.toFixed(2)})
            </div>
          ` : ''}

          <div class="flex items-center justify-between mt-2 pt-2 border-t border-slate-200 dark:border-slate-700/60">
            <div class="flex items-center gap-2">
              <button onclick="adjustCartItemQty(${index}, -1)" class="w-6 h-6 rounded bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-200 flex items-center justify-center font-bold hover:bg-slate-300">-</button>
              <span class="font-semibold text-slate-800 dark:text-slate-200 text-xs">${item.quantity}</span>
              <button onclick="adjustCartItemQty(${index}, 1)" class="w-6 h-6 rounded bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-200 flex items-center justify-center font-bold hover:bg-slate-300">+</button>
            </div>
            <button onclick="removeCartItem(${index})" class="text-rose-500 hover:text-rose-600 font-semibold text-[11px]">
              Remove
            </button>
          </div>
        </div>
      </div>
    `).join('');
  }

  // Update summary numbers
  const subtotalEl = document.getElementById('cartSubtotal');
  const discountRow = document.getElementById('cartDiscountRow');
  const discountEl = document.getElementById('cartDiscount');
  const deliveryEl = document.getElementById('cartDeliveryFee');
  const taxEl = document.getElementById('cartTax');
  const totalEl = document.getElementById('cartGrandTotal');
  const checkoutBtn = document.getElementById('cartCheckoutBtn');

  if (subtotalEl) subtotalEl.innerText = `$${subtotal.toFixed(2)} CAD`;
  
  if (discountRow) {
    if (discountEligible) {
      discountRow.classList.remove('hidden');
      if (discountEl) discountEl.innerText = `-$${discountAmount.toFixed(2)} CAD`;
    } else {
      discountRow.classList.add('hidden');
    }
  }

  if (deliveryEl) {
    deliveryEl.innerText = state.deliveryMethod === 'pickup' 
      ? 'FREE (Pickup)' 
      : (deliveryFee === 0 ? 'FREE (under 2km)' : `$${deliveryFee.toFixed(2)} CAD`);
  }

  if (taxEl) taxEl.innerText = `$${tax.toFixed(2)} CAD`;
  if (totalEl) totalEl.innerText = `$${grandTotal.toFixed(2)} CAD`;

  if (checkoutBtn) {
    if (!minMet) {
      checkoutBtn.disabled = true;
      checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
      checkoutBtn.innerText = `Min. 6 Meals Required (${totalMeals}/6)`;
    } else {
      checkoutBtn.disabled = false;
      checkoutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
      checkoutBtn.innerText = `Proceed to Checkout ($${grandTotal.toFixed(2)})`;
    }
  }
}

function adjustCartItemQty(index, delta) {
  if (!state.cart[index]) return;
  state.cart[index].quantity += delta;
  if (state.cart[index].quantity <= 0) {
    state.cart.splice(index, 1);
  }
  saveCart();
}

function removeCartItem(index) {
  state.cart.splice(index, 1);
  saveCart();
}

function openCartDrawer() {
  const drawer = document.getElementById('cartDrawer');
  if (drawer) {
    drawer.classList.remove('translate-x-full');
    document.body.classList.add('overflow-hidden');
    updateCartSummary();
  }
}

function closeCartDrawer() {
  const drawer = document.getElementById('cartDrawer');
  if (drawer) {
    drawer.classList.add('translate-x-full');
    document.body.classList.remove('overflow-hidden');
  }
}

// 11. Checkout Modal & Order Processing
function openCheckoutModal() {
  const totalMeals = state.cart.reduce((sum, item) => sum + item.quantity, 0);
  if (totalMeals < 6) {
    alert("Please add at least 6 meals to fulfill the minimum order requirement.");
    return;
  }
  closeCartDrawer();
  const modal = document.getElementById('checkoutModal');
  if (modal) {
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
    updateCheckoutSummaryDisplay();
  }
}

function closeCheckoutModal() {
  const modal = document.getElementById('checkoutModal');
  if (modal) modal.classList.add('hidden');
  document.body.classList.remove('overflow-hidden');
}

function updateCheckoutSummaryDisplay() {
  const totalMeals = state.cart.reduce((sum, item) => sum + item.quantity, 0);
  const subtotal = state.cart.reduce((sum, item) => sum + ((item.price + item.extraSidesCost) * item.quantity), 0);
  const discountAmount = totalMeals >= 7 ? subtotal * 0.10 : 0;
  const discountedSubtotal = subtotal - discountAmount;
  const deliveryFee = calculateDeliveryFee(state.deliveryDistanceKm, state.deliveryMethod);
  const tax = discountedSubtotal * 0.13;
  const grandTotal = discountedSubtotal + deliveryFee + tax;

  const displayEl = document.getElementById('checkoutTotalDisplay');
  if (displayEl) {
    displayEl.innerText = `$${grandTotal.toFixed(2)} CAD`;
  }
}

function handleCheckoutSubmit(e) {
  e.preventDefault();

  const totalMeals = state.cart.reduce((sum, item) => sum + item.quantity, 0);
  const subtotal = state.cart.reduce((sum, item) => sum + ((item.price + item.extraSidesCost) * item.quantity), 0);
  const discountAmount = totalMeals >= 7 ? subtotal * 0.10 : 0;
  const discountedSubtotal = subtotal - discountAmount;
  const deliveryFee = calculateDeliveryFee(state.deliveryDistanceKm, state.deliveryMethod);
  const tax = discountedSubtotal * 0.13;
  const grandTotal = discountedSubtotal + deliveryFee + tax;

  const orderData = {
    orderId: "GFK-" + Math.floor(100000 + Math.random() * 900000),
    timestamp: new Date().toISOString(),
    customerName: document.getElementById('custName')?.value || 'Guest Member',
    customerEmail: document.getElementById('custEmail')?.value || 'customer@example.com',
    customerPhone: document.getElementById('custPhone')?.value || '416-555-0199',
    deliveryMethod: state.deliveryMethod,
    deliveryAddress: state.deliveryMethod === 'delivery' 
      ? (document.getElementById('custAddress')?.value || 'Toronto, ON') 
      : 'Pickup at George the Greek (3575 Lake Shore Blvd W, Etobicoke)',
    scheduledDate: document.getElementById('scheduledDeliveryDay')?.value || 'Sunday (10:00 AM - 2:00 PM)',
    items: [...state.cart],
    itemCount: totalMeals,
    subtotal: subtotal,
    discount: discountAmount,
    deliveryFee: deliveryFee,
    tax: tax,
    grandTotal: grandTotal,
    status: 'Received', // Kitchen workflow: Received -> In Prep -> Ready for Delivery -> Completed
    paymentMethod: 'Credit Card (Paid)'
  };

  // Save to persistent orders for customer order history and Kitchen Tablet
  state.customerOrders.unshift(orderData);
  localStorage.setItem('gfk_orders', JSON.stringify(state.customerOrders));

  // Clear cart
  state.cart = [];
  saveCart();
  closeCheckoutModal();

  // Show Confirmation Modal
  openConfirmationModal(orderData);
}

function openConfirmationModal(order) {
  const modal = document.getElementById('confirmationModal');
  const details = document.getElementById('confirmationOrderDetails');
  if (modal && details) {
    details.innerHTML = `
      <div class="text-left bg-slate-50 dark:bg-slate-800/60 p-4 rounded-xl border border-slate-200 dark:border-slate-800 text-xs space-y-2">
        <div class="flex justify-between border-b pb-2 border-slate-200 dark:border-slate-700">
          <span class="text-slate-500">Order ID:</span>
          <span class="font-mono font-bold text-sky-500">${order.orderId}</span>
        </div>
        <div class="flex justify-between">
          <span class="text-slate-500">Scheduled Delivery:</span>
          <span class="font-semibold text-slate-800 dark:text-slate-200">${order.scheduledDate}</span>
        </div>
        <div class="flex justify-between">
          <span class="text-slate-500">Method:</span>
          <span class="font-semibold capitalize">${order.deliveryMethod}</span>
        </div>
        <div class="flex justify-between">
          <span class="text-slate-500">Total Meals:</span>
          <span class="font-bold">${order.itemCount} meals</span>
        </div>
        <div class="flex justify-between text-base font-black text-sky-600 dark:text-sky-400 pt-2 border-t border-slate-200 dark:border-slate-700">
          <span>Amount Paid:</span>
          <span>$${order.grandTotal.toFixed(2)} CAD</span>
        </div>
      </div>
    `;
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
  }
}

function closeConfirmationModal() {
  const modal = document.getElementById('confirmationModal');
  if (modal) modal.classList.add('hidden');
  document.body.classList.remove('overflow-hidden');
}

// 12. Kitchen Display Tablet System (Live Status Management)
function initKitchenView() {
  const kitchenContainer = document.getElementById('kitchenOrdersList');
  if (!kitchenContainer) return;

  function renderKitchenTickets() {
    const orders = JSON.parse(localStorage.getItem('gfk_orders') || '[]');
    if (orders.length === 0) {
      kitchenContainer.innerHTML = `
        <div class="col-span-full text-center py-16 text-slate-400">
          <p class="text-lg font-bold">No active orders in kitchen queue</p>
          <p class="text-xs text-slate-500">Orders placed on the website appear here live in real-time.</p>
        </div>
      `;
      return;
    }

    kitchenContainer.innerHTML = orders.map((o, idx) => `
      <div class="glass-card rounded-2xl p-5 border-2 ${
        o.status === 'Completed' ? 'border-emerald-500/30 opacity-75' :
        o.status === 'Ready for Delivery' ? 'border-sky-500/50 bg-sky-50/10' :
        o.status === 'In Prep' ? 'border-amber-500/50 bg-amber-50/10' :
        'border-rose-500/50 animate-pulse-glow'
      }">
        <div class="flex items-center justify-between border-b pb-3 border-slate-200 dark:border-slate-800">
          <div>
            <span class="font-mono font-bold text-sm text-sky-500">#${o.orderId}</span>
            <h4 class="font-bold text-slate-900 dark:text-white">${o.customerName}</h4>
          </div>
          <span class="px-2.5 py-1 text-xs font-bold rounded-full ${
            o.status === 'Completed' ? 'bg-emerald-500/20 text-emerald-400' :
            o.status === 'Ready for Delivery' ? 'bg-sky-500/20 text-sky-400' :
            o.status === 'In Prep' ? 'bg-amber-500/20 text-amber-400' :
            'bg-rose-500/20 text-rose-400'
          }">${o.status}</span>
        </div>

        <div class="my-3 text-xs space-y-1 text-slate-600 dark:text-slate-400">
          <p><strong>Batch:</strong> ${o.scheduledDate}</p>
          <p><strong>Type:</strong> ${o.deliveryMethod === 'pickup' ? '📍 Pickup at George the Greek' : '🚚 Scheduled Delivery'}</p>
          <p class="truncate"><strong>Destination:</strong> ${o.deliveryAddress}</p>
        </div>

        <div class="border-t border-b py-2 my-2 border-slate-200 dark:border-slate-800 space-y-2 max-h-56 overflow-y-auto">
          ${o.items.map(it => `
            <div class="text-xs bg-slate-100 dark:bg-slate-800/50 p-2 rounded-lg">
              <div class="font-bold text-slate-800 dark:text-slate-200 flex justify-between">
                <span>${it.quantity}x ${it.name}</span>
              </div>
              ${it.sides.length ? `<div class="text-[11px] text-slate-500">Sides: ${it.sides.join(' + ')}</div>` : ''}
              ${it.extraSides.length ? `<div class="text-[10px] text-amber-500">+ Extra: ${it.extraSides.join(', ')}</div>` : ''}
              ${it.specialNotes ? `<div class="text-[10px] italic text-rose-500">Note: ${it.specialNotes}</div>` : ''}
            </div>
          `).join('')}
        </div>

        <div class="pt-3 flex items-center justify-between gap-2">
          <button onclick="advanceOrderStatus('${o.orderId}')" class="flex-1 py-2 bg-sky-600 hover:bg-sky-500 text-white rounded-lg font-bold text-xs">
            ${
              o.status === 'Received' ? 'Start Prep 👨‍🍳' :
              o.status === 'In Prep' ? 'Mark Ready 📦' :
              o.status === 'Ready for Delivery' ? 'Complete Order ✅' :
              'Archived'
            }
          </button>
          <button onclick="window.print()" class="p-2 border border-slate-300 dark:border-slate-700 rounded-lg text-slate-500 hover:text-slate-300" title="Print Kitchen Slip">
            🖨️
          </button>
        </div>
      </div>
    `).join('');
  }

  window.advanceOrderStatus = function(orderId) {
    const orders = JSON.parse(localStorage.getItem('gfk_orders') || '[]');
    const target = orders.find(o => o.orderId === orderId);
    if (!target) return;

    if (target.status === 'Received') target.status = 'In Prep';
    else if (target.status === 'In Prep') target.status = 'Ready for Delivery';
    else if (target.status === 'Ready for Delivery') target.status = 'Completed';

    localStorage.setItem('gfk_orders', JSON.stringify(orders));
    renderKitchenTickets();
  };

  renderKitchenTickets();
  // Poll for kitchen tablet live updates every 5s
  setInterval(renderKitchenTickets, 5000);
}

// 13. DOM Initializer
document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  initSlider();
  renderMenu('all');
  updateCartBadge();
  updateCartSummary();
  updateCutoffCountdown();
  setInterval(updateCutoffCountdown, 1000);

  // Category buttons
  const catButtons = document.querySelectorAll('.cat-filter-btn');
  catButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      catButtons.forEach(b => {
        b.classList.remove('bg-sky-600', 'text-white', 'shadow-md');
        b.classList.add('bg-slate-200/60', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300');
      });
      btn.classList.add('bg-sky-600', 'text-white', 'shadow-md');
      btn.classList.remove('bg-slate-200/60', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300');
      const cat = btn.getAttribute('data-cat');
      renderMenu(cat);
    });
  });

  // Mobile menu toggle
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const mobileMenuDrawer = document.getElementById('mobileMenuDrawer');
  if (mobileMenuBtn && mobileMenuDrawer) {
    mobileMenuBtn.addEventListener('click', () => {
      mobileMenuDrawer.classList.toggle('hidden');
    });
  }

  // Delivery method toggle (Delivery vs Pickup)
  const deliveryRadios = document.querySelectorAll('input[name="deliveryMethodRadio"]');
  deliveryRadios.forEach(r => {
    r.addEventListener('change', (e) => {
      state.deliveryMethod = e.target.value;
      const addrBox = document.getElementById('deliveryAddressInputBox');
      const pickupInfoBox = document.getElementById('pickupLocationInfoBox');
      if (state.deliveryMethod === 'pickup') {
        if (addrBox) addrBox.classList.add('hidden');
        if (pickupInfoBox) pickupInfoBox.classList.remove('hidden');
      } else {
        if (addrBox) addrBox.classList.remove('hidden');
        if (pickupInfoBox) pickupInfoBox.classList.add('hidden');
      }
      updateCartSummary();
      updateCheckoutSummaryDisplay();
    });
  });

  // Init kitchen if on kitchen tablet page
  if (document.getElementById('kitchenOrdersList')) {
    initKitchenView();
  }
});
