/**
 * Greek Fit Kitchen - WordPress Theme & App JS
 */

const baseImg = (typeof gfkData !== 'undefined' && gfkData.themeUri) 
  ? gfkData.themeUri + '/assets/images' 
  : 'public/images';

const MENU_ITEMS = [
  { id: "grilled-chicken", name: "Grilled Chicken", price: 12.99, category: "poultry", image: `${baseImg}/meals/grilled-chicken.jpg`, description: "Tender herb-marinated chicken breast flame-grilled to perfection with Greek oregano and lemon.", calories: 420, protein: "48g", carbs: "18g", fat: "9g", popular: true, hasSides: true },
  { id: "chicken-leg-plate", name: "Chicken Leg Plate", price: 10.99, category: "poultry", image: `${baseImg}/meals/chicken-leg.jpg`, description: "Slow-roasted bone-in chicken leg quarters seasoned with aromatic garlic, thyme, and citrus.", calories: 460, protein: "42g", carbs: "12g", fat: "14g", popular: false, hasSides: true },
  { id: "chilly-chicken", name: "Chilly Chicken", price: 13.99, category: "poultry", image: `${baseImg}/meals/chilly-chicken.jpg`, description: "Lean chicken breast glazed with a fiery Mediterranean chili and herb sauce for a metabolic kick.", calories: 430, protein: "46g", carbs: "22g", fat: "10g", popular: false, hasSides: true },
  { id: "chicken-fillet", name: "Chicken Fillet", price: 12.99, category: "poultry", image: `${baseImg}/meals/chicken-fillet.jpg`, description: "Clean, ultra-lean sliced chicken fillet seared with Aegean sea salt and virgin olive oil.", calories: 390, protein: "50g", carbs: "8g", fat: "6g", popular: false, hasSides: true },
  { id: "salmon", name: "Fresh Atlantic Salmon", price: 14.99, category: "seafood", image: `${baseImg}/meals/salmon.jpg`, description: "Pan-seared premium Atlantic salmon fillet rich in Omega-3 fatty acids, topped with dill and lemon butter.", calories: 480, protein: "44g", carbs: "6g", fat: "18g", popular: true, hasSides: true },
  { id: "veggie-souvlaki", name: "Veggie Souvlaki", price: 11.99, category: "vegetarian", image: `${baseImg}/meals/veggie-souvlaki.jpg`, description: "Char-grilled skewers of zucchini, bell peppers, red onions, mushrooms, and grilled Greek halloumi.", calories: 340, protein: "18g", carbs: "32g", fat: "14g", popular: false, hasSides: true },
  { id: "spinach-feta-stuffed-chicken", name: "Spinach & Feta Stuffed Chicken", price: 14.99, category: "poultry", image: `${baseImg}/meals/spinach-feta-chicken.jpg`, description: "Chicken breast rolled with sautéed baby spinach, Kalamata herbs, and authentic Greek feta cheese.", calories: 490, protein: "52g", carbs: "10g", fat: "15g", popular: true, hasSides: true },
  { id: "chicken-souvlaki-plate", name: "Chicken Souvlaki Plate", price: 12.99, category: "poultry", image: `${baseImg}/meals/chicken-souvlaki.jpg`, description: "Traditional Greek marinated chicken skewers grilled over flame with olive oil and wild mountain oregano.", calories: 440, protein: "47g", carbs: "14g", fat: "11g", popular: true, hasSides: true },
  { id: "tandoori-chicken", name: "Tandoori Chicken", price: 14.99, category: "poultry", image: `${baseImg}/meals/tandoori-chicken.jpg`, description: "Yogurt-marinated chicken breast infused with warming spices, char-grilled for authentic smoky depth.", calories: 450, protein: "48g", carbs: "12g", fat: "11g", popular: false, hasSides: true },
  { id: "beef-souvlaki-plate", name: "Beef Souvlaki Plate", price: 13.99, category: "beef", image: `${baseImg}/meals/beef-souvlaki.jpg`, description: "Prime cuts of lean beef skewered with Mediterranean peppers and char-grilled medium-rare.", calories: 490, protein: "46g", carbs: "11g", fat: "16g", popular: true, hasSides: true },
  { id: "chicken-mushroom-sauce", name: "Chicken Mushroom Sauce", price: 13.99, category: "poultry", image: `${baseImg}/meals/chicken-mushroom.jpg`, description: "Grilled chicken breast smothered in a silky cremini and porcini mushroom garlic herb reduction.", calories: 470, protein: "47g", carbs: "15g", fat: "14g", popular: false, hasSides: true },
  { id: "pork-souvlaki-plate", name: "Pork Souvlaki Plate", price: 9.99, category: "pork", image: `${baseImg}/meals/pork-souvlaki.jpg`, description: "Authentic Athenian pork tenderloin skewers, delicately seasoned with lemon juice and cracked pepper.", calories: 440, protein: "43g", carbs: "9g", fat: "13g", popular: false, hasSides: true },
  { id: "chicken-fajita", name: "Chicken Fajita", price: 12.99, category: "poultry", image: `${baseImg}/meals/chicken-fajita.jpg`, description: "Sliced grilled chicken tossed with caramelized sweet bell peppers, Spanish onions, and mild spices.", calories: 410, protein: "44g", carbs: "20g", fat: "10g", popular: false, hasSides: true },
  { id: "spinach-pie-dinner", name: "Spinach Pie Dinner (Spanakopita)", price: 12.99, category: "vegetarian", image: `${baseImg}/meals/spinach-pie.jpg`, description: "Crispy golden layered phyllo pastry filled with fresh spinach, scallions, eggs, and creamy feta.", calories: 460, protein: "21g", carbs: "38g", fat: "19g", popular: false, hasSides: true },
  { id: "beef-fajita", name: "Beef Fajita", price: 14.99, category: "beef", image: `${baseImg}/meals/beef-fajita.jpg`, description: "Seared lean flank steak strips sizzled with tri-color sweet peppers and charred sweet onions.", calories: 490, protein: "45g", carbs: "18g", fat: "15g", popular: false, hasSides: true },
  { id: "pasta-al-greco", name: "Pasta al Greco", price: 9.99, category: "pasta", image: `${baseImg}/meals/pasta-al-greco.jpg`, description: "Whole wheat penne tossed in rich roasted garlic tomato sauce, Kalamata olives, capers, and crumbled feta. (No sides included)", calories: 520, protein: "22g", carbs: "72g", fat: "12g", popular: false, hasSides: false },
  { id: "beef-mushroom-sauce", name: "Beef Mushroom Sauce", price: 14.99, category: "beef", image: `${baseImg}/meals/beef-mushroom.jpg`, description: "Slow-braised tender beef medallions ladled with a velvety roasted wild mushroom and red wine demi.", calories: 510, protein: "48g", carbs: "14g", fat: "18g", popular: false, hasSides: true },
  { id: "smoked-pork-loin", name: "Smoked Pork Loin", price: 12.99, category: "pork", image: `${baseImg}/meals/smoked-pork-loin.jpg`, description: "Applewood hardwood smoked lean pork loin chops carved thin and served with natural pan jus.", calories: 430, protein: "45g", carbs: "8g", fat: "12g", popular: false, hasSides: true },
  { id: "smoked-turkey-breast", name: "Smoked Turkey Breast", price: 13.99, category: "poultry", image: `${baseImg}/meals/smoked-turkey.jpg`, description: "Ultra-clean smoked artisan turkey breast seasoned with cracked peppercorn and Aegean sage.", calories: 380, protein: "51g", carbs: "6g", fat: "5g", popular: false, hasSides: true },
  { id: "turkey-souvlaki-plate", name: "Turkey Souvlaki Plate", price: 13.99, category: "poultry", image: `${baseImg}/meals/turkey-souvlaki.jpg`, description: "Char-grilled lean turkey tenderloin cubes infused with lemon garlic herb marinade.", calories: 420, protein: "48g", carbs: "9g", fat: "8g", popular: false, hasSides: true }
];

