# Guide d'intégration WordPress pour CityClub

## Option 1: Conversion en thème WordPress natif

1. **Créer la structure de base du thème WordPress**
   - Créer un dossier `cityclub-theme`
   - Ajouter les fichiers essentiels: `style.css`, `functions.php`, `index.php`, `header.php`, `footer.php`, `single.php`, `page.php`
   - Ajouter le fichier `screenshot.png` pour l'aperçu du thème

2. **Convertir les composants React en templates WordPress**
   - Transformer les composants React en HTML/PHP
   - Utiliser les hooks WordPress pour les fonctionnalités dynamiques
   - Créer des templates personnalisés pour les différentes sections

3. **Intégrer les styles**
   - Convertir les styles Tailwind en CSS standard
   - Organiser les styles dans des fichiers séparés

4. **Créer des types de contenu personnalisés**
   - Créer des CPT pour les coachs, activités, témoignages, etc.
   - Configurer les taxonomies nécessaires

## Option 2: Utilisation avec Elementor (Recommandé)

1. **Créer un thème enfant Elementor**
   - Utiliser un thème compatible comme Hello Elementor
   - Créer un thème enfant pour les personnalisations

2. **Créer des widgets personnalisés Elementor**
   - Convertir chaque composant React en widget Elementor
   - Créer des widgets pour: Bilan Médico-Sportif, Activités, Coachs, etc.

3. **Configurer les modèles Elementor**
   - Créer des modèles pour chaque section
   - Assembler les sections dans un modèle de page d'accueil

4. **Intégrer les styles**
   - Ajouter les styles personnalisés via l'éditeur Elementor
   - Créer un fichier CSS personnalisé pour les styles globaux

## Plugins recommandés

1. **Elementor Pro** - Pour les fonctionnalités avancées
2. **Advanced Custom Fields** - Pour les champs personnalisés
3. **Custom Post Type UI** - Pour créer facilement des types de contenu
4. **WP Carousel** - Pour les carrousels d'activités et témoignages
5. **Contact Form 7** - Pour les formulaires de contact
6. **WP Google Maps** - Pour la carte des clubs

## Étapes d'installation

1. Installer WordPress sur votre hébergement
2. Installer et activer Elementor + plugins recommandés
3. Importer les modèles Elementor fournis
4. Configurer les types de contenu personnalisés
5. Personnaliser les couleurs et typographies selon votre charte graphique

## Fonctionnalités spécifiques

### Système de réservation de cours
- Utiliser le plugin **Bookly** ou **Amelia** pour la réservation de cours
- Intégrer le calendrier des cours avec les widgets Elementor

### Espace membres
- Utiliser **MemberPress** ou **WooCommerce Memberships** pour gérer les abonnements
- Créer des zones réservées aux membres

### Multisite pour les différents clubs
- Configurer WordPress Multisite pour gérer plusieurs emplacements
- Partager les ressources entre les sites

## Migration des données

1. Exporter les données des activités, coachs, etc. au format CSV
2. Utiliser WP All Import pour importer les données dans WordPress
3. Associer les médias et relations entre contenus

## Optimisation

1. Configurer un plugin de cache comme WP Rocket
2. Optimiser les images avec Smush ou ShortPixel
3. Minifier les ressources CSS/JS

## Support et maintenance

- Mises à jour régulières du thème et des plugins
- Sauvegardes automatiques avec UpdraftPlus
- Surveillance de la sécurité avec Wordfence
