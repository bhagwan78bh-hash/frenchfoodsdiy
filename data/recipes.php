<?php
/**
 * Authentic French Recipes Data for frenchfoodsdiy
 * Contains structured recipes with scalable ingredient ratios,
 * cooking stages, chef techniques, and dietary information.
 */

$recipes = [
    [
        'id' => 'boeuf-bourguignon',
        'title' => 'Boeuf Bourguignon',
        'french_title' => 'Boeuf Bourguignon Traditionnel',
        'subtitle' => 'Burgundy Wine Braised Beef with Pearl Onions & Mushrooms',
        'category' => 'mains',
        'category_name' => 'Mains (Plats)',
        'difficulty' => 'Classic',
        'difficulty_level' => 2,
        'prep_time_minutes' => 30,
        'cook_time_minutes' => 180,
        'total_time' => '3h 30m',
        'default_servings' => 4,
        'calories_per_serving' => 620,
        'image' => 'assets/images/boeuf-bourguignon.jpg',
        'badge' => "Chef's Signature",
        'description' => 'The crown jewel of French home braising: melt-in-your-mouth chuck beef bathed in a velvety red Burgundy wine reduction, aromatic herbs, golden button mushrooms, and sweet caramelized pearl onions.',
        'wine_pairing' => 'Burgundy Pinot Noir, Côtes du Rhône, or Beaujolais-Villages',
        'chef_tip' => 'Always pat your beef cubes completely dry with paper towels before searing. A true dark mahogany sear creates the fond that gives this stew its signature deep French flavor.',
        'tags' => ['Slow Cook', 'Winter Classic', 'Make Ahead', 'Gluten-Free Option'],
        'ingredients' => [
            ['amount' => 1000, 'unit' => 'g', 'name' => 'Boneless beef chuck roast', 'note' => 'cut into 2-inch (5cm) cubes'],
            ['amount' => 150, 'unit' => 'g', 'name' => 'Smoked bacon lardons or thick pancetta', 'note' => 'sliced into matchsticks'],
            ['amount' => 1, 'unit' => 'bottle (750ml)', 'name' => 'Dry French red wine', 'note' => 'Pinot Noir or Côtes du Rhône'],
            ['amount' => 500, 'unit' => 'ml', 'name' => 'Rich beef bone stock', 'note' => 'low sodium or homemade'],
            ['amount' => 2, 'unit' => 'tbsp', 'name' => 'Tomato paste (double-concentrated)', 'note' => ''],
            ['amount' => 3, 'unit' => 'cloves', 'name' => 'Garlic', 'note' => 'crushed and finely minced'],
            ['amount' => 2, 'unit' => 'tbsp', 'name' => 'All-purpose flour', 'note' => 'or cornstarch for gluten-free'],
            ['amount' => 2, 'unit' => 'large', 'name' => 'Carrots', 'note' => 'peeled and sliced into 1-inch chunks'],
            ['amount' => 1, 'unit' => 'large', 'name' => 'Yellow onion', 'note' => 'chopped'],
            ['amount' => 200, 'unit' => 'g', 'name' => 'Baby pearl onions', 'note' => 'peeled'],
            ['amount' => 300, 'unit' => 'g', 'name' => 'Cremini or button mushrooms', 'note' => 'quartered or halved'],
            ['amount' => 40, 'unit' => 'g', 'name' => 'Unsalted French butter', 'note' => 'high fat content'],
            ['amount' => 2, 'unit' => 'tbsp', 'name' => 'Extra virgin olive oil', 'note' => ''],
            ['amount' => 1, 'unit' => 'bundle', 'name' => 'Bouquet Garni', 'note' => '3 thyme sprigs, 2 bay leaves, 4 parsley stems tied with twine'],
            ['amount' => 1, 'unit' => 'tsp', 'name' => 'Fine sea salt and freshly cracked black pepper', 'note' => 'to taste'],
            ['amount' => 2, 'unit' => 'tbsp', 'name' => 'Fresh flat-leaf parsley', 'note' => 'finely chopped for garnish']
        ],
        'steps' => [
            [
                'step' => 1,
                'title' => 'Crisp the Lardons & Render Fat',
                'instruction' => 'In a large heavy-bottomed Dutch oven (enamelled cast iron preferred), warm 1 tbsp olive oil over medium heat. Add the bacon lardons and sauté for 6 to 8 minutes until golden brown and crispy. Transfer lardons with a slotted spoon to a bowl, leaving the rendered fat in the pot.'
            ],
            [
                'step' => 2,
                'title' => 'Deep Sear the Beef Cubes',
                'instruction' => 'Thoroughly pat the beef cubes dry with paper towels; season generously with salt and pepper. Turn the heat to high. Sear beef in batches without crowding for 3 to 4 minutes per side until a rich dark-brown crust forms. Set seared beef aside with the lardons.'
            ],
            [
                'step' => 3,
                'title' => 'Sauté Aromatics & Build the Fond',
                'instruction' => 'Turn heat to medium. Add sliced carrots and chopped yellow onion to the remaining fat. Cook for 5 minutes until lightly browned. Stir in minced garlic and cook for 1 minute until fragrant. Add the tomato paste and flour, stirring constantly for 2 minutes to cook out raw flour flavor.'
            ],
            [
                'step' => 4,
                'title' => 'Deglaze with Wine & Begin Slow Braise',
                'instruction' => 'Pour in the red wine, vigorously scraping up all delicious caramelized brown bits from the bottom of the pot. Return beef, lardons, and any resting juices. Add beef broth until meat is barely submerged. Nest the bouquet garni into the center. Bring to a gentle boil, cover tightly with the lid, and transfer to a preheated 160°C (320°F) oven for 2.5 to 3 hours until beef is spoon-tender.'
            ],
            [
                'step' => 5,
                'title' => 'Sauté Mushrooms & Pearl Onions',
                'instruction' => 'While the stew braises, melt 20g butter and 1 tbsp olive oil in a skillet over medium-high. Sauté mushrooms until browned and glistening (6-8 mins); season with salt and set aside. In the same skillet, braise peeled pearl onions with 20g butter, 3 tbsp broth, and a pinch of sugar until caramelized and tender.'
            ],
            [
                'step' => 6,
                'title' => 'Assemble, Simmer & Serve',
                'instruction' => 'Remove Dutch oven from oven. Discard the bouquet garni. Gently fold in the sautéed mushrooms and glazed pearl onions. Simmer on stovetop uncovered for 10 minutes to bring the sauce to a silky, spoon-coating consistency. Garnish with fresh chopped parsley and serve with crusty baguette or buttery mashed potatoes.'
            ]
        ]
    ],
    [
        'id' => 'french-onion-soup',
        'title' => 'French Onion Soup',
        'french_title' => "Soupe à l'Oignon Gratinée",
        'subtitle' => 'Caramelized Sweet Onions with Melted Gruyère Crouton',
        'category' => 'soups',
        'category_name' => 'Soups & Starters',
        'difficulty' => 'Easy DIY',
        'difficulty_level' => 1,
        'prep_time_minutes' => 20,
        'cook_time_minutes' => 60,
        'total_time' => '1h 20m',
        'default_servings' => 4,
        'calories_per_serving' => 390,
        'image' => 'assets/images/french-onion-soup.jpg',
        'badge' => 'Bistro Favorite',
        'description' => 'The ultimate Parisian bistro comfort food. Sweet onions slowly caramelized to a deep mahogany amber, simmered in rich beef broth and white wine, topped with a crusty baguette slice and bubbling broiled Gruyère cheese.',
        'wine_pairing' => 'Dry white wine like Chablis or Sauvignon Blanc, or a light Cru Beaujolais',
        'chef_tip' => 'Patience is everything: do not rush the caramelization! It takes 40 to 45 minutes of gentle stirring to break down the sugars. A splash of dry vermouth or cognac at the end elevates the broth to luxury status.',
        'tags' => ['Comfort Food', 'Classic French', 'Vegetarian Adaptable'],
        'ingredients' => [
            ['amount' => 1200, 'unit' => 'g', 'name' => 'Yellow and red onions (approx 5-6 large)', 'note' => 'thinly sliced from root to stem'],
            ['amount' => 50, 'unit' => 'g', 'name' => 'Unsalted French butter', 'note' => 'Normandy butter preferred'],
            ['amount' => 1, 'unit' => 'tbsp', 'name' => 'Extra virgin olive oil', 'note' => ''],
            ['amount' => 0.5, 'unit' => 'tsp', 'name' => 'Granulated sugar', 'note' => 'enhances caramelization'],
            ['amount' => 3, 'unit' => 'cloves', 'name' => 'Garlic', 'note' => 'finely minced'],
            ['amount' => 2, 'unit' => 'tbsp', 'name' => 'All-purpose flour', 'note' => 'light thickener'],
            ['amount' => 150, 'unit' => 'ml', 'name' => 'Dry white wine or dry French vermouth', 'note' => 'for deglazing'],
            ['amount' => 1200, 'unit' => 'ml', 'name' => 'Rich dark beef stock', 'note' => 'or rich vegetable broth'],
            ['amount' => 2, 'unit' => 'tbsp', 'name' => 'French Cognac or brandy', 'note' => 'optional but traditional'],
            ['amount' => 3, 'unit' => 'sprigs', 'name' => 'Fresh thyme', 'note' => 'leaves stripped'],
            ['amount' => 1, 'unit' => 'leaf', 'name' => 'Bay leaf', 'note' => 'whole'],
            ['amount' => 8, 'unit' => 'slices', 'name' => 'French baguette', 'note' => 'toasted until dry and crisp'],
            ['amount' => 200, 'unit' => 'g', 'name' => 'Gruyère or Comté cheese', 'note' => 'freshly grated'],
            ['amount' => 1, 'unit' => 'tsp', 'name' => 'Sea salt & cracked black pepper', 'note' => 'to taste']
        ],
        'steps' => [
            [
                'step' => 1,
                'title' => 'Slow Caramelization of Onions',
                'instruction' => 'In a large heavy pot or Dutch oven, melt the butter with the olive oil over medium-low heat. Add all sliced onions and toss to coat. Cover and cook for 10 minutes to sweat until soft and translucent.'
            ],
            [
                'step' => 2,
                'title' => 'Develop the Mahogany Fond',
                'instruction' => 'Uncover the pot, add salt and sugar, and turn heat to medium-low. Cook, stirring every few minutes, for 35 to 45 minutes. The onions will shrink dramatically, turning from pale yellow to golden, then to a rich, fragrant, sweet mahogany brown.'
            ],
            [
                'step' => 3,
                'title' => 'Flour & Deglaze',
                'instruction' => 'Add minced garlic and stir for 1 minute. Sprinkle the flour over the onions and cook, stirring continuously, for 2 minutes. Pour in the white wine and cognac, scraping up all browned bits stuck to the pot bottom.'
            ],
            [
                'step' => 4,
                'title' => 'Simmer the Rich Broth',
                'instruction' => 'Pour in the beef stock, thyme sprigs, and bay leaf. Bring to a gentle boil, then reduce heat to low and simmer uncovered for 25 to 30 minutes to marry all flavors. Discard bay leaf and season with salt and pepper.'
            ],
            [
                'step' => 5,
                'title' => 'Assemble & Broil to Golden Perfection',
                'instruction' => 'Preheat oven broiler to high. Ladle hot soup into oven-safe ceramic bowls or lion-head crocks. Float 1 or 2 toasted baguette slices atop each bowl. Generously heap shredded Gruyère cheese over bread and rims. Broil 3-4 minutes until cheese is bubbling, melted, and flecked with golden brown spots. Serve immediately!'
            ]
        ]
    ],
    [
        'id' => 'ratatouille-provencale',
        'title' => 'Ratatouille Provençale',
        'french_title' => 'Ratatouille Niçoise aux Herbes de Provence',
        'subtitle' => 'Slow-Roasted Summer Vegetable Medley with Garlic & Thyme',
        'category' => 'mains',
        'category_name' => 'Mains (Plats)',
        'difficulty' => 'Easy DIY',
        'difficulty_level' => 1,
        'prep_time_minutes' => 25,
        'cook_time_minutes' => 50,
        'total_time' => '1h 15m',
        'default_servings' => 4,
        'calories_per_serving' => 240,
        'image' => 'assets/images/ratatouille.jpg',
        'badge' => 'Vegan & Gluten-Free',
        'description' => 'The sun-drenched flavors of Provence captured in a dish: tender ribbons of zucchini, yellow summer squash, Japanese eggplant, and ripe vine tomatoes baked over a fragrant bell pepper and tomato piperade.',
        'wine_pairing' => 'Chilled Côtes de Provence Rosé or Bandol',
        'chef_tip' => 'Use a mandoline slicer to achieve uniform vegetable rounds (~2mm thin). Consistent thickness guarantees every vegetable softens evenly while keeping its vibrant individual texture.',
        'tags' => ['Healthy DIY', 'Vegetarian', 'Provençal', 'Summer Flavors'],
        'ingredients' => [
            ['amount' => 2, 'unit' => 'medium', 'name' => 'Zucchini (courgettes)', 'note' => 'sliced into 2mm rounds'],
            ['amount' => 2, 'unit' => 'medium', 'name' => 'Yellow squash', 'note' => 'sliced into 2mm rounds'],
            ['amount' => 2, 'unit' => 'slender', 'name' => 'Japanese or Italian eggplants', 'note' => 'sliced into 2mm rounds'],
            ['amount' => 5, 'unit' => 'ripe', 'name' => 'Roma or plum tomatoes', 'note' => 'sliced into 2mm rounds'],
            ['amount' => 1, 'unit' => 'can (400g)', 'name' => 'Crushed San Marzano tomatoes', 'note' => 'for piperade base'],
            ['amount' => 1, 'unit' => 'medium', 'name' => 'Red bell pepper', 'note' => 'finely diced'],
            ['amount' => 1, 'unit' => 'medium', 'name' => 'Yellow bell pepper', 'note' => 'finely diced'],
            ['amount' => 1, 'unit' => 'medium', 'name' => 'Yellow onion', 'note' => 'finely diced'],
            ['amount' => 4, 'unit' => 'cloves', 'name' => 'Garlic', 'note' => 'minced'],
            ['amount' => 4, 'unit' => 'tbsp', 'name' => 'High quality extra virgin olive oil', 'note' => 'divided'],
            ['amount' => 1, 'unit' => 'tbsp', 'name' => 'Dried Herbes de Provence', 'note' => 'rosemary, thyme, oregano, marjoram, savory'],
            ['amount' => 1, 'unit' => 'handful', 'name' => 'Fresh basil leaves', 'note' => 'torn for serving'],
            ['amount' => 1, 'unit' => 'tsp', 'name' => 'Fleur de sel & freshly ground pepper', 'note' => 'to finish']
        ],
        'steps' => [
            [
                'step' => 1,
                'title' => 'Cook the Piperade Base',
                'instruction' => 'Heat 2 tbsp olive oil in a wide skillet over medium heat. Sauté the diced onion and bell peppers for 8 minutes until softened. Stir in the minced garlic for 1 minute, then add crushed tomatoes, 1 tsp Herbes de Provence, salt, and pepper. Simmer for 10 minutes until thick and aromatic.'
            ],
            [
                'step' => 2,
                'title' => 'Spread the Base in Baking Dish',
                'instruction' => 'Spread the cooked tomato-pepper piperade evenly across the bottom of a 9-inch round or oval baking dish.'
            ],
            [
                'step' => 3,
                'title' => 'Arrange the Vegetable Spirals',
                'instruction' => 'Stack sliced zucchini, yellow squash, eggplant, and tomato slices in repeating alternating sequence. Arrange them tightly in concentric circles around the baking dish, fitting tightly from the outer perimeter inwards toward the center.'
            ],
            [
                'step' => 4,
                'title' => 'Season & Herb Infusion',
                'instruction' => 'In a small bowl, whisk 2 tbsp olive oil with remaining Herbes de Provence, sea salt, and black pepper. Generously brush this herb oil over the top of the arranged vegetables.'
            ],
            [
                'step' => 5,
                'title' => 'Slow Oven Roast',
                'instruction' => 'Cover the dish with parchment paper cut to fit inside the rim. Bake in a preheated 190°C (375°F) oven for 40 minutes. Remove parchment and bake uncovered for another 10 to 15 minutes until vegetables are tender and edges gently blistered. Scatter fresh basil leaves on top before serving.'
            ]
        ]
    ],
    [
        'id' => 'croissants-pur-beurre',
        'title' => 'Croissants Pur Beurre DIY',
        'french_title' => 'Croissants Feuilletés Faits Maison',
        'subtitle' => 'Flaky, Laminated French Butter Croissants from Scratch',
        'category' => 'baking',
        'category_name' => 'Bakery & Viennoiserie',
        'difficulty' => 'Chef Masterclass',
        'difficulty_level' => 3,
        'prep_time_minutes' => 60,
        'cook_time_minutes' => 20,
        'total_time' => '14h (incl. chilling)',
        'default_servings' => 8,
        'calories_per_serving' => 310,
        'image' => 'assets/images/croissants.jpg',
        'badge' => 'French Bakery Icon',
        'description' => 'The quintessential French breakfast pastry made approachable at home. Learn the magic of butter lamination (tourage) to create dozens of gossamer, honeycomb-crisp, buttery layers.',
        'wine_pairing' => 'Café au lait, espresso, or a glass of chilled Champagne Demi-Sec',
        'chef_tip' => 'Butter temperature is the key to croissant success: the butter block must be pliable like clay, not rock-hard and not melting soft. If butter shatters or seeps, pop the dough back in the fridge for 20 minutes.',
        'tags' => ['Boulangerie', 'Weekend Project', 'Artisanal DIY'],
        'ingredients' => [
            ['amount' => 500, 'unit' => 'g', 'name' => 'French T55 or high-grade bread flour', 'note' => '11.5% - 12% protein'],
            ['amount' => 60, 'unit' => 'g', 'name' => 'Granulated sugar', 'note' => ''],
            ['amount' => 10, 'unit' => 'g', 'name' => 'Fine sea salt', 'note' => ''],
            ['amount' => 10, 'unit' => 'g', 'name' => 'Instant dry yeast', 'note' => 'or 20g fresh baker yeast'],
            ['amount' => 250, 'unit' => 'ml', 'name' => 'Cold whole milk', 'note' => 'approx 4°C'],
            ['amount' => 50, 'unit' => 'g', 'name' => 'Unsalted butter (for dough)', 'note' => 'softened at room temp'],
            ['amount' => 280, 'unit' => 'g', 'name' => 'European-style unsalted butter (for laminating)', 'note' => 'minimum 82% butterfat'],
            ['amount' => 1, 'unit' => 'whole', 'name' => 'Egg + 1 tbsp milk', 'note' => 'beaten together for egg wash']
        ],
        'steps' => [
            [
                'step' => 1,
                'title' => 'Make the Détrempe (Base Dough)',
                'instruction' => 'In a stand mixer fitted with dough hook, combine flour, sugar, salt, yeast, cold milk, and 50g softened butter. Knead on low speed for 6-8 minutes until a smooth, supple dough forms. Flatten into a rectangle, wrap in plastic, and chill overnight (at least 6 hours) in the refrigerator.'
            ],
            [
                'step' => 2,
                'title' => 'Prepare the Butter Block (Beurrage)',
                'instruction' => 'Place the 280g cold butter between two sheets of parchment paper. Using a rolling pin, beat and roll it into a neat 18x18 cm (7x7 inch) square of uniform thickness. Chill for 15 minutes until cool but pliable.'
            ],
            [
                'step' => 3,
                'title' => 'Encase the Butter & The First Turn',
                'instruction' => 'Roll the cold détrempe dough into a 26x26 cm square. Place the butter square diamond-style in the center. Fold the corners of the dough over the butter to enclose it completely like an envelope. Roll into a long rectangle (60x20 cm), then fold in thirds like a business letter (Single Turn). Chill 30 minutes.'
            ],
            [
                'step' => 4,
                'title' => 'Complete the Lamination Turns',
                'instruction' => 'Rotate dough 90 degrees. Roll again into a 60x20 cm rectangle and fold into thirds (Second Turn). Chill 30 minutes. Repeat one more time for a total of 3 single turns (creating 81 distinct layers of butter and dough!). Chill 1 hour before final shaping.'
            ],
            [
                'step' => 5,
                'title' => 'Cut, Shape & Proof',
                'instruction' => 'Roll dough on a lightly floured surface to a 4mm thick rectangle (approx 25x100 cm). Cut isosceles triangles with an 8cm base. Make a 1cm notch at the base, stretch gently, and roll upwards into croissants. Place on baking sheet lined with parchment. Proof at room temp (24°C) for 2 to 2.5 hours until puffy and jiggly.'
            ],
            [
                'step' => 6,
                'title' => 'Golden Bake',
                'instruction' => 'Gently brush croissants with egg wash without letting it drip on the laminated cut edges. Bake in a preheated 200°C (395°F) convection oven for 10 minutes, then lower heat to 180°C (355°F) for 8 to 10 minutes until deep mahogany golden and crisp. Cool on wire rack.'
            ]
        ]
    ],
    [
        'id' => 'creme-brulee-vanille',
        'title' => 'Crème Brûlée à la Vanille',
        'french_title' => 'Crème Brûlée Classique à la Gousse de Bourbon',
        'subtitle' => 'Silky Madagascar Vanilla Custard with Crackling Glass Caramel',
        'category' => 'desserts',
        'category_name' => 'Decadent Desserts',
        'difficulty' => 'Easy DIY',
        'difficulty_level' => 1,
        'prep_time_minutes' => 15,
        'cook_time_minutes' => 40,
        'total_time' => '3h (incl. chill)',
        'default_servings' => 4,
        'calories_per_serving' => 410,
        'image' => 'assets/images/creme-brulee.jpg',
        'badge' => 'Dessert Masterpiece',
        'description' => 'The ultimate sensory dessert experience: breaking through a warm, gossamer-thin sheet of caramelized sugar with your spoon into rich, chilled, vanilla-flecked custard cream underneath.',
        'wine_pairing' => 'Sauternes, Muscat de Beaumes-de-Venise, or Espresso',
        'chef_tip' => 'Always bake in a water bath (Bain-Marie) with warm water coming halfway up the ramekins. This buffers the heat, preventing the eggs from curdling and ensuring velvet texture throughout.',
        'tags' => ['Gluten-Free', 'Make Ahead', 'Dinner Party Hero'],
        'ingredients' => [
            ['amount' => 500, 'unit' => 'ml', 'name' => 'Heavy whipping cream (35% - 38% fat)', 'note' => 'liquid gold'],
            ['amount' => 1, 'unit' => 'plump', 'name' => 'Madagascar vanilla bean', 'note' => 'split lengthwise and seeds scraped (or 2 tsp pure vanilla extract)'],
            ['amount' => 5, 'unit' => 'large', 'name' => 'Egg yolks', 'note' => 'at room temperature'],
            ['amount' => 70, 'unit' => 'g', 'name' => 'Granulated sugar (for custard)', 'note' => ''],
            ['amount' => 1, 'unit' => 'pinch', 'name' => 'Fine sea salt', 'note' => 'balances rich sweetness'],
            ['amount' => 4, 'unit' => 'tbsp', 'name' => 'Demerara or turbinado cane sugar (for brulee crust)', 'note' => '1 tbsp per ramekin'],
            ['amount' => 8, 'unit' => 'fresh', 'name' => 'Fresh raspberries & mint leaves', 'note' => 'for garnish']
        ],
        'steps' => [
            [
                'step' => 1,
                'title' => 'Infuse the Cream with Vanilla',
                'instruction' => 'In a small saucepan, combine heavy cream, scraped vanilla bean seeds, and the empty vanilla pod. Bring to a gentle simmer over medium heat. Once tiny bubbles appear along the edge, remove from heat, cover, and let steep for 15 minutes.'
            ],
            [
                'step' => 2,
                'title' => 'Whisk the Yolks & Sugar',
                'instruction' => 'In a mixing bowl, whisk together the 5 egg yolks, 70g granulated sugar, and salt just until blended and slightly pale (do not whip too vigorously to avoid creating unwanted air bubbles).'
            ],
            [
                'step' => 3,
                'title' => 'Temper & Strain',
                'instruction' => 'Remove the vanilla pod from the warm cream. While continuously whisking the yolk mixture, slowly pour in a ladle of warm cream to temper the eggs. Gradually pour in the remaining cream. Strain the custard through a fine-mesh sieve into a pouring pitcher.'
            ],
            [
                'step' => 4,
                'title' => 'Bain-Marie Baking',
                'instruction' => 'Arrange four 150ml (5oz) shallow ramekins inside a deep roasting pan. Pour custard into ramekins. Transfer pan to a 150°C (300°F) oven, then carefully pour boiling water into the pan until it reaches halfway up the sides of ramekins. Bake for 35 to 40 minutes until edges are set but center still has a slight gentle wobble.'
            ],
            [
                'step' => 5,
                'title' => 'Chill Thoroughly',
                'instruction' => 'Remove ramekins from the water bath and cool to room temp on a rack. Chill in the refrigerator for at least 3 hours (or overnight) to allow the custard to fully set.'
            ],
            [
                'step' => 6,
                'title' => 'The Grand Brûlée Moment',
                'instruction' => 'Just before serving, sprinkle an even 1 tbsp layer of turbinado sugar over each custard. Use a kitchen blowtorch in rapid circular motion about 2 inches away until sugar bubbles and caramelizes into a glossy golden-amber glass. Let cool 2 minutes to harden. Crack and enjoy!'
            ]
        ]
    ],
    [
        'id' => 'coq-au-vin',
        'title' => 'Coq au Vin Traditionnel',
        'french_title' => 'Coq au Vin à la Bourguignonne',
        'subtitle' => 'Braised Chicken in Pinot Noir with Crispy Lardons & Pearl Onions',
        'category' => 'mains',
        'category_name' => 'Mains (Plats)',
        'difficulty' => 'Classic',
        'difficulty_level' => 2,
        'prep_time_minutes' => 25,
        'cook_time_minutes' => 60,
        'total_time' => '1h 25m',
        'default_servings' => 4,
        'calories_per_serving' => 540,
        'image' => 'assets/images/coq-au-vin.jpg',
        'badge' => 'Country Classic',
        'description' => 'A rustic French tavern icon. Golden-seared chicken thighs simmered in deep red Burgundy wine, smoky bacon lardons, sweet baby onions, and earthy button mushrooms until wonderfully tender.',
        'wine_pairing' => 'Burgundy Pinot Noir, Brouilly, or Gamay',
        'chef_tip' => 'Marinating the chicken in wine and aromatics overnight transforms the meat to a tender deep purple hue, but you can also cook it directly for a quick weeknight gourmet dinner.',
        'tags' => ['French Heritage', 'Dinner Party', 'Comfort Food'],
        'ingredients' => [
            ['amount' => 1200, 'unit' => 'g', 'name' => 'Bone-in, skin-on chicken thighs and drumsticks', 'note' => 'approx 8 pieces'],
            ['amount' => 150, 'unit' => 'g', 'name' => 'Thick-cut smoked bacon lardons', 'note' => 'diced'],
            ['amount' => 750, 'unit' => 'ml', 'name' => 'Full-bodied French red wine', 'note' => 'Burgundy or Côte du Rhône'],
            ['amount' => 300, 'unit' => 'ml', 'name' => 'Chicken stock', 'note' => 'rich & flavorful'],
            ['amount' => 2, 'unit' => 'tbsp', 'name' => 'French Cognac or brandy', 'note' => 'for flamber'],
            ['amount' => 250, 'unit' => 'g', 'name' => 'Small brown button mushrooms', 'note' => 'halved'],
            ['amount' => 180, 'unit' => 'g', 'name' => 'Pearl onions', 'note' => 'peeled'],
            ['amount' => 2, 'unit' => 'medium', 'name' => 'Carrots', 'note' => 'sliced into rounds'],
            ['amount' => 3, 'unit' => 'cloves', 'name' => 'Garlic', 'note' => 'crushed'],
            ['amount' => 30, 'unit' => 'g', 'name' => 'Butter kneaded with 30g flour (Beurre Manié)', 'note' => 'instant French sauce thickener'],
            ['amount' => 1, 'unit' => 'bundle', 'name' => 'Bouquet garni (thyme, rosemary, bay leaf)', 'note' => 'tied'],
            ['amount' => 2, 'unit' => 'tbsp', 'name' => 'Chopped fresh chives and parsley', 'note' => 'for serving']
        ],
        'steps' => [
            [
                'step' => 1,
                'title' => 'Crisp Lardons & Brown Chicken',
                'instruction' => 'In a large heavy skillet or Dutch oven, brown the bacon lardons over medium heat until crispy. Transfer lardons to a plate. Season chicken pieces with salt and pepper; sear in the hot bacon drippings skin-side down for 6 minutes until crisp and golden brown, then flip and sear 4 minutes. Set chicken aside.'
            ],
            [
                'step' => 2,
                'title' => 'Aromatics & Flambé',
                'instruction' => 'Add the carrots and peeled pearl onions to the pot; sauté for 5 minutes until browned. Add garlic and cook 1 minute. Pour in the cognac and carefully flambé (or let alcohol cook off 1 minute), stirring up all browned fond.'
            ],
            [
                'step' => 3,
                'title' => 'Wine Braise',
                'instruction' => 'Return chicken and crispy lardons to pot. Pour over the entire bottle of red wine and the chicken stock. Add the bouquet garni. Bring to a gentle simmer, cover, and cook on low heat for 40 minutes until chicken is tender.'
            ],
            [
                'step' => 4,
                'title' => 'Mushroom Sauté & Sauce Gloss (Beurre Manié)',
                'instruction' => 'In a separate pan, sauté mushrooms in 1 tbsp butter until golden. Stir them into the stew. Whisk small pieces of the Beurre Manié (flour-butter paste) into the simmering liquid. The sauce will instantly turn glossy, velvety, and coat the back of a spoon. Garnish with chives and serve with buttered egg noodles.'
            ]
        ]
    ],
    [
        'id' => 'quiche-lorraine',
        'title' => 'Quiche Lorraine Authentique',
        'french_title' => 'Quiche Lorraine Traditionnelle au Fromage Comté',
        'subtitle' => 'Fluted Buttery Crust with Smoked Lardons & Rich Custard',
        'category' => 'baking',
        'category_name' => 'Bakery & Viennoiserie',
        'difficulty' => 'Easy DIY',
        'difficulty_level' => 1,
        'prep_time_minutes' => 25,
        'cook_time_minutes' => 40,
        'total_time' => '1h 05m',
        'default_servings' => 6,
        'calories_per_serving' => 460,
        'image' => 'assets/images/quiche-lorraine.jpg',
        'badge' => 'French Brunch Star',
        'description' => 'The gold standard of French tarts. A crisp, flaky Pâte Brisée crust filled with a delicate cream custard, savory smoked bacon lardons, and nutty melted Comté cheese with a whisper of freshly grated nutmeg.',
        'wine_pairing' => 'Alsace Pinot Blanc, Dry Riesling, or chilled Sancerre',
        'chef_tip' => 'Blind-baking (pre-baking) your pastry crust with pie weights is non-negotiable. It prevents a soggy bottom and keeps the crust shatteringly crisp under the creamy custard.',
        'tags' => ['Brunch DIY', 'Boulangerie Tart', 'Make Ahead', 'Bistro Lunch'],
        'ingredients' => [
            ['amount' => 1, 'unit' => 'disc', 'name' => 'Homemade Pâte Brisée (or quality shortcrust pastry)', 'note' => 'rolled to 11 inches'],
            ['amount' => 200, 'unit' => 'g', 'name' => 'Smoked pork belly lardons', 'note' => 'crisped and drained'],
            ['amount' => 150, 'unit' => 'g', 'name' => 'Grated Comté or Gruyère AOP cheese', 'note' => 'aged 12 months'],
            ['amount' => 4, 'unit' => 'large', 'name' => 'Fresh eggs', 'note' => 'at room temp'],
            ['amount' => 250, 'unit' => 'ml', 'name' => 'Heavy cream (Crème Fleurette)', 'note' => '30% fat'],
            ['amount' => 125, 'unit' => 'ml', 'name' => 'Whole milk', 'note' => ''],
            ['amount' => 0.25, 'unit' => 'tsp', 'name' => 'Freshly grated whole nutmeg', 'note' => 'crucial French aroma'],
            ['amount' => 0.5, 'unit' => 'tsp', 'name' => 'Fine sea salt & white pepper', 'note' => 'to season']
        ],
        'steps' => [
            [
                'step' => 1,
                'title' => 'Blind Bake the Pastry Crust',
                'instruction' => 'Fit the pastry dough into a 9-inch fluted tart pan with a removable bottom. Dock the base with a fork, line with parchment paper, and fill with ceramic pie weights or dried beans. Bake at 190°C (375°F) for 15 minutes, remove weights, and bake 5 minutes more until dry and pale golden.'
            ],
            [
                'step' => 2,
                'title' => 'Crisp the Lardons',
                'instruction' => 'In a dry skillet over medium heat, fry the lardons until golden and slightly crisp (5-6 minutes). Drain thoroughly on paper towels.'
            ],
            [
                'step' => 3,
                'title' => 'Whisk the French Custard',
                'instruction' => 'In a pitcher, whisk together 4 eggs, heavy cream, milk, freshly grated nutmeg, salt, and white pepper until completely smooth.'
            ],
            [
                'step' => 4,
                'title' => 'Layer & Bake to Golden Perfection',
                'instruction' => 'Scatter the crisped lardons and grated Comté cheese evenly across the bottom of the pre-baked tart shell. Pour the custard mixture gently over the top. Bake at 180°C (350°F) for 32 to 36 minutes until golden puffed and set with a tender center. Let rest 10 minutes before slicing.'
            ]
        ]
    ]
];

