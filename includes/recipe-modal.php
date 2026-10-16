<dialog id="recipeModal" class="recipe-modal" aria-labelledby="modalRecipeTitle" aria-modal="true">
    <div class="modal-backdrop-click" id="modalBackdropClick"></div>
    <div class="modal-dialog-content">
        <button type="button" class="modal-close-btn" id="closeRecipeModalBtn" aria-label="Close recipe modal">&times;</button>
        
        <div class="modal-hero-banner">
            <img src="" alt="" id="modalRecipeImage" class="modal-img">
            <div class="modal-hero-overlay">
                <span class="modal-category-tag" id="modalCategoryTag"></span>
                <span class="modal-difficulty-tag" id="modalDifficultyTag"></span>
                <h2 id="modalRecipeTitle" class="modal-title"></h2>
                <p id="modalFrenchSubtitle" class="modal-french-subtitle"></p>
            </div>
        </div>

        <div class="modal-body">
            <!-- Quick Meta Stats Strip -->
            <div class="modal-meta-strip">
                <div class="meta-item">
                    <span class="meta-label">Prep Time</span>
                    <span class="meta-val" id="modalPrepTime"></span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Cook Time</span>
                    <span class="meta-val" id="modalCookTime"></span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Total Time</span>
                    <span class="meta-val" id="modalTotalTime"></span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Calories</span>
                    <span class="meta-val" id="modalCalories"></span>
                </div>
                <div class="meta-item actions-meta">
                    <button type="button" class="btn-modal-fav" id="modalFavToggleBtn" aria-label="Bookmark Recipe">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        <span id="modalFavBtnText">Save to Favorites</span>
                    </button>
                    <button type="button" class="btn-modal-print" id="modalPrintBtn" aria-label="Print Recipe">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 6 2 18 2 18 9"></polyline>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                            <rect x="6" y="14" width="12" height="8"></rect>
                        </svg>
                        <span>Print Recette</span>
                    </button>
                </div>
            </div>

            <!-- Description & Chef Tip -->
            <p id="modalDescription" class="modal-description-text"></p>

            <div class="chef-advice-card">
                <div class="chef-advice-header">
                    <span class="chef-icon">👨‍🍳</span>
                    <strong>Le Tour de Main (Chef's Secret Technique)</strong>
                </div>
                <p id="modalChefTip" class="chef-advice-body"></p>
                <div class="wine-pairing-pill">
                    <span class="wine-icon">🍷</span>
                    <strong>Sommelier Wine Pairing:</strong>
                    <span id="modalWinePairing"></span>
                </div>
            </div>

            <div class="modal-content-grid">
                <!-- Ingredients Section with Dynamic Servings Scaler -->
                <div class="ingredients-column">
                    <div class="column-header-flex">
                        <h3 class="section-title">Ingredients</h3>
                        <div class="servings-scaler-control" aria-label="Adjust Servings">
                            <span class="scaler-label">Servings:</span>
                            <div class="scaler-buttons">
                                <button type="button" class="scaler-btn" id="scaleDownBtn" aria-label="Decrease Servings">&minus;</button>
                                <span class="current-servings-count" id="currentServingsDisplay">4</span>
                                <button type="button" class="scaler-btn" id="scaleUpBtn" aria-label="Increase Servings">+</button>
                            </div>
                        </div>
                    </div>
                    <p class="checklist-hint">💡 Tip: Click any ingredient to mark it off your prep list.</p>
                    <ul class="modal-ingredients-list" id="modalIngredientsList">
                        <!-- Dynamic ingredients injected here -->
                    </ul>
                </div>

                <!-- Steps Column with Interactive Checkboxes & Cooking Timer -->
                <div class="steps-column">
                    <div class="column-header-flex">
                        <h3 class="section-title">Step-by-Step DIY Method</h3>
                        <span class="step-progress-badge" id="stepProgressBadge">0 of 0 Completed</span>
                    </div>

                    <!-- Interactive Kitchen Timer Widget -->
                    <div class="kitchen-timer-widget">
                        <div class="timer-top-row">
                            <div class="timer-title">
                                <span>⏱️ DIY Kitchen Timer</span>
                            </div>
                            <div class="timer-display" id="kitchenTimerDisplay">00:00</div>
                        </div>
                        <div class="timer-controls">
                            <button type="button" class="timer-action-btn primary" id="timerStartPauseBtn">Start Timer</button>
                            <button type="button" class="timer-action-btn secondary" id="timerResetBtn">Reset</button>
                            <div class="quick-timer-presets">
                                <button type="button" class="preset-btn" data-minutes="1">+1m</button>
                                <button type="button" class="preset-btn" data-minutes="5">+5m</button>
                                <button type="button" class="preset-btn" data-minutes="15">+15m</button>
                                <button type="button" class="preset-btn" data-minutes="30">+30m</button>
                            </div>
                        </div>
                    </div>

                    <div class="modal-steps-list" id="modalStepsList">
                        <!-- Dynamic steps injected here -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn-secondary" id="bottomCloseRecipeModalBtn">Fermer (Close)</button>
            <a href="#newsletter" class="btn-primary" id="modalClubBtn">Join Our DIY French Cook Club &rarr;</a>
        </div>
    </div>
</dialog>
