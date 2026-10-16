/**
 * frenchfoodsdiy - Interactive Client-Side Engine
 * Features:
 * - Real-time culinary search & multi-facet category/difficulty filters
 * - LocalStorage recipe bookmarking / favorites system with badge counters
 * - Accessible Modal Dialogs (<dialog>) with light-dismiss & ESC support
 * - Dynamic Servings Scaler with fraction & unit recalculations
 * - Interactive Prep Checklist & Step Progress Tracker
 * - Built-in Kitchen Countdown Timer with Web Audio API chime
 * - French Pantry Substitution Finder
 * - Dual Metric/Imperial & Oven Thermostat Calculator
 * - Terms of Service & Privacy Policy Modal Controllers
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Load Data from Injected JSON blocks
    let recipes = [];
    let substitutions = [];
    try {
        const recipesRaw = document.getElementById('recipesDatabase');
        if (recipesRaw) recipes = JSON.parse(recipesRaw.textContent);

        const subRaw = document.getElementById('substitutionsDatabase');
        if (subRaw) substitutions = JSON.parse(subRaw.textContent);
    } catch (e) {
        console.error('Error parsing recipe database:', e);
    }

    // 2. Favorites System (localStorage)
    const STORAGE_KEY_FAVS = 'frenchfoodsdiy_favorites';
    function getFavorites() {
        try {
            return JSON.parse(localStorage.getItem(STORAGE_KEY_FAVS)) || [];
        } catch {
            return [];
        }
    }

    function saveFavorites(favs) {
        localStorage.setItem(STORAGE_KEY_FAVS, JSON.stringify(favs));
        updateFavoritesUI();
    }

    function toggleFavorite(id) {
        let favs = getFavorites();
        if (favs.includes(id)) {
            favs = favs.filter(favId => favId !== id);
        } else {
            favs.push(id);
        }
        saveFavorites(favs);
    }

    function updateFavoritesUI() {
        const favs = getFavorites();
        const badge = document.getElementById('navFavBadge');
        if (badge) badge.textContent = favs.length;

        // Update all heart buttons on cards
        document.querySelectorAll('.card-fav-btn').forEach(btn => {
            const id = btn.getAttribute('data-id');
            if (favs.includes(id)) {
                btn.classList.add('favorited');
                btn.setAttribute('aria-label', 'Remove from favorites');
            } else {
                btn.classList.remove('favorited');
                btn.setAttribute('aria-label', 'Save to favorites');
            }
        });

        // Update modal favorite button if open
        if (activeRecipe) {
            const modalFavBtn = document.getElementById('modalFavToggleBtn');
            const modalFavText = document.getElementById('modalFavBtnText');
            if (modalFavBtn && modalFavText) {
                if (favs.includes(activeRecipe.id)) {
                    modalFavBtn.classList.add('favorited');
                    modalFavText.textContent = 'Favorited ❤️';
                } else {
                    modalFavBtn.classList.remove('favorited');
                    modalFavText.textContent = 'Save to Favorites';
                }
            }
        }
    }

    // Bind card favorite buttons
    document.querySelectorAll('.card-fav-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const id = btn.getAttribute('data-id');
            toggleFavorite(id);
            if (isFavoritesOnlyFilter) applyFilters();
        });
    });

    // 3. Search and Multi-Facet Filter Engine
    let activeCategory = 'all';
    let activeDifficulty = 'all';
    let activeMaxTime = 'all';
    let searchQuery = '';
    let isFavoritesOnlyFilter = false;

    const heroSearchInput = document.getElementById('heroSearchInput');
    const clearHeroSearchBtn = document.getElementById('clearHeroSearchBtn');
    const difficultyFilter = document.getElementById('difficultyFilter');
    const timeFilter = document.getElementById('timeFilter');
    const filterFavoritesBtn = document.getElementById('filterFavoritesBtn');
    const categoryTabs = document.querySelectorAll('.filter-tab');
    const recipeCards = document.querySelectorAll('.recipe-card');
    const recipeCountDisplay = document.getElementById('recipeCountDisplay');
    const resetFiltersBtn = document.getElementById('resetFiltersBtn');
    const emptyRecipesState = document.getElementById('emptyRecipesState');
    const clearAllFiltersAction = document.getElementById('clearAllFiltersAction');

    function applyFilters() {
        let visibleCount = 0;
        const favs = getFavorites();

        recipeCards.forEach(card => {
            const category = card.getAttribute('data-category');
            const difficulty = card.getAttribute('data-difficulty');
            const totalTime = parseInt(card.getAttribute('data-time'), 10) || 0;
            const searchHaystack = card.getAttribute('data-title') || '';
            const cardId = card.getAttribute('data-id');

            // Category match
            const matchCategory = (activeCategory === 'all' || category === activeCategory);
            // Difficulty match
            const matchDifficulty = (activeDifficulty === 'all' || difficulty === activeDifficulty);
            // Time match
            let matchTime = true;
            if (activeMaxTime !== 'all') {
                const max = parseInt(activeMaxTime, 10);
                matchTime = (totalTime <= max);
            }
            // Favorites filter match
            const matchFavorites = (!isFavoritesOnlyFilter || favs.includes(cardId));
            // Search match
            const matchSearch = (!searchQuery || searchHaystack.includes(searchQuery));

            if (matchCategory && matchDifficulty && matchTime && matchFavorites && matchSearch) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Update count & empty state
        if (recipeCountDisplay) {
            recipeCountDisplay.innerHTML = `Showing <strong>${visibleCount}</strong> of ${recipeCards.length} authentic French recipes`;
        }

        if (emptyRecipesState) {
            emptyRecipesState.style.display = visibleCount === 0 ? 'block' : 'none';
        }

        // Show/hide reset button
        const isFiltered = (activeCategory !== 'all' || activeDifficulty !== 'all' || activeMaxTime !== 'all' || searchQuery !== '' || isFavoritesOnlyFilter);
        if (resetFiltersBtn) {
            resetFiltersBtn.style.display = isFiltered ? 'inline-block' : 'none';
        }
    }

    // Hero Search Input
    if (heroSearchInput) {
        heroSearchInput.addEventListener('input', (e) => {
            searchQuery = e.target.value.trim().toLowerCase();
            if (clearHeroSearchBtn) {
                clearHeroSearchBtn.style.display = searchQuery ? 'inline-block' : 'none';
            }
            applyFilters();
        });
    }

    if (clearHeroSearchBtn) {
        clearHeroSearchBtn.addEventListener('click', () => {
            heroSearchInput.value = '';
            searchQuery = '';
            clearHeroSearchBtn.style.display = 'none';
            applyFilters();
            heroSearchInput.focus();
        });
    }

    // Quick tag search buttons in Hero
    document.querySelectorAll('.quick-tag-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const term = btn.getAttribute('data-search') || '';
            if (heroSearchInput) {
                heroSearchInput.value = term;
                searchQuery = term.toLowerCase();
                if (clearHeroSearchBtn) clearHeroSearchBtn.style.display = 'inline-block';
            }
            // Smooth scroll to recipes
            document.getElementById('recipes').scrollIntoView({ behavior: 'smooth' });
            applyFilters();
        });
    });

    // Category Tabs
    categoryTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            categoryTabs.forEach(t => {
                t.classList.remove('active');
                t.setAttribute('aria-selected', 'false');
            });
            tab.classList.add('active');
            tab.setAttribute('aria-selected', 'true');
            activeCategory = tab.getAttribute('data-category') || 'all';
            applyFilters();
        });
    });

    // Difficulty & Time dropdowns
    if (difficultyFilter) {
        difficultyFilter.addEventListener('change', (e) => {
            activeDifficulty = e.target.value;
            applyFilters();
        });
    }

    if (timeFilter) {
        timeFilter.addEventListener('change', (e) => {
            activeMaxTime = e.target.value;
            applyFilters();
        });
    }

    // Favorites Filter toggle
    if (filterFavoritesBtn) {
        filterFavoritesBtn.addEventListener('click', () => {
            isFavoritesOnlyFilter = !isFavoritesOnlyFilter;
            filterFavoritesBtn.classList.toggle('active', isFavoritesOnlyFilter);
            filterFavoritesBtn.setAttribute('aria-pressed', isFavoritesOnlyFilter ? 'true' : 'false');
            applyFilters();
        });
    }

    // Nav favorites button
    const navFavoritesBtn = document.getElementById('navFavoritesBtn');
    if (navFavoritesBtn) {
        navFavoritesBtn.addEventListener('click', () => {
            isFavoritesOnlyFilter = true;
            if (filterFavoritesBtn) {
                filterFavoritesBtn.classList.add('active');
                filterFavoritesBtn.setAttribute('aria-pressed', 'true');
            }
            document.getElementById('recipes').scrollIntoView({ behavior: 'smooth' });
            applyFilters();
        });
    }

    // Reset Filters
    function resetAllFilters() {
        activeCategory = 'all';
        activeDifficulty = 'all';
        activeMaxTime = 'all';
        searchQuery = '';
        isFavoritesOnlyFilter = false;

        categoryTabs.forEach(t => {
            t.classList.toggle('active', t.getAttribute('data-category') === 'all');
            t.setAttribute('aria-selected', t.getAttribute('data-category') === 'all' ? 'true' : 'false');
        });

        if (heroSearchInput) heroSearchInput.value = '';
        if (clearHeroSearchBtn) clearHeroSearchBtn.style.display = 'none';
        if (difficultyFilter) difficultyFilter.value = 'all';
        if (timeFilter) timeFilter.value = 'all';
        if (filterFavoritesBtn) {
            filterFavoritesBtn.classList.remove('active');
            filterFavoritesBtn.setAttribute('aria-pressed', 'false');
        }

        applyFilters();
    }

    if (resetFiltersBtn) resetFiltersBtn.addEventListener('click', resetAllFilters);
    if (clearAllFiltersAction) clearAllFiltersAction.addEventListener('click', resetAllFilters);

    // Footer category filter links
    document.querySelectorAll('.footer-links a[data-filter]').forEach(link => {
        link.addEventListener('click', (e) => {
            const cat = link.getAttribute('data-filter');
            categoryTabs.forEach(t => {
                const match = t.getAttribute('data-category') === cat;
                t.classList.toggle('active', match);
                t.setAttribute('aria-selected', match ? 'true' : 'false');
            });
            activeCategory = cat;
            applyFilters();
        });
    });

    // 4. Interactive Recipe Modal Controller
    let activeRecipe = null;
    let currentServings = 4;
    const recipeModal = document.getElementById('recipeModal');
    const modalBackdropClick = document.getElementById('modalBackdropClick');
    const closeRecipeModalBtn = document.getElementById('closeRecipeModalBtn');
    const bottomCloseRecipeModalBtn = document.getElementById('bottomCloseRecipeModalBtn');
    const currentServingsDisplay = document.getElementById('currentServingsDisplay');
    const scaleDownBtn = document.getElementById('scaleDownBtn');
    const scaleUpBtn = document.getElementById('scaleUpBtn');
    const modalIngredientsList = document.getElementById('modalIngredientsList');
    const modalStepsList = document.getElementById('modalStepsList');
    const stepProgressBadge = document.getElementById('stepProgressBadge');

    function openRecipeModal(recipeId) {
        const recipe = recipes.find(r => r.id === recipeId);
        if (!recipe || !recipeModal) return;

        activeRecipe = recipe;
        currentServings = recipe.default_servings || 4;

        // Populate modal data
        document.getElementById('modalRecipeTitle').textContent = recipe.title;
        document.getElementById('modalFrenchSubtitle').textContent = recipe.french_title;
        document.getElementById('modalRecipeImage').src = recipe.image;
        document.getElementById('modalRecipeImage').alt = recipe.title;
        document.getElementById('modalCategoryTag').textContent = recipe.category_name;
        document.getElementById('modalDifficultyTag').textContent = recipe.difficulty;
        document.getElementById('modalPrepTime').textContent = recipe.prep_time_minutes + ' mins';
        document.getElementById('modalCookTime').textContent = recipe.cook_time_minutes + ' mins';
        document.getElementById('modalTotalTime').textContent = recipe.total_time;
        document.getElementById('modalCalories').textContent = recipe.calories_per_serving + ' kcal';
        document.getElementById('modalDescription').textContent = recipe.description;
        document.getElementById('modalChefTip').textContent = recipe.chef_tip;
        document.getElementById('modalWinePairing').textContent = recipe.wine_pairing;

        if (currentServingsDisplay) {
            currentServingsDisplay.textContent = currentServings;
        }

        renderIngredients();
        renderSteps();
        updateFavoritesUI();

        // Show modal natively
        if (typeof recipeModal.showModal === 'function') {
            recipeModal.showModal();
        } else {
            recipeModal.setAttribute('open', '');
        }
        document.body.style.overflow = 'hidden';
    }

    function closeRecipeModal() {
        if (!recipeModal) return;
        if (typeof recipeModal.close === 'function') {
            recipeModal.close();
        } else {
            recipeModal.removeAttribute('open');
        }
        document.body.style.overflow = '';
        activeRecipe = null;
        stopKitchenTimer();
    }

    if (closeRecipeModalBtn) closeRecipeModalBtn.addEventListener('click', closeRecipeModal);
    if (bottomCloseRecipeModalBtn) bottomCloseRecipeModalBtn.addEventListener('click', closeRecipeModal);
    if (modalBackdropClick) modalBackdropClick.addEventListener('click', closeRecipeModal);

    // Servings Scaler Logic
    function formatScaledAmount(amount) {
        if (amount <= 0) return '';
        // Round to 1 decimal place or fraction representation
        const rounded = Math.round(amount * 10) / 10;
        if (rounded === 0.25) return '¼';
        if (rounded === 0.5) return '½';
        if (rounded === 0.75) return '¾';
        if (rounded === 1.5) return '1 ½';
        return rounded;
    }

    function renderIngredients() {
        if (!activeRecipe || !modalIngredientsList) return;
        modalIngredientsList.innerHTML = '';

        const ratio = currentServings / (activeRecipe.default_servings || 4);

        activeRecipe.ingredients.forEach((ing, index) => {
            const li = document.createElement('li');
            li.className = 'ingredient-item';
            
            const scaledAmount = ing.amount ? formatScaledAmount(ing.amount * ratio) : '';
            const unitText = ing.unit ? ` ${ing.unit}` : '';
            const noteText = ing.note ? ` <em style="color: #8f97a3;">(${ing.note})</em>` : '';

            li.innerHTML = `
                <input type="checkbox" id="ing-${index}" class="ingredient-checkbox">
                <label for="ing-${index}" class="ingredient-text">
                    <span class="ingredient-amount">${scaledAmount}${unitText}</span> ${ing.name}${noteText}
                </label>
            `;

            // Checkbox event
            const checkbox = li.querySelector('.ingredient-checkbox');
            checkbox.addEventListener('change', () => {
                li.classList.toggle('checked', checkbox.checked);
            });

            modalIngredientsList.appendChild(li);
        });
    }

    if (scaleDownBtn) {
        scaleDownBtn.addEventListener('click', () => {
            if (currentServings > 1) {
                currentServings--;
                if (currentServingsDisplay) currentServingsDisplay.textContent = currentServings;
                renderIngredients();
            }
        });
    }

    if (scaleUpBtn) {
        scaleUpBtn.addEventListener('click', () => {
            if (currentServings < 20) {
                currentServings++;
                if (currentServingsDisplay) currentServingsDisplay.textContent = currentServings;
                renderIngredients();
            }
        });
    }

    // Step-by-Step Render
    function renderSteps() {
        if (!activeRecipe || !modalStepsList) return;
        modalStepsList.innerHTML = '';

        let completedSteps = 0;
        const totalSteps = activeRecipe.steps.length;

        function updateStepCounter() {
            if (stepProgressBadge) {
                stepProgressBadge.textContent = `${completedSteps} of ${totalSteps} Completed`;
            }
        }

        activeRecipe.steps.forEach((st, idx) => {
            const card = document.createElement('div');
            card.className = 'step-card';
            card.innerHTML = `
                <div class="step-number-bubble">${st.step}</div>
                <div class="step-card-content">
                    <div class="step-header-flex">
                        <h4 class="step-title">${st.title}</h4>
                        <label class="step-checkbox-wrap">
                            <input type="checkbox" class="step-checkbox" id="stepCheck-${idx}">
                            <span>Done</span>
                        </label>
                    </div>
                    <p class="step-instruction">${st.instruction}</p>
                </div>
            `;

            const checkbox = card.querySelector('.step-checkbox');
            checkbox.addEventListener('change', () => {
                if (checkbox.checked) {
                    card.classList.add('completed');
                    completedSteps++;
                } else {
                    card.classList.remove('completed');
                    completedSteps--;
                }
                updateStepCounter();
            });

            modalStepsList.appendChild(card);
        });

        updateStepCounter();
    }

    // Print Recipe Action
    const modalPrintBtn = document.getElementById('modalPrintBtn');
    if (modalPrintBtn) {
        modalPrintBtn.addEventListener('click', () => {
            window.print();
        });
    }

    // Modal Favorite Action
    const modalFavToggleBtn = document.getElementById('modalFavToggleBtn');
    if (modalFavToggleBtn) {
        modalFavToggleBtn.addEventListener('click', () => {
            if (activeRecipe) {
                toggleFavorite(activeRecipe.id);
            }
        });
    }

    // Open Recipe triggers across page
    document.addEventListener('click', (e) => {
        const trigger = e.target.closest('.open-recipe-trigger');
        if (trigger) {
            const recipeId = trigger.getAttribute('data-recipe-id');
            if (recipeId) openRecipeModal(recipeId);
        }
    });

    // 5. Kitchen Countdown Timer Engine
    let timerInterval = null;
    let timerTotalSeconds = 300; // 5 mins default
    let isTimerRunning = false;
    const timerDisplay = document.getElementById('kitchenTimerDisplay');
    const timerStartPauseBtn = document.getElementById('timerStartPauseBtn');
    const timerResetBtn = document.getElementById('timerResetBtn');

    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }

    function updateTimerUI() {
        if (timerDisplay) timerDisplay.textContent = formatTime(timerTotalSeconds);
    }

    function playAudioChime() {
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.type = 'sine';
            osc.frequency.setValueAtTime(587.33, ctx.currentTime); // D5
            osc.frequency.exponentialRampToValueAtTime(880, ctx.currentTime + 0.3); // A5
            gain.gain.setValueAtTime(0.3, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.8);
            osc.connect(gain);
            gain.connect(ctx.destination);
            osc.start();
            osc.stop(ctx.currentTime + 0.8);
        } catch (e) {
            console.log('Audio chime completed');
        }
    }

    function startKitchenTimer() {
        if (isTimerRunning) return;
        isTimerRunning = true;
        if (timerStartPauseBtn) timerStartPauseBtn.textContent = 'Pause';

        timerInterval = setInterval(() => {
            if (timerTotalSeconds > 0) {
                timerTotalSeconds--;
                updateTimerUI();
            } else {
                stopKitchenTimer();
                playAudioChime();
                alert('⏰ French DIY Kitchen Timer: Bon appétit! Your cooking step time is up!');
            }
        }, 1000);
    }

    function pauseKitchenTimer() {
        isTimerRunning = false;
        clearInterval(timerInterval);
        if (timerStartPauseBtn) timerStartPauseBtn.textContent = 'Resume';
    }

    function stopKitchenTimer() {
        isTimerRunning = false;
        clearInterval(timerInterval);
        if (timerStartPauseBtn) timerStartPauseBtn.textContent = 'Start Timer';
    }

    if (timerStartPauseBtn) {
        timerStartPauseBtn.addEventListener('click', () => {
            if (isTimerRunning) {
                pauseKitchenTimer();
            } else {
                startKitchenTimer();
            }
        });
    }

    if (timerResetBtn) {
        timerResetBtn.addEventListener('click', () => {
            stopKitchenTimer();
            timerTotalSeconds = 300;
            updateTimerUI();
        });
    }

    document.querySelectorAll('.preset-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const mins = parseInt(btn.getAttribute('data-minutes'), 10) || 1;
            timerTotalSeconds = mins * 60;
            updateTimerUI();
            startKitchenTimer();
        });
    });

    // 6. Legal Modals (Terms & Privacy)
    const termsModal = document.getElementById('termsModal');
    const privacyModal = document.getElementById('privacyModal');

    function openLegalModal(modal) {
        if (!modal) return;
        if (typeof modal.showModal === 'function') {
            modal.showModal();
        } else {
            modal.setAttribute('open', '');
        }
        document.body.style.overflow = 'hidden';
    }

    function closeLegalModal(modal) {
        if (!modal) return;
        if (typeof modal.close === 'function') {
            modal.close();
        } else {
            modal.removeAttribute('open');
        }
        document.body.style.overflow = '';
    }

    // Terms Triggers
    const termsTriggers = [
        'openTermsNavBtn', 'mobileTermsBtn', 'footerTermsBtn',
        'bottomTermsLink', 'newsletterTermsLink', 'viewFullTermsFromSummary'
    ];
    termsTriggers.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            el.addEventListener('click', (e) => {
                if (termsModal) {
                    e.preventDefault();
                    openLegalModal(termsModal);
                }
            });
        }
    });

    const closeTermsModalBtn = document.getElementById('closeTermsModalBtn');
    const termsBackdropClick = document.getElementById('termsBackdropClick');
    const acceptTermsBtn = document.getElementById('acceptTermsBtn');

    if (closeTermsModalBtn) closeTermsModalBtn.addEventListener('click', () => closeLegalModal(termsModal));
    if (termsBackdropClick) termsBackdropClick.addEventListener('click', () => closeLegalModal(termsModal));
    if (acceptTermsBtn) acceptTermsBtn.addEventListener('click', () => closeLegalModal(termsModal));

    // Privacy Triggers
    const privacyTriggers = [
        'openPrivacyNavBtn', 'mobilePrivacyBtn', 'footerPrivacyBtn',
        'bottomPrivacyLink', 'newsletterPrivacyLink', 'viewFullPrivacyFromSummary'
    ];
    privacyTriggers.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            el.addEventListener('click', (e) => {
                if (privacyModal) {
                    e.preventDefault();
                    openLegalModal(privacyModal);
                }
            });
        }
    });

    const closePrivacyModalBtn = document.getElementById('closePrivacyModalBtn');
    const privacyBackdropClick = document.getElementById('privacyBackdropClick');
    const acceptPrivacyBtn = document.getElementById('acceptPrivacyBtn');

    if (closePrivacyModalBtn) closePrivacyModalBtn.addEventListener('click', () => closeLegalModal(privacyModal));
    if (privacyBackdropClick) privacyBackdropClick.addEventListener('click', () => closeLegalModal(privacyModal));
    if (acceptPrivacyBtn) acceptPrivacyBtn.addEventListener('click', () => closeLegalModal(privacyModal));

    // ESC Key listener to close whichever modal is open
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (recipeModal && recipeModal.open) closeRecipeModal();
            if (termsModal && termsModal.open) closeLegalModal(termsModal);
            if (privacyModal && privacyModal.open) closeLegalModal(privacyModal);
        }
    });

    // Check URL Hash on load (#terms, #privacy)
    if (window.location.hash === '#terms') openLegalModal(termsModal);
    if (window.location.hash === '#privacy') openLegalModal(privacyModal);

    // 7. French Pantry Substitution Tool
    const pantrySelect = document.getElementById('pantrySelect');
    if (pantrySelect && substitutions.length > 0) {
        pantrySelect.addEventListener('change', (e) => {
            const index = parseInt(e.target.value, 10);
            const item = substitutions[index];
            if (!item) return;

            document.getElementById('subFrenchItem').textContent = item.french_item;
            document.getElementById('subDescription').textContent = item.description;
            document.getElementById('subAlternative').textContent = item.substitute;
            document.getElementById('subBestFor').textContent = item.best_for;
        });
    }

    // 8. Kitchen Unit & Temperature Converter
    const celsiusInput = document.getElementById('celsiusInput');
    const fahrenheitInput = document.getElementById('fahrenheitInput');
    const thermostatDisplay = document.getElementById('thermostatDisplay');

    function updateThermostat(celsius) {
        // French oven thermostat: Th = Celsius / 30
        const th = Math.round(celsius / 30);
        let heatName = 'Four Moyen (Medium)';
        if (celsius < 140) heatName = 'Four Doux (Low)';
        else if (celsius <= 180) heatName = 'Four Moyen (Moderate)';
        else if (celsius <= 220) heatName = 'Four Chaud (Hot)';
        else heatName = 'Four Très Chaud (Very Hot)';

        if (thermostatDisplay) {
            thermostatDisplay.innerHTML = `French Gas Mark / Thermostat: <strong>Th. ${th} (${heatName})</strong>`;
        }
    }

    if (celsiusInput && fahrenheitInput) {
        celsiusInput.addEventListener('input', () => {
            const c = parseFloat(celsiusInput.value);
            if (!isNaN(c)) {
                fahrenheitInput.value = Math.round((c * 9/5) + 32);
                updateThermostat(c);
            }
        });

        fahrenheitInput.addEventListener('input', () => {
            const f = parseFloat(fahrenheitInput.value);
            if (!isNaN(f)) {
                const c = Math.round((f - 32) * 5/9);
                celsiusInput.value = c;
                updateThermostat(c);
            }
        });
    }

    // Weight to Volume Converter
    const ingredientTypeSelect = document.getElementById('ingredientTypeSelect');
    const gramsInput = document.getElementById('gramsInput');
    const cupsDisplay = document.getElementById('cupsDisplay');

    function calculateCups() {
        if (!gramsInput || !cupsDisplay || !ingredientTypeSelect) return;
        const grams = parseFloat(gramsInput.value) || 0;
        const type = ingredientTypeSelect.value;

        let gramsPerCup = 125; // Flour default
        if (type === 'butter') gramsPerCup = 227;
        else if (type === 'sugar') gramsPerCup = 200;
        else if (type === 'liquid') gramsPerCup = 240;

        const cups = grams / gramsPerCup;
        const roundedCups = Math.round(cups * 10) / 10;
        cupsDisplay.value = `${roundedCups} cups (${Math.round(cups * 16)} tbsp)`;
    }

    if (ingredientTypeSelect) ingredientTypeSelect.addEventListener('change', calculateCups);
    if (gramsInput) gramsInput.addEventListener('input', calculateCups);

    // 9. Mobile Menu Drawer
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileDrawer = document.getElementById('mobileDrawer');
    const closeDrawerBtn = document.getElementById('closeDrawerBtn');

    if (mobileMenuToggle && mobileDrawer) {
        mobileMenuToggle.addEventListener('click', () => {
            const isOpen = mobileDrawer.classList.contains('open');
            mobileDrawer.classList.toggle('open', !isOpen);
            mobileMenuToggle.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
        });
    }

    if (closeDrawerBtn && mobileDrawer) {
        closeDrawerBtn.addEventListener('click', () => {
            mobileDrawer.classList.remove('open');
            if (mobileMenuToggle) mobileMenuToggle.setAttribute('aria-expanded', 'false');
        });
    }

    // Close mobile drawer upon clicking any link
    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', () => {
            if (mobileDrawer) mobileDrawer.classList.remove('open');
            if (mobileMenuToggle) mobileMenuToggle.setAttribute('aria-expanded', 'false');
        });
    });

    // Initialize UI
    updateFavoritesUI();
    applyFilters();
});