/**
 * French DIY Pantry Substitutions database
 */
$substitutions = [
    [
        'french_item' => 'Crème Fraîche',
        'description' => 'Rich, tangy cultured French cream with high butterfat (doesn\'t curdle when boiled).',
        'substitute' => '1 cup heavy whipping cream + 1 tbsp buttermilk or plain whole Greek yogurt, let sit at room temp for 12 hours.',
        'best_for' => 'Sauces, soups, and pastry toppings'
    ],
    [
        'french_item' => 'Gruyère or Comté AOP',
        'description' => 'Nutty, sweet, cave-aged alpine cows milk cheese with superb melting properties.',
        'substitute' => 'Emmental, Fontina, aged white Cheddar, or Swiss cheese blended with a touch of aged Parmesan.',
        'best_for' => 'French onion soup, Quiche Lorraine, and Croque Monsieur'
    ],
    [
        'french_item' => 'French Lardons',
        'description' => 'Thick matchsticks of salt-cured or cold-smoked pork belly.',
        'substitute' => 'Thick-cut slab bacon sliced into 1/4-inch matchsticks, blanched in boiling water for 1 minute to tame excessive smoke.',
        'best_for' => 'Boeuf Bourguignon, Coq au Vin, Frisée Salad'
    ],
    [
        'french_item' => 'Bouquet Garni',
        'description' => 'The quintessential French herb bundle tied with butcher twine.',
        'substitute' => 'Tie together 3 sprigs fresh thyme, 1 bay leaf, and 3 fresh parsley stems in a cheesecloth bundle or wrap with a leek green leaf.',
        'best_for' => 'All braises, broths, and stews'
    ],
    [
        'french_item' => 'French T55 Flour',
        'description' => 'Standard French pastry/bread flour with 11-12% protein and fine silky ash content.',
        'substitute' => 'Blend 80% Unbleached All-Purpose Flour with 20% Bread Flour, sifted twice.',
        'best_for' => 'Croissants, Baguettes, and Pâte Brisée'
    ],
    [
        'french_item' => 'Beurre Manié',
        'description' => 'Kneaded paste of equal parts softened French butter and all-purpose flour.',
        'substitute' => '1 tbsp soft butter mixed smoothly with 1 tbsp flour, whisked into simmering liquid in small pellets for an instant mirror-like glossy sauce.',
        'best_for' => 'Coq au Vin, Bourguignon, and Velouté'
    ]
];