const AVAILABLE_SIDES = [
  "Rice Pilaf with Veggies", "Yellow Basmati Rice", "Spinach Mushroom Rice", "Orzo in Tomato Sauce",
  "Garlic Butter Baked Potatoes", "Lemon Roasted Potatoes", "Sweet Potatoes", "Mashed Potatoes",
  "Sautéed Veggies", "Steamed Veggies", "Green Beans in Tomato Sauce"
];

const state = {
  cart: JSON.parse(localStorage.getItem('gfk_cart') || '[]'),
  selectedDish: null,
  deliveryMethod: 'delivery',
  deliveryDistanceKm: 4.5,
  customerOrders: JSON.parse(localStorage.getItem('gfk_orders') || '[]')
};

// Theme Switcher (Rule 1)
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
  moonIcons.forEach(el => el.style.display = isDark ? 'none' : 'block');
  sunIcons.forEach(el => el.style.display = isDark ? 'block' : 'none');
}

// Slider
let currentSlide = 0;
let slideInterval = null;

function initSlider() {
  const slides = document.querySelectorAll('.slide-item');
  const dots = document.querySelectorAll('.slider-dot');
  if (!slides.length) return;

  function showSlide(index) {
    slides.forEach((s, idx) => s.classList.toggle('active', idx === index));
    dots.forEach((d, idx) => {
      d.classList.toggle('bg-sky-400', idx === index);
      d.classList.toggle('w-8', idx === index);
      d.classList.toggle('bg-white/40', idx !== index);
      d.classList.toggle('w-2.5', idx !== index);
    });
    currentSlide = index;
  }

  window.nextSlide = () => showSlide((currentSlide + 1) % slides.length);
  window.prevSlide = () => showSlide((currentSlide - 1 + slides.length) % slides.length);
  window.goToSlide = (idx) => { showSlide(idx); resetInterval(); };

  function resetInterval() {
    if (slideInterval) clearInterval(slideInterval);
    slideInterval = setInterval(window.nextSlide, 5500);
  }
  resetInterval();
}

