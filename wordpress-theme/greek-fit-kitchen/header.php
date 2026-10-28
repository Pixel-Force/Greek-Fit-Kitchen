<?php
/**
 * Generic Header Template for Greek Fit Kitchen WordPress Theme
 * Modular, standalone header included across all templates and Elementor pages
 *
 * @package GreekFitKitchen
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <!-- Preconnect to Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
  
  <!-- Tailwind CSS CDN with Custom Color Palette -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            greek: {
              navy: '#101D3A',
              card: '#172A4D',
              gold: '#F5C542',
              goldHover: '#E5B432',
              cream: '#FAF9F5',
              lime: '#70B843',
            }
          },
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
          }
        }
      }
    };
  </script>

  <script>
    (function() {
      try {
        const storedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (storedTheme === 'dark' || (!storedTheme && prefersDark)) {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
      } catch (e) {}
    })();
    function toggleTheme() {
      const isDark = document.documentElement.classList.toggle('dark');
      try {
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
      } catch(e) {}
    }
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-slate-800 antialiased flex flex-col min-h-screen selection:bg-greek-gold selection:text-greek-navy' ); ?>>
<?php wp_body_open(); ?>

<?php
// Render Global Header (Editable with Elementor, Customizer, or Modular Template)
gfk_render_header();