/**
 * Chef Techniques Guides
 */
$techniques = [
    [
        'id' => 'fond-deglazing',
        'title' => 'The Art of the "Fond" & Deglazing',
        'subtitle' => 'Unlocking the concentrated savory gold at the bottom of your skillet',
        'icon' => '🍷',
        'summary' => 'When meat sears at high temperature, amino acids and sugars caramelize into deep brown crust bits known in French as the "fond". Never wash this away! Pouring in acidic liquid like red wine, vermouth, or stock instantly dissolves these molecules into a silky, complex French reduction sauce.'
    ],
    [
        'id' => 'roux-emulsions',
        'title' => 'Mastering Roux & The 5 Mother Sauces',
        'subtitle' => 'Equal parts butter and flour to create pure velvet',
        'icon' => '🧈',
        'summary' => 'Escoffier revolutionized French cuisine with 5 mother sauces: Béchamel, Velouté, Espagnole, Sauce Tomat, and Hollandaise. A blonde roux cooked for 3 minutes eliminates raw starch flavors and creates an impossibly smooth, lump-free binder for gratins and stews.'
    ],
    [
        'id' => 'butter-lamination',
        'title' => 'Butter Lamination (Le Tourage)',
        'subtitle' => 'Folding cold butter sheets into pastry dough to create hundreds of honeycomb layers',
        'icon' => '🥐',
        'summary' => 'Lamination is the mechanical alchemy of enclosing a cold butter block inside a yeast dough (détrempe) and executing precision turns. When baked, the water in the butter evaporates into steam, puffing apart individual sheets of pastry before the butter fat crisps them into golden glass.'
    ],
    [
        'id' => 'knife-cuts',
        'title' => 'Classic French Cuts: Mirepoix, Brunoise & Julienne',
        'subtitle' => 'Precision knife skills that guarantee uniform flavor extraction',
        'icon' => '🔪',
        'summary' => 'The French holy aromatic trinity (Mirepoix: 2 parts onion, 1 part carrot, 1 part celery) forms the foundation of stocks. Cutting vegetables into uniform sizes guarantees they cook at the identical rate, allowing sweet, earthy compounds to infuse without turning to mush.'
    ]
];