// Cutoff Countdown
function updateCutoffCountdown() {
  const now = new Date();
  const estString = now.toLocaleString("en-US", { timeZone: "America/Toronto" });
  const torontoNow = new Date(estString);
  const currentDay = torontoNow.getDay();
  const countdownEl = document.getElementById('cutoffCountdown');
  if (!countdownEl) return;

  let targetDate = new Date(torontoNow);
  let nextDeliveryName = "Sunday Delivery";

  if (currentDay < 1 || (currentDay === 1 && torontoNow.getHours() < 12)) {
    targetDate.setDate(torontoNow.getDate() + ((1 - currentDay + 7) % 7));
    targetDate.setHours(12, 0, 0, 0);
    nextDeliveryName = "Wednesday Delivery";
  } else if (currentDay < 5 || (currentDay === 5 && torontoNow.getHours() < 12)) {
    targetDate.setDate(torontoNow.getDate() + ((5 - currentDay + 7) % 7));
    targetDate.setHours(12, 0, 0, 0);
    nextDeliveryName = "Sunday Delivery";
  } else {
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
  }
}

// Delivery Calculation
function calculateDeliveryFee(distanceKm, method = 'delivery') {
  if (method === 'pickup') return 0;
  const km = parseFloat(distanceKm) || 0;
  if (km <= 2) return 0;
  if (km <= 5) return 5.00;
  return km * 1.00;
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

// Menu Grid
function renderMenu(category = 'all') {
  const container = document.getElementById('menuGrid');
  if (!container) return;
  const filtered = category === 'all' ? MENU_ITEMS : MENU_ITEMS.filter(i => i.category === category);

  container.innerHTML = filtered.map(item => `
    <div class="group glass-card rounded-2xl overflow-hidden flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-sky-500/10 border border-slate-200 dark:border-slate-800">
      <div class="relative overflow-hidden aspect-[4/3] bg-slate-100 dark:bg-slate-900">
        <img src="${item.image}" alt="${item.name}" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
        <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
          ${item.popular ? `<span class="bg-amber-500 text-slate-950 text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full shadow">Chef's Pick</span>` : ''}
          ${!item.hasSides ? `<span class="bg-slate-800/90 text-white text-[11px] font-medium px-2 py-0.5 rounded-full">No Sides</span>` : `<span class="bg-sky-600/90 text-white text-[11px] font-semibold px-2 py-0.5 rounded-full">2 Sides Included</span>`}
        </div>
        <div class="absolute bottom-3 right-3 bg-slate-900/80 backdrop-blur-md text-white text-xs px-2.5 py-1 rounded-full font-semibold">
          🔥 ${item.calories} kcal · 💪 ${item.protein}
        </div>
      </div>
      <div class="p-5 flex-1 flex flex-col justify-between">
        <div>
          <div class="flex items-start justify-between gap-2 mb-2">
            <h3 class="font-bold text-lg text-slate-900 dark:text-white group-hover:text-sky-500 transition-colors">${item.name}</h3>
            <span class="text-lg font-black text-sky-600 dark:text-sky-400 whitespace-nowrap">$${item.price.toFixed(2)}</span>
          </div>
          <p class="text-xs text-slate-600 dark:text-slate-400 line-clamp-2 mb-4 leading-relaxed">${item.description}</p>
          <div class="flex items-center gap-3 text-[11px] text-slate-500 dark:text-slate-400 mb-4 bg-slate-100/70 dark:bg-slate-800/60 p-2 rounded-lg">
            <span>Carbs: <strong>${item.carbs}</strong></span>
            <span>·</span>
            <span>Fat: <strong>${item.fat}</strong></span>
          </div>
        </div>
        <button onclick="openMealCustomizer('${item.id}')" class="w-full py-2.5 px-4 bg-sky-600 hover:bg-sky-500 text-white font-semibold text-sm rounded-xl transition shadow-md flex items-center justify-center gap-2">
          <span>Customize &amp; Add</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        </button>
      </div>
    </div>
  `).join('');
}

// Customizer Modal
function openMealCustomizer(dishId) {
  const dish = MENU_ITEMS.find(m => m.id === dishId);
  if (!dish) return;
  state.selectedDish = dish;

  const modal = document.getElementById('mealCustomizerModal');
  document.getElementById('customizerTitle').innerText = dish.name;
  document.getElementById('customizerImg').src = dish.image;
  document.getElementById('customizerPrice').innerText = `$${dish.price.toFixed(2)} CAD`;
  document.getElementById('customizerDesc').innerText = dish.description;

  const sidesContainer = document.getElementById('customizerSidesSection');
  const extraSidesContainer = document.getElementById('customizerExtraSidesSection');

  if (!dish.hasSides) {
    sidesContainer.innerHTML = `<div class="p-4 bg-amber-500/10 border border-amber-500/20 rounded-xl text-amber-600 dark:text-amber-400 text-xs">ℹ️ Pasta al Greco includes no sides.</div>`;
    extraSidesContainer.classList.add('hidden');
  } else {
    extraSidesContainer.classList.remove('hidden');
    sidesContainer.innerHTML = `
      <div class="mb-2 flex items-center justify-between text-xs">
        <label class="font-bold uppercase tracking-wider">Choose 2 Included Sides</label>
        <span id="sidesChosenCount" class="font-semibold text-slate-500">0 of 2 selected</span>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 max-h-48 overflow-y-auto pr-1">
        ${AVAILABLE_SIDES.map(side => `
          <label class="flex items-center gap-2.5 p-2 rounded-lg border border-slate-200 dark:border-slate-800 text-xs cursor-pointer">
            <input type="checkbox" name="includedSide" value="${side}" onchange="handleSideSelectionLimit(this)" class="custom-checkbox w-4 h-4 rounded text-sky-600" />
            <span>${side}</span>
          </label>
        `).join('')}
      </div>
    `;

    document.getElementById('extraSidesList').innerHTML = AVAILABLE_SIDES.slice(0, 6).map(side => `
      <label class="flex items-center justify-between p-2 rounded-lg border border-slate-200 dark:border-slate-800 text-xs cursor-pointer">
        <span class="flex items-center gap-2">
          <input type="checkbox" name="extraSide" value="${side}" onchange="updateCustomizerTotal()" class="custom-checkbox w-4 h-4 rounded text-sky-600" />
          <span>${side}</span>
        </span>
        <span class="font-bold text-sky-600 dark:text-sky-400">+$4.99</span>
      </label>
    `).join('');
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
    alert("You can select up to 2 included sides.");
  } else if (countDisplay) {
    countDisplay.innerText = `${checked.length} of 2 selected`;
    countDisplay.className = checked.length === 2 ? "text-xs font-bold text-emerald-500" : "text-xs font-semibold text-slate-500";
  }
}

function updateCustomizerTotal() {
  if (!state.selectedDish) return;
  const extraSides = document.querySelectorAll('input[name="extraSide"]:checked');
  const total = state.selectedDish.price + (extraSides.length * 4.99);
  const btnTotal = document.getElementById('customizerAddBtnTotal');
  if (btnTotal) btnTotal.innerText = `$${total.toFixed(2)} CAD`;
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
    document.querySelectorAll('input[name="includedSide"]:checked').forEach(cb => chosenSides.push(cb.value));
    if (chosenSides.length === 0) chosenSides = ["Rice Pilaf with Veggies", "Lemon Roasted Potatoes"];
    document.querySelectorAll('input[name="extraSide"]:checked').forEach(cb => chosenExtraSides.push(cb.value));
  }

  const specialNotes = document.getElementById('customizerNotes')?.value.trim() || '';
  state.cart.push({
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
  });

  saveCart();
  closeMealCustomizer();
  openCartDrawer();
}

function addSixMealPackage() {
  const starter = [
    { id: "grilled-chicken", sides: ["Rice Pilaf with Veggies", "Lemon Roasted Potatoes"] },
    { id: "chicken-souvlaki-plate", sides: ["Yellow Basmati Rice", "Garlic Butter Baked Potatoes"] },
    { id: "pork-souvlaki-plate", sides: ["Rice Pilaf with Veggies", "Sautéed Veggies"] },
    { id: "chicken-leg-plate", sides: ["Spinach Mushroom Rice", "Sweet Potatoes"] },
    { id: "veggie-souvlaki", sides: ["Lemon Roasted Potatoes", "Green Beans in Tomato Sauce"] },
    { id: "pasta-al-greco", sides: [] }
  ];

  starter.forEach(s => {
    const dish = MENU_ITEMS.find(m => m.id === s.id);
    if (dish) {
      state.cart.push({
        cartItemId: Date.now() + Math.random().toString(36).substr(2, 5),
        id: dish.id,
        name: dish.name,
        price: dish.price,
        image: dish.image,
        sides: s.sides,
        extraSides: [],
        extraSidesCost: 0,
        specialNotes: "6-Meal Starter Plan",
        quantity: 1
      });
    }
  });

  saveCart();
  openCartDrawer();
}

function saveCart() {
  localStorage.setItem('gfk_cart', JSON.stringify(state.cart));
  updateCartBadge();
  updateCartSummary();
}

function updateCartBadge() {
  const count = state.cart.reduce((sum, item) => sum + item.quantity, 0);
  document.querySelectorAll('.cart-count-badge').forEach(b => {
    b.innerText = count;
    b.style.display = count > 0 ? 'flex' : 'none';
  });
}

function updateCartSummary() {
  const container = document.getElementById('cartItemsList');
  if (!container) return;

  const totalMeals = state.cart.reduce((sum, item) => sum + item.quantity, 0);
  const subtotal = state.cart.reduce((sum, item) => sum + ((item.price + item.extraSidesCost) * item.quantity), 0);
  const minMet = totalMeals >= 6;
  const discountEligible = totalMeals >= 7;
  const discountAmount = discountEligible ? subtotal * 0.10 : 0;
  const discountedSubtotal = subtotal - discountAmount;
  const deliveryFee = calculateDeliveryFee(state.deliveryDistanceKm, state.deliveryMethod);
  const tax = discountedSubtotal * 0.13;
  const grandTotal = discountedSubtotal + deliveryFee + tax;

  const progressContainer = document.getElementById('cartVolumeProgressBar');
  if (progressContainer) {
    if (!minMet) {
      progressContainer.innerHTML = `<div class="p-3 bg-amber-500/10 border border-amber-500/20 rounded-xl text-xs text-amber-600 dark:text-amber-400 flex justify-between items-center"><span>⚠️ Minimum order is <strong>6 meals</strong> (${6 - totalMeals} more needed)</span><button onclick="addSixMealPackage()" class="underline font-bold">Auto Fill 6</button></div>`;
    } else if (!discountEligible) {
      progressContainer.innerHTML = `<div class="p-3 bg-sky-500/10 border border-sky-500/20 rounded-xl text-xs text-sky-600 dark:text-sky-400">🎉 Minimum met! Add <strong>1 more meal</strong> to unlock <strong>10% Volume Discount</strong>.</div>`;
    } else {
      progressContainer.innerHTML = `<div class="p-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-xs text-emerald-600 dark:text-emerald-400">🌟 <strong>10% Volume Discount Applied!</strong> Saved $${discountAmount.toFixed(2)} CAD.</div>`;
    }
  }

  if (state.cart.length === 0) {
    container.innerHTML = `<div class="text-center py-10 text-slate-400 text-xs">Your meal cart is empty. Minimum 6 meals.</div>`;
  } else {
    container.innerHTML = state.cart.map((item, index) => `
      <div class="p-3 bg-slate-50 dark:bg-slate-800/60 rounded-xl border border-slate-200 dark:border-slate-800 flex gap-3 text-xs">
        <img src="${item.image}" alt="${item.name}" class="w-14 h-14 rounded-lg object-cover flex-shrink-0" />
        <div class="flex-1 min-w-0">
          <div class="flex justify-between font-bold">
            <h4 class="text-slate-900 dark:text-white truncate">${item.name}</h4>
            <span class="text-sky-500 whitespace-nowrap">$${((item.price + item.extraSidesCost) * item.quantity).toFixed(2)}</span>
          </div>
          ${item.sides.length ? `<p class="text-[11px] text-slate-400 line-clamp-1">${item.sides.join(', ')}</p>` : ''}
          <div class="flex justify-between items-center mt-2 pt-1 border-t border-slate-200 dark:border-slate-700">
            <div class="flex items-center gap-2">
              <button onclick="adjustCartItemQty(${index}, -1)" class="w-5 h-5 rounded bg-slate-200 dark:bg-slate-700 text-center font-bold">-</button>
              <span>${item.quantity}</span>
              <button onclick="adjustCartItemQty(${index}, 1)" class="w-5 h-5 rounded bg-slate-200 dark:bg-slate-700 text-center font-bold">+</button>
            </div>
            <button onclick="removeCartItem(${index})" class="text-rose-500 text-[11px]">Remove</button>
          </div>
        </div>
      </div>
    `).join('');
  }

  document.getElementById('cartSubtotal') && (document.getElementById('cartSubtotal').innerText = `$${subtotal.toFixed(2)} CAD`);
  const discRow = document.getElementById('cartDiscountRow');
  if (discRow) {
    discRow.classList.toggle('hidden', !discountEligible);
    document.getElementById('cartDiscount').innerText = `-$${discountAmount.toFixed(2)} CAD`;
  }
  document.getElementById('cartDeliveryFee') && (document.getElementById('cartDeliveryFee').innerText = state.deliveryMethod === 'pickup' ? 'FREE' : `$${deliveryFee.toFixed(2)} CAD`);
  document.getElementById('cartTax') && (document.getElementById('cartTax').innerText = `$${tax.toFixed(2)} CAD`);
  document.getElementById('cartGrandTotal') && (document.getElementById('cartGrandTotal').innerText = `$${grandTotal.toFixed(2)} CAD`);

  const btn = document.getElementById('cartCheckoutBtn');
  if (btn) {
    btn.disabled = !minMet;
    btn.classList.toggle('opacity-50', !minMet);
    btn.innerText = minMet ? `Proceed to Checkout ($${grandTotal.toFixed(2)})` : `Min. 6 Meals Required (${totalMeals}/6)`;
  }
}

function adjustCartItemQty(index, delta) {
  if (!state.cart[index]) return;
  state.cart[index].quantity += delta;
  if (state.cart[index].quantity <= 0) state.cart.splice(index, 1);
  saveCart();
}

function removeCartItem(index) {
  state.cart.splice(index, 1);
  saveCart();
}

function openCartDrawer() {
  document.getElementById('cartDrawer')?.classList.remove('translate-x-full');
  document.body.classList.add('overflow-hidden');
  updateCartSummary();
}

function closeCartDrawer() {
  document.getElementById('cartDrawer')?.classList.add('translate-x-full');
  document.body.classList.remove('overflow-hidden');
}

function openCheckoutModal() {
  const count = state.cart.reduce((s, i) => s + i.quantity, 0);
  if (count < 6) { alert("Minimum 6 meals required."); return; }
  closeCartDrawer();
  document.getElementById('checkoutModal')?.classList.remove('hidden');
  document.body.classList.add('overflow-hidden');
  updateCartSummary();
}

function closeCheckoutModal() {
  document.getElementById('checkoutModal')?.classList.add('hidden');
  document.body.classList.remove('overflow-hidden');
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
    deliveryAddress: state.deliveryMethod === 'delivery' ? (document.getElementById('custAddress')?.value || 'Toronto, ON') : 'Pickup at George the Greek',
    scheduledDate: document.getElementById('scheduledDeliveryDay')?.value || 'Sunday',
    items: [...state.cart],
    itemCount: totalMeals,
    grandTotal: grandTotal,
    status: 'Received'
  };

  state.customerOrders.unshift(orderData);
  localStorage.setItem('gfk_orders', JSON.stringify(state.customerOrders));
  state.cart = [];
  saveCart();
  closeCheckoutModal();

  const confModal = document.getElementById('confirmationModal');
  const details = document.getElementById('confirmationOrderDetails');
  if (confModal && details) {
    details.innerHTML = `
      <div class="text-left bg-slate-50 dark:bg-slate-800/60 p-4 rounded-xl border border-slate-200 dark:border-slate-800 text-xs space-y-2">
        <div class="flex justify-between border-b pb-1"><span>Order:</span><strong class="text-sky-500">${orderData.orderId}</strong></div>
        <div class="flex justify-between"><span>Batch:</span><strong>${orderData.scheduledDate}</strong></div>
        <div class="flex justify-between"><span>Total Meals:</span><strong>${orderData.itemCount} meals</strong></div>
        <div class="flex justify-between text-base font-bold text-sky-500 pt-2 border-t"><span>Paid:</span><span>$${orderData.grandTotal.toFixed(2)} CAD</span></div>
      </div>
    `;
    confModal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
  }
}

function closeConfirmationModal() {
  document.getElementById('confirmationModal')?.classList.add('hidden');
  document.body.classList.remove('overflow-hidden');
}

// Initializer
document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  initSlider();
  renderMenu('all');
  updateCartBadge();
  updateCartSummary();
  updateCutoffCountdown();
  setInterval(updateCutoffCountdown, 1000);

  document.querySelectorAll('.cat-filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.cat-filter-btn').forEach(b => {
        b.classList.remove('bg-sky-600', 'text-white', 'shadow-md');
        b.classList.add('bg-slate-200/60', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300');
      });
      btn.classList.add('bg-sky-600', 'text-white', 'shadow-md');
      btn.classList.remove('bg-slate-200/60', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300');
      renderMenu(btn.getAttribute('data-cat'));
    });
  });

  const mobileBtn = document.getElementById('mobileMenuBtn');
  const mobileDrawer = document.getElementById('mobileMenuDrawer');
  if (mobileBtn && mobileDrawer) {
    mobileBtn.addEventListener('click', () => mobileDrawer.classList.toggle('hidden'));
  }

  document.querySelectorAll('input[name="deliveryMethodRadio"]').forEach(r => {
    r.addEventListener('change', (e) => {
      state.deliveryMethod = e.target.value;
      const addrBox = document.getElementById('deliveryAddressInputBox');
      const pickupBox = document.getElementById('pickupLocationInfoBox');
      if (addrBox && pickupBox) {
        addrBox.classList.toggle('hidden', state.deliveryMethod === 'pickup');
        pickupBox.classList.toggle('hidden', state.deliveryMethod !== 'pickup');
      }
      updateCartSummary();
    });
  });
});
